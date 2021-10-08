<?php
session_start();
include("config.php");
if(isset($_SESSION['ID']) or isset($_COOKIES['ID'])){
   
   header('location: index.php'); 
    
}
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $sql =$conn->prepare("Select pass from user where Username = ?");
      $sql -> bind_param("s",$_POST["username"]);
      $sql -> execute();
      $result = $sql -> get_result();
          $row =  $result->fetch_array(MYSQLI_ASSOC);
       $count = $result-> num_rows;
      // If result matched $myusername and $mypassword, table row must be 1 row
   
      if($count == 1) {
         if(1==password_verify($_POST['password'],$row['pass'])){
         
          $sql =$conn->prepare("Select * from user where Username = ?");
      $sql -> bind_param("s",$_POST["username"]);
      $sql -> execute();
      $result = $sql -> get_result();
          $row =  $result->fetch_array(MYSQLI_ASSOC);
       $count = $result-> num_rows;

        $active = $row['state'];
        if($active=="active"){
           
           if($_POST['Rememberme']=="checked"){
           setcookie('ID',   $row['ID'], time() + (86400 * 30));
           }
           $_SESSION['ID'] =  $row['ID'];
            $_SESSION['role'] =  $row['userRole'];
             $_SESSION['image']=$row['image'];
              $_SESSION['FirstName']=$row['FirstName'];
             $_SESSION['LastName']=$row['LastName'];
             if(isset($_POST['mobile']) && $_POST['mobile'] == "android"){ 
                echo "success"; 
                 echo"<div class='alert alert-success alert-dismissible bg-success text-white border-0 fade show' id='green_alert' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Success  </strong>
        </div>";
                  echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert' hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Your account has been set to inactive. Please contact support!
        </div>";
          echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert' hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Your Login Name or Password is invalid!
        </div>";
                exit; 
            } 
            header("location:  index.php");
        }else{
          $error= "Your account has been set to inactive. Please contact support";
        //     echo"<script>";
        // echo "document.getElementById('green_alert').hidden = false;";
        // echo " document.getElementById('red_alert').hidden = true;";
        // echo " document.getElementById('red_alert').innerHTML='Your account has been set to inactive. Please contact support';";
        echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Your account has been set to inactive. Please contact support!
        </div>";
         echo"<div class='alert alert-success alert-dismissible bg-success text-white border-0 fade show' id='green_alert' role='alert' hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Success - </strong> Check Your Email!
        </div>";
          echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert' hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Your Login Name or Password is invalid!
        </div>";
      
          
          }
      }else {
         $error = "Your Login Name or Password is invalid";
         
           echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Your Login Name or Password is invalid!
        </div>";
         
          echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert'hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Your account has been set to inactive. Please contact support!
        </div>";
        
         echo"<div class='alert alert-success alert-dismissible bg-success text-white border-0 fade show' id='green_alert' role='alert' hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Success - </strong> Check Your Email!
        </div>";
        
      
    //     echo "document.getElementById('green_alert').hidden = false;";
    //     echo " document.getElementById('red_alert').hidden = true;";
    //     echo" document.getElementById('red_alert').innerHTML='Your Login Name or Password is invalid';";
    //   echo" </script>";
         
      }
   }
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content=""
      name="description"
    />
    <meta content="AM.IAU" name="manoo" />
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
              <div class="card-header pt-4 pb-4 text-center bg-primary2">
                <a href="index.php">
                  <span
                    ><img src="assets/images/logo1.png" alt="" height="100"
                  /></span>
                </a>
              </div>

              <div class="card-body p-4">
                          <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" id="green_alert" role="alert" hidden>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Success - </strong> You have Successfully Changed Your Record
        </div>
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" id="red_alert" role="alert" hidden>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Error - </strong> Password Mismatch - check your password
        </div>
                <div class="text-center w-75 m-auto">
                  <h4 class="text-dark-50 text-center mt-0 font-weight-bold">
                    Log In
                  </h4>
                  <p class="text-muted mb-4">
                    Enter your email address and password to log in.
                  </p>
                </div>

                <form action="" method="POST">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      class="form-control"
                      type="username"
                      id="username"
                      name="username"
                      required=""
                      placeholder="Enter your Username"
                    />
                  </div>

                  <div class="form-group">
                    <a href="recoverpw.php" class="text-muted float-right"
                      ><small>Forgot your password?</small></a
                    >
                    <label for="password">Password</label>
                    <input
                      class="form-control"
                      type="password"
                       name="password"
                      required=""
                      id="password"
                      placeholder="Enter your password"
                    />
                  </div>

                  <div class="form-group mb-3">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="checkbox-signin"
                        name="Rememberme"
                        value="checked"
                        checked
                      />
                      <label class="custom-control-label" for="checkbox-signin"
                        >Remember me</label
                      >
                    </div>
                  </div>

                  <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" type="submit">
                      Log In
                    </button>
                  </div>
                </form>
              </div>
              <!-- end card-body -->
              <div class=" text-center">
                <p class="text-muted">
                  Don't have an account?
                  <a href="register.php" class="text-muted ml-1"
                    ><b>Sign Up</b></a
                  >
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
    <footer class="footer2 footer-alt">
      2019 © Asset Manager
    </footer>
  

    <!-- App js -->
    <script src="assets/js/app.js"></script>
  </body>
</html>
