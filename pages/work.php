<?php
require_once 'includes/work_session_view.inc.php';
// include 'includes/work_session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" id="themeLink" type="text/css" href="./css/themes/dark.css">
    <link rel="stylesheet" href="./css/work.css?v=<?php echo time(); ?>">
    <title>Work</title>
</head>

<body>
    <main class="main-content">
        <div class="login__box">
            <div class="title_text">
                <h4>add work hours</h4>
            </div>
            <form action="./includes/work_session.inc.php" method="post" enctype="multipart/form-data">
                <div class="amounts_container">
                    <input type="radio" id="duration_1" name="hour_amount" value="1hr">
                    <label for="duration_1">+1Hr</label>
                    <input type="radio" id="duration_10" name="hour_amount" value="10hr">
                    <label for="duration_10">+10Hr</label>
                    <input type="radio" id="duration_-1" name="hour_amount" value="-1hr">
                    <label for="duration_-1">-1Hr</label>
                    <input type="radio" id="duration_-10" name="hour_amount" value="-10hr">
                    <label for="duration_-10">-10Hr</label>
                </div>
                <button>add hours</button>
            </form>
        </div>
        <?php check_add_work_hours_errors(); ?>
    </main>
</body>

</html>