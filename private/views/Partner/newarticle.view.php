<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="mdl-layout__content">
            <div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--7-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">Create New Article</h5>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <form class="form form--basic" method="POST">
                            <div class="mdl-grid">
                                <div
                                    class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" id="floating-last-name" placeholder="Title" name="Artical_Title" value="<?= isset($article->Artical_Title) ? $article->Artical_Title : '' ?>">
                                        <label class="mdl-textfield__label" for="floating-last-name"></label>
                                    </div>

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" id="floating-e-mail" placeholder="Discription" name="Discription" value="<?= isset($article->Discription) ? $article->Discription : '' ?>">
                                        <label class="mdl-textfield__label" for="floating-e-mail"></label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" id="floating-e-mail" placeholder="Content" name="Data" value="<?= isset($article->Data) ? $article->Data : '' ?>">
                                        <label class="mdl-textfield__label" for="floating-e-mail"></label>
                                    </div>
                                    <div class="mdl-card__actions">
                                        <a style="background-color: #4c504e; border-radius: 20px; margin-left: 10px;"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right"
                                            href=target="_blank">
                                            upload
                                        </a>

                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" id="password" placeholder="Password">
                                        <label class="mdl-textfield__label" for="password"></label>
                                    </div>
                                    <div class="mdl-card__actions">
                                        <a style="margin-left: 240px; background-color: #16C784; border-radius: 20px; margin-left: 10px;">
                                            <button type="submit" type=style="border-radius: 20px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green pull-right">
                                            Create</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </form>
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