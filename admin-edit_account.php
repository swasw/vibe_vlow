<?php
session_start();
require_once 'dbcon.php';

$clicked_user = $_GET['person'];

$user_query = "SELECT * FROM user_data WHERE username = '$clicked_user'";
$fetch_data = mysqli_query($connection,$user_query);
$user_data = mysqli_fetch_assoc($fetch_data);
$current_user = $user_data['username'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email  = $_POST['email'];
    $update_q = "UPDATE `user_data` SET `username`='$username',`password`='$password',`name`='$name',`email`='$email' WHERE username = '$clicked_user'";
    $commit = mysqli_query($connection,$update_q);
    if(isset($_FILES['new_photo'])) {
        $image = $_FILES['new_photo']['tmp_name']; 
        if ($image==null){
            $_SESSION['uname'] = $username;
            header('Location: admin-page.php');
        }   
        else if ($imgContent = addslashes(file_get_contents($image))) {
            $updatePhotoQuery = "UPDATE `user_data` SET profile_pic = '$imgContent' WHERE username = '$username'";
            $updatePhotoResult = mysqli_query($connection, $updatePhotoQuery);

            if ($updatePhotoResult) {
                $getUserQuery = "SELECT * FROM `user_data` WHERE username = '$username'";
                $updatedUserData = mysqli_query($connection, $getUserQuery);
                $users = mysqli_fetch_assoc($updatedUserData);
                $_SESSION['uname'] = $username;
                header('Location: admin-page.php');
            } else {
                echo "Gagal memperbarui foto profil. Error: " . mysqli_error($connection);
            }
        } else {
            echo "Gagal mendapatkan konten file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-Manage Account | Vibe Flow</title>
    <link rel="stylesheet" href="style/admin-page-style.css">
</head>
<body>

<div class="side-profile-container">

</div>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="assets/images/logo-colorized.png" alt="" class="logo-image">
            <h4 class="admin-text">ADMIN PAGE</h4>
        </div>

        <div class="navbar-tile">
            <a href="#">
                <div class="tile-active">
                    <img src="assets/images/settings.png" alt="" class="icon">
                    <h2>Manage Account</h2>
                </div>
            </a>
            <a href="admin-manage_post.php">
                <div class="tile-unactive">
                    <img src="assets/images/settings.png" alt="" class="icon">
                    <h2>Manage Post</h2>
                </div>
            </a>
        </div>

        <div class="logout-button-wrapper">
            <div class="button-a-wrapper">
                <a href="logout.php" class="button-a">
                    <button class="logout-button">Log out</button>
                </a>
            </div>
        </div>
    </div>

    <div class="spacing"></div>

    
    <div class="main-content">
        <form method="post" enctype="multipart/form-data">
        <h4 class="account-manager-text">Edit Account</h4>
        <div class="edit-account-wrapper">
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Username</h4>
                <input type="text" class="input-field-edit" name="username" value="<?=$user_data['username']?>">
            </div>
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Password</h4>
                <input type="text" class="input-field-edit" name="password" value="<?=$user_data['password']?>">
            </div>
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Name</h4>
                <input type="text" class="input-field-edit" name="name" value="<?=$user_data['name']?>">
            </div>
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Email</h4>
                <input type="text" class="input-field-edit" name="email" value="<?=$user_data['email']?>">
            </div>
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Profile Photo</h4>
                <input type="file" name="new_photo">
            </div>
            <div class="submit-wrapper">
                <button type="submit" class="submit-button">Save Change</button>
            </div>
        </div>
        </form>
        
    </div>
</body>
</html>
