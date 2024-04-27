<div class="card__supporting-text no-padding"
    style="margin: 20px; display: none; width: 94.7%;color:black;border: solid 1px green;border-radius: 15px;"
    id="AddNewMachine">
    <form method="POST" action="<?= ROOT ?>/Admin/AddMachine">
        <div class="form__article">
            <h3>Machine Info</h3>
            <input id="Action" name="Action" value="AddNew" hidden>
            <input id="Machine_ID" name="Machine_ID" hidden>
            <input id="Status" name="Status" value="Operational" hidden>
            <input id="SortingCenter_ID" name="SortingCenter_ID" hidden>
            <div class="grid" style="margin-left: 30px;">
                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>Machine Machine_Type</h6>
                        <h6 style="margin-left:39px;margin-top: 16px;">
                            <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                style="display: flex; padding:0">
                                <input class="textfield__input" type="text" id="Machine_Type" name="Machine_Type"
                                    readonly tabIndex="-1" />
                                <ul class="menu menu--bottom-left js-menu dark_dropdown" for="Machine_Type">
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Belt sorters')">Belt sorters
                                    </li>
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Color sorter')">Color sorter
                                    </li>
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Color sorter')">Case sorters
                                    </li>
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Optical sorter')">Optical
                                        sorter
                                    </li>
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Push tray')">Push tray
                                    </li>
                                </ul>

                                <label for="Machine_Type">
                                    <i class="icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                            </div>
                        </h6>
                    </div>

                    <div style="display: flex;">
                        <h6>Location</h6>
                        <h6 style="margin-left:10vw;margin-top: 16px;">
                            <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                style="display: flex; padding:0">
                                <input class="textfield__input" type="text" id="Location" name="Location" readonly
                                    tabIndex="-1" />
                                <ul class="menu menu--bottom-left js-menu dark_dropdown" for="Location">
                                    <li class="menu__item" onclick="SetForm('Location', 'Colombo')">Colombo</li>
                                    <li class="menu__item" onclick="SetForm('Location', 'Kandy')">Kandy</li>
                                </ul>

                                <label for="Location">
                                    <i class="icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                            </div>
                        </h6>
                    </div>
                </div>

                <div style="margin-left: 20%;">
                    <div style="margin-left: 30px">
                        <div style="display: flex; ">
                            <h6>Waste Type</h6>
                            <h6 style="margin-left:39px;margin-top: 16px;">
                                <div class="textfield js-textfield textfield--floating-label get-select full-size dropdown2"
                                    style="display: flex; padding:0">
                                    <input class="textfield__input" type="text" style="padding-left: 16px;width: 112px;"
                                        value="" id="waste_type" name="waste_type" readonly
                                        tabIndex="-1" />
                                    <ul class="menu menu--bottom-left js-menu dark_dropdown" for="waste_type">
                                        <?php foreach ($waste as $w): ?>
                                            <li class="menu__item" onclick="SetForm('waste_type','<?= $w->Name ?>')">
                                                <?= $w->Name ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <label for="Repeat">
                                        <i class="icon-toggle__label material-icons">arrow_drop_down</i>
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
            <div>
                <!-- <form action="<?= ROOT ?>/Automation/ESP32CodeGenerationAI" method="POST">
                    <div class="modal" id="modal">
                        <div>
                            <div class="card shadow--2dp">
                                <div class="card__title">
                                    <div class="card__title-text">Describe</div>
                                </div>
                                <div class="textfield js-textfield textfield--floating-label is-upgraded"
                                    data-upgraded=",MaterialTextfield"
                                    style="margin: 10px 20px 10px 20px;border: 1px solid black;border-radius: 19px;">
                                    <textarea class="textfield__input" type="text" rows="3" name="Note"
                                        spellcheck="false"></textarea>
                                </div>
                                <button type="submit"
                                    class="button js-button button--raised js-ripple-effect button--colored-teal"
                                    style="border-radius: 99px; margin: 0 20px 20px 20px background-color: aqua;">

                                </button>
                            </div>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>

        <button id="CreateButton" type="submit" class="button js-button button--raised js-ripple-effect button--colored-green"
            style="border-radius: 99px; margin-right: auto;margin-left: 83.5%;background-color: green;color: white;">Create</button>
    </form>
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
    }

</script>