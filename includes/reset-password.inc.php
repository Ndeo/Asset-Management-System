<?php
    if(isset($_POST["reset-password-submit"])){
    $selector=$_POST["selector"];
    $validator=$_POST["validator"];
    $pass=$_POST["pwd"];
    $passwordRepeat=$_POST["pwd-repeat"];
    
    if (empty($pass) || empty($passwordRepeat)){
        header("Location: www.google.com");
        exit();
    }else if($pass != $passwordRepeat){
        header("Location: www.yahoo.com");
        exit(); 
    }
    
    $currentDate =date("U");
    include'config.php';//require a file for the connection with database
        
    $sql=$conn->prepare("SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?;");
      
    
      $sql->bind_param("ss",$selector, $currentDate); //be careful
      $sql->execute();
        $result = $sql -> get_result();
    if(!$row =  $result->fetch_array(MYSQLI_ASSOC)){
        echo "you need to resubmit your request";
        exit();
    }else {
        $tokenBin=hex2bin($validator);
        $tokenCheck=password_verify($tokenBin,$row["pwsResetToken"]);
        if($tokenCheck === false){
             echo "you need to resubmit your request";
        exit();
        }elseif($tokenCheck === true){
          $tokenEmail=$row['pwdResetEmail'];
        $sql=$conn->prepare("SELECT * FROM user WHERE Email=?;");
          $sql->bind_param("s", $tokenEmail); 
          $sql->execute();
$result = $sql -> get_result();
if(!$row =  $result->fetch_array(MYSQLI_ASSOC)){
        echo "Erorr!!!";
        exit();
    }else {
        
        $sql=$conn->prepare("UPDATE user SET pass=? WHERE Email=?;");
        
          $newPwdHash=password_hash($pass, PASSWORD_BCRYPT);
          
          if(password_verify($pass,$newPwdHash)){
          $sql->bind_param("ss", $newPwdHash, $tokenEmail); 
          $sql->execute();
            $logFile = "../log.txt";
            $fh = fopen($logFile,'a');
            
                fwrite($fh, 'User with email= '.$tokenEmail." changed his password at: ".date("Y-m-D")." ".date("H:i:s")."\n");
                
            fclose($fh);
          $sql=$conn->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=?;");
          
              $sql->bind_param("s",$userEmail);
              $sql->execute();
              header("Location: /ams/login.php");
          }else{
              echo "password isn't hashed";
          }
        
        
    }
        
            
        }
    }
    
    }else{
   header("Location: ../index.php"); 
}
?>