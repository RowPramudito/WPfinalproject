<?php 
    session_start();
    $connect = new mysqli("localhost","root","","final_project");

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $first_name = mysqli_real_escape_string($connect, $_POST['fname']);
    $last_name = mysqli_real_escape_string($connect, $_POST['lname']);

    $_SESSION['errors'] = array();

    if(empty($username)) {
        array_push($_SESSION['errors'], "1");
    }
    if(empty($password)) {
        array_push($_SESSION['errors'], "2");
    }
    if(strlen($password) < 8) {
        array_push($_SESSION['errors'], "6");
    }
    if(empty($first_name)) {
        array_push($_SESSION['errors'], "3");
    }
    if(empty($last_name)) {
        array_push($_SESSION['errors'], "4");
    }

    $username_check = mysqli_query($connect, "select * from user_data where username='$username'");
    $user = mysqli_fetch_assoc($username_check);
    
    if($user) {
        if($user['username'] == $username) {
            array_push($_SESSION['errors'], "5");
        }
    }

    if(count($_SESSION['errors']) == 0) {
        $insert_query = "insert into user_data VALUES ('','$username','$first_name','$last_name','$password')";
        mysqli_query($connect, "$insert_query") or die(mysqli_error($connect));

        unset($_SESSION['errors']);

        header("location:login_page.php?message=register");
    }
    else {
        header("location:registration_page.php");
    }

?>