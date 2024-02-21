<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/partnerheader') ?>
        </header>

        <main class="layout__content">

            <div class="grid grid--no-spacing dashboard">

                <div
                    >

                    <!-- Pie chart-->
                    <div style="width: 100%; display: flex; flex-direction: row;">
                        <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone">
                            <div class="card shadow--2dp pie-chart">
                                <div class="card__title">
                                    <h2 class="card__title-text">Sorted Items</h2>
                                </div>
                                <div class="card__supporting-text">
                                    <div class="pie-chart__container">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone">
                            <div class="card shadow--2dp pie-chart">
                                <div class="card__title">
                                    <h2 class="card__title-text">Current Utilization</h2>
                                </div>
                                <div class="card__supporting-text">
                                    <div class="pie-chart__container">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone">
                            <div class="card shadow--2dp pie-chart">
                                <div class="card__title">
                                    <h2 class="card__title-text">Sorting Efficiency</h2>
                                </div>
                                <div class="card__supporting-text">
                                    <div class="pie-chart__container">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div class="layout__header-row">
                                <button id="stock" onclick="loadComponent('CreateSortingJobs')"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">New Sorting Job</Button>
                                <button onclick="loadComponent('PendingSortingJobs')"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Pending Sorting Jobs</Button>
                                <button onclick="loadComponent('FinishedSortingJobs')"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Finished Sorting Jobs</Button>
                            </div>
                            <div class="card__title">
                                <h1 class="card__title-text">Pending Inventory</h1>
                            </div>
                            <div class="card__supporting-text no-padding">
                                <section id="content"></section>
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
    <script src="<?= ROOT ?>/js/sortingManage.js"></script>
    <script>
        function loadComponent(component) {
            document.getElementById('tableTital').innerHTML = component.replace(/([a-z0-9])([A-Z])/g, '$1 $2');
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