<?php
require "config.php";
if( $_SERVER["REQUEST_METHOD"] == "POST" )
{

 echo $i++;
 
$Username= $_POST["Username"];;
$FirstName= $_POST["FirstName"];
$LastName= $_POST["LastName"];
$pass= password_hash($_POST["pass"],PASSWORD_BCRYPT);
$Email= $_POST["Email"];
$userRole= $_POST["userRole"];
$phone= $_POST["phone"];
$state= $_POST["state"];
// IMAGE UPLOAD!
//$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
 echo $i++;

 $target_dir = "../thumbnails/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
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
        
    $image="http://ams.hawy.net/thumbnails/".basename( $_FILES["fileToUpload"]["name"]);
    echo "IMAGE UPLOADED!";



 echo $i++;
// Check connection

$sql = "INSERT INTO `user` ( `Username`, `FirstName`, `LastName`, `pass`, `Email`, `userRole`, `phone`, `state`, `image`) VALUES ('$Username', '$FirstName', '$LastName', '$pass', '$Email', '$userRole', '$phone', '$state', '$image');" ;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
if($uploadOK == 1){
     echo $i++;

}
$conn->close();
// header("location: ams.hawy.net/Testing/Index.php");
}

?>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<h1>add user fourm</h1>

<form action="" method="post" enctype="multipart/form-data">
<br />
<br />
Username: <input name="Username" type="text" /><br />
<br />
FirstName: <input name="FirstName" type="text" /><br />
<br />
LastName: <input name="LastName" type="text" /><br />
<br />
pass: <input name="pass" type="text" /><br />

<br />
Email: <input name="Email" type="text" /><br />
<br />
userRole: <select name="userRole">
  <option value="Admin">Admin</option>
  <option value="normal">Normal</option>
</select><br />
<br />
phone: <input name="phone" type="text" /><br />
<br />
State: <select name="state">
  <option value="active">Active</option>
  <option value="suspend">Inactive</option>
</select><br />
<br>
<input type="file" name= "fileToUpload">
<br>
<br />
Submit:<input type="submit" value="submit" name="submit">
</form>
</body>
</html>
