<!DOCTYPE html>
<?php
require 'Session.php';
            if(isset($_POST['id'])){
                
                if($_POST['id']==$_SESSION['ID']){
                    
                    header('Location: editAccount.php');
                    
                }else{
                  
                    if(isset($_POST['delete'])){
    $sql =$conn->prepare('update asset  set enteredBy='.$_SESSION["ID"].' WHERE enteredBy='.$_POST["id"].'');
    //$sql->bind_param("ss",$_SESSION['ID'],$_POST['id']);
    if($sql -> execute()){
        
    }else{
    }
    $sql =$conn->prepare('update liability  set enteredBy='.$_SESSION["ID"].' WHERE enteredBy='.$_POST["id"].'');
    //$sql -> bind_param("ss",$deleterID,$id);
    $sql -> execute();
    $sql =$conn->prepare('Delete from user WHERE ID=?');
    $sql->bind_param("s",$_POST["id"]);
    
    $sql -> execute();
         echo"<div class='alert alert-success alert-dismissible bg-success text-white border-0 fade show' id='green_alert' role='alert' hidden>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>×</span>
            </button>
            <strong>Success - </strong> User Deleted Successfully!
        </div>";
                        header('Location: editUsers.php');
                    }elseif(isset($_POST['edit'])){
                        $sql =$conn->prepare("Select * from user where ID =".$_POST['id'].'');
      //$sql -> bind_param("s",$_POST['id']);
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

                    }elseif(isset($_POST['post'])){
                     $id= $_POST['id'];
        $username_new = $_POST['username'];
        $firstName_new = $_POST['fName'];
        
        $lastname_new = $_POST['lName'];
        // $userRole_new = $_POST['userRole'];
        // $image_new = $_POST[''];
        $phone_new = $_POST['phone'];
        $email_new = $_POST['email'];
        // $password_new1 = $_POST['password1'];
        // $hashedPass=password_hash($pass, PASSWORD_DEFAULT);
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
        if (empty("$password_new1"))
        {
            $password_new1=$pass;
        }
        if(isset($_FILES['image'])){
        $target_dir = "thumbnails/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["image"]["tmp_name"]);
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
if ($_FILES["image"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        
    $image_new=basename( $_FILES["image"]["name"]);
    echo "IMAGE UPLOADED!";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }   


    
}

}else{
    $image_new=$_FILES["image"]["name"];
}

}else{
    $image_new=$image;
}
// Check connection

$sql =$conn->prepare( "UPDATE user SET Username = '$username_new', FirstName= '$firstName_new', LastName = '$lastname_new' , pass = '$password_new1', Email='$email_new', phone='$phone_new',image= '$image_new'  WHERE ID = $id;");
$sql->execute();    
      $logFile = "log.txt";
            $fh = fopen($logFile,'a');
            
                fwrite($fh, 'User with id= '.$_SESSION["ID"]." has upadated another user account with ID= ".$id." and name= ".$name." and email= ".$email_new." at: ".date("Y-m-D")." ".date("H:i:s")."\n");
                
            fclose($fh);
     
        
                        
                    
                        
                    }else{
                        header('Location: editUsers.php');
                    }
                }
            }else{
                header('Location: editUsers.php');
            }
            
            
            
            ?>
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
            
              <script>
document.getElementById('yourBox').onchange = function() {
    document.getElementById('yourText').disabled = !this.checked;
    document.getElementById('yourText1').disabled = !this.checked;
};


 function chkpswd(){
    //  var div = document.getElementById('red_alert');
           var pass= form.password1.value;
           var cpass = form.password2.value;
           if(pass!=cpass)
               {
                    // alert("welcome1");
                //  document.getElementById("red_alert").style.visibility = "visible";   
                  document.getElementById("red_alert").hidden = false;
                  return false;
                //   alert("welcome2");
               }
           else{
                document.getElementById("green_alert").hidden = false;
                return true;
                }
           
       } 
</script>    
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
                    <i class="mdi mdi-account"></i> Edit User
                  </h4>
                </div>
              </div>
            </div>
            <!-- ================= end page title ================= -->
            <!-- ============= \/\/\/\/\/\/\/\/\/\/\/ ============= -->
            <div class="card">
              <div class="card-body">
                 <form class="p-lg-1" method="post" action="" enctype="multipart/form-data" >
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
                <label for="example-select">User State:</label>
                <select class="form-control" id="example-select" name='state'>
                    <option value='active'>Activate user</option>
                    <option value='suspend'>Suspend user</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="example-select">User Type:</label>
                <select class="form-control" id="example-select" name='role'>
                    <option value='Admin'>Admin user</option>
                    <option value='normal'>Normal user</option>
                </select>
            </div>





                    
                    <div class="form-group mb-3">
                      <label for="example-fileinput"><h4>Profile Picture:</h4></label>
                         <input type="file" id="example-fileinput" name= "image" class="form-control-file" value= "<?php echo $image; ?>">
                         <img src='thumbnails/<?php echo $image; ?>'/>
                    </div>
                      

                      
                    
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                       <button type="submit" name='post' class="btn btn-primary">Edit User</button>
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
