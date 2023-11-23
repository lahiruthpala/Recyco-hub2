<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Table with Mini Charts</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <!-- HTML Table -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Activity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="companyTableBody">
            <?php
            // Sample data for companies
            $companies = [
                ['id' => 1, 'name' => 'Company A', 'activity' => 'Activity 1', 'status' => 'Complete'],
                ['id' => 2, 'name' => 'Company B', 'activity' => 'Activity 2', 'status' => 'In Progress'],
                ['id' => 3, 'name' => 'Company C', 'activity' => 'Activity 3', 'status' => 'Complete'],
                ['id' => 4, 'name' => 'Company D', 'activity' => 'Activity 4', 'status' => 'In Progress'],
                ['id' => 5, 'name' => 'Company E', 'activity' => 'Activity 5', 'status' => 'Complete']
            ];

            // Function to generate random data for each mini chart
            function generateRandomData()
            {
                return json_encode(array_fill(0, 10, rand(10, 50)));
            }

            foreach ($companies as $company) {
                // Generate random data for the mini chart
                $randomData = generateRandomData();
                var_dump($randomData);
                echo($company['activity'])
                ?>
                <tr>
                    <td>
                        <?= $company['id'] ?>
                    </td>
                    <td>
                        <?= $company['name'] ?>
                    </td>
                    <td>
                        <?= $company['activity'] ?>
                        <!-- Create a canvas element for the mini chart -->
                        <canvas class="miniChart" width="100" height="50" data-chart-data="<?= $randomData ?>"></canvas>
                    </td>
                    <td>
                        <?= $company['status'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <script>
        // Get all mini chart canvas elements
        var miniChartElements = document.getElementsByClassName('miniChart');

        // Loop through each mini chart element and create a mini line chart
        for (var i = 0; i < miniChartElements.length; i++) {
            var miniChartElement = miniChartElements[i];
            var randomData = JSON.parse(miniChartElement.getAttribute('data-chart-data'));

            // Create a mini line chart for the current company
            new Chart(miniChartElement.getContext('2d'), {
                type: 'line',
                data: {
                    labels: Array.from({ length: 10 }, (_, index) => `Point ${index + 1}`),
                    datasets: [{
                        borderColor: 'rgb(75, 192, 192)',
                        data: randomData,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                        title: {
                            display: false,
                        }
                    }
                }
            });
        }
    </script>

</body>

</html>