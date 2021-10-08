<?php
if(isset($_POST["Email"])){
 $selector=bin2hex(random_bytes(8));
 $token=random_bytes(32);
$hexedToken =  bin2hex($token);

 $url="ams.hawy.net/ams/pwdReset/passwordRe.php?selector=" . $selector . "&validator=" . $hexedToken;
 $expires =date("U")+900;
 include 'config.php';//require a file for the connection with database

 $userEmail=$_POST["Email"]; 

    /*CREATE TABLE pwdReset (
    pwdResetId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    pwdResetEmail TEXT NOT NULL,
    pwdResetSelector TEXT NOT NULL,
    pwsResetToken LONGTEXT NOT NULL,
    pwdResetExpires TEXT NOT NULL
    );*/
    //$sql= $conn->prepare("DELETE FROM pwdReset WHERE pwdResetEmail=?;");
 //$sql -> bind_param("s",$_Session['ID']);
 
$sql="DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt=mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit();
    }else{
      mysqli_stmt_bind_param($stmt,"s",$userEmail);
      mysqli_stmt_execute($stmt);
     // header("Location: ../loginPart2.php");
    }
    $sql="INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwsResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    include 'config.php';
     $stmt=mysqli_stmt_init($conn);
     echo"8700";
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo mysqli_error($conn);
        exit();
    }else{
      $hashedToken=password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt,"ssss",$userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }
    if(password_verify($token,$hashedToken)){
    echo "hello";
}
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    $to=$userEmail;
    
    $subject='Reset your password for Asset Manager';
    
    $message='<p>The link below is for reset password for Asset Manager website, ignore this message if you did not ask for reset password. </p>'.'<p> <a href="' . $url . '">'. $url .'</a></p>';
    
    $headers="From: Asset Manager <CustomerServices@hawy.net>\r\n"; //write between <> our email
    $headers.="Reply-To: CustomerServices@hawy.net\r\n";
     $headers.="Content-type: text/html\r\n";
    
    mail($to, $subject, $message, $headers);
   // header("Location: ../reset-password.php?reset=success");
}else{
   //header("Location: ../index.php") 
}
?>