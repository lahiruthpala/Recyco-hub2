<div class="card__supporting-text no-padding" id="CreateInventory" style="display: none;">
    <div style="display: flex;justify-content: center;">
        <div>
            <h6 class="card__title-text" id="tableTitle"
                style="color: black;margin: 15px 15px 15px 42px;font-size: 15px;">
                Inventory Generation
            </h6>
            <form style="width: 30VW; margin-left:2VW;background-color: white;border-radius: 15px; color:black;"
                action="<?= ROOT ?>/GeneralManager/Generate" method="POST" id="NewInventoryCreation">
                <div class="cell" style="width: 100%;display: flex;flex-direction: column;" >
                    <div class="textfield js-textfield textfield--floating-label"
                        data-upgraded=",MaterialTextfield">
                        <input class="textfield__input" type="text" id="floating-last-name" name="Description"
                            placeholder="Note">
                    </div>
                    <div class="textfield js-textfield textfield--floating-label full-size is-upgraded"
                        data-upgraded=",MaterialTextfield">
                        <div style="display: flex; flex-direction: column; align-items: left;">
                            <label>Size:</label>
                            <input type="number" name="Size"
                                style="background-color: gray; color: white;max-width: 180px;"">
                            <input name="password" id="password" hidden>
                        </div>
                    </div>
                    <button id=" Generate" type="submit" onclick="NewInventory(event, 'NewInventoryCreation')"
                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                style=" width: 100px;align-self: end;background-color: green;color: white;">Generate</Button>
                            <div>
                                <h3 class="text-color--smooth-gray"></h3>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>
<script>
    function toggleDayDropdown() {
        var categoryDropdown = document.getElementById("Category");
        var dayDropdown = document.getElementById("day");

        if (categoryDropdown.value === "Weekly") {
            dayDropdown.style.display = "block";
        } else {
            dayDropdown.style.display = "none";
        }
    }

    function toggleAutomation(id) {
        var element = document.getElementById(id);
        if (element.classList.contains("is-checked")) {
            element.classList.remove("is-checked");
        } else {
            element.classList.add("is-checked");
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= ROOT ?>/js/NewInventory.js"></script>