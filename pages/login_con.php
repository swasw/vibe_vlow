<?php
// include 'current_user.php';
session_start();
require_once('dbcon.php'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check_query = "SELECT * FROM `user_data` WHERE username ='$username' AND password ='$password'";
    $checked = $connection->query($check_query);
    if($checked->num_rows == 1){
        $_SESSION['current_username'] = $username;
        header('Location: homepage.php');
        exit(); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
         }
        body {
            background-image: url(../assets/images/logo-colorized.png);
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
         }
        .container{
            height: 40%;
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            background-color: transparent;
            border: solid;
            border-color: rgb(77, 85, 143);
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }
        .top-text{
            text-align: center;
            font-family: sans-serif;
            font-size: 35px;
            color: magenta;
            font-weight: bold;
        }
        button{
                margin-top: 10px;
                width: 100%;
                border-radius: 5px;
                padding: 10px;
                outline: 2px solid rgb(15, 15, 98);
                border: none;
                font-size: 15px;
                background-color: rgb(169, 169, 255);
                transition: background-color 0.6s;
                font-family: sans-serif;
                font-weight: bold;
            }
            button:hover{
                background-color: aqua;
                cursor: pointer;
            }

    </style>
</head>
<body>

    <div class="container">
    <form id="login_form" class="form" action="login-page.php" method="post"><p>
        <p class="top-text">Failed to Log in</p>
        <button class="submit_class">Back to Login</button>
    </p></form>
</div>
        
</body>
</html>