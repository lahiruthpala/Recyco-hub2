<div style="display: flex;">
    <form style="width: 100%;" action="<?= ROOT ?>/GeneralManager/Generate" method="POST">
        <div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--7-col-tablet mdl-cell--4-col-phone">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h5 class="mdl-card__title-text text-color--white">Create new inventory ID</h5>
                </div>
                <div class="mdl-card__supporting-text">
                    <form class="form form--basic">
                        <div class="mdl-grid">
                            <!-- <?php if (count($errors) > 0): ?>
                                <div style="ml-10px" role="alert">
                                    <strong>Errors:</strong>
                                    <?php foreach ($errors as $error): ?>
                                        <br>
                                        <?= $error ?>
                                    <?php endforeach; ?>
                                    <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <i class="material-icons">close</i>
                                    </span>
                                </div>
                            <?php endif; ?> -->
                            <div
                                class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                                <h3 class="text-color--smooth-gray">Create new inventory ID</h3>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size is-upgraded"
                                    data-upgraded=",MaterialTextfield">
                                    <input class="mdl-textfield__input" type="text" id="floating-last-name"
                                        name="Description" placeholder="Note">
                                    <label class="mdl-textfield__label" for="floating-last-name"></label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size is-upgraded"
                                    data-upgraded=",MaterialTextfield">
                                    <input type="number" name="Size" style="background-color: gray; color: white;">
                                    <!-- <label class="mdl-textfield__label" for="floating-first-name">First Name</label> -->
                                </div>
                                <button id="Generate" type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Generate</Button>
                                <div>
                                    <h3 class="text-color--smooth-gray"></h3>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone mdl-cell--top">

        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h1 class="mdl-card__title-text">Current automated generations</h1>
            </div>
            <div class="mdl-card__supporting-text">
                <ul class="mdl-list">
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <div class="mdl-list__item-avatar">
                                <img width="100%" src="<?= ROOT ?>/images/watch_white.svg">
                            </div>
                            Morning Alocation
                        </span>
                        <span class="mdl-list__item-secondary-action">
                            <label
                                class="mdl-switch switch--colored-light-blue mdl-js-switch mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded is-checked"
                                for="list-switch-1" data-upgraded=",MaterialSwitch,MaterialRipple">
                                <input type="checkbox" id="list-switch-1" class="mdl-switch__input" checked="">
                                <div class="mdl-switch__track"></div>
                                <div class="mdl-switch__thumb"><span class="mdl-switch__focus-helper"></span></div><span
                                    class="mdl-switch__ripple-container mdl-js-ripple-effect mdl-ripple--center"
                                    data-upgraded=",MaterialRipple"><span class="mdl-ripple is-animating"
                                        style="width: 137.765px; height: 137.765px; transform: translate(-50%, -50%) translate(24px, 24px);"></span></span>
                            </label>
                        </span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
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
<script src="<?= ROOT ?>/js/GeneralManager.js"></script>