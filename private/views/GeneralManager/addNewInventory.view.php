<div class="card__supporting-text no-padding" id="CreateInventory" style="display: none;" >
    <div style="display: flex;">
        <form style="width: 30VW; margin-left:2VW;" action="<?= ROOT ?>/GeneralManager/Generate" method="POST" id="NewInventoryCreation">
            <div class="card shadow--2dp">
                <div class="card__title">
                    <h5 class="card__title-text text-color--white">Create new inventory ID</h5>
                </div>
                <div class="grid">
                    <!-- <?php if (count($errors) > 0): ?>
                                <div style="ml-10px" role="alert">
                                    <strong>Errors:</strong>
                                    <?php foreach ($errors as $error): ?>
                                        <br>
                                        <?= $error ?>
                                    <?php endforeach; ?>
                                    <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <i class="material-icons">close</i>
                                    </span>
                                </div>
                            <?php endif; ?> -->
                    <div
                        class="cell cell--6-col-desktop cell--6-col-tablet cell--4-col-phone form__article">
                        <div class="textfield js-textfield textfield--floating-label full-size is-upgraded"
                            data-upgraded=",MaterialTextfield">
                            <input class="textfield__input" type="text" id="floating-last-name" name="Description"
                                placeholder="Note">
                        </div>
                        <div class="textfield js-textfield textfield--floating-label full-size is-upgraded"
                            data-upgraded=",MaterialTextfield">
                            <div style="display: flex; flex-direction: column; align-items: left;">
                                <label style="color: white;">Size:</label>
                                <input type="number" name="Size"
                                    style="background-color: gray; color: white;max-width: 180px;"">
                            </div>
                        </div>
                        <button id=" Generate" type="submit" onclick="NewInventory(event, 'NewInventoryCreation')"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Generate</Button>
                                <div>
                                    <h3 class="text-color--smooth-gray"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
        <div class="card shadow--2dp" style="margin-left:2VW">
            <div class="card__title">
                <h5 class="card__title-text text-color--white">Currently Automated Generations</h5>
            </div>
            <div class="card__supporting-text">
                <ul class="list">
                    <?php
                    if (is_array($events) && !empty($events)) {
                        $id = 1; // Initialize ID counter
                        foreach ($events as $event) {
                            ?>
                            <li class="list__item">
                                <span class="list__item-primary-content">
                                    <div class="list__item-avatar">
                                        <img width="100%" src="<?= ROOT ?>/images/watch_white.svg">
                                    </div>
                                    <?= $event->Title ?>
                                </span>
                                <span class="list__item-secondary-action">
                                    <label for="<?=$event->ID?>" data-upgraded=",MaterialSwitch,MaterialRipple" onchange="toggleAutomation(<?=$event->ID?>)"
                                        onchange=class="switch switch--colored-light-blue js-switch js-ripple-effect js-ripple-effect--ignore-events is-upgraded">
                                        <input type="checkbox" id="<?=$event->ID?>" class="switch__input" checked="">
                                        <div class="switch__track"></div>
                                        <div class="switch__thumb"><span class="switch__focus-helper"></span></div>
                                        <span
                                            class="switch__ripple-container js-ripple-effect ripple--center is-checked"
                                            data-upgraded="">
                                            <span class="ripple is-animating"
                                                style="width: 137.765px; height: 137.765px; transform: translate(-50%, -50%) translate(24px, 24px);">
                                            </span>
                                        </span>
                                    </label>
                                </span>
                            </li>
                            <?php
                            $id++; // Increment ID for the next row
                        }
                    } else {
                        echo "No current events";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <form action="<?= ROOT ?>/GeneralManager/SetGenerations" method="POST" id="CreateNewAutomation">
            <div class="card shadow--3dp" style="margin-left:2VW">
                <div class="card__title">
                    <h5 class="card__title-text text-color--white">Create new Automated Generations</h5>
                </div>
                <div class="card__supporting-text">
                    <div class="textfield js-textfield textfield--floating-label full-size is-upgraded"
                        data-upgraded=",MaterialTextfield">
                        <input class="textfield__input" type="text" name="Title" placeholder="Title">
                    </div>
                    <div style="display: flex;margin-top: 2vh;">
                        <div>
                            <label>Size:</label>
                            <input type="number" name="Size" style="background-color: gray; color: white;">
                            <!-- <label class="textfield__label" for="floating-first-name">First Name</label> -->
                        </div>
                        <div style="margin-left:2%;">
                            <label for="Category">Select an option:</label>
                            <select id="Category" name="Repetition" onchange="toggleDayDropdown()">
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                            </select>
                        </div>
                        <div id="day" style="margin-left:5%; display:none">
                            <label for="date">Select a day:</label>
                            <select id="dayDropdown" name="day">
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                            </select>
                        </div>
                        <div style="margin-left:5%">
                            <label>Time:</label>
                            <input type="time" name="Time" style="background-color: gray; color: white;">
                            <!-- <label class="textfield__label" for="floating-first-name">First Name</label> -->
                        </div>
                    </div>
                    <input type="text" style="display:none" id="password">
                    <button id="Generate" type="button" onclick="NewInventory(event, 'CreateNewAutomation')"
                        class="button js-button button--raised js-ripple-effect button--colored-green"
                        style="border-radius: 99px; margin-left: 1VW; margin-top: 2VW;">SET</Button>
                </div>
            </div>
        </form>
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