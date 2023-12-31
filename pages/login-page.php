<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | Vibe Flow</title>
    <link rel="stylesheet" href="../style/login-style.css">
</head>
<body>
    <div class="all-wrapper">
        <img src="../assets/images/logo-colorized.png" alt="" class="image-logo">
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
            <a href="#">
                <div class="google-wrapper">
                    <img src="../assets/images/google (2).png" alt="" class="google-logo">
                    <h5>Sign in with Google</h5>
                </div>
            </a>
        </div>
        </form>
    </div>
</body>
</html>