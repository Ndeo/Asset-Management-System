<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Reset Password
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <a href="index.php"><span><img src="assets/images/logo1.png" alt="" height="77" /></span></a>
              </div>

              <div class="card-body p-4">
                    <div class="text-center w-75 m-auto">
                        <h3 class="text-dark-50 text-center mt-0 font-weight-bold">Reset Password</h3>
                        <br>
                        <main>
                            <div>
                                
                                    <?php
                                    $selector=$_GET["selector"];
                                    $validator=$_GET["validator"];
                                    if (empty($selector) || empty($validator)){
                                    echo"Erorr with validation";
                                    } else {
                                    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                                    ?>
                                    <form action="includes/reset-password.inc.php" method="post">
                                    <input type="hidden" name="selector" value="<?php echo $selector ?>" />
                                    <input type="hidden" name="validator" value="<?php echo $validator ?>" />
                                    <h5>Password:</h5>
                                    
                                    <input type="password" name="pwd" placeholder="Enter a new password" />
                                    
                                    <h5>Confirm new password:</h5>
                                    <input  type="password" name="pwd-repeat"placeholder="Conform new password"/>
                                    <br>
                                    <br>
                                    <button type="submit"  class="btn btn-warning" name="reset-password-submit"><b>Reset Passwor</b></button>
                                    </form>
                                    <?php } } ?>
                                
                            </div>
                        </main> 
                    </div>
              </div>
              <!-- end card-body-->
                <div class=" text-center">
                    <p class="text-muted">Back to<a href="login.php" class="text-muted ml-1"><b>Log In</b></a></p>
                </div>
            </div>
            <!-- end card -->
            
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
    <script src="assets/js/app.min.js">
    </script>
  </body>
</html>
