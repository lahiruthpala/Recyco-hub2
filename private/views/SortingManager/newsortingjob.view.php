<div class="mdl-card__supporting-text no-padding" id="newsortingjobs" style="display:none">
    <form class="form form--basic" method="POST" action="<?= ROOT ?>/SortingManager/CreateSortingJobs"
        id="newSortingJob" onsubmit="NewSortingJob(event)">
        <div class="mdl-grid">
            <div style="margin:5%; margin-bottom: 5%;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <div>
                        <?php if (count($errors) > 0): ?>
                            <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                                <strong>Errors:</strong>
                                <?php foreach ($errors as $error): ?>
                                    <br>
                                    <?= $error ?>
                                <?php endforeach; ?>
                                <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </span>
                            </div>
                        <?php endif; ?>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <input class="mdl-textfield__input" type="text" id="floating-last-name"
                                placeholder="Assign Line" name="Line_No">
                            <label class="mdl-textfield__label" for="floating-last-name"></label>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <input class="mdl-textfield__input" type="text" placeholder="Description"
                                name="Description">
                            <label class="mdl-textfield__label" for="floating-e-mail"></label>
                        </div>
                        <div >
                            <button style="background-color: #4c504e; border-radius: 20px; margin-left: 10px;"
                                onclick="Addinventory()" type="button"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right">
                                Add Inventory
                            </button>
                            <button type="submit" style="border-radius: 20px; margin-top:0"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green pull-right">
                                    Create</button>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size" style="display:none">
                            <input class="mdl-textfield__input" type="password" id="password" placeholder="Password"
                                name="pwd">
                            <label class="mdl-textfield__label" for="password"></label>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <video id="preview" style="width: 23%;"></video>
            <div style="width: 30%; height: 30%; margin: 5%;"
                class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp trending">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Inventory</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <ul class="mdl-list">
                            <input id="inventorylist" name="inventory" value="" hidden>
                            <li class="mdl-list__item" id="inventory">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        var ROOT = "<?=ROOT?>";
    </script>
    <script src="<?=ROOT?>/js/QrScaner.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?=ROOT?>/js/NewSortingJob.js"></script>
</div >