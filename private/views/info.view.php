<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout">
        <main class="layout__content">

            <div class="grid grid--no-spacing dashboard">

                <div style="width: 100%;">
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div class="card__supporting-text no-padding"
                                style="margin: 20px;width: 95%;border-radius: 15px;border: solid 1px green;color: black;"
                                id="UserAccountCreation">
                                <form method="POST" style="display: flex;flex-direction: column;" enctype="multipart/form-data"
                                    id="CreateAccountForm">
                                    <div class="form__article">
                                        <h3>User Information</h3>

                                        <div class="grid" style="margin-left: 30px;">
                                            <div
                                                style="display: flex;justify-content: center;align-items: center;padding-right: 30px;border-right: 2px solid var(--smoke-color);">
                                                <div class="profile-image color--smooth-gray profile-image--round">
                                                    <label for="profileImage">
                                                        <img src="<?= ROOT ?>/images/ProfilePicTemplate.jpg" id="Image"
                                                            style="max-width: 100%;">
                                                        <input type="file" id="profileImage" name="profileImage"
                                                            style="display: none;" onchange="displayImage(this)">
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
                                                        <input type="text" placeholder="Enter the First Name"
                                                            id="FirstName" name="FirstName" class="textfield__input">
                                                    </h6>
                                                </div>

                                                <div style="display: flex;">
                                                    <h6>User Last Name</h6>
                                                    <h6 style="margin-left:10vw;">
                                                        <input type="Name" placeholder="Enter the Last Name"
                                                            id="LastName" name="LastName" class="textfield__input">
                                                    </h6>
                                                </div>
                                            </div>

                                            <div style="margin-left: 20%;">
                                                <div style="margin-left: 30px; display: flex;">
                                                    <h6>Category</h6>
                                                    <h6 style="margin-left:4vw;margin-top: 0;margin-bottom: 0;">
                                                        <div class="textfield js-textfield textfield--floating-label getmdl-select full-size"
                                                            style="display: flex;background-color: #EDEDED;border-radius: 15px;padding: 0;margin-top: 20px;">
                                                            <input class="textfield__input" name="Type" type="text"
                                                                id="Type" readonly tabIndex="-1"
                                                                style="padding-left: 15px;" />
                                                            <ul class="menu menu--bottom-left js-menu dark_dropdown"
                                                                for="Type">
                                                                <li class="menu__item" onclick="SetForm('Individual')">
                                                                    Individual</li>
                                                                <li class="menu__item" onclick="SetForm('Company')">
                                                                    Company</li>
                                                            </ul>

                                                            <label for="Type">
                                                                <i
                                                                    class="icon-toggle__label material-icons">arrow_drop_down</i>
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

                                    <div id="Individual" style="display: none" class="userform">
                                        <div class="form__article">
                                            <h3>Individual Details</h3>
                                            <div class="grid" style="margin-left: 30px;">
                                                <div style="margin-left: 30px">
                                                    <div style="display: flex; ">
                                                        <h6>Email</h6>
                                                        <h6 style="margin-left:10vw;">
                                                            <input type="text" placeholder="Email" id="Email"
                                                            value="<?=$data[0]->Email?>"
                                                                name="Email" class="textfield__input"
                                                                style="margin-left: 5.2vw;width: auto;" readonly>
                                                        </h6>
                                                    </div>

                                                    <div style="display: flex; ">
                                                        <h6>Contact Number</h6>
                                                        <h6 style="margin-left:10vw;">
                                                            <input type="text" placeholder="Phone Number" id="Phone"
                                                                name="Phone" class="textfield__input">
                                                        </h6>
                                                    </div>
                                                    <div style="display: flex; ">
                                                        <h6>Address</h6>
                                                        <h6 style="margin-left:10vw;">
                                                            <input type="text" placeholder="Address" id="Address"
                                                                name="Address" class="textfield__input"
                                                                style="width: 50vw;margin-left: 4vw;">
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Company" style="display: none" class="userform">

                                        <div class="form__article">
                                            <h3>Company Details</h3>
                                            <div class="grid" style="margin-left: 30px;">
                                                <div style="margin-left: 30px">
                                                    <div style="display: flex; ">
                                                        <h6>Company Name</h6>
                                                        <h6 style="margin-left:10vw;">
                                                            <input type="text" placeholder="CompanyName"
                                                                id="CompanyName" name="CompanyName"
                                                                class="textfield__input"
                                                                style="margin-left: 5.2vw;width: auto;">
                                                        </h6>
                                                    </div>
                                                    <div style="display: flex; ">
                                                        <h6>Email</h6>
                                                        <h6 style="margin-left:10vw;">
                                                            <input type="text" placeholder="Official Mail"
                                                                id="OfficialMail" name="OfficialMail"
                                                                value="<?=$data[0]->Email?>"
                                                                class="textfield__input"
                                                                style="margin-left: 5.2vw;width: auto;" readonly>
                                                            <h6 style="margin-left:10vw;">
                                                                <input type="text" placeholder="Secondary Mail"
                                                                    id="SecondaryMail" name="SecondaryMail"
                                                                    class="textfield__input">
                                                            </h6>
                                                    </div>

                                                    <div style="display: flex; ">
                                                        <h6>Contact Number</h6>
                                                        <h6 style="margin-left:10vw;">
                                                            <input type="text" placeholder="Official Number"
                                                                id="Phone" name="Phone"
                                                                class="textfield__input">
                                                            <h6 style="margin-left:10vw;">
                                                                <input type="text" placeholder="Secondary Number"
                                                                    id="SecondaryNumber" name="SecondaryNumber"
                                                                    class="textfield__input">
                                                            </h6>
                                                    </div>
                                                    <div style="display: flex; ">
                                                        <h6>Address</h6>
                                                        <h6 style="margin-left:10vw;">
                                                            <input type="text" placeholder="Address" id="Address"
                                                                name="Address" class="textfield__input"
                                                                style="width: 50vw;margin-left: 4vw;">
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button data-modal-target="#modal"
                                        class="button js-button button--raised js-ripple-effect button--colored-green"
                                        style="border-radius: 99px; margin-left: auto; background-color:green;">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function SetForm(form) {
            form = form.replace(/\s/g, "");
            toggleFormDisable(form);
            document.getElementById("Type").value = form;
            // Get all elements with class "userform"
            var userFormDivs = document.getElementsByClassName("userform");

            // Iterate through the collection and set display to "none"
            for (var i = 0; i < userFormDivs.length; i++) {
                userFormDivs[i].style.display = "none";
            }
            document.getElementById(form).style.display = "block";
        }

        function toggleFormDisable(form) {
            var divIds = ['Individual', 'Company'];
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
    </script>
    </main>
    <!-- <script>
        document.getElementById("AccountInfo").addEventListener("submit", function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get form values
            var FirstName = document.getElementById("FirstName").value;
            var LastName = document.getElementById("LastName").value;
            var phone = document.getElementById("phone").value;

            // Reset previous error messages
            resetErrors();

            // Validate form fields
            var isValid = true;

            if (FirstName === "" || LastName === "") {
                displayError("Name is required.", "name");
                isValid = false;
            }

            // Add more validation rules as needed...

            if (email === "") {
                displayError("Email is required.", "email");
                isValid = false;
            } else if (!isValidEmail(email)) {
                displayError("Invalid email address.", "email");
                isValid = false;
            }

            if (password === "") {
                displayError("Password is required.", "password");
                isValid = false;
            }

            // If all validation passes, you can submit the form
            if (isValid) {
                alert("Form submitted successfully!");
                // Add code here to submit the form data to the server
            }
        });

        function displayError(errorMessage, fieldId) {
            var errorElement = document.createElement("div");
            errorElement.className = "error";
            errorElement.textContent = errorMessage;

            var field = document.getElementById(fieldId);
            field.parentNode.appendChild(errorElement);
        }

        function resetErrors() {
            var errorElements = document.getElementsByClassName("error");
            while (errorElements.length > 0) {
                errorElements[0].parentNode.removeChild(errorElements[0]);
            }
        }
    </script> -->
    <?php $this->view('include/footer') ?>