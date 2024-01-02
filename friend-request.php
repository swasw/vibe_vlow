<?php

session_start();

$connection = mysqli_connect("localhost","root","","vibevlow");

$current_user = $_SESSION['uname'];
$get_user = "SELECT * FROM `user_data` WHERE username = '$current_user'";
$user_data = mysqli_query($connection, $get_user);
$users = mysqli_fetch_assoc($user_data);
$getfriend = "SELECT * 
FROM `friend_request` 
WHERE (`receiver` = '$current_user') 
      AND `value` = 'false'";
$data = mysqli_query($connection, $getfriend);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Request | Vibe Flow</title>
    <link rel="stylesheet" href="style/friend-page-style.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="assets/images/logo-colorized.png" alt="" class="logo-image">
        </div>

        <div class="navbar-tile">
            <a href="profile-page.php">
                <div class="tile-unactive">
                    <img src="data:image/jpg;base64,<?= base64_encode($users["profile_pic"]); ?>" alt="" class="profile-image">
                    <h2 class="profile-text">Profile</h2>
                </div>
            </a>
            <a href="homepage.php">
                <div class="tile-unactive">
                    <img src="assets/images/home.png" alt="" class="icon">
                    <h2>Home</h2>
                </div>
            </a>
            <a href="search-page.php">
                <div class="tile-unactive">
                    <img src="assets/images/search.png" alt="" class="icon">
                    <h2>Search</h2>
                </div>
            </a>
            <a href="settings-page.php">
                <div class="tile-unactive">
                    <img src="assets/images/settings.png" alt="" class="icon">
                    <h2>Settings</h2>
                </div>
            </a>
            <a href="#">
                <div class="tile-active">
                    <img src="assets/images/friend.png" alt="" class="icon">
                    <h2>Request</h2>
                </div>
            </a>
        </div>

        <div class="logout-button-wrapper">
            <div class="button-a-wrapper">
                <a href="add-post-page.php" class="button-a">
                    <button class="add-post-button">+ Add post</button>
                </a>
            </div>
            <div class="button-a-wrapper">
                <a href="login-page.php" class="button-a">
                    <button class="logout-button">Log out</button>
                </a>
            </div>
        </div>
    </div>

    <div class="spacing"></div>

    <div class="main-content">
        <h4 class="title-text-setting">Friend Request</h4>
        <?php
        $xfriend="";
        while($friend=mysqli_fetch_assoc($data)):
            $xfriend = $friend['sender'];
            $friend_q = "SELECT * FROM `user_data` WHERE username = '$xfriend'" ;
            $com = mysqli_query($connection,$friend_q);
            $friend_data = mysqli_fetch_assoc($com);
        ?>
        
        <div class="friend-all-wrapper">
            <div class="friend-tile-wrapper">
                <div class="profile-friend-wrapper">
                    <img src="data:image/jpg;base64,<?= base64_encode($friend_data["profile_pic"]); ?>" alt="" class="friend-image">
                </div>
                <div class="text-friend-wrapper">
                    <h4 class="name-title"><?=$friend_data['username']?></h4>
                    <h4 class="name-bio"><?=$friend_data['name']?></h4>
                </div>
            </div>
            <form action="acc-con.php" method="post">
            <div class="all-button-wrapper">
                <input type="hidden" name="uname" value="<?=$current_user; ?>">
                <input type="hidden" name="person" value="<?=$friend_data['username']; ?>">
                <button type="" class="decline-button">Decline</button>
                <button type="submit" class="accept-button">Accept</button>
            </div>
            </form> 
        </div>
        
        <?php
        endwhile;
        ?>
    </div>
</body>
</html>