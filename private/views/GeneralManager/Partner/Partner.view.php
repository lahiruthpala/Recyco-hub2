<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="mdl-layout__content">

            <div class="mdl-grid mdl-grid--no-spacing dashboard">

                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone"
                        style="height: 600px">
                        <div class="mdl-card mdl-shadow--2dp line-chart">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Simple Line Chart 1</h2>
                            </div>
                            <canvas id="myChart" width="100%" height="100%"></canvas>
                            <script>
                                console.log("dsvsdvfsdvererve");
                                console.log('<?= $partner->Events ?>');

                                const monthNamesShort = [
                                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                                ];
                                const data = {
                                    labels: Array.from({ length: 24 }, (_, i) => {
                                        var currentDate = new Date();
                                        currentDate.setMonth(currentDate.getMonth() - i);
                                        const year = currentDate.getFullYear().toString().slice(-2);
                                        return `${monthNamesShort[currentDate.getMonth()]} ${year}`;
                                    }).reverse(),
                                    datasets: [
                                        {
                                            label: 'Events',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1,
                                            data: <?= json_encode(explode(',', $partner->Events), JSON_NUMERIC_CHECK) ?>,
                                        },
                                        {
                                            label: 'Articles',
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            borderWidth: 1,
                                            data: <?= json_encode(explode(',', $partner->Articles), JSON_NUMERIC_CHECK) ?>,
                                        },
                                        {
                                            label: 'Response Rate',
                                            fill: false,
                                            borderColor: 'rgba(255, 206, 86, 1)',
                                            borderWidth: 2,
                                            yAxisID: 'y-axis-2',
                                            type: 'line',
                                            data: <?= json_encode(explode(',', $partner->Articles), JSON_NUMERIC_CHECK) ?>,
                                        },
                                    ],
                                };

                                const options = {
                                    scales: {
                                        yAxes: [
                                            {
                                                type: 'linear',
                                                display: true,
                                                position: 'left',
                                                id: 'y-axis-1',
                                                ticks: {
                                                    stepSize: 30, // Adjust the interval between y-axis values
                                                    fontColor: 'white', // Change y-axis label color to white
                                                },
                                            },
                                            {
                                                type: 'linear',
                                                display: true,
                                                position: 'right',
                                                id: 'y-axis-2',
                                                gridLines: {
                                                    drawOnArea: false,
                                                },
                                                ticks: {
                                                    stepSize: 30, // Adjust the interval between y-axis values
                                                    fontColor: 'white', // Change y-axis label color to white
                                                },
                                            },
                                        ],
                                    },
                                    legend: {
                                        labels: {
                                            fontColor: 'white',
                                        },
                                    },
                                };

                                const ctx = document.getElementById('myChart').getContext('2d');
                                Chart.defaults.color = 'white';
                                const myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: data,
                                    options: options,
                                });
                            </script>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button onclick="loadComponent('info')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Info</Button>
                                <button onclick="loadComponent('Articals')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Articals</Button>
                                <button onclick="loadComponent('Events')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Events</Button>
                                <button onclick="loadComponent('Complaints')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;">Complaints</button>
                            </div>
                            <div class="mdl-card__title">
                                <h1 id="tableTital" class="mdl-card__title-text">Info</h1>
                            </div>
                            <?php
                                $this->view("GeneralManager/Partner/info", ['partner' => $partner, 'remarks'=>$remarks, 'contact'=>$contact]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </main>

    </div>

    <!-- inject:js -->
    <script src="<?= ROOT ?>/js/d3.min.js"></script>
    <script src="<?= ROOT ?>/js/getmdl-select.min.js"></script>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/nv.d3.min.js"></script>
    <script src="<?= ROOT ?>/js/layout/layout.min.js"></script>
    <script src="<?= ROOT ?>/js/scroll/scroll.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/discreteBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/linePlusBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/stackedBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/employer-form/employer-form.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/line-chart/line-charts-nvd3.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/map/maps.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/table/table.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/todo/todo.min.js"></script>
    <script>
        function loadComponent(component) {
            console.log(component);
            document.getElementById('tableTital').innerHTML = component.substring(component.lastIndexOf("/") + 1).replace(/([a-z0-9])([A-Z])/g, '$1 $2');
            fetch('Table/' + component)
                .thena(response => response.text())
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <script>
        function loadComponent(component) {
            console.log(component);
            fetch(component)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <script>
        function loadComponent2(component) {
            console.log(component);
            fetch('Table/' + component)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('content').innerHTML = html;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <!-- endinject -->
</body>

</html>