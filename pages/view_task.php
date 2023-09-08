<?php
require_once 'includes/task_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/view_task.css?v=<?php echo time(); ?>">
    <title>Task: <?php show_task_name(); ?></title>
</head>

<body>
    <main class="main-content">
        <div class="task_container">
            <div class="task_details_tb_cont">
                <div class="task_details">
                    <div class="task_name">
                        <h4>
                            <p><?php show_task_name(); ?></p>
                        </h4>
                    </div>
                    <div class="task_desc">
                        <p><?php show_task_desc(); ?></p>
                    </div>
                </div>
                <div class="task-assigned-tb">
                    <label>Assigned To:</label>
                    <section class="table-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Submitted</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php show_task_assigned_to(); ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <button class="back-button" onclick="window.location.href='index.php?page=tasks'"><i class="fa-solid fa-angle-left"></i></button>
        </div>
    </main>
</body>

</html>