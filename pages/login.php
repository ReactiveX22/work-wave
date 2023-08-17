<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

<body>

    <section class="login">
        <div class="login__box">
            <form action="">
                <h2>login</h2>
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
                <p class="signup">Not a member? <a href="index.php?page=signup">Signup here.</a></p>
                <button>login</button>
            </form>
        </div>
    </section>

</body>

</html>