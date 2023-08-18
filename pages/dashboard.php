<?php
include 'includes/dashboard_view.inc.php';
include 'includes/dashboard.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/dashboard.css?v=1">
    <title>Dashboard</title>
</head>

<body>

    <!-- include sidebar -->
    <!-- main -->

    <div class="main_container">
        <div class="card_container">
            <div class="card">
                <h4>hourly rate</h4>
                <div class="rate">
                    <p>$<?php show_hourly_rate() ?></p>
                </div>
            </div>
            <div class="card">
                <h4>total worked hours</h4>
                <div class="rate">
                    <p><?php show_worked_hours() ?></p>
                </div>
            </div>
            <div class="card">
                <h4>balance</h4>
                <div class="rate">
                    <p><?php show_balance() ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- temp logout feat -->
    <div class="logout">
        <form action="./includes/logout.inc.php" method="post" enctype="multipart/form-data">
            <button>Logout</button>
        </form>
    </div>

</body>

<!-- todo separate this -->

</html>