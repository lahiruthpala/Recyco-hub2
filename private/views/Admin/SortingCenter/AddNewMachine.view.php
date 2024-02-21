<div class="mdl-card__supporting-text no-padding" style="margin: 20px; display: none" id="AddNewMachine">
    <div class="form__article">
        <h3>Machine Info</h3>

        <div class="mdl-grid" style="margin-left: 30px;">
            <div style="margin-left: 30px">
                <div style="display: flex; ">
                    <h6>Machine Type</h6>
                    <h6 style="margin-left:7.5vw;margin-top: 16px;">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select full-size"
                            style="display: flex; padding:0">
                            <input class="mdl-textfield__input" type="text" id="Type" readonly tabIndex="-1" />
                            <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="Type">
                                <li class="mdl-menu__item" onclick="SetForm('Type', 'General Manager')">General Manager</li>
                                <li class="mdl-menu__item" onclick="SetForm('Type','Sorting Manager')">Sorting Manager</li>
                                <li class="mdl-menu__item" onclick="SetForm('Type','Selling Manager')">Selling Manager</li>
                                <li class="mdl-menu__item" onclick="SetForm('Type','Collector')">Collector</li>
                            </ul>

                            <label for="Type">
                                <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                            </label>
                        </div>
                    </h6>
                </div>

                <div style="display: flex;">
                    <h6>Location</h6>
                    <h6 style="margin-left:10vw;margin-top: 16px;">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select full-size"
                            style="display: flex; padding:0">
                            <input class="mdl-textfield__input" type="text" id="Location" readonly tabIndex="-1" />
                            <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="Location">
                                <li class="mdl-menu__item" onclick="SetForm('General Manager')">General Manager</li>
                                <li class="mdl-menu__item" onclick="SetForm('Sorting Manager')">Sorting Manager</li>
                                <li class="mdl-menu__item" onclick="SetForm('Selling Manager')">Selling Manager</li>
                                <li class="mdl-menu__item" onclick="SetForm('Collector')">Collector</li>
                            </ul>

                            <label for="Location">
                                <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                            </label>
                        </div>
                    </h6>
                </div>
            </div>

            <div style="margin-left: 20%;">
                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>Service </h6>
                        <h6 style="margin-left:8vw;margin-top: 0;margin-bottom: 0;">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select full-size"
                                style="display: flex;">
                                <input class="mdl-textfield__input" type="text" id="Service" readonly tabIndex="-1" />
                                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="Service">
                                    <li class="mdl-menu__item" onclick="SetForm('General Manager')">General Manager</li>
                                    <li class="mdl-menu__item" onclick="SetForm('Sorting Manager')">Sorting Manager</li>
                                    <li class="mdl-menu__item" onclick="SetForm('Selling Manager')">Selling Manager</li>
                                    <li class="mdl-menu__item" onclick="SetForm('Collector')">Collector</li>
                                </ul>

                                <label for="Service">
                                    <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                            </div>
                        </h6>
                    </div>
                </div>

                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6></h6>
                        <h6 style="margin-left:7.5vw;">
                            <?= $partner->Status ?? '' ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="GeneralManager" style="display: none" class="userform">

        <div class="form__article">
            <h3>General Manager</h3>
            <div class="mdl-grid" style="margin-left: 30px;">
                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>Email</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Official Mail" id="OfficialMail" name="OfficialMail"
                                class="mdl-textfield__input" style="margin-left: 5.2vw;width: auto;">
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Mail" id="SecondaryMail" name="SecondaryMail"
                                    class="mdl-textfield__input">
                            </h6>
                    </div>

                    <div style="display: flex; ">
                        <h6>Contact Number</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Official Number" id="OfficialNumber" name="OfficialNumber"
                                class="mdl-textfield__input">
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Number" id="SecondaryNumber"
                                    name="SecondaryNumber" class="mdl-textfield__input">
                            </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="SortingManager" style="display: none" class="userform">

        <div class="form__article">
            <h3>Sorting Manager</h3>
            <div class="mdl-grid" style="margin-left: 30px;">
                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>Email</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Official Mail" id="OfficialMail" name="OfficialMail"
                                class="mdl-textfield__input" style="margin-left: 5.2vw;width: auto;">
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Mail" id="SecondaryMail" name="SecondaryMail"
                                    class="mdl-textfield__input">
                            </h6>
                    </div>

                    <div style="display: flex; ">
                        <h6>Contact Number</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Official Number" id="OfficialNumber" name="OfficialNumber"
                                class="mdl-textfield__input">
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Number" id="SecondaryNumber"
                                    name="SecondaryNumber" class="mdl-textfield__input">
                            </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="SalesManager" style="display: none" class="userform">

        <div class="form__article">
            <h3>Sales Manager</h3>
            <div class="mdl-grid" style="margin-left: 30px;">
                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>Email</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Official Mail" id="OfficialMail" name="OfficialMail"
                                class="mdl-textfield__input" style="margin-left: 5.2vw;width: auto;">
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Mail" id="SecondaryMail" name="SecondaryMail"
                                    class="mdl-textfield__input">
                            </h6>
                    </div>

                    <div style="display: flex; ">
                        <h6>Contact Number</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Official Number" id="OfficialNumber" name="OfficialNumber"
                                class="mdl-textfield__input">
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Number" id="SecondaryNumber"
                                    name="SecondaryNumber" class="mdl-textfield__input">
                            </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Collector" style="display: none" class="userform">

        <div class="form__article">
            <h3>Collector</h3>
            <div class="mdl-grid" style="margin-left: 30px;">
                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>Email</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Official Mail" id="OfficialMail" name="OfficialMail"
                                class="mdl-textfield__input" style="margin-left: 5.2vw;width: auto;">
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Mail" id="SecondaryMail" name="SecondaryMail"
                                    class="mdl-textfield__input">
                            </h6>
                    </div>

                    <div style="display: flex; ">
                        <h6>Contact Number</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Official Number" id="OfficialNumber" name="OfficialNumber"
                                class="mdl-textfield__input">
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Number" id="SecondaryNumber"
                                    name="SecondaryNumber" class="mdl-textfield__input">
                            </h6>
                    </div>
                    <div style="display: flex; ">
                        <h6>Address</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Address" id="Address" name="Address"
                                class="mdl-textfield__input" style="width: 50vw;margin-left: 4vw;">
                        </h6>
                    </div>
                    <div style="display: flex; ">
                        <h6>Vehicle Number</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Vehicle Number" id="Vehicle_NO" name="Vehicle_NO"
                                class="mdl-textfield__input" style="width: 50vw;margin-le   ft: 0.4vw;">
                        </h6>
                    </div>
                    <div style="display: flex; ">
                        <h6>Sector</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Address" id="Address" name="Address"
                                class="mdl-textfield__input" style="width: 50vw;margin-left: 5vw;">
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button data-modal-target="#modal"
        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
        style="border-radius: 99px; margin-left: auto;">Create</button>
</div>

<script>
    function SetForm(selection, form) {
        document.getElementById(selection).value = form;
        // Get all elements with class "userform"
        var userFormDivs = document.getElementsByClassName("userform");

        // Iterate through the collection and set display to "none"
        for (var i = 0; i < userFormDivs.length; i++) {
            userFormDivs[i].style.display = "none";
        }
        document.getElementById(form.replace(/\s/g, "")).style.display = "block";
    }

</script>