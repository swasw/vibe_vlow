<?php

    session_start();
    date_default_timezone_set('Asia/Jakarta');

    // if(isset($_SESSION['logged_in'])){
    //     header('location: homepage.php');
    // }

    $conn = mysqli_connect('localhost', 'root', '', 'vibevlow') or die ('Gagal terhubung ke database');

    require_once 'vendor/autoload.php';

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
  
      $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
      $result = mysqli_query($conn, $query);

      if ($result && $row = mysqli_fetch_assoc($result)) {
        $hashed_password_from_database = $row['password'];

        if (password_verify($password, $hashed_password_from_database)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['uname'] = $row['fullname'];

          $query_check_biodata = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
          $result_check_biodata = mysqli_query($conn, $query_check_biodata);
  
            if ($result_check_biodata && mysqli_fetch_assoc($result_check_biodata)) {
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

  if(isset($_GET['code'])){
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    // echo "<pre>";
    // print_r($token);
    // echo "</pre>";

    if(!isset($token['error'])){

        $client->setAccessToken($token['access_token']);

        $service = new Google_Service_Oauth2($client);
        $profile = $service->userinfo->get();

        // echo "<pre>";
        // print_r($profile);
        // echo "</pre>";

        $g_name     = $profile['name'];
        $g_email    = $profile['email'];
        $g_id       = $profile['id'];

        $currtime = date('Y-m-d H:i:s');

        $query_check = 'select * from users where oauth_id = "'.$g_id.'" ';
        $run_query_check = mysqli_query($conn, $query_check);
        $d = mysqli_fetch_object($run_query_check);

        if($d){

            $query_update = 'update users set fullname = "'.$g_name.'", email = "'.$g_email.'", last_login = "'.$currtime.'" where oauth_id = "'.$g_id.'"';
            $run_query_update = mysqli_query($conn, $query_update);

        }else{

            $query_insert = 'insert into users (fullname, email, oauth_id, last_login)
            value ("'.$g_name.'", "'.$g_email.'", "'.$g_id.'", "'.$currtime.'")';
            $run_query_insert = mysqli_query($conn, $query_insert);
        }


        $_SESSION['logged_in'] = true;
        $_SESSION['access_token'] = $token['access_token'];
        $_SESSION['uname'] = $g_name;

        header('location: homepage.php');

    }else{

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
                    <input type="text" class="text-field" name = 'password'>
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