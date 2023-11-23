<div style="display: flex;">
    <form style="width: 30VW; margin-left:2VW;" action="<?= ROOT ?>/GeneralManager/Generate" method="POST">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Create new inventory ID</h5>
            </div>
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
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size is-upgraded"
                        data-upgraded=",MaterialTextfield">
                        <input class="mdl-textfield__input" type="text" id="floating-last-name" name="Description"
                            placeholder="Note">
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
        </div>
    </form>
    <div class="mdl-card mdl-shadow--2dp" style="margin-left:2VW">
        <div class="mdl-card__title">
            <h5 class="mdl-card__title-text text-color--white">Currently Automated Generations</h5>
        </div>
        <div class="mdl-card__supporting-text">
            <ul class="mdl-list">
                <?php
                if (is_array($events) && !empty($events)) {
                    $id = 1; // Initialize ID counter
                    foreach ($events as $event) {
                        ?>
                        <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <div class="mdl-list__item-avatar">
                                    <img width="100%" src="<?= ROOT ?>/images/watch_white.svg">
                                </div>
                                <?= $event->Title ?>
                            </span>
                            <span class="mdl-list__item-secondary-action" style="margin-left:3VW">
                                <label style="position: relative; display: inline-block; width: 60px; height: 34px;">
                                    <input type="checkbox" style="opacity: 0; width: 0; height: 0;">
                                    <span
                                        style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; -webkit-transition: .4s; transition: .4s;">
                                        <span
                                            style="position: absolute; content: ''; height: 26px; width: 26px; left: 4px; bottom: 4px; background-color: white; -webkit-transition: .4s; transition: .4s;"></span>
                                    </span>
                                </label>
                            </span>
                        </li>
                        <?php
                        $id++; // Increment ID for the next row
                    }
                } else {
                    echo "No current events";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="mdl-card mdl-shadow--3dp" style="margin-left:2VW">
        <div class="mdl-card__title">
            <h5 class="mdl-card__title-text text-color--white">Create new Automated Generations</h5>
        </div>
        <div class="mdl-card__supporting-text">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size is-upgraded"
                data-upgraded=",MaterialTextfield">
                <input class="mdl-textfield__input" type="text" id="floating-last-name" name="Description"
                    placeholder="Title">
                <label class="mdl-textfield__label" for="floating-last-name"></label>
            </div>
            <div style="display: flex;">
                <div>
                    <label>Size:</label>
                    <input type="number" name="Size" style="background-color: gray; color: white;">
                    <!-- <label class="mdl-textfield__label" for="floating-first-name">First Name</label> -->
                </div>
                <div style="margin-left:5%">
                    <label>Time:</label>
                    <input type="time" name="Size" style="background-color: gray; color: white;">
                    <!-- <label class="mdl-textfield__label" for="floating-first-name">First Name</label> -->
                </div>
                <div style="margin-left:5%">
                    <label for="dropdown">Select an option:</label>
                    <select id="dropdown" name="dropdown">
                        <option value="option1">daily</option>
                        <option value="option2">Weekly</option>
                        <option value="option3">Monthly</option>
                    </select>
                    <!-- <label class="mdl-textfield__label" for="floating-first-name">First Name</label> -->
                </div>
            </div>
            <button id="Generate" type="submit"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                style="border-radius: 99px; margin-left: 1VW; margin-top: 1VW;">SET</Button>
            <div>
                <h3 class="text-color--smooth-gray"></h3>
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