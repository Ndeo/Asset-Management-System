<?php
require "config.php";
if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
echo "IS THIS WORKING.";
$Username= $_POST["Username"];;
$FirstName= $_POST["FirstName"];
$LastName= $_POST["LastName"];
$pass= password_hash($_POST["pass"],PASSWORD_BCRYPT);
$Email= $_POST["Email"];
$userRole= $_POST["userRole"];
$phone= $_POST["phone"];
$state= $_POST["state"];

if(isset($_FILES["fileToUpload"])){

// IMAGE UPLOAD!
//$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$target_dir = "thumbnails/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_file; 
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

$needsToUpload=true;
// Check if file already exists

if (file_exists($target_file)) {
    $needsToUpload=false;
    echo "file already exist and won't be reuploaded";
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Sorry, only JPG, JPEG & PNG  files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}else{
    if($needsToUpload){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    
    echo "IMAGE UPLOADED!";

    } else {
        echo "Sorry, there was an error uploadiing your file.";
        $uploadOK==0;
    }
    
    }else{
        echo "file is assign to existing file";
     $image=basename( $_FILES["fileToUpload"]["name"]);   
    }
    
}
if($uploadOK == 1){
    $image=basename( $_FILES["fileToUpload"]["name"]);
    
   
}else{
    $image="asset.PNG";
}



}else{
    $image="asset.PNG";
}
 $sql =$conn->prepare("INSERT INTO `user` ( `Username`, `FirstName`, `LastName`, `pass`, `Email`, `userRole`, `phone`, `state`, `image`) VALUES ('$Username', '$FirstName', '$LastName', '$pass', '$Email', '$userRole', '$phone', '$state', '$image');") ;
if ($sql->execute()) {
    $logFile = "log.txt";
            $fh = fopen($logFile,'a');
            
                fwrite($fh, 'User with id= '.$_SESSION["ID"]." has created a new user with name= ".$Username." and email= ".$Email." with type= ".$userRole." at: ".date("Y-m-D")." ".date("H:i:s"));
                
            fclose($fh);
    echo "New record created successfully";
     
         echo"<div class='alert alert-success alert-dismissible bg-success text-white border-0 fade show' id='green_alert' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Success - </strong> New record created successfully!
        </div>";
}else{
     echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' id='red_alert' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Error - </strong> Connection Error!
        </div>";
    $conn->error;
}
$conn->close();
// header("location: ams.hawy.net/Testing/Index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Asset Manager - Edit Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content="A fully featured admin theme which can be used to build CRM, CMS, etc."
      name="description"
    />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo2.png" />

    <!-- third party css -->
    <link
      href="assets/css/vendor/jquery-jvectormap-1.2.2.css"
      rel="stylesheet"
      type="text/css"
    />
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="enlarged" data-keep-enlarged="true">
    <!-- Begin page -->
    <div class="wrapper">
      <!-- ===================== Left Sidebar Start ===================== -->
      <?php include "side.php";?>
      <!-- ====================== Left Sidebar End ====================== -->

      <!-- ============================================================== -->
      <!-- ================== Start Page Content here =================== -->

      <div class="content-page">
        <div class="content">
          <!-- ==================== Topbar Start ==================== -->
          <?php include "top.php";?>
          <!-- ===================== Topbar End ===================== -->

          <!-- Start Content-->
          <div class="container-fluid">
            <!-- ================ start page title ================ -->
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Asset Manager</a>
                      </li>
                      <li class="breadcrumb-item active">Edit Account</li>
                    </ol>
                  </div>
                  <h4 class="page-title">
                    <i class="mdi mdi-account"></i> Create New User
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->
            <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
            <div class="card">
              <div class="card-body">
                  <form class="p-lg-1" method="post" action="createNewUser.php" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    
                      <div class="form-group mb-3">
                        <label for="username">Username</label>
                        
                        <input id="username" class="form-control" name="Username" type="text" />
                      </div>

                      <div class="form-group mb-3">
                        <label for="fName">First Name</label>
                        
                        <input name="FirstName" id="fName" type="text" class="form-control" />
                      </div>

                      <div class="form-group mb-3">
                        <label for="lName">Last Name</label>
                        
                        <input name="LastName" id="lName" type="text" class="form-control"/>
                      </div>

                      <div class="form-group mb-3">
                        <label for="phone">Phone</label>
                        <input
                          type="text"
                          id="phone"
                          name="phone"
                          class="form-control"
                          placeholder="0555555555"
                        />
                      </div>

                      <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input
                          type="email"
                          id="email"
                          name="Email"
                          class="form-control"
                          placeholder="Example@Example.com"
                        />
                      </div>

                      <div class="form-group mb-3">
                        <label for="password">New Password</label>
                        <input
                          type="password"
                          id="password"
                          name="pass"
                          class="form-control"
                          value="password"
                        />
                      </div>


                      <div class="form-group mb-3">
                        <label for="password">Confirm New Password</label>
                        <input
                          type="password"
                          id="password"
                          class="form-control"
                          value="password"
                        />
                      </div>
                    
                  </div>
                  <!-- end col -->

                  <div class="col-lg-6">

                  <div class="form-group mb-3">
                <label for="example-select">User State:</label>
                <select class="form-control" name="state" id="example-select">
                    <option value="active">Activate user</option>
                    <option value="suspend">Suspend user</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="example-select">User Type:</label>
                <select class="form-control" id="example-select" name="userRole">
                    <option value="Admin">Admin user</option>
                    <option value="normal">Normal user</option>
                </select>
            </div>





                    
                    <div class="form-group mb-3">
                      <label for="example-fileinput"><h4>Profile Picture:</h4></label>
                         <input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file" />
                    </div>
                      

                      
                    
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                       <button type="submit" name="submit" class="btn btn-primary">Create User</button>
                       <button type="reset" class="btn btn-danger ">Cancel</button>
                    
                  </div>
                  <!-- end col -->
                </div>
                <!-- end row-->
                </form>
              </div>
            </div>

            <!-- ============= /\/\/\/\/\/\/\/\/\/\/\ ============= -->
          </div>
          <!-- container -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        <?php include "footer.php";?>
        <!-- end Footer -->
      </div>

      <!-- ====================== End Page content ====================== -->
      <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- bundle -->
    <script src="assets/js/app.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/Chart.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard.js"></script>
    <!-- end demo js-->
  </body>
</html>
