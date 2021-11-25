<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Page</title>

    <!-- link to fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: white;
            font-family: 'Roboto', sans-serif;

            display: grid;
            gap: 10px;
            grid-template-columns: repeat(6, 1fr);
            padding-top: 6%;
        }
        .container {
            grid-column: 2 / 6;
            background-color: #E3E3E3;
            border-radius: 15px;
            padding: 40px 40px 50px 30px;
        }

        form {
            display: grid;
            gap: 20px;
            grid-template-areas: 
            "tl tl tl tl"
            "cn cn cn cn"
            ". . cl sb";
        }
        .close_button {
            grid-area: cl;
        }
        a:link, a:visited {
            color: black;
            text-decoration: none;
            padding: 12px 5px 12px 5px;
            border: none; border-radius: 10px;
            background-color: #FF3939; color: white;
            font-size: 14px;
            display: flex; justify-content: center;
        }
        #type_input {width: 100%;}
        .edit_title {
            grid-area: tl;
        }
        .edit_title > input {
            padding: 10px 0px 10px 0px;
            font-family: 'Roboto', sans-serif;
            font-size: 48px;
            font-weight: 500;
            background-color: #E3E3E3;
            border: none;
        }
        .edit_content {
            grid-area: cn;
        }
        textarea {
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            background-color: #E3E3E3;
            border: none;
            height: auto;
        }
        .submit_button {
            grid-area: sb;
            padding: 12px 5px 12px 5px;
            border: none; border-radius: 10px;
            background-color: #517DA5; color: white;
            font-size: 14px;
        }
    </style>

</head>
<body>
    <?php

        $connect = new mysqli("localhost","root","","final_project");

        session_start();

        $note_id = $_GET['note_id'];

        $note_query = mysqli_query($connect, "SELECT * from notes WHERE note_id='$note_id'");
        $note_data = mysqli_fetch_array($note_query);
        $_SESSION['current_note_id'] = $note_data;
    ?>
    <div class="container">
        <form action="input_edited_note.php" method="post">
            <div class="edit_title">
                <input type="text" value="<?php echo $note_data['note_title']; ?>" name="note_title" id="type_input">
            </div>
            <div class="edit_content">
                <textarea name="note_content" id="type_input" cols="30" rows="10"><?php echo $note_data['note_content']; ?>
                </textarea>
            </div>
            <a href="main_page.php">Cancel</a>
            <input type="submit" value="Submit" class="submit_button">
        </form>
    </div>
</body>
</html>