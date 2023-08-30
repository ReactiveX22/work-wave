<?php
require_once 'includes/settings_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/settings.css?v=<?php echo time(); ?>">
    <title>WorkWave | Settings</title>
</head>

<body>
    <main class="main-content">
        <div class="profile_container">
            <h2>Update Password</h2>
            <div class="profile_details">
                <div class="form_box">
                    <form id="form1" action="./includes/settings.inc.php" method="post" enctype="multipart/form-data">
                        <div class="input__box">
                            <label for="old_password">Old Password</label>
                            <input type="password" name="old_password" id="old_password" autofocus>
                        </div>
                        <div class="input__box">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password">
                        </div>
                        <div class="input__box">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password">
                        </div>
                    </form>
                </div>
                <button type="submit" form="form1">Update Password</button>
            </div>
        </div>
    </main>
</body>
<?php check_login_errors(); ?>

</html>