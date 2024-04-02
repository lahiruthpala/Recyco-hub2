<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header">
        <header class="layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <div class="card shadow--2dp">
                    <div id="buttonToggle" class="buttonToggle">
                        <button onclick="window.location.href = '<?= ROOT ?>/Partner/Articles'"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            style="margin: 4px 10px 4px 4px;">Upcomming Events</Button>
                        <button onclick="window.location.href = '<?= ROOT ?>/Partner/Articles'"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            style="margin: 4px 10px 4px 4px;">OnGoing Events</Button>
                        <button id="stock" onclick="window.location.href = '<?= ROOT ?>/Partner/addnew'"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            style="margin: 4px 10px 4px 4px;"> Finished Events</Button>
                        <button id="stock" onclick="window.location.href = '<?= ROOT ?>/Partner/addnew'"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            style="margin: 4px 10px 4px 4px;"> + New Events</Button>
                    </div>
                    <div style="display: flex;flex-direction: row;flex-wrap: wrap;justify-content: center;">
                        <?php
                        if (is_array($articles) && !empty($articles)) {
                            foreach ($articles as $article) {
                                // Your table row generation code here
                                ?>
                                <div class="card shadow--2dp"
                                    style="background-color: #444;max-height: 500px;max-width: 400px;margin: 16px;">
                                    <div class="card__title">
                                        <h2 class="card__title-text">
                                            <?= $article->Article_Title ?>
                                        </h2>
                                    </div>
                                    <canvas id="<?= $article->Article_ID ?>_img"></canvas>
                                    <script>
                                        var img = new Image();
                                        img.onload = function () {
                                            var canvas = document.getElementById('<?= $article->Article_ID ?>_img');
                                            var ctx = canvas.getContext('2d');
                                            canvas.width = 1200;
                                            canvas.height = 630;
                                            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                                            var resizedImg = canvas.toDataURL('image/jpeg', 1.0);
                                            // Use the resizedImg as needed
                                        };
                                        img.onerror = function () {
                                            console.error('Failed to load image: <?= ROOT ?>/images/Article/<?= $article->Article_ID ?>.jpg');
                                        };
                                        img.src = "<?= ROOT ?>/images/Article/<?= $article->Article_ID ?>.jpg";
                                    </script>
                                    <div class="card__supporting-text card--expand">
                                        <?= $article->Description?><br><br>
                                    </div>
                                    <div class="card__actions">
                                        <a style="background-color: #16C784; border-radius: 20px; margin-left: 10px;"
                                            class="button js-button button--raised js-ripple-effect button--colored-green"
                                            href="<?= ROOT ?>/Partner/EditArticle/<?= $article->Article_ID ?>">
                                            Edit
                                        </a>
                                        <a style="background-color: #16C784; border-radius: 20px;"
                                            class="button js-button button--raised js-ripple-effect button--colored-green"
                                            href="<?= ROOT ?>/Partner/ArticleDelete/<?= $article->Article_ID ?>">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            // If $rows is not an array or is empty
                            echo "No data available.";
                        }
                        ?>
                    </div>
                </div>
            </div>
    </div>
    </main>

    </div>

    <!-- inject:js -->
    <script src="js/d3.min.js"></script>
    <script src="js/getmdl-select.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/nv.d3.min.js"></script>
    <script src="js/layout/layout.min.js"></script>
    <script src="js/scroll/scroll.min.js"></script>
    <script src="js/widgets/charts/discreteBarChart.min.js"></script>
    <script src="js/widgets/charts/linePlusBarChart.min.js"></script>
    <script src="js/widgets/charts/stackedBarChart.min.js"></script>
    <script src="js/widgets/employer-form/employer-form.min.js"></script>
    <script src="js/widgets/line-chart/line-charts-nvd3.min.js"></script>
    <script src="js/widgets/map/maps.min.js"></script>
    <script src="js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
    <script src="js/widgets/table/table.min.js"></script>
    <script src="js/widgets/todo/todo.min.js"></script>
    <!-- endinject -->

</body>

</html>