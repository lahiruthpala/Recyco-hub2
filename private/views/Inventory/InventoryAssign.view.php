<div class="card__supporting-text no-padding" id="InventoryAssign" style="display:none">
    <section id="content">
        <div style="display: flex;justify-content: space-between;">
            <div class="cell cell--5-col-desktop cell--5-col-tablet cell--4-col-phone" style="margin-left: 4.5vw;">
                <h6 class="card__title-text" id="tableTitle" style="color: black;margin: 15px;font-size: 15px;">
                    PROFILE INFO
                </h6>
                <div class="card shadow--2dp" style="border: 1px solid green;height: auto;">
                    <form class="form form--basic" action="<?= ROOT ?>/Inventory/Assign" method="POST"
                        style="margin: 20px 2px 20px 30px;">
                        <div style="display: flex;">
                            <div
                                style="display: flex;justify-content: center;align-items: center;padding-right: 30px;border-right: 2px solid var(--smoke-color);">
                                <div class="profile-image color--smooth-gray profile-image--round">
                                    <img src="<?=ROOT?>/images/ProfilePicTemplate.jpg" style="max-width: 100%;" id="CollecterImage">
                                </div>
                            </div>
                            <div style="padding-left: 30px;display: flex;flex-direction: column;">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" value="" name="BatchID"
                                        id="AssignBatchID" readonly>
                                </div>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" value="" name="Name"
                                        placeholder="Collector Name" id="CollecterName" readonly>
                                </div>
                                <input class="textfield__input" type="text" value="" name="Collector_ID"
                                    placeholder="Collector Name" id="VerifiedCollectorID" readonly hidden>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" value="" name="VehicleNumber"
                                        placeholder="Vehicle NUmber" id="VehicleNumber" readonly>
                                </div>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" value="" name="Area" id="Area"
                                        placeholder="Assign Area" readonly>
                                </div>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" value="" name="Status" id="Status"
                                        placeholder="Status" readonly>
                                </div>
                                <button type="submit"
                                    class="button js-button button--raised js-ripple-effect button--colored-teal"
                                    style="border-radius: 99px;margin-left: auto;background-color: #16896E;" id="Assignbutton" readonly>Assign</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="margin-right: 4.5vw;">
                <h6 class="card__title-text" id="tableTitle" style="color: black;margin: 15px;font-size: 15px;">
                    Collector ID
                </h6>
                <div>
                    <div class="card shadow--2dp" style="height: auto;width: 376px;border: 1px solid green;">
                        <form class="form form--basic" style="margin: 20px 2px 20px 30px;">
                            <div>
                                <div class="textfield js-textfield textfield--floating-label full-size"
                                    style="padding: 30px 0 0 0;">
                                    <input class="textfield__input" type="text" value="" name="Name"
                                        placeholder="Collector Name" id="CollectorID" style="width: 70%;">
                                    <button type="button" onclick="collectermanual()"
                                        class="button js-button button--raised js-ripple-effect button--colored-light-blue pull-right"
                                        style="border-radius: 99px;margin-right: 1.5vw; bottom: 35px; position: relative;">Get
                                        Details</button>
                                </div>
                            </div>
                        </form>
                        <h6 style="margin-left:50%; margin-top:0;">OR</h6>
                        <button style="background-color: #4c504e; border-radius: 20px; margin: 20px;"
                            onclick="getCollecter()" type="button"
                            class="button js-button button--raised js-ripple-effect button--colored-light-blue pull-right">
                            Scan
                        </button>
                        <video id="preview" style="padding: 40px;"></video>
                    </div>
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