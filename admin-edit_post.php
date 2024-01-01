<?php

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
        <div class="edit-account-wrapper">
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Username</h4>
                <div class="static-username">
                    <h4 class="static-text">Astaa</h4>
                </div>
            </div>
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Profile Photo</h4>
                <input type="file">
            </div>
            <div class="input-edit-wrapper">
                <h4 class="input-edit-text">Caption</h4>
                <input type="text" class="input-field-edit">
            </div>
            <div class="submit-wrapper">
                <button type="submit" class="submit-button">Save Change</button>
            </div>
        </div>
        
    </div>
</body>
</html>
