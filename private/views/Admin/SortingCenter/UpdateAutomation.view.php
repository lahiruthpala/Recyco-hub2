<?php
global $activeTab;
$activeTab = 3;
$this->view('include/head');
?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/Adminheader') ?>
        </header>
        <main class="layout__content">
            <div class="grid grid--no-spacing dashboard">
                <div style="width:100%">
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div class="card__supporting-text no-padding"
                                style="margin: 20px; width: 94.7%;color:black;border: solid 1px green;border-radius: 15px;">
                                <form method="POST" action="<?= ROOT ?>/Admin/UpdateAutomation/<?=$data->Automation_ID?>">
                                    <div class="form__article">
                                        <div style="display: flex;justify-content: space-between;">
                                            <div style="margin-left: 30px">
                                                <div style="display: flex; ">
                                                    <h6>Name</h6>
                                                    <h6 style="margin-left:50px;">
                                                        <input type="text" placeholder="Enter the Name" id="Name"
                                                            name="Name" class="textfield__input"
                                                            value="<?= $data->Name ?>">
                                                        <label class="textfield__error" id="NameError"
                                                            for="Name"></label>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div style="margin-right:150px">
                                                <div style="margin-left: 30px">
                                                    <div style="display: flex;">
                                                        <h6>Repeat</h6>
                                                        <h6 style="margin-left:39px;margin-top: 16px;">
                                                            <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                                                style="display: flex; padding:0">
                                                                <input class="textfield__input" type="text"
                                                                    style="padding-left: 16px;width: 112px;"
                                                                    value="<?= $data->Repeat ?>" id="Repeat"
                                                                    name="Repeat" readonly tabIndex="-1" />
                                                                <ul class="menu menu--bottom-left js-menu dark_dropdown"
                                                                    for="Repeat">
                                                                    <li class="menu__item"
                                                                        onclick="SetForm('Repeat','Daily')">
                                                                        Daily
                                                                    </li>
                                                                    <li class="menu__item"
                                                                        onclick="SetForm('Repeat','Weekly')">
                                                                        Weekly
                                                                    </li>
                                                                    <li class="menu__item"
                                                                        onclick="SetForm('Repeat','Monthly')">
                                                                        Monthly
                                                                    </li>
                                                                    <li class="menu__item"
                                                                        onclick="SetForm('Repeat','Yearly')">
                                                                        Yearly
                                                                    </li>
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
                                                    <h6>Hours</h6>
                                                    <h6 style="margin-left:50px;">
                                                        <input type="text" placeholder="Enter the hour" id="hour"
                                                            name="hour" class="textfield__input"
                                                            value="<?= $data->hour ?>">
                                                        <label class="textfield__error" id="hourError"
                                                            for="hour"></label>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div style="margin-right: 100px">
                                                <div style="display: flex; ">
                                                    <h6>Minutes</h6>
                                                    <h6 style="margin-left:50px;">
                                                        <input type="text" placeholder="Enter the min" id="min"
                                                            name="min" class="textfield__input"
                                                            value="<?= $data->min ?>">
                                                        <label class="textfield__error" id="minError"
                                                            for="min"></label>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-left: 30px; display: none;">
                                            <div style="display: flex; ">
                                                <h6>Day of the Month</h6>
                                                <h6 style="margin-left:50px;">
                                                    <input type="text" placeholder="Enter the Name" id="Name"
                                                        name="Name" class="textfield__input" value="<?= $data->Name ?>">
                                                    <label class="textfield__error" id="NameError" for="Name"></label>
                                                </h6>
                                            </div>
                                        </div>
                                        <div id="Monthly" style="margin-right:150px; display: none;">
                                            <div style="margin-left: 30px">
                                                <div style="display: flex;">
                                                    <h6>Day of the month</h6>
                                                    <h6 style="margin-left:39px;margin-top: 16px;">
                                                        <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                                            style="display: flex; padding:0">
                                                            <input class="textfield__input" type="text"
                                                                style="padding-left: 16px;width: 112px;"
                                                                value="<?= $data->day_of_the_month ?>" id="day_of_the_month" name="day_of_the_month"
                                                                readonly tabIndex="-1" />
                                                            <ul class="menu menu--bottom-left js-menu dark_dropdown"
                                                                for="day_of_the_month">
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_month','*')">
                                                                    Every Day
                                                                </li>
                                                                <?php for($n = 1; $n <= 31; $n++) : ?>
                                                                    <li class="menu__item" onclick="SetForm('day_of_the_month', '<?= $n ?>')">
                                                                        <?= $n ?>
                                                                    </li>
                                                                <?php endfor; ?>
                                                            </ul>

                                                            <label for="day_of_the_month">
                                                                <i
                                                                    class="icon-toggle__label material-icons">arrow_drop_down</i>
                                                            </label>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="month" style="margin-right:150px; display: none;">
                                            <div style="margin-left: 30px">
                                                <div style="display: flex;">
                                                    <h6>Day of the month</h6>
                                                    <h6 style="margin-left:39px;margin-top: 16px;">
                                                        <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                                            style="display: flex; padding:0">
                                                            <input class="textfield__input" type="text"
                                                                style="padding-left: 16px;width: 112px;"
                                                                value="<?= $data->month ?>" id="month" name="month"
                                                                readonly tabIndex="-1" />
                                                            <ul class="menu menu--bottom-left js-menu dark_dropdown"
                                                                for="month">
                                                                <li class="menu__item"
                                                                    onclick="SetForm('month','*')">
                                                                    Every Day
                                                                </li>
                                                                <?php for($n = 1; $n <= 12; $n++) : ?>
                                                                    <li class="menu__item" onclick="SetForm('month', '<?= $n ?>')">
                                                                        <?= $n ?>
                                                                    </li>
                                                                <?php endfor; ?>
                                                            </ul>

                                                            <label for="month">
                                                                <i
                                                                    class="icon-toggle__label material-icons">arrow_drop_down</i>
                                                            </label>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Weekly" style="margin-right:150px; display: none;">
                                            <div style="margin-left: 30px">
                                                <div style="display: flex;">
                                                    <h6>Week of the day</h6>
                                                    <h6 style="margin-left:39px;margin-top: 16px;">
                                                        <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                                            style="display: flex; padding:0">
                                                            <input class="textfield__input" type="text"
                                                                style="padding-left: 16px;width: 112px;"
                                                                value="<?= $data->day_of_the_week ?>" id="day_of_the_week" name="day_of_the_week"
                                                                readonly tabIndex="-1" />
                                                            <ul class="menu menu--bottom-left js-menu dark_dropdown"
                                                                for="day_of_the_week">
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_week','*')">
                                                                    Every Day
                                                                </li>
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_week','Monday')">
                                                                    Monday
                                                                </li>
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_week','Tuesday')">
                                                                    Tuesday
                                                                </li>
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_week','Wednesday')">
                                                                    Wednesday
                                                                </li>
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_week','Thursday')">
                                                                    Thursday
                                                                </li>
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_week','Friday')">
                                                                    Friday
                                                                </li>
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_week','Saturday')">
                                                                    Saturday
                                                                </li>
                                                                <li class="menu__item"
                                                                    onclick="SetForm('day_of_the_week','Sunday')">
                                                                    Sunday
                                                                </li>
                                                            </ul>

                                                            <label for="day_of_the_week">
                                                                <i
                                                                    class="icon-toggle__label material-icons">arrow_drop_down</i>
                                                            </label>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit"
                                        class="button js-button button--raised js-ripple-effect button--colored-green"
                                        style="border-radius: 99px; margin-right: auto;margin-left: 83.5%;background-color: green;color: white;">Update</button>
                                </form>
                            </div>

                            <script>
                                function SetForm(selection, form) {
                                    if(selection == "Repeat") {
                                        if(form == "Daily") {
                                            document.getElementById("Weekly").style.display = "none";
                                            document.getElementById("Monthly").style.display = "none";
                                        } else if(form == "Weekly") {
                                            document.getElementById("Weekly").style.display = "block";
                                            document.getElementById("Monthly").style.display = "none";
                                        } else if(form == "Monthly") {
                                            document.getElementById("Weekly").style.display = "none";
                                            document.getElementById("Monthly").style.display = "block";
                                        } else if(form == "Yearly") {
                                            document.getElementById("Weekly").style.display = "none";
                                            document.getElementById("Monthly").style.display = "none";
                                        }
                                    }
                                    document.getElementById(selection).value = form;
                                    // Get all elements with class "userform"
                                    var userFormDivs = document.getElementsByClassName("userform");

                                    // Iterate through the collection and set display to "none"
                                    for (var i = 0; i < userFormDivs.length; i++) {
                                        userFormDivs[i].style.display = "none";
                                    }
                                }

                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php $this->view('include/footer') ?>