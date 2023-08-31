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
    <link rel="stylesheet" href="./css/dashboard.css?v=<?php echo time(); ?>">
    <title>Dashboard</title>
</head>

<body>
    <!-- main -->
    <main class="main-content">
        <div class="dashboard_container">
            <div class="chart_part">
                <?php include_once 'includes/bar_chart.php'; ?>
            </div>
            <div class="status_part">
                <?php include_once 'includes/status_panel.php'; ?>
            </div>
        </div>
    </main>
</body>

</html>