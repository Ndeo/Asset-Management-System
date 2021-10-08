<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Register</title>
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
              <!-- Logo-->
              <div class="card-header pt-4 pb-4 text-center bg-primary">
                <a href="index.php">
                  <span
                    ><img src="assets/images/logo1.png" alt="" height="77"
                  /></span>
                </a>
              </div>

              <div class="card-body p-4">
                <div class="text-center w-75 m-auto">
                  <h4 class="text-dark-50 text-center mt-0 font-weight-bold">
                    Sign Up
                  </h4>
                  <p class="text-muted mb-4">
                    Don't have an account? Create your account
                  </p>
                </div>

                <form action="#">
                  <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input
                      class="form-control"
                      type="text"
                      id="fullname"
                      placeholder="Enter your name"
                      required
                    />
                  </div>

                  <div class="form-group">
                    <label for="emailaddress">Email address</label>
                    <input
                      class="form-control"
                      type="email"
                      id="emailaddress"
                      required
                      placeholder="Enter your email"
                    />
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input
                      class="form-control"
                      type="password"
                      required
                      id="password"
                      placeholder="Enter your password"
                    />
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="checkbox-signup"
                      />
                      <label class="custom-control-label" for="checkbox-signup"
                        >I accept
                        <a href="#" class="text-muted"
                          >Terms and Conditions</a
                        ></label
                      >
                    </div>
                  </div>

                  <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary" type="submit">
                      Sign Up
                    </button>
                  </div>
                </form>
              </div>
              <!-- end card-body -->
              <div class="col-12 text-center">
                <p class="text-muted">
                  Already have account?
                  <a href="login.php" class="text-muted ml-1"><b>Log In</b></a>
                </p>
              </div>
            </div>
            <!-- end card -->

            <div class="row mt-3">
              <!-- end col-->
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
