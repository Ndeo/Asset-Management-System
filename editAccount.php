<?php
require("Session.php");
require("config.php");
$currentUser = $_SESSION['ID'];
        $sql =$conn->prepare("Select * from user where ID = ?");
      $sql -> bind_param("s",$_SESSION['ID']);
      $sql -> execute();
      $result = $sql -> get_result();
      $row =  $result->fetch_array(MYSQLI_ASSOC);
        $id= $row['ID'];
        $Username= $row['Username'];
        $FirstName= $row['FirstName'];
        $LastName= $row['LastName'];
        $pass=$row['pass'];
        $userRole= $row['userRole'];
        $image= $row['image'];
        $Phone= $row['phone'];
        $Email= $row['Email'];
    if (isset($_POST["id"])){
       $passwordFlag=true;
       $imageFlag=true;
        $username_new = $_POST['username'];
        $firstName_new = $_POST['fName'];
        
        $lastname_new = $_POST['lName'];
        $phone_new = $_POST['phone'];
        $email_new = $_POST['email'];
        
        $password_new1=password_hash($_POST['password1'],PASSWORD_DEFAULT);
        // $password_new2 = $_POST['password2'];
        if (empty("$username_new"))
        {
            $username_new=$Username;
        }
        if (empty("$firstName_new"))
        {
            $firstName_new=$FirstName;
        }
        if (empty("$lastname_new"))
        {
            $lastname_new=$LastName;
        }
        if (empty("$phone_new"))
        {
            $phone_new=$Phone;
        }
        if (empty("$email_new"))
        {
           $email_new=$Email;
        }
       
        if (empty($_POST["togglePassword"]))
        {
            $passwordFlag=false;
            
        }
           if(isset($_FILES['fileToUpload'])){
        $target_dir = "thumbnails/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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

// Check if file already exists
$needsupload=true;
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $needsupload=false;
}
if($needsupload){
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    $image_new=basename( $_FILES["fileToUpload"]["name"]);
    echo "IMAGE UPLOADED!";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }   


    
}

}else{
    $image_new=$_FILES["fileToUpload"]["name"];
    echo $image_new;
}

}else{
    $image_new=$image;
    echo $image_new;
}
      /*  if(isset($_FILES["fileToUpload"])){

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
    $imageFlag=false;
    echo "image has not been uploaded";
} */
// Check connection
if($passwordFlag){
$prepare=($sql =$conn->prepare( "UPDATE user SET Username = '$username_new', FirstName= '$firstName_new', LastName = '$lastname_new' , pass = '$password_new1', Email='$email_new', phone='$phone_new',image= '$image_new'  WHERE ID = $id;"));
}else{
    $prepare=($sql =$conn->prepare( "UPDATE user SET Username = '$username_new', FirstName= '$firstName_new', LastName = '$lastname_new' , Email='$email_new', phone='$phone_new',image= '$image_new'  WHERE ID = $id;"));

}
if($prepare){
if($sql->execute()){
    $logFile = "log.txt";
            $fh = fopen($logFile,'a');
            
                fwrite($fh, 'User with id= '.$_SESSION["ID"]." has updated their own account at: ".date("Y-m-D")." ".date("H:i:s")."\n");
                
            fclose($fh);
    echo "updated";
}else{
    echo "executing isn't happening";
}
}else{
    echo "preparing isn't happening";
}
        
    }
    
        $sql =$conn->prepare("Select * from user where ID = ?");
      $sql -> bind_param("s",$_SESSION['ID']);
      $sql -> execute();
      $result = $sql -> get_result();
      $row =  $result->fetch_array(MYSQLI_ASSOC);
        $id= $row['ID'];
        $Username= $row['Username'];
        $FirstName= $row['FirstName'];
        $LastName= $row['LastName'];
        $pass=$row['pass'];
        $userRole= $row['userRole'];
        $image= $row['image'];
        $Phone= $row['phone'];
        $Email= $row['Email'];
        
    

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <script>
document.getElementById('yourBox').onchange = function() {
    document.getElementById('yourText').disabled = !this.checked;
    document.getElementById('yourText1').disabled = !this.checked;
};

  

 function myValidation(form){
  if (document.getElementById('yourText').disabled == false)
{
     
     
     
     
     
     // --------------------------------------------------------------------------------------------------------------------------------------------------------
    //  var div = document.getElementById('red_alert');
           var pass= form.password1.value;
           var cpass = form.password2.value;
          if(pass!=cpass)
              {
                    // alert("welcome1");
                //  document.getElementById("red_alert").style.visibility = "visible";   
           
                  document.getElementById("red_alert").hidden = false;
                  document.getElementById('red_alert').innerHTML="Password and confirm password must be the same!";
                  event.preventDefault();
                  return false;
                //   alert("welcome2");
              }
          else{
              if(form.password1.value.length < 8 ) {
        alert("Error: Password must contain at least 8 characters!");
        document.getElementById('red_alert').innerHTML="Password must contain at least 8 characters!";
         document.getElementById("red_alert").hidden = false;
        //  alert("should be more than 6 characters!");
        form.password1.focus();
         event.preventDefault();
        return false;
                  
              }
                document.getElementById("green_alert").hidden = false;
                document.getElementById("red_alert").hidden = true;
                return true;
                }
                
                
        
            
//                 if(pass!=cpass)
//                  {
//                  alert("Oops! Validation failed!");
//                  document.getElementById("red_alert").hidden = false;
//                  returnToPreviousPage();
//                 return false;
//                 }else if (pass == cpass){
                    
//                     alert("Oops! Validation successful!");
//   document.getElementById("green_alert").hidden = false;
//                 return true;
//                 }
    

           
       }else
       {
        //   alert ("success");
            document.getElementById("green_alert").hidden = false;
                document.getElementById("red_alert").hidden = true;
                return true;
       }
       
     
 }
