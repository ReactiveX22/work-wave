<?php
// require_once 'includes/settings_view.inc.php';
include 'includes/tasks_list.inc.php';
include 'includes/employee_list.inc.php';
require_once 'includes/task_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/assign_task.css?v=<?php echo time(); ?>">
    <title>Assign Task</title>
</head>

<body>
    <main class="main-content">
        <div class="profile_container">
            <h2>Assign Task</h2>
            <div class="profile_details">
                <div class="form_box">
                    <form id="form1" action="./includes/task_assign.inc.php" method="post" enctype="multipart/form-data">
                        <div class="assign-container">
                            <label for="tasks">Select A Task</label>
                            <div class="drop-container">
                                <div class="select-container">
                                    <select name="task_id" id="tasks">
                                        <?php show_task_options(); ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <label for="tasks">Select Employee</label>
                            <div class="drop-container">
                                <div class="select-container">
                                    <select name="user_id" id="tasks">
                                        <?php show_emps_options(); ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <button type="submit" form="form1">Assign Task</button>
            </div>
            <button class="back-button" onclick="window.location.href='index.php?page=tasks'"><i class="fas fa-arrow-left"></i></button>
        </div>
    </main>
</body>

</html>