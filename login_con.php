<?php
session_start();
require_once('dbcon.php'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check_query = "SELECT * FROM `user_data` WHERE username ='$username' AND password ='$password'";
    $checked = $connection->query($check_query);
    if($checked->num_rows == 1){
        $_SESSION['uname']=$username;
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
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }
        .top-text{
            margin-bottom: 10px;
            text-align: center;
            font-family: sans-serif;
            font-size: 35px;
            color: white;
            font-weight:bolder;
        }
        button{
                margin-top: 30px;
                width: 30%;
                border-radius: 5px;
                padding: 10px 0px;
                outline: none;
                border: none;
                font-size: 13px;
                background-image: linear-gradient(to right, #DD57F3, #FC354A);
                transition: background-color 0.6s;
                font-family: sans-serif;
                font-weight: bold;
                color: white;
            }
            button:hover{
                cursor: pointer;
            }
        .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>
<body>
    <div class="container">
    <form id="login_form" class="form" action="login-page.php" method="post">
        <p class="top-text">Failed to Login</p>
        <button class="submit_class">Back to Login</button>
    </form>
</div>
        
</body>
</html>