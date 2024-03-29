<div class="mdl-card__supporting-text no-padding" id="NewSortingJobs" style="display:none">
    <form class="form form--basic" method="POST" action="<?= ROOT ?>/SortingManager/CreateSortingJobs"
        id="newSortingJob" onsubmit="NewSortingJob(event)">
        <div class="mdl-grid">
            <div style="margin:5%; margin-bottom: 5%;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <div>
                        <div style="display: flex;">
                            <h6>Sorting Machine ID</h6>
                            <h6 style="margin-left:3vw;margin-top: 0;margin-bottom: 0;">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select full-size"
                                    style="display: flex;">
                                    <input class="mdl-textfield__input" type="text" id="Machine_ID" name="Machine_ID"
                                        readonly tabIndex="-1" />
                                    <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown"
                                        for="Machine_ID">
                                        <?php
                                        if (is_array($Machines) && !empty($Machines)) {
                                            foreach ($Machines as $Machine) {
                                                ?>
                                                <li class="mdl-menu__item" onclick="SetForm('<?= $Machine->Machine_ID ?>')">
                                                    <?= $Machine->Machine_ID ?></li>
                                                <?php
                                            }
                                        } else {
                                            echo "No Active Machines Available";
                                        }
                                        ?>
                                    </ul>

                                    <label for="Position">
                                        <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </h6>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <input class="mdl-textfield__input" type="text" placeholder="Description"
                                name="Description">
                        </div>
                        <div>
                            <button type="submit" style="border-radius: 20px; margin-top:0"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green pull-right">
                                Create</button>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <video id="preview" style="width: 23%;"></video>
            <div style="width: 30%; height: 30%; margin: 3%;"
                class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp trending" style="margin: 0 0 20px 0;">
                    <div class="mdl-card__title" style="display: flex;justify-content: space-between;">
                        <h2 class="mdl-card__title-text"> Inventories</h2>
                        <button style="background-color: #4c504e; border-radius: 20px; margin-left: auto;"
                            onclick="Addinventory()" type="button"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right">
                            Add Inventory
                        </button>
                    </div>
                    <div class="mdl-card__supporting-text" style="min-height: 110px;">
                        <ul class="mdl-list" id="inventory">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        var ROOT = "<?= ROOT ?>";
    </script>
    <script src="<?= ROOT ?>/js/QrScaner.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= ROOT ?>/js/NewSortingJob.js"></script>
    <script>
        function SetForm(form) {
            document.getElementById("Machine_ID").value = form;
        }

        function setAutomation() {

        }

        function AutomationONOff() {

        }

    </script>
</div>