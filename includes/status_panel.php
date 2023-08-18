<head>
    <link rel="stylesheet" href="css/status_bar.css?v=1">
</head>

<div class="main_container_status_bar">
    <div class="card_container">
        <div class="card">
            <div class="title">hourly rate</div>
            <div class="amount_box">
                <?php show_hourly_rate() ?>
                <p class="amount_unit">&#2547</p>
            </div>
        </div>
        <div class="card">
            <div class="title">total worked hours</div>
            <div class="amount_box">
                <?php show_worked_hours() ?>
                <p class="amount_unit">hrs</p>

            </div>
        </div>
        <div class="card">
            <div class="title">balance</div>
            <div class="amount_box">
                <?php show_balance() ?>
                <p class="amount_unit">&#2547</p>
            </div>
        </div>
    </div>
</div>