<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>

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
            grid-template-columns: 1fr minmax(300px, auto) 1fr;
            padding-top: 10%;
        }
        .container {
            grid-column: 2 / 2;
            display: grid;
            gap: 40px;
            grid-template-areas: 
            ". cl ."
            ". tl ."
            ". rg .";

            background-color: #FFF06E;
            border-radius: 15px;
            padding: 50px 20px 50px 10px;
        }
            .close_button {
                grid-area: cl;
            }
            .close_button > input {
                display: flex;
                justify-content: center;
                background-color:transparent;
                font-size: 18px;
                border:none;
                color:red;
                margin-bottom: -40px;
            }  
            .title {
                grid-area: tl;
                font-size: 24px;
                font-weight: 500;
                color: black;
                display: flex;
                justify-content: center;
            }
        .register_input {
            grid-area: rg;

            display: grid;
            gap: 20px;
            grid-template-areas: 
            "fn"
            "ln"
            "un"
            "pw"
            "rb";
        }
        .register_input > div > input {
            width: 100%;
        }  
            .type_input {
                padding: 3%;
                border: none; border-radius: 5px;
            }
            .fname {grid-area: fn;}
            .lname {grid-area: ln;}
            .username {grid-area: un;}
            .password {grid-area: pw;}
            .password_desc {font-size: 12px;}
            .register_button {grid-area: rb;}
        .err_msg {
            font-size: 14px;
            color: red;
        }
        .register_button{
                grid-area: rb;
                padding: 8%;
                border: none; border-radius: 10px;
                background-color: #00C21F; color: white;
            }
    </style>

</head>
<body>
    <?php
        session_start();
        if(empty($_SESSION['errors'])){
            $_SESSION['errors']=array();
        }
        $errors_list = $_SESSION['errors'];
    ?>
    
    <div class="container">
        <form action="login_page.php" class="close_button">
            <input type="submit" value="X">
        </form>
        <div class="title">Register to notes_</div>
        <form action="register.php" method="POST" class="register_input">
            <div class="fname">
                <input type="text" name="fname" class="fname type_input" placeholder="First Name">
                <div class="err_msg">
                    <?php
                        if(in_array("3", $_SESSION['errors'])) {
                            echo "First name must be filled.<br>";
                        }
                    ?>
                </div>
            </div>
            <div class="lname">
                <input type="text" name="lname" class="lname type_input" placeholder="Last Name">
                <div class="err_msg">
                    <?php
                        if(in_array("4", $_SESSION['errors'])) {
                            echo "Last name must be filled.";
                        }
                    ?>
                </div>
            </div>
            <div class="username">
                <input type="text" name="username" class="username type_input" placeholder="Username">
                <div class="err_msg">
                    <?php
                        if(in_array("1", $_SESSION['errors'])) {
                            echo "Username must be filled.<br>";
                        }
                        else if(in_array("5", $_SESSION['errors'])) {
                            echo "Username is already taken.";
                        }
                    ?>
                </div>
            </div>
            <div class="password">
                <input type="password" name="password" class="password type_input" placeholder="Password"><br>
                <div class="password_desc">Password must be at least 8 characters</div>
                <div class="err_msg">
                    <?php
                        if(in_array("2", $_SESSION['errors'])) {
                            echo "Password must be filled.";
                        }
                        else if(in_array("6", $_SESSION['errors'])) {
                            echo "Password must be at least 8 characters!";
                        }
                    ?>
                </div>
            </div>
            <input type="submit" value="Create an Account" class="register_button">
        </form>
    </div>

</body>
</html>