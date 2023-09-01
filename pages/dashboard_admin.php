<?php
include 'includes/admin.inc.php';
include 'includes/admin_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/dashboard_sup.css?v=<?php echo time(); ?>">
    <title>Dashboard</title>
</head>

<body>
    <!-- main -->
    <main class="main-content">
        <div class="dashboard_container">
            <div class="table-body">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Requested Role</th>
                            <th>Requested Date</th>
                            <th>Pending Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php show_role_req_rows(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>