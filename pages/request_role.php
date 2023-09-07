<?php
require_once 'includes/settings_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/request_role.css?v=<?php echo time(); ?>">
    <title>WorkWave | Settings</title>
</head>

<body>
    <main class="main-content">
        <div class="profile_container">
            <h2>Request A Role</h2>
            <div class="profile_details">
                <table class="role_status_tb">
                    <tr>
                        <td colspan="1">Current Role:</td>
                        <td colspan="2"><?php echo $_SESSION["user_role"] ?></td>
                    </tr>
                    <tr>
                        <td>Pending Role:</td>
                        <td colspan="2"><?php echo $_SESSION["user_pending_role"] ?></td>
                    </tr>
                </table>

                <br>

                <div class="form_box">
                    <form id="form1" action="./includes/settings_request_role.inc.php" method="post" enctype="multipart/form-data">
                        <div class="input__box">
                            <div class="assign-container">
                                <label for="roles">Select Role</label>
                                <div class="drop-container">
                                    <div class="select-container">
                                        <select name="role" id="roles">
                                            <option value="employee" selected>Employee</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <button type="submit" form="form1">Request Role</button>
            </div>
            <button class="back-button" onclick="window.location.href='index.php?page=dashboard'"><i class="fa-solid fa-angle-left"></i></button>
        </div>
    </main>
</body>
<?php check_login_errors(); ?>

</html>