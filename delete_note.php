<?php

    // $serverdb = "localhost";
    // $username = "root";
    // $password = "";
    // $db = "final_project";
    // $mydb = new mysqli($serverdb, $username, $password, $db);

    $connect = new mysqli("localhost","root","","final_project");
    
    session_start();
    $note_id = $_GET['note_id'];

    $query = "DELETE FROM notes WHERE note_id = '$note_id'";
    $execute = mysqli_query($connect, $query);

    if($execute){
        echo "Success to delete the notes";
        header("location:main_page.php");
    }else{
        echo "Failed to delete the notes";
    }

?>