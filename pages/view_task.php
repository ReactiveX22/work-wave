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
            <div class="task_details">

                <div class="task_desc">
                    <h4>Task Name: &emsp; <?php show_task_name(); ?></h4>
                    <br>
                    <h4>Task Desc: </h4>
                    <p><?php show_task_desc(); ?></p>
                </div>
                <br>
                <br>
                <h4>Assigned To:</h4>
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
            <button class="back-button" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
        </div>
    </main>
</body>

</html>