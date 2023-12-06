<div class="mdl-card__supporting-text no-padding" id="InventoryAssign" style="display:none">
    <section id="content">
        <div style="display: flex">
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">PROFILE INFO</h5>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <form class="form form--basic" action="<?= ROOT ?>/Inventory/Assign" method="POST">
                            <div class="mdl-grid">
                                <div
                                    class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--1-col-phone">
                                    <div class="profile-image color--smooth-gray profile-image--round">
                                        <img src="images/Bobby.PNG">
                                    </div>
                                </div>
                                <div
                                    class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" value="" name="BatchID"
                                            id="profile-floating-first-name" disabled>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" value="" name="Name"
                                            id="profile-floating-first-name" disabled>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" value="" name="VehicleNumber"
                                            id="profile-floating-last-name" disabled>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" value="" name="Area"
                                            id="profile-floating-e-mail" disabled>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                        <input class="mdl-textfield__input" type="text" value="" name="Status"
                                            id="profile-floating-e-mail" disabled>
                                    </div>
                                    <button
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                        style="border-radius: 99px;">Assign</button>
                                    <button style="background-color: #4c504e; border-radius: 20px; margin-left: 10px;"
                                        onclick="Addinventory()" type="button"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right">
                                        Scan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <video id="preview" style="width: 23%; margin-left:20vw"></video>
        </div>
    </section>
</div>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src="<?= ROOT ?>/js/QrScaner.js"></script>