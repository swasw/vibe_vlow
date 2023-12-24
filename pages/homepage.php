<?php
session_start();
$current_user = $_SESSION['current_username'];
    $connection = mysqli_connect("localhost","root","","vibevlow");
    // if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hapus'])) {
    //     $id = $_GET['hapus'];
    //     $query = "DELETE FROM data_dasar WHERE ID = $id";
    //     mysqli_query($connection, $query);
    //     header("Location: index.php");
    //     exit;
    // }
    $getsql = "SELECT * FROM `post` ORDER BY id DESC";
    $data = mysqli_query($connection, $getsql);
    $get_user = "SELECT * FROM `user_data` WHERE username = '$current_user'";
    $user_data = mysqli_query($connection, $get_user);
    $users = mysqli_fetch_assoc($user_data)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | Vibe Flow</title>
    <link rel="stylesheet" href="../style/homepage-style.css">
</head>
<body>

<div class="side-profile-container">
        <div class="side-profile-content">
            <div class="side-profile-wrapper">
                <img src="data:image/jpg;base64,<?= base64_encode($users["profile"]); ?>" alt="" class="profile-wrapper-img">
                    
                <div class="text-profile-wrapper">
                    <h6 class="main-text"><?=$users['username']?></h6>
                    <h6 class="second-text"><?=$users['name']?></h6>
                </div>
            </div>
    
            <div class="friend-list-wrapper">
                <h6 class="friend-text">Friend</h6>
                <div class="friend-list">
                    <div class="tile-friend-list">
                        <div class="first-column">
                            <div class="image-crop">
                                <img src="../assets/images/yujin.jpeg" alt="" class="tile-profile-img">
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
                                <img src="../assets/images/eunha.jpeg" alt="" class="tile-profile-img">
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
                                <img src="../assets/images/heejin.jpeg" alt="" class="tile-profile-img">
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
            <img src="../assets/images/logo-colorized.png" alt="" class="logo-image">
        </div>

        <div class="navbar-tile">
            <a href="profile-page.php">
                <div class="tile-unactive">
                    <img src="../assets/images/wony.jpg" alt="" class="profile-image">
                    <h2 class="profile-text">Profile</h2>
                </div>
            </a>
            <a href="homepage.php">
                <div class="tile-active">
                    <img src="../assets/images/home.png" alt="" class="icon">
                    <h2>Home</h2>
                </div>
            </a>
            <a href="search-page.php">
                <div class="tile-unactive">
                    <img src="../assets/images/search.png" alt="" class="icon">
                    <h2>Search</h2>
                </div>
            </a>
            <a href="settings-page.php">
                <div class="tile-unactive">
                    <img src="../assets/images/settings.png" alt="" class="icon">
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
                <a href="login-page.php" class="button-a">
                    <button class="logout-button">Log out</button>
                </a>
            </div>
        </div>
    </div>

    <div class="spacing"></div>

    
    <div class="main-content">
    <?php
        while($row = mysqli_fetch_assoc($data)) :
            $imageData = $row['post'];
            $base64Image = base64_encode($imageData);
    ?>
        <div class="post-content">
            <div class="profile-tile-content">
                <img src="data:image/jpg;base64,<?= base64_encode($row["foto_profil"]); ?>"alt="" class="profile-tile-image">
                <div class="username-text">
                    <h3><?=$row["username"];?></h3>
                </div>
            </div>
    
            <div class="image-content">
                <div class="image-post-wrapper">
                    <img src="data:image/jpg;base64,<?= base64_encode($row["post"]); ?>" alt="" class="profile-content-image">
                </div>
            </div>
    
            <div class="caption-content">
                <h4><?=$row["caption"];?></h4>
            </div>
            
            <div class="time-content">
                <h5><?=$row["time_stamp"];?></h5>
            </div>

            <div class="line-end">
                <div class="line-2"></div>
            </div>
            <?php
                endwhile;
            ?>
        </div>
    </div>
</body>
</html>