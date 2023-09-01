<?php
include 'includes/employee_list.inc.php';
include 'includes/employee_list_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/dashboard_sup.css?v=<?php echo time(); ?>">
    <title>Dashboard</title>
</head>

<body>
    <!-- main -->
    <main class="main-content">
        <div class="dashboard_container">
            <section class="table__header">
                <h1>Employees</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </section>
            <section class="table-body">
                <table>
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Hourly Rate</th>
                            <th>Total Worked Hours</th>
                            <th>Pending Balance</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php show_employee_rows(); ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
    <?php include 'scripts/table-script.php'; ?>
</body>

</html>