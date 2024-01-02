<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

require_once 'vendor/autoload.php';

$conn = mysqli_connect('localhost', 'root', '', 'vibevlow') or die ('Gagal terhubung ke database');

$client_id      = '793468008907-op67ncjrljtesl781klirsugqe9c6i2q.apps.googleusercontent.com';
$client_secret  = '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';
$redirect_uri   = 'http://localhost/vibevlow/vibe_vlow/login-page.php';

$client = new Google_Client();

$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);

$client->addScope('email');
$client->addScope('profile');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_data WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $hashed_password_from_database = $row['password'];

        if (password_verify($password, $hashed_password_from_database)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['uname'] = $row['name'];

            $query_check_biodata = "SELECT * FROM user_data WHERE email = ?";
            $stmt_check_biodata = mysqli_prepare($conn, $query_check_biodata);
            mysqli_stmt_bind_param($stmt_check_biodata, 's', $email);
            mysqli_stmt_execute($stmt_check_biodata);

            if ($stmt_check_biodata && mysqli_fetch_assoc(mysqli_stmt_get_result($stmt_check_biodata))) {
                header('Location: homepage.php');
            } else {
                header('location: /.php');
            }
            exit;
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid email";
    }
}

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        $service = new Google_Service_Oauth2($client);
        $profile = $service->userinfo->get();

        $g_name     = $profile['name'];
        $g_email    = $profile['email'];

        $currtime = date('Y-m-d H:i:s');

        $query_check = "SELECT * FROM user_data WHERE username = ?";
        $stmt_check = mysqli_prepare($conn, $query_check);

        if ($stmt_check) {
            mysqli_stmt_bind_param($stmt_check, 's', $g_email);
            mysqli_stmt_execute($stmt_check);

            $commit_check = mysqli_stmt_get_result($stmt_check);

            $d = mysqli_fetch_object($commit_check);
        } else {
            die('Error preparing statement: ' . mysqli_error($conn));
        }
        if ($d) {
            $update_q = "UPDATE user_data SET username='$g_email',name='$g_name',email='$g_email' WHERE username = '$g_email'";
            $commit = mysqli_query($conn,$update_q);    
            // $query_update = 'UPDATE user_data SET name = ?, email = ? WHERE name = ?';
            // $stmt_update = mysqli_prepare($conn, $query_update);
            // mysqli_stmt_bind_param($stmt_update, 'sss', $g_name, $g_email, $g_name);
            // mysqli_stmt_execute($stmt_update);
        } else {
            $query_insert = "INSERT INTO user_data( username,name, email) VALUES ('$g_email','$g_name','$g_email')";
            $commit = mysqli_query($conn,$query_insert);
            // $stmt_insert = mysqli_prepare($conn, $query_insert);
            // mysqli_stmt_bind_param($stmt_insert, 'ss', $g_name, $g_email);
            // mysqli_stmt_execute($stmt_insert);
        }

        $_SESSION['logged_in'] = true;
        $_SESSION['access_token'] = $token['access_token'];
        $_SESSION['uname'] = $g_email; 

        header('location: homepage.php');
    } else {
        echo "Login Gagal";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | Vibe Flow</title>
    <link rel="stylesheet" href="style/login-style.css">
</head>
<body>
    <div class="all-wrapper">
        <img src="assets/images/logo-colorized.png" alt="" class="image-logo">
        <form action="login_con.php" method="post" class="all-wrapper">
        <div class="contain-wrapper">
            <h1>Login</h1>
            <div class="field-wrapper">
                <div class="textfield-wrapper">
                    <h2>Username</h2>
                    <input type="text" class="text-field" name = 'username'>
                </div>
                <div class="textfield-wrapper">
                    <h2>Password</h2>
                    <input type="password" class="text-field" name = 'password'>
                    <a href="#">
                        <div class="forgot-wrapper">
                            <h3>Forgot Password?</h3>
                        </div>
                    </a>
                </div>
                <a href="homepage.php">
                    <div class="button-wrapper">
                        <button class="login-button">Login</button>
                    </div>
                </a>
            </div>
            <div class="bottom-nav">
                <h4 class="main-text-bottom">Don't have an account?</h4>
                <a href="register-page.php">
                    <h4 class="sec-text-bottom">Register</h4>
                </a>
            </div>
            <div class="or-wrapper">
                <div class="line"></div>
                <h4>OR</h4>
                <div class="line"></div>
            </div>
            <a href="<?= $client->createAuthUrl(); ?>">
                <div class="google-wrapper">
                    <img src="assets/images/google (2).png" alt="" class="google-logo">
                    <h5>Sign in with Google</h5>
                </div>
            </a>
        </div>
        </form>
    </div>
</body>
</html>
