<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="/my-website/css/themes/dark.css">
    <link rel="stylesheet" href="/my-website/css/signup.css">
    <title>Signup</title>
</head>

<body>
    <section class="login">
        <div class="login__box">
            <form action="./includes/signup.inc.php" method="post">
                <h2>singup</h2>
                <div class="input__box">
                    <label for="username">Username</label>
                    <span class="icon">
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <input type="text" name="username" id="username" autofocus>
                </div>
                <div class="input__box">
                    <label for="email">Email</label>
                    <span class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" name="email" id="email">
                </div>
                <div class="input__box">
                    <label for="password">Password</label>
                    <span class="icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" name="password" id="password">
                </div>
                <p class="signup">Already a member? <a href="index.php?page=login">Login here.</a></p>
                <button>signup</button>
            </form>
        </div>

        <?php check_signup_errors(); ?>
        </div>
    </section>

</body>

</html>