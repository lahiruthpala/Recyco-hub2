<div class="mdl-card__supporting-text no-padding" id="InventoryAssign" style="display:none">
    <section id="content">
        <div style="display: flex">
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone"
                style="margin-left: 4.5vw;">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">PROFILE INFO</h5>
                    </div>
                    <form class="form form--basic" action="<?= ROOT ?>/Inventory/Assign" method="POST"
                        style="margin: 20px 2px 20px 30px;">
                        <div class="mdl-grid">
                            <div
                                style="display: flex;justify-content: center;align-items: center;padding-right: 30px;border-right: 2px solid var(--smoke-color);">
                                <div class="profile-image color--smooth-gray profile-image--round">
                                    <img src="" id="CollecterImage">
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article"
                                style="padding-left: 30px;">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <h6>Batch_ID</h6>
                                    <input class="mdl-textfield__input" type="text" value="" name="BatchID"
                                        id="AssignBatchID" readonly>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="Name"
                                        placeholder="Collector Name" id="CollecterName" readonly>
                                </div>
                                <input class="mdl-textfield__input" type="text" value="" name="Collector_ID"
                                    placeholder="Collector Name" id="VerifiedCollectorID" readonly hidden>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="VehicleNumber"
                                        placeholder="Vehicle NUmber" id="VehicleNumber" readonly>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="Area" id="Area"
                                        placeholder="Assign Area" readonly>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" value="" name="Status" id="Status"
                                        placeholder="Status" readonly>
                                </div>
                                <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                    style="border-radius: 99px;" id="Assignbutton" readonly>Assign</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone"
                style="margin-left: 10vw;">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">Collector ID</h5>
                    </div>
                    <form class="form form--basic" style="margin: 20px 2px 20px 30px;">
                        <div class="mdl-grid">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size"
                                style="padding: 30px 0 0 0;">
                                <input class="mdl-textfield__input" type="text" value="" name="Name"
                                    placeholder="Collector Name" id="CollectorID" style="width: 70%;">
                                <button type="button" onclick="collectermanual()"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right"
                                    style="border-radius: 99px;margin-right: 1.5vw; bottom: 35px; position: relative;">Get
                                    Details</button>
                            </div>
                        </div>
                    </form>
                    <h6 style="margin-left:50%; margin-top:0;">OR</h6>
                    <button style="background-color: #4c504e; border-radius: 20px; margin-left: 10px;"
                        onclick="getCollecter()" type="button"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right">
                        Scan
                    </button>
                    <video id="preview" style="padding: 40px;"></video>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
    var ROOT = "<?= ROOT ?>";
</script>
<script src="<?= ROOT ?>/js/AssignInventory.js"></script>