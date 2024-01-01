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

    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    $updateQuery = "UPDATE `user_data` SET username = '$newUsername', password = '$newPassword' WHERE username = '$current_user'";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        $getUserQuery = "SELECT * FROM `user_data` WHERE username = '$newUsername'";
        $updatedUserData = mysqli_query($connection, $getUserQuery);
        $users = mysqli_fetch_assoc($updatedUserData);
        $_SESSION['uname']=$users['username'];
        header('Location: profile-page.php');
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Username and Password | Vibe Flow</title>
    <link rel="stylesheet" href="style/edit-profile-page-style.css">
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
                <div class="tile-active">
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
        <div class="setting-wrapper">
            <div class="setting-title">
                <h4 class="title-text-setting">Edit Profile</h4>
            </div>

            <form method="post">
                <div class="field-wrapper">
                    <div class="field">
                        <div class="image-profile-container">
                            <label for="photo-change" class="label-photo">
                                <h4 class="change-photo-text">Change Photo</h4>
                                <img src="data:image/jpg;base64,<?= base64_encode($users["profile_pic"]); ?>" alt="" class="image-profile-pic">
                            </label>
                        </div>
                    </div>
                    <input type="file" id="photo-change" class="file-image-input">
                </div>
                <div class="field-wrapper">
                    <div class="field">
                        <h4 class="title-field">Username</h4>
                        <input type="text" class="field-input" name="new_username" value="<?php echo $users['username']; ?>">
                    </div>
                </div>
                <div class="field-wrapper">
                    <div class="field">
                        <h4 class="title-field">Password</h4>
                        <input type="text" class="field-input" name="new_password" value="<?php echo $users['password']; ?>">
                    </div>
                </div>
                <div class="field-wrapper">
                    <div class="field-button">
                        <button type="submit" class="save-change">Save Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>