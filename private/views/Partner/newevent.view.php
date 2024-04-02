<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header">
        <header class="layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div class="cell cell--7-col-desktop cell--7-col-tablet cell--4-col-phone">
                <div class="card shadow--2dp">
                    <div class="card__title">
                        <h5 class="card__title-text text-color--white">Create New Event</h5>
                    </div>
                    <div class="card__supporting-text">
                        <form class="form form--basic" method="POST">
                            <div class="grid">
                                <div
                                    class="cell cell--6-col-desktop cell--6-col-tablet cell--4-col-phone form__article">
                                    <div class="textfield js-textfield textfield--floating-label full-size">
                                        <input class="textfield__input" type="text" id="floating-last-name" placeholder="Title" name="Event_Title" value="<?= isset($article->Article_Title) ? $article->Article_Title : '' ?>">
                                        <label class="textfield__label" for="floating-last-name"></label>
                                    </div>

                                    <div class="textfield js-textfield textfield--floating-label full-size">
                                        <input class="textfield__input" type="text" id="floating-e-mail" placeholder="Discription" name="Discription" value="<?= isset($article->Description) ? $article->Description : '' ?>">
                                        <label class="textfield__label" for="floating-e-mail"></label>
                                    </div>
                                    <div class="textfield js-textfield textfield--floating-label full-size">
                                        <input class="textfield__input" type="text" id="floating-e-mail" placeholder="Content" name="Data" value="<?= isset($article->Data) ? $article->Data : '' ?>">
                                        <label class="textfield__label" for="floating-e-mail"></label>
                                    </div>
                                    <div class="textfield js-textfield textfield--floating-label full-size">
                                        <input class="textfield__input" type="date" id="floating-e-mail" placeholder="Content" name="Date" value="<?= isset($article->Data) ? $article->Data : '' ?>">
                                        <label class="textfield__label" for="floating-e-mail"></label>
                                    </div>
                                    <div class="card__actions">
                                        <a style="background-color: #4c504e; border-radius: 20px; margin-left: 10px;"
                                            class="button js-button button--raised js-ripple-effect button--colored-light-blue pull-right"
                                            href=target="_blank">
                                            upload
                                        </a>

                                    </div>
                                    <div class="textfield js-textfield textfield--floating-label full-size">
                                        <input class="textfield__input" type="text" id="password" placeholder="Password">
                                        <label class="textfield__label" for="password"></label>
                                    </div>
                                    <div class="card__actions">
                                        <a style="margin-left: 240px; background-color: #16C784; border-radius: 20px; margin-left: 10px;">
                                            <button type="submit" type=style="border-radius: 20px;" class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
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