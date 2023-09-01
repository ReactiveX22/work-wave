<?php
include 'includes/settings_request_payments.inc.php';
include 'includes/settings_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/settings.css?v=<?php echo time(); ?>">
    <title>WorkWave | Payments</title>
</head>

<body>
    <main class="main-content">
        <div class="profile_container">
            <h2>Request Payment</h2>
            <div class="profile_details">
                <div class="form_box">
                    <form id="form1" action="./includes/settings_request_payments.inc.php" method="post" enctype="multipart/form-data">
                        <div class="input__box">
                            <label>No. Of Pending Requests: <?php echo $_SESSION["no_of_pb_req"] ?></label>
                            <label>Pending Balance: &#2547 <?php echo $_SESSION["employee_pending_balance"] ?></label>
                            <label>Balance: &#2547 <?php echo $_SESSION["employee_balance"] ?></label>
                            <br>
                            <label for="roles">Select Amount</label>
                            <div class="select-container">
                                <select class="select-box" name="requested_amount" id="roles">
                                    <option value="1k" selected>&#2547 1,000</option>
                                    <option value="10k">&#2547 10,000</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <button type="submit" form="form1">Request Payment</button>
            </div>
        </div>
    </main>
</body>
<?php check_login_errors(); ?>

</html>