<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="srhdev/img/favicon.ico" type="image/x-icon">
    <title>
        Srht Developments | Stats
    </title>   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #222; 
            color: #fff; 
        }

        #performanceChartContainer {
            width: 80%;
            margin: 20px auto;
            background-color: #333; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        canvas {
            max-width: 100%;
        }
    </style>
</head>
<body>


<div id="performanceChartContainer">
    <canvas id="performanceChart"></canvas>
</div>

<script>
    
    var ctx = document.getElementById('performanceChart').getContext('2d');
    var performanceChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'İşlem Süresi (ms)',
                data: [],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            scales: {
                x: [{
                    type: 'linear',
                    position: 'bottom'
                }]
            }
        }
    });


    function updatePerformanceChart() {
       
        var end_time = new Date().getTime();

   
        var start_time = performanceChart.data.labels.length === 0
            ? end_time
            : performanceChart.data.labels[performanceChart.data.labels.length - 1];

        var total_time = end_time - start_time;

        var maxDataPoints = 10;

        if (performanceChart.data.labels.length >= maxDataPoints) {
            performanceChart.data.labels.shift();
            performanceChart.data.datasets[0].data.shift();
        }

        performanceChart.data.labels.push('');
        performanceChart.data.datasets[0].data.push(total_time);

        performanceChart.update();
    }

    // Her saniyede bir grafik güncelle
    setInterval(updatePerformanceChart, 1000); // 1000 milisaniye (1 saniye) interval
</script>

</body>
</html>
