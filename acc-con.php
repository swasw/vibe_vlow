<?php
session_start();
require_once 'dbcon.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_user = $_POST['uname'];
    $clicked_user = $_POST['person'];

    $query_acc = "UPDATE `friend_request` SET `value` = 'true' WHERE sender = '$clicked_user' AND receiver = '$current_user'";
    $commit = mysqli_query($connection,$query_acc);
    $_SESSION['uname']=$current_user;
    header('Location: homepage.php');
}

?>