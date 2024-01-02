<?php
session_start();
require_once 'dbcon.php';
$post_id = $_GET['person'];
$user_query = "SELECT * FROM post WHERE id = '$post_id'";
$fetch_data = mysqli_query($connection,$user_query);
$user_data = mysqli_fetch_assoc($fetch_data);
$current_user = $user_data['username'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $caption = $_POST['caption'];
    $update_q = "UPDATE `post` SET `caption`='$caption' WHERE id = '$post_id'";
    $commit = mysqli_query($connection,$update_q);
    if(isset($_FILES['new_photo'])) {
        $image = $_FILES['new_photo']['tmp_name']; 
        if ($image==null){
            $_SESSION['uname'] = $current_user;
            header('Location: admin-page.php');
        }   
        else if ($imgContent = addslashes(file_get_contents($image))) {
            $updatePhotoQuery = "UPDATE `post` SET post = '$imgContent' WHERE id = '$post_id'";
            $updatePhotoResult = mysqli_query($connection, $updatePhotoQuery);

            if ($updatePhotoResult) {
                $getUserQuery = "SELECT * FROM `post` WHERE id = '$post_id'";
                $updatedUserData = mysqli_query($connection, $getUserQuery);
                $users = mysqli_fetch_assoc($updatedUserData);
                $_SESSION['uname'] = $current_user;
                header('Location: admin-page.php');
            } else {
                echo "Gagal memperbarui foto profil. Error:" . mysqli_error($connection);
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
            <a href="admin-page.php">
                <div class="tile-unactive">
                    <img src="assets/images/settings.png" alt="" class="icon">
                    <h2>Manage Account</h2>
                </div>
            </a>
            <a href="admin-manage_post.php">
                <div class="tile-active">
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
        <h4 class="account-manager-text">Edit Post</h4>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="edit-account-wrapper">
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Username</h4>
                <?php
                $row = mysqli_fetch_assoc($fetch_q)
                ?>
                <div class="static-username">
                    <h4 class="static-text"><?=$current_user?></h4>
                </div>
            </div>
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Profile Photo</h4>
                <input type="file" name ="new_photo">
            </div>
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Caption</h4>
                <input type="text" class="input-field-edit" value ="<?=$user_data['caption']?>" name="caption">
            </div>
            <div class="submit-wrapper">
                <button type="submit" class="submit-button">Save Change</button>
            </div>
        </div>
        </form>
        
    </div>
</body>
</html>
