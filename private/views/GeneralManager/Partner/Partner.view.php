<?php $this->view('include/head') ?>

<head>
    <link href="<?= ROOT ?>/css/popup.css" rel="stylesheet">
</head>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="layout__content">

            <div class="grid grid--no-spacing dashboard">

                <div
                    >
                    <div class="cell cell--6-col-desktop cell--6-col-tablet cell--12-col-phone">
                        <div class="card shadow--2dp" style="background-color: #444;">
                            <div class="card__title">
                                <h2 class="card__title-text">Simple Line Chart 1</h2>
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
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div id="buttonToggle" class="buttonToggle">
                                <button onclick="loadComponent('info')" id="info_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin: 4px 10px 4px 4px;">Info</Button>
                                <button onclick="loadComponent('ArticlesTable')" id="ArticlesTable_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                    style="margin: 4px 10px 4px 4px;">Articals</Button>
                                <button onclick="loadComponent('EventsTable')" id ="EventsTable_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                    style="margin: 4px 10px 4px 4px;">Events</Button>
                                <button onclick="loadComponent('ComplaintsTable')" id="ComplaintsTable_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                    style="margin: 4px 10px 4px 4px;">Complaints</button>
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
                                    >
                                    <div
                                        class="cell cell--6-col-desktop cell--6-col-tablet cell--12-col-phone">
                                        <div class="card shadow--2dp">
                                            <div class="card__title">
                                                <div class="card__title-text">Add A Remark</div>
                                                <button data-close-button class="close-button" type="button"
                                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                                    style="border-radius: 99px; margin-left: auto;">&times;</button>
                                            </div>
                                            <div class="textfield js-textfield textfield--floating-label is-upgraded"
                                                data-upgraded=",MaterialTextfield" style="margin: 10px 20px 10px 20px">
                                                <div>
                                                    <textarea class="textfield__input" type="text" rows="3"
                                                        name="Note" spellcheck="false"></textarea>
                                                    <input name="Partner_ID" value=<?= $partner->Partner_ID ?> hidden>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="button js-button button--raised js-ripple-effect button--colored-teal"
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
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/popup.js"></script>
</body>

</html>