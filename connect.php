<?php
    $localhost = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "bonprofile";

    //Create connection
    $conn = new mysqli($localhost,$username,$password,$dbname);

    //Check Connection
    if (!$conn){
        die("connection Failed".mysqli_connect_error());
    // }else {
    //     echo "Connection Successfully";
    }
?>