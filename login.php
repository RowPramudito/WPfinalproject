<?php
    session_start();

    $connect = new mysqli("localhost","root","","final_project");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($connect,"select * from user_data where username='$username' and user_password='$password'") or die(mysqli_error($connect));
    // count the number of data found
    $cek = mysqli_num_rows($data);
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:main_page.php");
    }
    else{
        header("location:login_page.php?message=failed");
    }
?>