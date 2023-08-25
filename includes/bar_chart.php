    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="css/bar_chart.css?v=<?php echo time(); ?>">
    </head>

    <div class="chart_container">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        function createBarChart() {
            // Retrieve the data from the PHP function
            var data = <?php echo get_days_and_worked_hours_arrays($pdo, $employee_id); ?>;
            var days = data[0];
            var workedHours = data[1];
            console.log(days);
            console.log(data);

            // Create the bar chart
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: days,
                    datasets: [{
                        label: 'Worked Hours',
                        data: workedHours,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 0.6)',
                        hoverBackgroundColor: '#97EA96',
                        hoverBorderColor: '#97EA96',
                        borderWidth: 1,
                        minBarLength: 2,
                        barThickness: 50,

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                font: {
                                    size: 14
                                }
                            },
                            grid: {
                                display: true
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 12,
                                }
                            },
                            grid: {
                                display: false
                            },
                        }
                    },
                    plugins: {
                        legend: {
                            font: 1,
                            display: true
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: true
                }
            });
        }

        // Call the function to create the bar chart
        createBarChart();
    </script>