<?php
include("config.php");
if(!$conn){
    echo "error occured with the database";
}else {
    session_start();
    if (!isset($_SESSION['ID'])) {
        if (isset($_COOKIE['ID'])) {

            $sql = $conn->prepare("Select * from user where ID = ?");

            $sql->bind_param("s", $_COOKIE['ID']);

            $sql->execute();

            $result = $sql->get_result();
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['role'] = $row['userRole'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['FirstName'] = $row['FirstName'];
            $_SESSION['LastName'] = $row['LastName'];
        } else {
            header('location: login.php');
        }
    }
}

?>