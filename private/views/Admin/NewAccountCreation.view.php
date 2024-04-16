<div class="card__supporting-text no-padding"
    style="margin: 20px; display: none;  width: 95%; border-radius: 15px; border: 1px solid green;color: black;"
    id="UserAccountCreation">
    <form method="POST" onsubmit="validateForm(event)" action="<?= ROOT ?>/Admin/AccountCreation"
        enctype="multipart/form-data" id="CreateAccountForm">
        <div class="form__article">
            <h3>User Information</h3>

            <div class="grid" style="margin-left: 30px;">
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
                                    var fileSize = input.files[0].size; // Get the file size in bytes
                                    var maxSize = 1 * 1024 * 1024; // 1MB in bytes
                                    var fileExtension = input.files[0].name.split('.').pop().toLowerCase(); // Get the file extension

                                    if (fileSize > maxSize) {
                                        SideNotification(["Error: The uploaded image size exceeds the maximum allowed size of 1MB.", 'error']);
                                        return;
                                    }

                                    if (!['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                                        SideNotification(["Error: Only image files (JPG, JPEG, PNG, GIF) are allowed.", 'error']);
                                        return;
                                    }

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
                                class="textfield__input">
                            <label class="textfield__error" id="FirstNameError" for="Email"></label>
                        </h6>
                    </div>

                    <div style="display: flex;">
                        <h6>User Last Name</h6>
                        <h6 style="margin-left:10vw;">
                            <input type="Name" placeholder="Enter the Last Name" id="LastName" name="LastName"
                                class="textfield__input">
                            <label class="textfield__error" id="LastNameError" for="Email"></label>
                        </h6>
                    </div>
                </div>

                <div style="margin-left: 20%;">
                    <div style="margin-left: 30px; display: flex;">
                        <h6>Role</h6>
                        <h6 style="margin-left:31px;margin-top: 17px;margin-bottom: 0;">
                            <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                style="display: flex;">
                                <input class="textfield__input" name="Role" type="text" id="Role" readonly
                                    tabIndex="-1" />
                                <ul class="menu menu--bottom-left js-menu dark_dropdown" for="Role">
                                    <li class="menu__item" onclick="SetForm('General Manager', 'Role')">General Manager
                                    </li>
                                    <li class="menu__item" onclick="SetForm('Sorting Manager', 'Role')">Sorting Manager
                                    </li>
                                    <li class="menu__item" onclick="SetForm('Selling Manager', 'Role')">Selling Manager
                                    </li>
                                    <li class="menu__item" onclick="SetForm('Collector', 'Role')">Collector</li>
                                </ul>

                                <label for="Role">
                                    <i class="icon-toggle__label material-icons">arrow_drop_down</i>
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
                <div class="grid" style="margin-left: 110px;">
                    <div style="margin-left: 30px">
                        <div style="display: flex; ">
                            <h6>Email</h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Official Mail" id="OfficialMail" name="OfficialMail"
                                    class="textfield__input" style="margin-left: 5.2vw;width: auto;">
                                <label class="textfield__error" id="PEmailError" for="OfficialMail"></label>
                            </h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Mail" id="SecondaryMail" name="SecondaryMail"
                                    class="textfield__input">
                            </h6>
                        </div>

                        <div style="display: flex; ">
                            <h6>Contact Number</h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Official Number" id="OfficialNumber"
                                    name="OfficialNumber" class="textfield__input">
                                <label class="textfield__error" id="PNumberError" for="OfficialMail"></label>
                            </h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Secondary Number" id="SecondaryNumber"
                                    name="SecondaryNumber" class="textfield__input">
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="GeneralManager" style="display: none" class="userform">
            <div class="form__article">
                <h3>General Manager</h3>
            </div>
        </div>
        <div id="SortingManager" style="display: none" class="userform">

            <div class="form__article">
                <h3>Sorting Manager</h3>
                <div class="grid" style="margin-left: 30px;">

                </div>
            </div>
        </div>


        <div id="SalesManager" style="display: none" class="userform">

            <div class="form__article">
                <h3>Sales Manager</h3>
                <div class="grid" style="margin-left: 30px;">
                </div>
            </div>
        </div>
        <div id="Collector" style="display: none" class="userform">

            <div class="form__article">
                <h3>Collector</h3>
                <div class="grid" style="margin-left: 30px;">
                    <div style="margin-left: 30px">
                        <div style="display: flex; ">
                            <h6>Address</h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Address" id="Address" name="Address"
                                    class="textfield__input" style="width: 50vw;margin-left: 4vw;">
                            </h6>
                        </div>
                        <div style="display: flex; ">
                            <h6>Vehicle Number</h6>
                            <h6 style="margin-left:10vw;">
                                <input type="text" placeholder="Vehicle Number" id="Vehicle_NO" name="Vehicle_NO"
                                    class="textfield__input" style="width: 50vw;margin-le   ft: 0.4vw;">
                            </h6>
                        </div>
                        <div style="display: flex; ">
                            <h6>Sector</h6>
                            <h6 style="margin-left:230px;margin-top: 17px;margin-bottom: 0;">
                                <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                    style="display: flex;">
                                    <input class="textfield__input" name="SectorName" type="text" id="SectorName"
                                        readonly tabIndex="-1" />
                                    <ul class="menu menu--bottom-left js-menu dark_dropdown" for="SectorName">
                                        <?php
                                        foreach ($sectors as $sector) {
                                            ?>
                                            <li class="menu__item"
                                                onclick="SetForm('<?= $sector->SectorName ?>','SectorName')">
                                                <?= $sector->SectorName ?>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                    <label for="SectorName">
                                        <i class="icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="display:flex;">
            <button data-modal-target="#modal" class="button js-button button--raised js-ripple-effect"
                style="border-radius: 99px; margin-left: auto;background-color: green;color: white;">Create</button>
        </div>
    </form>
</div>

<script>
    var ValidForm = "";
    function SetForm(form, id) {
        form = form.replace(/\s/g, "");
        document.getElementById(id).value = form;
        // Get all elements with class "userform"
        if (id == 'Role') {
            toggleFormDisable(form);
            var userFormDivs = document.getElementsByClassName("userform");

            // Iterate through the collection and set display to "none"
            for (var i = 0; i < userFormDivs.length; i++) {
                userFormDivs[i].style.display = "none";
            }
            document.getElementById(form).style.display = "block";
            ValidForm =form;
        }
    }

    function toggleFormDisable(form) {
        var divIds = ['GeneralManager', 'Collector', 'SalesManager', 'SortingManager'];
        for (var i = 0; i < divIds.length; i++) {
            var currentDiv = document.getElementById(divIds[i]);
            var inputs = currentDiv.getElementsByTagName('input');
            console.log(inputs);
            for (var j = 0; j < inputs.length; j++) {
                if (divIds[i] !== form) {
                    inputs[j].disabled = true;
                } else {
                    inputs[j].disabled = false;
                }
            }
        }
    }

    function validateForm(e) {
        e.preventDefault();
        console.log('Validating');
        var form = document.getElementById('CreateAccountForm');
        var profileImage = document.getElementById('profileImage');
        if (profileImage.files.length === 0) {
            SideNotification(["Error: Please upload a profile image", 'error']);
            return;
        }
        var firstname = document.getElementById('FirstName');
        var firstnameerror = document.getElementById('FirstNameError');
        var lastname = document.getElementById('LastName');
        var lastnameerror = document.getElementById('LastNameError');

        var email = document.getElementById('OfficialMail').value;
        var emialerror = document.getElementById('PEmailError');
        var phone = document.getElementById('OfficialNumber').value;
        var phoneerror = document.getElementById('PNumberError');
        emialerror.style.visibility = "hidden";
        phoneerror.style.visibility = "hidden";
        firstnameerror.style.visibility = "hidden";
        lastnameerror.style.visibility = "hidden";
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (firstname.value.trim() === '' || lastname.value.trim() === '') {
            if (firstname.value.trim() === '') {
                firstnameerror.style.visibility = "visible";
                firstnameerror.innerHTML = "Enter a valid first name";
            }
            if (lastname.value.trim() === '') {
                lastnameerror.style.visibility = "visible";
                lastnameerror.innerHTML = "Enter a valid last name";
            }
            return false;
        }
        if (email.trim() === '' || phone.trim() === '') {
            if (email.trim() === '') {
                emialerror.style.visibility = "visible";
                emialerror.innerHTML = "Enter a valid email";
            }
            if (phone.trim() === '') {
                phoneerror.style.visibility = "visible";
                phoneerror.innerHTML = "Enter a valid phone number";
            }
            return false;
        } else if (!emailRegex.test(email)) {
            emialerror.style.visibility = "visible";
            emialerror.innerHTML = "Enter a valid email";
            return false;
        } else if (phone.length != 9) {
            phoneerror.style.visibility = "visible";
            phoneerror.innerHTML = "Enter a valid phone number";
        } else {
            form.submit();
        }
    }
</script>