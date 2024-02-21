<div class="card__supporting-text no-padding"
    style="margin: 20px; display: none; width: 94.7%;background-color: #444;border: solid 1px green;border-radius: 15px;"
    id="AddNewMachine">
    <form method="POST" action="<?=ROOT?>/Admin/AddMachine">
        <div class="form__article">
            <h3>Machine Info</h3>
            <div class="grid" style="margin-left: 30px;">
                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>Machine Machine_Type</h6>
                        <h6 style="margin-left:7.5vw;margin-top: 16px;">
                            <div class="textfield js-textfield textfield--floating-label getmdl-select full-size"
                                style="display: flex; padding:0">
                                <input class="textfield__input" type="text" id="Machine_Type" name="Machine_Type" readonly
                                    tabIndex="-1" />
                                <ul class="menu menu--bottom-left js-menu dark_dropdown" for="Machine_Type">
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Belt sorters')">Belt sorters</li>
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Color sorter')">Color sorter</li>
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Color sorter')">Color sorter</li>
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Optical sorter')">Optical sorter
                                    </li>
                                    <li class="menu__item" onclick="SetForm('Machine_Type','Metallic sorter')">Metallic sorter
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
                            <div class="textfield js-textfield textfield--floating-label getmdl-select full-size"
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
                            <h6>Assign Line</h6>
                            <h6 style="margin-left:8vw;margin-top: 0;margin-bottom: 0;">
                                <div class="textfield js-textfield textfield--floating-label getmdl-select full-size"
                                    style="display: flex;">
                                    <input class="textfield__input" type="text" id="Line_NO" name="Line_NO" readonly
                                        tabIndex="-1" />
                                    <ul class="menu menu--bottom-left js-menu dark_dropdown" for="Line_NO">
                                        <li class="menu__item" onclick="SetForm('Line_NO', 'A1')">A1</li>
                                        <li class="menu__item" onclick="SetForm('Line_NO', 'A2')">A2</li>
                                        <li class="menu__item" onclick="SetForm('Line_NO', 'A3')">A3</li>
                                        <li class="menu__item" onclick="SetForm('Line_NO', 'A4')">A4</li>
                                    </ul>

                                    <label for="Line_NO">
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
        </div>

        <button type="submit" class="button js-button button--raised js-ripple-effect button--colored-green"
            style="border-radius: 99px; margin-right: auto;margin-left: 83.5%;">Create</button>
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