<?php
// require_once 'includes/settings_view.inc.php';
include 'includes/admin.inc.php';
require_once 'includes/admin_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/settings.css?v=<?php echo time(); ?>">
    <title>Assign Supervisor</title>
</head>

<body>
    <main class="main-content">
        <div class="profile_container">
            <h2>Assign Task</h2>
            <div class="profile_details">
                <div class="form_box">
                    <form id="form1" action="./includes/admin.inc.php" method="post" enctype="multipart/form-data">
                        <div class="assign-container">
                            <label for="tasks">Select A Supervisor</label>
                            <div class="select-container">
                                <select class="select-box" name="sup_id" id="tasks">
                                    <?php show_sup_options(); ?>
                                </select>
                            </div>
                            <label for="tasks">Select Employee</label>
                            <div class="select-container">
                                <select class="select-box" name="emp_id" id="tasks">
                                    <?php show_emp_options(); ?>
                                </select>
                            </div>
                            <input type="hidden" name="action" value="assign-sup" />
                        </div>
                    </form>
                    <button type="submit" form="form1">Assign Task</button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>