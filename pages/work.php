<?php
// include 'includes/work_session_view.inc.php';
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
                <div class="custom-num">
                    <input type="number" class="num-input" name="hours" min="0" max="10" value="0">
                </div>
                <button>add hours</button>
            </form>
        </div>
    </main>
</body>

</html>