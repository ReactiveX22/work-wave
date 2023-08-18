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
        <!-- <div class="card_container">
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
        </div> -->
        <div class="graph_container">
            <section class="intro-text">
                <div class="container">
                    <h1>Worked Hours Timeline</h1>
                    <p>A timeline of hours worked in a week.</p>
                </div>
            </section>
            <section class="timeline-section">
                <ul>
                    <!-- Your data points will go here -->
                </ul>
            </section>
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
<script>
    function updateDashboardContent() {
        fetch('dashboard.inc.php')
    }

    // Call the updateDashboardContent function when the page loads
    window.addEventListener('load', updateDashboardContent);
</script>

<script>
    // Create new HTML elements for each data point
    data.forEach(datum => {
        // Create new li element
        let li = document.createElement('li');

        // Create new time element and set its innerHTML to the start_time and end_time
        let time = document.createElement('time');
        time.innerHTML = `${datum.start_time} - ${datum.end_time}`;

        // Create new p element and set its innerHTML to the worked hours
        let p = document.createElement('p');
        p.innerHTML = `${datum.worked_hours} hours`;

        // Append the time and p elements to the li element
        li.appendChild(time);
        li.appendChild(p);

        // Append the li element to the ul element
        document.querySelector('.timeline-section ul').appendChild(li);
    });
</script>

</html>