</script>    

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
                    <i class="mdi mdi-account"></i> Edit Account
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->
            <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
            <div class="card">
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
              <div class="card-body">
                  <form class="p-lg-1" method="post" action="" name="form" onsubmit = "return myValidation(this);" enctype="multipart/form-data">
                <div class="row">
                  
                    
                        <div class="col-lg-6">
                            
                      <div class="form-group mb-3">
                        <label for="userID">User ID</label>
                        <input
                         type="text"
                          
                          
                          id="userID"
                          class="form-control"
                          value ="<?php echo $id; ?>"
                          disabled
                        />
                          <input
                         type="hidden"
                         id="id"
                          name="id"
                         value ="<?php echo $id; ?>"
                        />
                      </div>

                      <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input
                          type="text"
                          name="username"
                          id="username"
                          value = "<?php echo $Username; ?>"
                          class="form-control"
                        />
                      </div>

                      <div class="form-group mb-3">
                        <label for="fName">First Name</label>
                        <input
                          type="text"
                          name="fName"
                          id="fName"
                          value="<?php echo $FirstName; ?>";
                          class="form-control"
                        />
                      </div>

                      <div class="form-group mb-3">
                        <label for="lName">Last Name</label>
                        <input
                          type="text"
                          name="lName"
                          id="lName"
                          value="<?php echo $LastName; ?>"
                          class="form-control"
                        />
                      </div>

                      <div class="form-group mb-3">
                        <label for="phone">Phone</label>
                        <input
                          type="text"
                          name="phone"
                          id="phone"
                          value = "<?php echo $Phone; ?>"
                          class="form-control"
                        />
                      </div>
                      

                      <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input 
                          type="email"
                          id="email"
                          name="email"
                          value = "<?php echo $Email; ?>"
                          class="form-control"
                          placeholder="Email"
                        />
                      </div>
                    

                  </div>
                  <!-- end col -->

                  <div class="col-lg-6">
                    
                    <div class="form-group mb-3">
                      <label for="example-fileinput"><h4>Profile Picture:</h4></label>
                         <input type="file" id="example-fileinput" name="fileToUpload" class="form-control-file" accept=".jpg,.png,.jpeg">
                         <span class="account-user-avatar"> 
                                        <img src='/thumbnails/<?php echo $_SESSION['image'] ?>' alt="user-image" class="rounded-circle" height="40" width="40"/>
                                    </span>
                    </div>
                      <br>
                    
                    
                     
                      
                    
                      
                    <hr>
                    <h4>Change Password:</h4>
                    <!--------------------------------------------------------------------------------------------------------->
                    <input type="checkbox" id="yourBox" name="togglePassword" data-switch="none">
                    <label for="yourBox" data-on-label="" data-off-label=""></label>
                    
                    <!--<label for="switch1" data-on-label="" data-off-label=""></label>-->
                      <div class="form-group mb-3">
                        <label for="password">New Password</label>
                        <input
                          type="password"
                          id="yourText"
                          name="password1"
                          class="form-control"
                          
                          disabled
                        />
                      </div>


                      <div class="form-group mb-3">
                        <label for="password">Confirm New Password</label>
                        <input
                          type="password"
                          id="yourText1"
                          name="password2"
                          class="form-control"
                         
                          disabled
                        />
                        <br>
                        <br>
                        <p style="font-size: 0.875em;">- Password must contain at least 8 characters</p>
                        
<script>
    document.getElementById('yourBox').onchange = function() {
        document.getElementById('yourText').disabled = !this.checked;
        document.getElementById('yourText1').disabled = !this.checked;
        
        document.getElementById("yourText").value = "";
        document.getElementById("yourText1").value = "";

    };
</script>
                      </div>

                          
                         
                          <br>
                          <br>
                       <button type="submit" class="btn btn-primary" onclick="myValidation()">Submit</button>
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
