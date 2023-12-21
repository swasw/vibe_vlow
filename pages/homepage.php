<?php
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
                <img src="../assets/images/wony2.jpg" alt="" class="profile-wrapper-img">
                    
                <div class="text-profile-wrapper">
                    <h6 class="main-text">wonyoung_cantik</h6>
                    <h6 class="second-text">Jang Wonyoung</h6>
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

        <div class="profile-wrapper">
            <a href="profile-page.php" class="profile-wrapper-a">
                <img src="../assets/images/wony.jpg" alt="" class="profile-image">
                <h2 class="profile-text">Profile</h2>
            </a>
        </div>

        <div class="navbar-tile">
            <a href="">
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
            <a href="" class="button-a">
                <button class="logout-button">Log out</button>
            </a>
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
                <img src="../assets/images/wony.jpg" alt="" class="profile-tile-image">
                <div class="username-text">
                    <h3><?=$row["username"];?></h3>
                </div>
            </div>
    
            <div class="image-content">
                <img src="data:image/jpg;base64,<?= base64_encode($row["post"]); ?>" alt="" class="profile-content-image">
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
        
        <div class="post-content">
            <div class="profile-tile-content">
                <img src="../assets/images/wony.jpg" alt="" class="profile-tile-image">
                <div class="username-text">
                    <h3>wonyoung_cantik</h3>
                </div>
            </div>
    
            <div class="image-content">
                <img src="../assets/images/content.jpeg" alt="" class="profile-content-image">
            </div>
    
            <div class="caption-content">
                <h4>I love this anime.</h4>
            </div>
            
            <div class="time-content">
                <h5>10 October 2023</h5>
            </div>
            
            <div class="line-end">
                <div class="line-2"></div>
            </div>
        </div>
    </div>
</body>
</html>