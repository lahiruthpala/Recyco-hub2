<?php $this->view('include/head') ?>

<head>
    <link href="<?= ROOT ?>/css/popup.css" rel="stylesheet">
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="mdl-layout__content">

            <div class="mdl-grid mdl-grid--no-spacing dashboard">

                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                        <div class="mdl-card mdl-shadow--2dp line-chart">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Simple Line Chart 1</h2>
                            </div>
                            <canvas id="myChart"></canvas>
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
                                <button onclick="loadComponent('ArticlesTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Articals</Button>
                                <button onclick="loadComponent('EventsTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Events</Button>
                                <button onclick="loadComponent('ComplaintsTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;">Complaints</button>
                            </div>
                            <div class="mdl-card__title" style="border-radius: 0;">
                                <h1 id="tableTitle" class="mdl-card__title-text">Info</h1>
                            </div>
                            <?php
                            $this->view("GeneralManager/Partner/info", ['partner' => $partner, 'remarks' => $remarks, 'contact' => $contact]);
                            $this->view('GeneralManager/Partner/Articles', ['rows' => $article]);
                            $this->view('GeneralManager/Partner/Events', ['rows' => $events]);
                            $this->view('GeneralManager/Partner/ComplaintsTable', ['rows' => $complaints]);
                            ?>
                        </div>
                        <form action="<?= ROOT ?>/GeneralManager/partner" method="POST">
                            <div class="modal" id="modal">
                                <div
                                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                                    <div
                                        class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                                        <div class="mdl-card mdl-shadow--2dp">
                                            <div class="mdl-card__title">
                                                <div class="mdl-card__title-text">Add A Remark</div>
                                                <button data-close-button class="close-button" type="button"
                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                                    style="border-radius: 99px; margin-left: auto;">&times;</button>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-upgraded"
                                                data-upgraded=",MaterialTextfield" style="margin: 10px 20px 10px 20px">
                                                <div>
                                                    <textarea class="mdl-textfield__input" type="text" rows="3"
                                                        name="Note" spellcheck="false"></textarea>
                                                    <input name="Partner_ID" value=<?= $partner->Partner_ID ?> hidden>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                                style="border-radius: 99px; margin: 0 20px 20px 20px">
                                                Commit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="overlay"></div>
                    </div>
                </div>
            </div>
    </div>

    </main>

    </div>


    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/popup.js"></script>
</body>

</html>