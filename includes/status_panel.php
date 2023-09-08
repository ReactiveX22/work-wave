<head>
    <link rel="stylesheet" href="css/status_bar.css?v=<?php echo time(); ?>">
</head>

<div class="main_container_status_bar">
    <div class="card_container">
        <div class="card">
            <div class="title">Completed Tasks</div>
            <div class="amount_box">
                <?php show_completed_tasks() ?>
            </div>
        </div>
        <div class="card">
            <div class="title">Incomplete Tasks</div>
            <div class="amount_box">
                <?php show_incomplete_tasks() ?>
            </div>
        </div>
        <div class="card">
            <div class="title">Submitted Tasks</div>
            <div class="amount_box">
                <?php show_submitted_tasks() ?>
            </div>
        </div>
    </div>
</div>