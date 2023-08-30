<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/profile.css?v=<?php echo time(); ?>">
    <title>WorkWave | Profile</title>
</head>

<body>
    <main class="main-content">
        <div class="profile_container">
            <div class="profile_pic_container">
                <?php echo '<img src="profile_pics/' . $_SESSION["employee_profile_pic"] . '" alt="Profile Picture">' ?>
            </div>
            <div class="profile_details">
                <table class="profile_details_table">
                    <tr>
                        <td>Username:</td>
                        <td><?php echo $_SESSION["user_username"] ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $_SESSION["user_email"] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>

</html>