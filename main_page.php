<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <!-- link to fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: rgb(255, 255, 255);
            font-family: 'Roboto', sans-serif;
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 8px;
            grid-template-areas: 
            ". ac ac ac ac ."
            ". nn nn nn nn ."
            ". cn cn cn cn .";
            padding: 5%;
        }  
        .account {
            grid-area: ac;
            padding: 5px;

            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-areas: 
            "nm nm . . lb"
            "un un . . lb";
        }
        .name {
            grid-area: nm;

            font-size: 200%;
            font-weight: 500;
        }
        .username {grid-area: un;}
        .logout_button {grid-area: lb; grid-column: 6 / 6;}
        .logout_button > input {
            padding: 10px;
            border: none; border-radius: 10px;
            background-color: rgb(231, 231, 231);
            font-size: 18px;
        }
        

        .new_note {
            grid-area: nn;
            background-color: #FFF06E;
            border-radius: 15px;
            padding: 30px;
        }
        .note_content {
            white-space: pre-wrap;
        }
        textarea {
            width: 100%;
            height: auto;
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            background-color: #fff9bd;
            border: none;
            
        }
        .note_title > input {
            padding: 10px 0px 10px 0px;
            font-family: 'Roboto', sans-serif;
            font-size: 36px;
            font-weight: 500;
            background-color: #FFF06E;
            border: none;
        }
        .submit_button {
            text-decoration: none;
            padding: 10px; margin-left: 10px;
            border: none; border-radius: 10px;
            background-color: #00C21F; color: white;
            font-size: 14px;
            /* display: flex; justify-content: center; */
        }
        
        .content {
            margin-top: 4%;
            grid-area: cn;
            display: grid;
            grid-gap: 8px;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-auto-rows: minmax(200px, 1fr);
            grid-auto-flow: dense;
        }
        .content > div {
            word-wrap: break-word;
            padding: 20px;
            background-color: rgb(231, 231, 231);
        }
        .content > div > h2 {
            font-size: 25px;
        }
        .content > div > p {
            font-size: 16px;
        }
        a:link, a:visited {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        a.edit_button:link, a.edit_button:visited {   
            padding: 10px 12px 10px 12px;
            border: none; border-radius: 10px;
            background-color: #517DA5; color: white;
            font-size: 14px;
            /* display: flex; justify-content: center; */
        }
        .delete_button {
            color: black;
            text-decoration: none;
            padding: 10px; margin-left: 5px;
            border: none; border-radius: 10px;
            background-color: #FF3939; color: white;
            font-size: 14px;
            /* display: flex; justify-content: center; */
        }
        
    </style>

</head>
<body>
    <?php
        session_start();

        if(empty($_SESSION['username'])) {
            header("location:login_page.php");
        }

        $call_username = $_SESSION['username'];
        $connect = new mysqli("localhost","root","","final_project");
        $user_data_query = mysqli_query($connect, "select * from user_data where username='$call_username'");
    ?>
    
        <div class="account">
            <?php while($user_data = mysqli_fetch_array($user_data_query)) {?>

            <div class="name"> <?php echo $user_data['user_first_name'] . " " . $user_data['user_last_name'] ?> </div>
            <div class="username"> <?php echo $_SESSION['username'] ?> </div>
            <form action="logout.php" class="logout_button">
                <input type="submit" value="Logout">
            </form>
            
            <?php 
                $signed_user_id = $user_data['user_id'];
                $_SESSION['user_id'] = $signed_user_id;
            } 
            ?>
        </div>

        <div class="new_note">
            <form action="input_note.php" method="POST">
                <div class="note_title">
                    <input type="text" placeholder="Title" name="note_title" id="type_input">
                </div>
                <div class="note_content">
                    <textarea name="note_content" id="type_input" cols="50" rows="8"></textarea>
                </div>
                <a href="">Cancel</a>
                <input type="submit" value="Submit" class="submit_button">
            </form>
        </div>

    <?php 
        $note_query = mysqli_query($connect, "SELECT * from notes WHERE user_id='$signed_user_id'");
    ?>
        <div class="content">
            <?php while($note_data = mysqli_fetch_array($note_query)) {?>
            <div>
                <h2> <?php echo $note_data['note_title'] ?> </h2>
                <p> <?php echo nl2br($note_data['note_content']); ?> </p>
                <a href="note_page.php?note_id=<?php echo $note_data['note_id']; ?>" class="edit_button">Edit</a>
                <a href="delete_note.php?note_id=<?php echo $note_data['note_id']; ?>" class="delete_button">Delete</a>
            </div>

            <?php
            $note_id = $note_data['note_id'];
            $_SESSION['note_id'] = $note_id;
            }
            ?>
        </div>

</body>
</html>