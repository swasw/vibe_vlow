<?php

session_start();

$connection = mysqli_connect("localhost","root","","vibevlow");

$current_user = $_SESSION['uname'];
$get_user = "SELECT * FROM `user_data` WHERE username = '$current_user'";
$user_data = mysqli_query($connection, $get_user);
$users = mysqli_fetch_assoc($user_data);
$getsql = "SELECT * FROM `post` WHERE username = '$current_user' ORDER BY id DESC";
$data = mysqli_query($connection, $getsql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_post'])) {
        $post_id = $_POST['post_id'];
        
        $delete_query = "DELETE FROM `post` WHERE id = '$post_id'";
        $delete_result = mysqli_query($connection, $delete_query);
        
        if ($delete_result) {
            $_SESSION['uname']=$users['username'];
            header('Location: profile-page.php');
        } else {
            echo "Gagal menghapus post.";
        }
    }
}
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
                <img src="data:image/jpg;base64,<?= base64_encode($users["profile_pic"]); ?>" alt="" class="profile-wrapper-img">
                    
                <div class="text-profile-wrapper">
                    <h6 class="main-text"><?=$users['username']?></h6>
                    <h6 class="second-text"><?=$users['name']?></h6>
                </div>
            </div>
    
            <div class="friend-list-wrapper">
                <h6 class="friend-text">Friend</h6>
                <?php
                    // friends fetch
                    $getfriend = "SELECT * 
                    FROM `friend_request` 
                    WHERE (`sender` = '$current_user' OR `receiver` = '$current_user') 
                        AND `value` = 'true' 
                    ORDER BY id DESC
                    ";
                    $friends_data = mysqli_query($connection, $getfriend);
                    while($friends = mysqli_fetch_assoc($friends_data)):
                        if($current_user==$friends['sender']){
                            $friend_id = $friends['receiver'];
                        }
                        else{
                            $friend_id = $friends['sender'];
                        }
                        $fquer = "SELECT * FROM `user_data` WHERE username = '$friend_id'";
                        $friend_fetch = mysqli_query($connection, $fquer);
                        $frienddatas = mysqli_fetch_assoc($friend_fetch);
                ?>
                <div class="friend-list">
                    <div class="tile-friend-list">
                        <div class="first-column">
                            <div class="image-crop">
                                <img src="data:image/jpg;base64,<?= base64_encode($frienddatas["profile_pic"]); ?>" alt="" class="tile-profile-img">
                            </div>
                            <h6 class="friend-name"><?=$frienddatas['username']?></h6>
                        </div>
                        <a href="person-profile.php?person=<?=$frienddatas['username']?>" class="a-friend-list">
                            <h6 class="see-profile">see profile</h6>
                        </a>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
                <!-- <div class="friend-list">
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
                </div> -->
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
            <a href="friend-request.php">
                <div class="tile-unactive">
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
                <a href="logout.php" class="button-a">
                    <button class="logout-button">Log out</button>
                </a>
            </div>
        </div>
    </div>

    <div class="spacing"></div>

    <div class="main-content">
        <h4 class="header-main-content"> @<?php echo $_SESSION['uname']; ?> </h4>
        <div class="wrapper-main">
            <div class="profile-container-top">
                <div class="image-container">
                    <img src="data:image/jpg;base64,<?= base64_encode($users["profile_pic"]); ?>" alt="" class="content-profile-img">
                </div>
                <h4 class="profile-name"><?=$users['name']?></h4>
            </div>
            <div class="button-profile-edit">
                <a href="edit-profile-page.php" class="profile-edit-a">
                    <button class="button-profile">Edit Profile</button>
                </a>
            </div>

            <div class="line-between"></div>
            
            <div class="post-content-wrapper">
            <?php
                while($row = mysqli_fetch_assoc($data)) :
                    $imageData = $row['post'];
                    $now_user = $row['username'];
                    $base64Image = base64_encode($imageData);
                    $quer = "SELECT * FROM `user_data` WHERE username = '$now_user'";
                    $user_fetch = mysqli_query($connection, $quer);
                    $datas = mysqli_fetch_assoc($user_fetch);
            ?>
                <div class="post-content">
                    <form method="post">
                        <div class="delete-wrapper">
                            <input type="hidden" name="post_id" value="<?= $row['id']; ?>">
                            <button type="submit" name="delete_post" class="delete-button">
                                <h4 class="delete-text">Delete</h4>
                            </button>
                            <h4 class="space-text">|</h4>
                            <a href="post-edit.php?convert=<?=$row['id'];?>">
                                <h4 class="edit-text">Edit</h4>
                            </a>
                        </div>
                    </form>
                    <div class="image-content">
                        <img src="data:image/jpg;base64,<?= base64_encode($row["post"]); ?>" alt="" class="profile-content-image">
                    </div>
        
                    <div class="caption-content">
                        <h4><?= $row['caption'];?></h4>
                    </div>
                
                    <div class="time-content">
                        <h5><?= $row['time_stamp'];?></h5>
                    </div>
                </div>
                <?php
                endwhile;
            ?>
            
        </div>
    </div>

    
</body>
</html>
