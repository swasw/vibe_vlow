<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | Vibe Flow</title>
    <link rel="stylesheet" href="style/search-page-style.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="assets/images/logo-colorized.png" alt="" class="logo-image">
        </div>

        <div class="navbar-tile">
            <a href="profile-page.php">
                <div class="tile-unactive">
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
                <div class="tile-active">
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
        <div class="search-wrapper">
            <div class="search-title-wrapper">
                <h4 class="title-search-text">Search</h4>
            </div>
        </div>

        <div class="searchbar-wrapper">
            <div class="searchbar">
                <input type="text" class="text-searchbar" placeholder="Search user...">
            </div>
            <a href="" class="a-searchbar">
                <div class="searchbar-icon">
                    <img src="assets/images/search.png" alt="" class="search-icon">
                </div>
            </a>
        </div>

        <div class="search-result-wrapper">
            <h4 class="search-result-text">Search Result</h4>
        </div>

        <div class="search-result-tile">
            <a href="" class="a-search">
                <div class="tile-image-wrapper">
                    <img src="assets/images/wony.jpg" alt="" class="tile-image">
                </div>
            </a>

            <a href="" class="a-search">
                <div class="result-text-wrapper">
                    <h4 class="result-text">wonyoung_cantik</h4>
                </div>
            </a>
        </div>
    </div>
    
</body>
</html>