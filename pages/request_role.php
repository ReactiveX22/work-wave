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
            <h2>Request A Role</h2>
            <div class="profile_details">
                <div class="form_box">
                    <form id="form1" action="./includes/settings_request_role.inc.php" method="post" enctype="multipart/form-data">
                        <div class="input__box">
                            <label>Current Role: <?php echo $_SESSION["user_role"] ?></label>
                            <label>Role In Pending: <?php echo $_SESSION["user_pending_role"] ?></label>
                            <br>
                            <label for="roles">Select Role</label>
                            <!-- <input type="password" name="confirm_password" id="confirm_password"> -->
                            <div class="select-container">
                                <select class="select-box" name="role" id="roles">
                                    <option value="employee" selected>Employee</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <button type="submit" form="form1">Request Role</button>
            </div>
        </div>
    </main>
</body>
<?php check_login_errors(); ?>

</html>