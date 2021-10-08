<?php
if(isset($_POST["reset-request-submit"])){
if(isset($_POST["Email"])){
 $selector=bin2hex(random_bytes(8));
 $token=random_bytes(32);
$hexedToken =  bin2hex($token);

 $url="ams.hawy.net/ams/passwordRe.php?selector=" . $selector . "&validator=" . $hexedToken;
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
 
$sql_checkExisit=$conn->prepare('SELECT count(Email) from user WHERE Email=?');
$sql_checkExisit->bind_param("s",$userEmail);
 
     $sql_checkExisit->execute();
       
    $asset_result = $sql_checkExisit->get_result();
          
    $row= $asset_result->fetch_array(MYSQLI_ASSOC);
    $asset_count = $row["count(Email)"];
          

// echo $asset_count;

if($asset_count!=1)//You are mixing the mysql and mysqli, change this line of code
           {
            echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Email Does Not Exist!
        </div>";
         echo"<div class='alert alert-success alert-dismissible bg-success text-white border-0 fade show' id='green_alert' role='alert' hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Success - </strong> Check Your Email!
        </div>";
           }else{
       
                
                
              //
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
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo mysqli_error($conn);
        exit();
    }else{
      $hashedToken=password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt,"ssss",$userEmail, $selector, $hashedToken, $expires);
      mysqli_stmt_execute($stmt);
    }
    if(password_verify($token,$hashedToken)){
}
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    $to=$userEmail;
    
    $subject='Reset your password for Asset Manager';
    
    $message='<p>The link below is for reset password for Asset Manager website, ignore this message if you did not ask for reset password. </p>'.'<p> <a href="' . $url . '">'. $url .'</a></p>';
    
    $headers="From: Asset Manager <CustomerServices@hawy.net>\r\n"; //write between <> our email
    $headers.="Reply-To: CustomerServices@hawy.net\r\n";
     $headers.="Content-type: text/html\r\n";
    //echo "Please check your email";
    mail($to, $subject, $message, $headers);
   echo"<div class='alert alert-success alert-dismissible bg-success text-white border-0 fade show' id='green_alert' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Success - </strong> Check Your Email!
        </div>";
        
         echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert' hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Email Does Not Exist!
        </div>";
   // header("Location: ../reset-password.php?reset=success");
}
    
}else{
   echo "Please enter an Email address";
}
}else{
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <!--<script>-->
      <!--    function myfunction(){-->
      <!--    document.getElementById("green_alert").hidden = false;-->
      <!--   document.getElementById('green_alert').innerHTML="Check your Email";-->
      <!--   return false;-->
      <!--    }-->
      <!--</script>-->
    <meta charset="utf-8" />
    <title>Asset Manager - Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content="A fully featured admin theme which can be used to build CRM, CMS, etc."
      name="description"
    />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo2.png" />

    <!-- App css -->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="authentication-bg">
    <div class="account-pages mt-5 mb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card">
              <!-- Logo -->
              <div class="card-header pt-4 pb-4 text-center bg-primary">
                <a href="index.php">
                  <span
                    ><img src="assets/images/logo1.png" alt="" height="77"
                  /></span>
                </a>
              </div>

              <div class="card-body p-4">
        <!--         <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" id="green_alert" role="alert" hidden>-->
        <!--    <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
        <!--        <span aria-hidden="true">×</span>-->
        <!--    </button>-->
        <!--    <strong>Success - </strong> Check your Email-->
        <!--</div>-->
                <div class="text-center w-75 m-auto">
                  <h4 class="text-dark-50 text-center mt-0 font-weight-bold">
                    Reset Password
                  </h4>
                  <p class="text-muted mb-4">
                    Enter your email address and we'll send you an email with
                    instructions to reset your password.
                  </p>
                </div>

                <form action="" method="post">
                  <div class="form-group mb-3">
                    <label for="emailaddress">Email address</label>
                    <input
                      class="form-control"
                      type="email"
                      name="Email"
                      id="emailaddress"
                      required=""
                      placeholder="Enter your email"
                    />
                  </div>

                  <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" type="submit" name="reset-request-submit" onclick="myfunction();">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
              <!-- end card-body-->
              <div class="col-12 text-center">
                <p class="text-muted">
                  Back to
                  <a href="login.php" class="text-muted ml-1"><b>Log In</b></a>
                </p>
              </div>
            </div>
            <!-- end card -->

            <div class="row mt-3">
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
      2019 © Asset Manager
    </footer>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
  </body>
</html>
