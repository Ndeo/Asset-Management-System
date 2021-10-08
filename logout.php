<!DOCTYPE html>
<html lang="en">
    <?php
      session_start();
      session_destroy();
      unset($_COOKIE['ID']);
    //   setcookie(session_name(), '', time()-7000000, '/');
    //   setcookie('ID', '', time()-7000000, '/');
    $has_session = session_status() == PHP_SESSION_ACTIVE;
    $res = setcookie("ID", '', time()-30060000);
    
    ?>
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Log Out</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content=""
    />
    <meta content="" name="" />
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
                <div class="text-center w-75 m-auto">
                  <h4 class="text-dark-50 text-center mt-0 font-weight-bold">
                    You successfully sign out!
                  </h4>
                </div>

                <div class="logout-icon m-auto">
                  <svg
                    version="1.1"
                    id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px"
                    y="0px"
                    viewBox="0 0 161.2 161.2"
                    enable-background="new 0 0 161.2 161.2"
                    xml:space="preserve"
                  >
                    <path
                      class="path"
                      fill="none"
                      stroke="#0acf97"
                      stroke-miterlimit="10"
                      d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                                            c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                                            c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"
                    />
                    <circle
                      class="path"
                      fill="none"
                      stroke="#0acf97"
                      stroke-width="4"
                      stroke-miterlimit="10"
                      cx="80.6"
                      cy="80.6"
                      r="62.1"
                    />
                    <polyline
                      class="path"
                      fill="none"
                      stroke="#0acf97"
                      stroke-width="6"
                      stroke-linecap="round"
                      stroke-miterlimit="10"
                      points="113,52.8
                                            74.1,108.4 48.2,86.4 "
                    />

                    <circle
                      class="spin"
                      fill="none"
                      stroke="#0acf97"
                      stroke-width="4"
                      stroke-miterlimit="10"
                      stroke-dasharray="12.2175,12.2175"
                      cx="80.6"
                      cy="80.6"
                      r="73.9"
                    />
                  </svg>
                </div>
                <!-- end logout-icon-->
              </div>
              <!-- end card-body-->
              <div class="col-12 text-center">
                <p class="text-muted">
                  Back to
                  <a href="login.php" class="text-muted ml-1"><b>Log In</b></a>
                </p>
              </div>
            </div>
            <!-- end card-->

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
    <script src="assets/js/app.min.js"></script>
  </body>
</html>
