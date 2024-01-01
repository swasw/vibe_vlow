<?php
session_start();

// Koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "vibevlow");

// Periksa apakah ada post_id yang dikirimkan
if(isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    
    // Ambil data post dari database berdasarkan post_id dan username
    $getsql = "SELECT * FROM `post` WHERE username = '$current_user' AND id = '$post_id'";
    $data = mysqli_query($connection, $getsql);
    $row = mysqli_fetch_assoc($data);
}

// Tangani jika ada form yang disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caption = $_POST['caption'];

    // Periksa apakah ada file yang diunggah
    if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
        // Jika ada file yang diunggah
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageData = file_get_contents($imageTmp);
        $escapedImageData = mysqli_real_escape_string($connection, $imageData);

        // Update query untuk memperbarui post dengan foto baru
        $updateQuery = "UPDATE `post` SET post = '$escapedImageData', caption = '$caption' WHERE username = '$current_user' AND id = '$post_id'";
        $updateResult = mysqli_query($connection, $updateQuery);

        if (!$updateResult) {
            echo "Gagal memperbarui post.";
        }
    } else {
        // Jika tidak ada file yang diunggah, update hanya untuk caption
        $updateQuery = "UPDATE `post` SET caption = '$caption' WHERE username = '$current_user' AND id = '$post_id'";
        $updateResult = mysqli_query($connection, $updateQuery);

        if (!$updateResult) {
            echo "Gagal memperbarui caption.";
        }
    }

    // Redirect ke halaman edit post
    header('Location: post-edit.php?post_id=' . $post_id);
    exit();
}

// Ambil informasi pengguna
$current_user = $_SESSION['uname'];
$get_user = "SELECT * FROM `user_data` WHERE username = '$current_user'";
$user_data = mysqli_query($connection, $get_user);
$users = mysqli_fetch_assoc($user_data);

// Ambil data post yang akan diedit
$getsql = "SELECT * FROM `post` WHERE username = '$current_user' ORDER BY id DESC";
$data = mysqli_query($connection, $getsql);
$row = mysqli_fetch_assoc($data);
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
                    <input id="file-upload" type="file" class="input-file" name="image">
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