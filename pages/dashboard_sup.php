<?php
include 'includes/employee_list.inc.php';
include 'includes/employee_list_view.inc.php';
include 'includes/tasks_list.inc.php';
include 'includes/tasks_list_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/dashboard_sup.css?v=<?php echo time(); ?>">
    <title>Dashboard | Supervisor</title>
</head>

<body>
    <main class="main-content">
        <div class="dashboard_container emp">
            <section class="table__header">
                <h1>Employees</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data..." id="searchInputEmployees">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </section>
            <section class="table-body">
                <table id="table1">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Completed Tasks</th>
                            <th>Pending Tasks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php show_employee_rows(); ?>
                    </tbody>
                </table>
            </section>
        </div>
        <div class="dashboard_container sup">
            <section class="table__header">
                <h1>Created Tasks</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data..." id="searchInputCreatedTasks">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </section>
            <section class="table-body">
                <table id="table2">
                    <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Status</th>
                            <th>Done</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php show_dash_sup_tasks_rows(); ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
    <?php include 'scripts/table-script_sup_dash.php'; ?>

</body>

</html>