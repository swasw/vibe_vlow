<?php

session_start();

require_once('dbcon.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $insert_query = "INSERT INTO `user_data`(`username`, `password`, `name`, `email`) VALUES ('$username','$password','$name','$email')";
        $inserted = mysqli_query($connection, $insert_query);

        if ($inserted) {
            $_SESSION['username'] = $username;

            header('Location: login-page.php');
            exit();
        } else {
            echo 'Registration failed';
        }
    } catch (Exception $e) {
        echo 'Username must be unique';
        // echo "Error: " . $e->getMessage();
    }
}
?>
