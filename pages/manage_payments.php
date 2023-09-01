<?php
include 'includes/manage_payments.inc.php';
include 'includes/manage_pay_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/manage_pay.css?v=<?php echo time(); ?>">
    <title>Manage Payments</title>
</head>

<body>
    <main class="main-content">
        <div class="dashboard_container">
            <section class="table__header">
                <h1>Manage Payments</h1>
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
                            <th>Pending Balance</th>
                            <th>Pending Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php show_pay_req_rows(); ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
    <?php include 'scripts/table-script.php'; ?>
</body>

</html>