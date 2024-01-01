<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "vibevlow");
$id = $_GET['convert']; 
if (isset($id)) {
    $eid = $id;
    $query = "SELECT * FROM post WHERE id = '$eid'";
    $content = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($content);
    $current_username = $row['username'];

    $users_q = "SELECT * FROM user_data WHERE username = '$current_username'";
    $fetch_user = mysqli_query($connection, $users_q);
    $user_data = mysqli_fetch_assoc($fetch_user);
    if (!$row) {
        die('Invalid Data');
    }
    }
else {
    die("Data yang dimaksud tidak ada");
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $caption = $_POST['caption'];

    $updateQuery = "UPDATE `post` SET `caption` = '$caption' WHERE username = '$current_username'";
    $updateResult = mysqli_query($connection, $updateQuery);
    if (isset($_FILES['new_photo'])) {
        $image = $_FILES['new_photo']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        if ($imgContent) {
            $updatePhotoQuery = "UPDATE `post` SET post = '$imgContent' WHERE username = '$current_username'";
            $updatePhotoResult = mysqli_query($connection, $updatePhotoQuery);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post | Vibe Flow</title>
    <link rel="stylesheet" href="style/edit-post-style.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="assets/images/logo-colorized.png" alt="" class="logo-image">
        </div>

        <div class="navbar-tile">
            <a href="profile-page.php">
                <div class="tile-unactive">
                    <img src="data:image/jpg;base64,<?= base64_encode($user_data["profile_pic"]); ?>" alt="" class="profile-image">
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
                <h4 class="header-text-add-post">Edit Post</h4>
                <div class="media-wrapper">
                    <label for="file-upload" class="label-upload">
                        <div class="media-image-add">
                            <img src="data:image/jpg;base64,<?= base64_encode($row["post"]); ?>" alt="" class="image-add-media">
                            <h4 class="change-image-text">Change Image</h4>
                        </div>
                    </label>
                    <input id="file-upload" type="file" class="input-file" name="new_photo">
                </div>
    
                <div class="caption-wrapper">
                    <h4 class="caption-text">Caption</h4>
                    <div class="input-caption-wrapper">
                        <input type="text" class="input-caption" name="caption" value="<?php echo $row['caption']; ?>">
                    </div>
                </div>
    
                <div class="submit-button-wrapper">
                    <button class="submit-button" type="submit">
                        Save Change
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>