<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <title>Document</title>
</head>

<body>
    <canvas id="myChart" style="width:100%;max-width:500px"></canvas>

</body>
<script>
    var xValues = <?php echo json_encode($hours); ?>;
    var yValues = <?php echo json_encode($worked_hours); ?>;

    var ctx = document.getElementById('myChart').getContext('2d');

    const data = {
        labels: xValues,
        datasets: [{
            label: 'Work Hours',
            data: yValues,
            backgroundColor: '#065fd4',
            color: '#065fd4',
            barThickness: 50,
        }]
    }

    var chartOptions = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Time (Hours)',
                    }

                },
                y: {
                    title: {
                        display: true,
                        text: 'Worked Hours',
                    }
                }
            }
        }
    };

    var myChart = new Chart(ctx, chartOptions);
</script>

</html>