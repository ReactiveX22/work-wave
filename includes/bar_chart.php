    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="css/bar_chart.css?v=<?php echo time(); ?>">
    </head>

    <div class="chart_container">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        function createPieChart() {
            // Provide data for the pie chart
            var incompleteTasks = 10;
            var completedTasks = 20;

            // Create the pie chart
            var ctx = document.getElementById('myChart').getContext('2d');
            var data = [{
                    label: 'Completed',
                    data: completedTasks
                },
                {
                    label: 'Incomplete',
                    data: incompleteTasks
                }
            ];
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.map(d => d.label),
                    datasets: [{
                        data: data.map(d => d.data),
                        backgroundColor: ['#005C53', '#DBF227'],
                        hoverBackgroundColor: ['#AADEA7', '#D6D58E'],
                        borderWidth: .1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                font: {
                                    size: 10 // Set the font size in pixels
                                },
                            }
                        }
                    }
                }
            });
        }

        // Call the function to create the pie chart
        createPieChart();
    </script>