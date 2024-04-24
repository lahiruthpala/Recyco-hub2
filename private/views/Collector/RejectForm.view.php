<?php
global $activeTab;
$activeTab = 3;
$this->view('include/head');
?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/CollectorHeader') ?>
        </header>
        <main class="layout__content">
            <div class="grid grid--no-spacing dashboard">
                <div style="width:100%">
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div class="card__supporting-text no-padding"
                                style="margin: 20px; width: 94.7%;color:black;border: solid 1px green;border-radius: 15px;">
                                <form method="POST"
                                    action="<?= ROOT ?>/collector/store/<?= $data[0]->Pickup_ID ?? '' ?>/Rejected/<?= $data[0]->Job_ID ?? '' ?>">
                                    <div class="form__article">
                                        <div style="display: flex;justify-content: space-between;">
                                            <div style="margin-left: 30px">
                                                <div style="display: flex; ">
                                                    <h6>Customer Name</h6>
                                                    <h6 style="margin-left:50px;">
                                                        <input type="text" placeholder="Enter the Name" id="Name"
                                                            name="Name" class="textfield__input"
                                                            value="<?= $data[0]->FirstName . " " . $data[0]->LastName ?>"
                                                            disabled>
                                                        <label class="textfield__error" id="NameError"
                                                            for="Name"></label>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div style="margin-right:150px">
                                                <div style="margin-left: 30px">
                                                    <div style="display: flex;">
                                                        <h6>Waste Type</h6>
                                                        <h6 style="margin-left:39px;margin-top: 16px;">
                                                            <div class="textfield js-textfield textfield--floating-label get-select full-size dropdown2"
                                                                style="display: flex; padding:0">
                                                                <input class="textfield__input" type="text"
                                                                    style="padding-left: 16px;width: 112px;"
                                                                    value="<?= $data[0]->waste_type ?>" id="waste_type"
                                                                    name="waste_type" readonly tabIndex="-1" />
                                                                <ul class="menu menu--bottom-left js-menu dark_dropdown"
                                                                    for="waste_type">
                                                                    <?php foreach ($waste as $w): ?>
                                                                        <li class="menu__item"
                                                                            onclick="SetForm('waste_type','<?= $w->Name ?>')">
                                                                            <?= $w->Name ?>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>

                                                                <label for="Repeat">
                                                                    <i
                                                                        class="icon-toggle__label material-icons">arrow_drop_down</i>
                                                                </label>
                                                            </div>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display: flex;justify-content: space-between;">
                                            <div style="margin-left: 30px">
                                                <div style="display: flex; ">
                                                    <h6>Weight</h6>
                                                    <h6 style="margin-left:50px;display: flex;">
                                                        <input type="text" placeholder="Enter the Weight" id="Weight"
                                                            name="Weight" class="textfield__input"
                                                            value="<?= $data[0]->Weight ?>"> Kg
                                                        <label class="textfield__error" id="WeightError"
                                                            for="Weight"></label>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div style="margin-right: 100px">
                                                <div style="display: flex; margin-right: 60px;">
                                                    <h6>Note</h6>
                                                    <h6 style="margin-left:50px;">
                                                        <input type="text" placeholder="Enter the Note" id="Note"
                                                            name="Note" class="textfield__input"
                                                            value="<?= $data[0]->Note ?>" readonly>
                                                        <label class="textfield__error" id="NoteError"
                                                            for="Note"></label>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-left: 30px; display: flex;justify-content: space-between;">
                                            <div style="display: flex; ">
                                                <h6>pickup_address</h6>
                                                <h6 style="margin-left:50px;">
                                                    <input type="text" placeholder="Enter the pickup_address"
                                                        id="pickup_address" name="pickup_address"
                                                        class="textfield__input"
                                                        value="<?= $data[0]->pickup_address ?>">
                                                    <label class="textfield__error" id="pickup_addressError"
                                                        for="pickup_address"></label>
                                                </h6>
                                            </div>
                                            <div style="display: flex; margin-right: 105px;" id="InventoryIDdiv">
                                                <h6>Reason to reject</h6>
                                                <h6 style="margin-left:50px;">
                                                    <input type="text" placeholder="Enter reason to reject"
                                                        id="Review" name="Review" class="textfield__input">
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: flex;justify-content: end;margin-right: 74px;">
                                        <button type="submit"
                                            class="button js-button button--raised js-ripple-effect button--colored-green"
                                            style="border-radius: 99px;background-color: green;color: white;">Reject</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php $this->view('include/footer') ?>