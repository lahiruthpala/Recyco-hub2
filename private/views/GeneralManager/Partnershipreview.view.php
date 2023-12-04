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
                    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Istanbul</h2>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <small>City in Turkey</small>
                                Istanbul is a major city in Turkey that straddles Europe and Asia across the Bosphorus
                                Strait.
                                Its Old City reflects cultural influences of the many empires that once ruled here.
                                In the Sultanahmet district, the open-air, Roman-era Hippodrome was for centuries the
                                site of chariot races,
                                and Egyptian obelisks also remain.
                                The iconic Byzantine Hagia Sophia features a soaring 6th-century dome and rare Christian
                                mosaics.
                                <br><br>
                                <b>Weather:</b> 12°C, Wind S at 13 km/h, 71% Humidity
                                <br>
                                <b>Local time:</b> Friday 4:00 PM
                                <br>
                                <b>Population:</b> 14.8 million (Dec 31, 2016)
                            </div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button onclick="loadComponent('partnershipTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Partnerships</Button>
                                <button onclick="loadComponent('Table/RawInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Events</Button>
                                <button onclick="loadComponent('Table/RawInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Articals</Button>
                                <button onclick="loadComponent('Table/SortedInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Complaints</Button>
                                <button onclick="loadComponent('GeneralManager/Generate')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;">New Partnerships</button>
                            </div>
                            <div class="mdl-card__title">
                                <h1 id="tableTitle" class="mdl-card__title-text">Partnerships</h1>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"
                                    style="margin-left: 50%; padding:0;">
                                    <label class="mdl-button mdl-js-button mdl-button--icon" for="search1"
                                        style="top:0px;">
                                        <i class="material-icons">search</i>
                                    </label>

                                    <div class="mdl-textfield__expandable-holder">
                                        <input class="mdl-textfield__input" type="text" id="search1" />
                                        <label class="mdl-textfield__label" for="search1">Enter your query...</label>
                                    </div>
                                </div>
                                <button onclick="loadComponent('GeneralManager/Generate')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;"><i
                                        class="material-icons">keyboard_arrow_left</i></button>
                                <button onclick="loadComponent('GeneralManager/Generate')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;"><i
                                        class="material-icons">keyboard_arrow_right</i></button>
                            </div>


                            <div class="mdl-card__supporting-text no-padding">
                                <section id="content">
                                <table class="mdl-data-table mdl-js-data-table"
                                        style="width: 100%; table-layout: fixed;">
                                        <thead>
                                            <tr>
                                                <th class="mdl-data-table__cell--non-numeric">Partnership ID</th>
                                                <th class="mdl-data-table__cell--non-numeric">Company Name</th>
                                                <th class="mdl-data-table__cell--non-numeric"
                                                    style="padding-left: 70px">Events</th>
                                                <th class="mdl-data-table__cell--non-numeric"
                                                    style="padding-left: 70px">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (is_array($rows) && !empty($rows)) {
                                                foreach ($rows as $row) {
                                                    $array = array_map('intval', explode(',', $row->Events));
                                                    $result = '[' . implode(',', $array) . ']';
                                                    ?>
                                                    <tr>
                                                        <td class="mdl-data-table__cell--non-numeric">
                                                            <?= $row->Partner_ID ?? '' ?>
                                                        </td>
                                                        <td class="mdl-data-table__cell--non-numeric">
                                                            <?= $row->Company_Name ?? '' ?>
                                                        </td>
                                                        <td class="mdl-data-table__cell--non-numeric">
                                                            <canvas class="miniChart" width="130" height="40"
                                                                data-chart-data="<?= $result ?>"></canvas>
                                                        </td>
                                                        <td class="mdl-data-table__cell--non-numeric"
                                                            style="padding-left: 70px;">
                                                            <span
                                                                class="label label--mini <?php echo $row->Status === 'Active' ? 'color--green' : 'color--red'; ?>">
                                                                <?= $row->Status ?? '' ?>
                                                            </span>
                                                        </td>

                                                        <td class="mdl-data-table__cell--non-numeric">
                                                            <form action="<?= ROOT ?>/GeneralManager/partner" method="POST">
                                                                <!-- Replace 'your_id_value' with the actual ID -->
                                                                <input type="hidden" name="id" value="<?= $row->Partner_ID ?? '' ?>">
                                                                <button type="submit"
                                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                                                    style="border-radius: 99px;">View</button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                // If $rows is not an array or is empty
                                                echo "No data available.";
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
                                                    labels: Array.from({ length: 10 }, (_, index) => ``),
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
                                </section>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

                const partnerScript =document.createElement("script");
                partnerScript.setAttribute("src","<?= ROOT ?>/js/chart.js");
                document.body.appendChild(partnerScript);
        }
    </script>
    <!-- endinject -->
</body>

</html>