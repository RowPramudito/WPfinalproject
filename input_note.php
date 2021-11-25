<?php
    
    $serverdb = "localhost";
    $username = "root";
    $password = "";
    $db = "final_project";
    $mydb = new mysqli($serverdb, $username, $password, $db);

    $connect = new mysqli("localhost","root","","final_project");

    session_start();
    $note_title = $_POST['note_title'];
    $note_content = $_POST['note_content'];
    $signed_user_id = $_SESSION['user_id'];

    $query = "INSERT INTO notes(note_title, note_content, user_id) values ('$note_title','$note_content','$signed_user_id')";
    $execute = mysqli_query($connect, $query);

    if($execute){
        echo "The input process was successfull";
        header("location:main_page.php");
    }else{
        echo "The input process was failed";
    }

?>