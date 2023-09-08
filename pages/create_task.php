<?php
require_once 'includes/settings_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/create_task.css?v=<?php echo time(); ?>">
    <title>Create a Task</title>
</head>

<body>
    <main class="main-content">
        <div class="profile_container">
            <h2>Create A Task</h2>
            <div class="profile_details">
                <div class="form_box">
                    <form id="form1" action="./includes/task.inc.php" method="post" enctype="multipart/form-data">
                        <div class="input__box">
                            <label for="task_name">Task Name</label>
                            <input type="text" name="task_name" id="task_name" autofocus>
                        </div>
                        <div class="input__box">
                            <label for="task_desc">Task Description</label>
                            <textarea type="text-box" name="task_desc" id="task_desc" rows="4" cols="50"></textarea>
                        </div>
                        <div class="input__box">
                            <label for="due_date">Due Date</label>
                            <input type="date" name="due_date" id="due_date">
                        </div>
                    </form>
                </div>
                <button type="submit" form="form1">Create Task</button>
            </div>
            <button class="back-button" onclick="window.location.href='index.php?page=tasks'"><i class="fa-solid fa-angle-left"></i></button>
        </div>
    </main>
</body>
<?php check_login_errors(); ?>

</html>