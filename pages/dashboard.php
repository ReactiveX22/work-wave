<?php
require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <!-- include sidebar -->
    <!-- main -->
    <div class="main_container">

    </div>
    <!-- temp logout feat -->
    <div class="logout">
        <form action="./includes/logout.inc.php" method="post" enctype="multipart/form-data">
            <button>Logout</button>
        </form>
    </div>
</body>

</html>