<?php
// need to add here the php logic 
$customers_count = 120;
$routes_count = 8;
$vehicles_count = 15;
$orders_count = 320;


$sales_data = [15000, 18000, 16000, 25000, 22000, 18000, 20000, 23000, 19000, 21000, 24000, 28000, 30000, 32000, 31000];
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('navbars/navbar.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('navbars/sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-4">
                    <?php
                    $stats = [
                        ['title' => 'Customers', 'value' => $customers_count],
                        ['title' => 'Routes', 'value' => $routes_count],
                        ['title' => 'Vehicles', 'value' => $vehicles_count],
                        ['title' => 'Orders', 'value' => $orders_count]
                    ];

                    foreach ($stats as $stat): ?>
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $stat['title']; ?></h6>
                                    <h2 class="card-title"><?php echo number_format($stat['value']); ?></h2>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Sales Overview</h5>
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>

                
                <?php
                $actions = [
                    ['title' => 'Add Customer', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'button' => 'Add Customer'],
                    ['title' => 'Add Order', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'button' => 'Add Order'],
                    ['title' => 'Manage Inventory', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'button' => 'Manage Inventory']
                ];
                ?>
                <div class="row">
                    <?php foreach ($actions as $action): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $action['title']; ?></h5>
                                    <p class="card-text"><?php echo $action['text']; ?></p>
                                    <button class="btn btn-primary"><?php echo $action['button']; ?></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const salesData = {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: 'Monthly Sales',
                data: <?php echo json_encode($sales_data); ?>,
                backgroundColor: '#0d6efd',
                borderColor: '#0d6efd',
                borderWidth: 0,
                barPercentage: 0.8,
                categoryPercentage: 0.7,
            }]
        };

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: salesData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    },
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: value => '$' + value.toLocaleString()
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
