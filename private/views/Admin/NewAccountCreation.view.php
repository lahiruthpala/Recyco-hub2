<div class="mdl-card__supporting-text no-padding" style="margin: 20px; display: none" id="UserAccountCreation">
    <form method="POST" action="<?= ROOT ?>/Admin/AccountCreation" enctype="multipart/form-data" id="CreateAccountForm">
        <div class="form__article">
            <h3>User Information</h3>

            <div class="mdl-grid" style="margin-left: 30px;">
                <div
                    style="display: flex;justify-content: center;align-items: center;padding-right: 30px;border-right: 2px solid var(--smoke-color);">
                    <div class="profile-image color--smooth-gray profile-image--round">
                        <label for="profileImage">
                            <img src="<?= ROOT ?>/images/ProfilePicTemplate.jpg" id="Image" style="max-width: 100%;">
                            <input type="file" id="profileImage" name="profileImage" style="display: none;"
                                onchange="displayImage(this)">
                        </label>

                        <script>
                            function displayImage(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        document.getElementById('Image').src = e.target.result;
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                    </div>
                </div>

                <div style="margin-left: 30px">
                    <div style="display: flex; ">
                        <h6>User First Name</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Enter the First Name" id="FirstName" name="FirstName"
                                class="mdl-textfield__input">
                        </h6>
                    </div>

                    <div style="display: flex;">
                        <h6>User Last Name</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="text" placeholder="Enter the Last Name" id="LastName" name="LastName"
                                class="mdl-textfield__input">
                        </h6>
                    </div>
                </div>

                <div style="margin-left: 20%;">
                    <div style="margin-left: 30px; display: flex;">
                        <h6>Role</h6>
                        <h6 style="margin-left:8vw;margin-top: 0;margin-bottom: 0;">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select full-size"
                                style="display: flex;">
                                <input class="mdl-textfield__input" name="Role" type="text" id="Role" readonly
                                    tabIndex="-1" />
                                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="Role">
                                    <li class="mdl-menu__item" onclick="SetForm('General Manager')">General Manager</li>
                                    <li class="mdl-menu__item" onclick="SetForm('Sorting Manager')">Sorting Manager</li>
                                    <li class="mdl-menu__item" onclick="SetForm('Selling Manager')">Selling Manager</li>
                                    <li class="mdl-menu__item" onclick="SetForm('Collector')">Collector</li>
                                </ul>

                                <label for="Role">
                                    <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                            </div>
                        </h6>
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
                                    <input type="text" placeholder="Secondary Mail" id="SecondaryMail"
                                        name="SecondaryMail" class="mdl-textfield__input">
                                </h6>
                        </div>

                        <div style="display: flex; ">
                            <h6>Contact Number</h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Official Number" id="OfficialNumber"
                                    name="OfficialNumber" class="mdl-textfield__input">
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
                                    <input type="text" placeholder="Secondary Mail" id="SecondaryMail"
                                        name="SecondaryMail" class="mdl-textfield__input">
                                </h6>
                        </div>

                        <div style="display: flex; ">
                            <h6>Contact Number</h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Official Number" id="OfficialNumber"
                                    name="OfficialNumber" class="mdl-textfield__input">
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
                                    <input type="text" placeholder="Secondary Mail" id="SecondaryMail"
                                        name="SecondaryMail" class="mdl-textfield__input">
                                </h6>
                        </div>

                        <div style="display: flex; ">
                            <h6>Contact Number</h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Official Number" id="OfficialNumber"
                                    name="OfficialNumber" class="mdl-textfield__input">
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
                                    <input type="text" placeholder="Secondary Mail" id="SecondaryMail"
                                        name="SecondaryMail" class="mdl-textfield__input">
                                </h6>
                        </div>

                        <div style="display: flex; ">
                            <h6>Contact Number</h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Official Number" id="OfficialNumber"
                                    name="OfficialNumber" class="mdl-textfield__input">
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
    </form>
</div>

<script>
    function SetForm(form) {
        form = form.replace(/\s/g, "");
        toggleFormDisable(form);
        document.getElementById("Role").value = form;
        // Get all elements with class "userform"
        var userFormDivs = document.getElementsByClassName("userform");

        // Iterate through the collection and set display to "none"
        for (var i = 0; i < userFormDivs.length; i++) {
            userFormDivs[i].style.display = "none";
        }
        document.getElementById(form).style.display = "block";
    }

    function toggleFormDisable(form) {
        var divIds = ['GeneralManager', 'Collector', 'SalesManager', 'SortingManager'];
        for (var i = 0; i < divIds.length; i++) {
            var currentDiv = document.getElementById(divIds[i]);
            var inputs = currentDiv.getElementsByTagName('input');

            for (var j = 0; j < inputs.length; j++) {
                if (divIds[i] !== form) {
                    inputs[j].disabled = true;
                } else {
                    inputs[j].disabled = false;
                }
            }
        }
    }

    window.onload = function () {
        toggleFormDisable();
    };

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
<script src="/vendors/@form-validation/umd/bundle/popular.min.js"></script>
<script src="/vendors/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
<script src="/vendors/@form-validation/umd/plugin-tachyons/index.min.js"></script>
<script src="/vendors/@form-validation/umd/formValidation.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function (e) {
        FormValidation.formValidation(document.getElementById('CreateAccountForm'), {
            fields: {
                Vehicle_NO: {
                    validators: {
                        notEmpty: {
                            message: 'Vehicle number is required',
                        },
                        stringLength: {
                            min: 6,
                            max: 8,
                            message: 'Must be a valid vehicle number',
                        },
                        regexp: {
                            regexp: /^(?:[A-Z]{2}\d{4}|[A-Z]{3}\d{4})$/,
                            message: 'Must be a valid vehicle number',
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                tachyons: new FormValidation.plugins.Tachyons(),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                icon: new FormValidation.plugins.Icon({
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh',
                }),
            },
        });
    });
</script>