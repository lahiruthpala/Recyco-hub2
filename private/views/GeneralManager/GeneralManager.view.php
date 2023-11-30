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

                    <!-- Pie chart-->
                    <div style="width: 100%; display: flex; flex-direction: row;">
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp pie-chart">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Inventory Breakdown</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp pie-chart">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Warehouse Capacity</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp pie-chart">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Sorting rate</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button onclick="loadComponent('Table/InventoryBatch')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Pending Inventory</Button>
                                <button onclick="loadComponent('Table/RawInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Raw Inventory</Button>
                                <button onclick="loadComponent('Table/SortedInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Sorted Inventory</Button>
                                <button onclick="loadComponent('GeneralManager/Generate')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;"> Add New Stock</button>
                            </div>
                            <div class="mdl-card__title">
                                <h1 id="tableTital" class="mdl-card__title-text">Pending Inventory</h1>
                            </div>
                            <div class="mdl-card__supporting-text no-padding">
                                <section id="content"></section>
                            </div>
                            <script>
                                // Fetch the component separately and load it into the container
                                fetch('Table/InventoryBatch')
                                    .then(response => response.text())
                                    .then(html => {
                                        document.getElementById('content').innerHTML = html;
                                    })
                                    .catch(error => console.error('Error:', error));
                            </script>
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