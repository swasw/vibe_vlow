<?php

session_start();

$connection = mysqli_connect("localhost","root","","vibevlow");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Vibe Flow</title>
    <link rel="stylesheet" href="style/profile-page-style.css">
</head>
<body>

    <div class="side-profile-container">
        <div class="side-profile-content">
            <div class="side-profile-wrapper">
                <img src="assets/images/wony2.jpg" alt="" class="profile-wrapper-img">
                    
                <div class="text-profile-wrapper">
                    <h6 class="main-text"><?php echo $_SESSION['uname']; ?></h6>
                    <h6 class="second-text">Jang Wonyoung</h6>
                </div>
            </div>
    
            <div class="friend-list-wrapper">
                <h6 class="friend-text">Friend</h6>
                <div class="friend-list">
                    <div class="tile-friend-list">
                        <div class="first-column">
                            <div class="image-crop">
                                <img src="assets/images/yujin.jpeg" alt="" class="tile-profile-img">
                            </div>
                            <h6 class="friend-name">ahn_yujin</h6>
                        </div>
                        <a href="" class="a-friend-list">
                            <h6 class="see-profile">see profile</h6>
                        </a>
                    </div>
                </div>
                <div class="friend-list">
                    <div class="tile-friend-list">
                        <div class="first-column">
                            <div class="image-crop">
                                <img src="assets/images/eunha.jpeg" alt="" class="tile-profile-img">
                            </div>
                            <h6 class="friend-name">jung_eunbi</h6>
                        </div>
                        <a href="" class="a-friend-list">
                            <h6 class="see-profile">see profile</h6>
                        </a>
                    </div>
                </div>
                <div class="friend-list">
                    <div class="tile-friend-list">
                        <div class="first-column">
                            <div class="image-crop">
                                <img src="assets/images/heejin.jpeg" alt="" class="tile-profile-img">
                            </div>
                            <h6 class="friend-name">heejin__</h6>
                        </div>
                        <a href="" class="a-friend-list">
                            <h6 class="see-profile">see profile</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <div class="navbar">
        <div class="navbar-logo">
            <img src="assets/images/logo-colorized.png" alt="" class="logo-image">
        </div>

        <div class="navbar-tile">
            <a href="#">
                <div class="tile-active">
                    <img src="assets/images/wony.jpg" alt="" class="profile-image">
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
        </div>

        <div class="logout-button-wrapper">
            <div class="button-a-wrapper">
                <a href="add-post-page.php" class="button-a">
                    <button class="add-post-button">+ Add post</button>
                </a>
            </div>
            <div class="button-a-wrapper">
                <a href="logout.php" class="button-a">
                    <button class="logout-button">Log out</button>
                </a>
            </div>
        </div>
    </div>

    <div class="spacing"></div>

    <div class="main-content">
        <h4 class="header-main-content"> <?php echo $_SESSION['uname']; ?> </h4>
        <div class="wrapper-main">
            <div class="profile-container-top">
                <div class="image-container">
                    <img src="../assets/images/wony.jpg" alt="" class="content-profile-img">
                </div>
                <h4 class="profile-name">Jang Wonyoung</h4>
            </div>
            <div class="button-profile-edit">
                <a href="edit-profile-page.php" class="profile-edit-a">
                    <button class="button-profile">Edit Profile</button>
                </a>
            </div>

            <div class="line-between"></div>

            <div class="post-content-wrapper">
                <div class="post-content">
                    <div class="image-content">
                        <img src="../assets/images/content.jpeg" alt="" class="profile-content-image">
                    </div>
        
                    <div class="caption-content">
                        <h4>I love this anime.</h4>
                    </div>
                
                    <div class="time-content">
                        <h5>10 October 2023</h5>
                    </div>
                </div>
                <div class="post-content">
                    <div class="image-content">
                        <img src="../assets/images/content.jpeg" alt="" class="profile-content-image">
                    </div>
        
                    <div class="caption-content">
                        <h4>I love this anime.</h4>
                    </div>
                
                    <div class="time-content">
                        <h5>10 October 2023</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
