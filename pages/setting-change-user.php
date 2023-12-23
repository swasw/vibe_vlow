<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Username and Password | Vibe Flow</title>
    <link rel="stylesheet" href="../style/setting-change-user-style.css">
</head>
<body>
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
                <div class="tile-unactive">
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
        <div class="setting-wrapper">
            <div class="setting-title">
                <h4 class="title-text-setting">Change Username and Password</h4>
            </div>

            <div class="field-wrapper">
                <div class="field">
                    <h4 class="title-field">Username</h4>
                    <input type="text" class="field-input">
                </div>
            </div>
            <div class="field-wrapper">
                <div class="field">
                    <h4 class="title-field">Password</h4>
                    <input type="text" class="field-input">
                </div>
            </div>
            <div class="field-wrapper">
                <div class="field-button">
                    <button type="submit" class="save-change">Save Change</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>