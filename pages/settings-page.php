<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Vibe Flow</title>
    <link rel="stylesheet" href="../style/settings-page-style.css">
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
                <div class="tile-active">
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
                <h4 class="title-text-setting">Settings</h4>
            </div>

            <div class="setting-tile-wrapper">
                <a href="setting-change-user.php" class="a-setting-tile">
                    <h4 class="setting-tile-text">Change Username and Password</h4>
                </a>
                <a href="setting-change-user.php" class="a-setting-tile">
                    <h4 class="setting-icon">></h4>
                </a>
            </div>
        </div>
    </div>
</body>
</html>