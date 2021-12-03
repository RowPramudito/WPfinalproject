<?php

    $connect = new mysqli("localhost","root","","final_project");

    session_start();
    $note_title = $_POST['note_title'];
    $note_content = $_POST['note_content'];
    $note_id = $_SESSION['current_note_id'];

    $query = "UPDATE notes SET note_title='$note_title', note_content = '$note_content' WHERE note_id=$note_id";
    $execute = mysqli_query($connect, $query);

    if($execute){
        echo "The input process was successfull";
        unset($_SESSION['note_id']);
        header("location:main_page.php");
    }else{
        echo "The input process was failed";
    }

?>
