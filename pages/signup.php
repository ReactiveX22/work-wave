<?php
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/signup.css?v=<?php echo time(); ?>">
    <title>Signup</title>
</head>

<body>
    <section class="login">
        <div class="login__box">
            <form action="./includes/signup.inc.php" method="post" enctype="multipart/form-data">
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

                <label>Profile Picture</label>
                <div class="input__image" onclick="document.getElementById('image').click();">
                    <i class="far fa-image"></i>
                    <img id="preview" src="#" alt="Image Preview">
                    <input type="file" id="image" name="prfl-pic" accept="image/*" onchange="previewImage(this);">
                </div>

                <p class="signup">Already a member? <a href="index.php?page=login">Login here.</a></p>
                <button>signup</button>
            </form>
        </div>

        <?php check_signup_errors(); ?>

    </section>

    <!-- TODO separate this! -->
    <script>
        const previewImage = document.getElementById('preview');
        const imageInput = document.getElementById('image');

        imageInput.addEventListener('change', function() {
            const selectedFile = imageInput.files[0];

            if (selectedFile && selectedFile.type.startsWith('image/')) {
                previewImage.style.display = 'block';
                previewImage.src = URL.createObjectURL(selectedFile);
                previewImage.previousElementSibling.style.display = 'none'; // Hide the icon
            } else {
                alert('Please select a valid image file.');
                imageInput.value = ''; // Clear the input
                previewImage.style.display = 'none';
                previewImage.previousElementSibling.style.display = 'block'; // Show the icon
            }
        });
    </script>
</body>

</html>