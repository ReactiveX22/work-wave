<?php
require_once 'includes/login_view.inc.php';
include 'includes/login.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time(); ?>">
    <title>Login</title>
</head>

<body>

    <section class="login">
        <div class="login__box">
            <form action="./includes/login.inc.php" method="post" enctype="multipart/form-data">
                <h2>login</h2>
                <div class="input__box">
                    <label for="username">Username</label>
                    <span class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="username" name="username" id="username">
                </div>
                <div class="input__box">
                    <label for="password">Password</label>
                    <span class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" id="password">
                </div>
                <p class="signup">Not a member? <a href="index.php?page=signup">Signup here.</a></p>
                <button>login</button>
            </form>
        </div>
        <?php check_login_errors(); ?>
    </section>

</body>

</html>