<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

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
            grid-template-areas: 
            "cn"
            "er";
            padding-top: 10%;
        }

        .login {
            grid-area: cn;
            grid-column: 2 / 2;

            display: grid;
            gap: 10px;
            /* grid-template-columns: auto-fit; */
            grid-template-areas: 
            ". .  tl .  ."
            ". lg lg lg ."
            ". su su su .";

            background-color: #FFF06E;
            border-radius: 15px;
            padding: 50px 30px 50px 20px;
        }
            .title {
                align-content: center;
                grid-area: tl;
                font-weight: 500; font-size: 72px;
                padding-left: 10px;
            }
            .sign_up_link {
                grid-area: su;
                padding-top: 20px;
                font-size: 14px;
            }
            a:link, a:visited {
                color: black;
                text-decoration: none;
                font-weight: 500;
            }
        form {
            grid-area: lg;
            display: grid;
            gap: 8px;
            grid-template-areas: 
            "un un"
            "pw pw"
            ".  lb";            
        }
            .type_input {
                padding: 2%;
                border: none; border-radius: 5px;
            }
            .username{grid-area: un;}
            .password{grid-area: pw;}
            .login_button{
                grid-area: lb;
                padding: 8%;
                border: none; border-radius: 10px;
                background-color: rgb(68, 68, 68); color: white;
            }


        .btm_msg {
            grid-area: er;
            grid-column: 2 / 2;

            background-color: <?php 
                if(isset($_GET['message'])) {echo "#FF5050";}
            ?>;
            border-radius: 10px;
            padding: 10px;

            color: rgb(252, 252, 252);
            font-weight: 500; 
        }
    </style>

</head>
<body>
    
    <div class="login">
        <div class="title">notes_</div>
            <form method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username" class="username type_input">
                <input type="password" name="password" placeholder="Password" class="password type_input">
                <input type="submit" value="login" class="login_button">
            </form>
        <div class="sign_up_link">
            Don't have an account? <a href="registration_page.php" class="sign_up_button">Create One</a>
        </div>
    </div>
    <div class="btm_msg">
        <?php

            if(isset($_GET['message'])) {
                if($_GET['message'] == "failed") {
                    echo "Login failed! wrong username or password.";
                }
                else if($_GET['message'] == "not_yet_login") {
                    echo "You have to login to access!";
                }
                else if($_GET['message'] == "logout") {
                    echo "Logout successful";
                }
                else if($_GET['message'] == "register_success") {
                    echo "Register successful";
                }
            }

        ?>
    </div>

</body>
</html>