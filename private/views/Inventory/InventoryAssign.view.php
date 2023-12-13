<div class="mdl-card__supporting-text no-padding" id="InventoryAssign" style="display:none">
    <section id="content">
        <div style="display: flex">
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">PROFILE INFO</h5>
                    </div>
                    <form class="form form--basic" action="<?= ROOT ?>/Inventory/Assign" method="POST">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--1-col-phone">
                                <div class="profile-image color--smooth-gray profile-image--round">
                                    <img src="" id="CollecterImage">
                                </div>
                            </div>
                            <div
                                class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="BatchID"
                                        id="AssignBatchID" disabled>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="Name"
                                        id="CollecterName" disabled>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="VehicleNumber"
                                        id="VehicleNumber" disabled>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="Area" id="Area"
                                        disabled>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="Status" id="Status"
                                        disabled>
                                </div>
                                <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                    style="border-radius: 99px;" id="Assignbutton" disabled>Assign</button>
                                <button style="background-color: #4c504e; border-radius: 20px; margin-left: 10px;"
                                    onclick="getCollecter()" type="button"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right">
                                    Scan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <video id="preview" style="width: 23%; margin-left:20vw"></video>
        </div>
    </section>
</div>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    var ROOT = "<?= ROOT ?>";
</script>
<script src="<?= ROOT ?>/js/AssignInventory.js"></script>