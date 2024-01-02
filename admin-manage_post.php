<?php
session_start();
require_once 'dbcon.php';

$post_q = "SELECT * FROM post ORDER BY id DESC";
$fetch_q = mysqli_query($connection,$post_q);

require_once 'dbcon.php';

$post_q = "SELECT * FROM post ORDER BY id DESC";
$fetch_q = mysqli_query($connection,$post_q);

if (isset($_POST['delete_post'])) {
    $delete_id = $_POST['delete_id'];
    $delete_query = "DELETE FROM `post` WHERE id = ?";
    $stmt = mysqli_prepare($connection, $delete_query);
    mysqli_stmt_bind_param($stmt, 'i', $delete_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header('Location: admin-manage_post.php');
        exit;
    } else {
        echo "Failed to delete post.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-Manage Post | Vibe Flow</title>
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
            <a href="#">
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
        <h4 class="account-manager-text">Post Manager</h4>
        <div class="table-account-wrapper">
            <table cellspacing="0">
                <tr>
                    <th>Username</th>
                    <th>Post</th>
                    <th>Caption</th>
                    <th>Option</th>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($fetch_q)):
                    $content = base64_encode($row['post']);
                ?>
                <tr>
                    <td><?=$row['username']?></td>
                    <td><img src="data:image/jpg;base64,<?= $content;?>" class="image-content-friend"></td>
                    <td><?=$row['caption']?></td>
                    <td>
                        <div class="button-all-wrapper">
                            <button class="edit-button"><a href="admin-edit_post.php?person=<?=$row['username']?>" class="edit-button-a">Edit</a></button>
    
                            <form method="POST" action="admin-manage_post.php">
                                <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                                <button type="submit" class="delete-button" name="delete_post">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php
                endwhile;
                ?>
            </table>
        </div>
    </div>
</body>
</html>