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
    $imageTmp = $_FILES['image']['tmp_name'];
    $caption = mysqli_real_escape_string($connection, $_POST['caption']);

    $imageData = file_get_contents($imageTmp);

    $escapedImageData = mysqli_real_escape_string($connection, $imageData);

    $insertQuery = "INSERT INTO `post` (username, post, caption) VALUES ('$current_user', '$escapedImageData', '$caption')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        $_SESSION['uname']=$users['username'];
        header('Location: homepage.php');
    } else {
        echo "Gagal menambahkan post.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>+ Add Post | Vibe Flow</title>
    <link rel="stylesheet" href="style/add-post-page-style.css">
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
                <a href="login-page.php" class="button-a">
                    <button class="logout-button">Log out</button>
                </a>
            </div>
        </div>
    </div>

    <div class="spacing"></div>

    <div class="main-content">
        <form method="post" enctype="multipart/form-data">
            <div class="add-post-wrapper">
                <h4 class="header-text-add-post">Post Media</h4>
                <div class="media-wrapper">
                    <label for="file-upload" class="label-upload">
                        <div class="media-image-add">
                            <h4 class="media-add-text-1">+Add Image</h4>
                            <h4 class="media-add-text-2">Choose Image</h4>
                        </div>
                    </label>
                    <input id="file-upload" type="file" class="input-file" name="image">
                </div>
    
                <div class="caption-wrapper">
                    <h4 class="caption-text">Caption</h4>
                    <div class="input-caption-wrapper">
                        <input type="text" class="input-caption" name="caption">
                    </div>
                </div>
    
                <div class="submit-button-wrapper">
                    <button class="submit-button">
                        +Add Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>