<?php 
    session_start();
    include('connect.php');
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);

        if (empty($username)){
            array_push($errors,"username is requiered");
        }
        if (empty($password_1)){
            array_push($errors,"password is requiered");
        }
        if ($password_1 != $password_2){
            array_push($errors,"password is not match");
        }
        $user_check_query = "SELECT * FROM user_detail WHERE username = '$username'";

        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            //if user exists
            if ($result['username'] === $username ) {
                array_push($errors,"Username already exixts");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user_detail (username, password) VALUES ('$username','$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "you Are Logged now";
            header('location: index.php');
        } else {
            array_push($errors,"Username already exixts");
            $_SESSION['error'] = "Username already exixts";
            header("location: register.php");
        }
    }
?>