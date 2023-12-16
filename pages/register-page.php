


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Vibe Flow</title>
    <link rel="stylesheet" href="../style/register-style.css">
</head>
<body>
    <div class="all-wrapper">
        <img src="../assets/images/logo-colorized.png" alt="" class="image-logo">

        <div class="contain-wrapper">
        <form class="contain-wrapper" action="register_con.php" method="post">
            <h1>Register</h1>
            <div class="field-wrapper">
                <div class="textfield-wrapper">
                    <h2>Username</h2>
                    <input type="text" class="text-field" name="username"><br>
                </div>
                <div class="textfield-wrapper">
                    <h2>Name</h2>
                    <input type="text" class="text-field" name="name"><br>
                </div>
                <div class="textfield-wrapper">
                    <h2>Email</h2>
                    <input type="text" class="text-field" name="email"><br>
                </div>
                <div class="textfield-wrapper">
                    <h2>Password</h2>
                    <input type="text" class="text-field" name="password"><br>
                    <a href="#">
                        <div class="forgot-wrapper">
                            <h3>Forgot Password?</h3>
                        </div>
                    </a>
                </div>
                <a href="#">
                    <div class="button-wrapper">
                        <button class="login-button">Register</button>
                    </div>
                </a>
            </div>
            <div class="bottom-nav">
                <h4 class="main-text-bottom">Already have an account?</h4>
                <a href="login-page.php">
                    <h4 class="sec-text-bottom">Login</h4>
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
        </form>
        </div>
    </div>
</body>
</html>

