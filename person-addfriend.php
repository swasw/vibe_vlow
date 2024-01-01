<?php
session_start();
require_once 'dbcon.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $current_user = $_POST['uname'];
    $clicked_user = $_POST['person'];
    $add_query = "INSERT INTO `friend_request`( `sender`, `receiver`, `value`) VALUES ('$current_user','$clicked_user','false')";
    $commits = mysqli_query($connection,$add_query);

    $_SESSION['uname'] = $current_user;
    $_SESSION['person'] = $clicked_user;
    header('Location: person-profile-sent.php');
}

?>