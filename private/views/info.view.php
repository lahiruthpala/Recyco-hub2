<?php $this->view('include/head') ?>

<body>
    <main class="mdl-layout__content mdl-color--grey-100" style="width:100%">
        <div class="mdl-card mdl-shadow--2dp employer-form" action="#">
            <div class="mdl-card__title">
                <h2>Account Details</h2>
                <div class="mdl-card__subtitle">Please complete the form</div>
            </div>

            <div class="mdl-card__supporting-text">
                <form class="form" id="AccountInfo" method="post">
                    <div class="form__article">
                        <h3>Personal data</h3>
                        <div class="mdl-grid">
                            <div
                                class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="firstName" name="firstName" value="" required/>
                                <label class="mdl-textfield__label" for="firstName">First name</label>
                            </div>

                            <div
                                class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="LastName" name="LastName" value="" />
                                <label class="mdl-textfield__label" for="secondName">Last name</label>
                            </div>
                        </div>

                        <div class="mdl-grid">

                            <div
                                class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                <input class="mdl-textfield__input" value="" type="text" id="gender" readonly
                                    tabIndex="-1" name="LastName"/>

                                <label class="mdl-textfield__label" for="gender">Gender</label>

                                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="gender" name="gender">
                                    <li class="mdl-menu__item">Male</li>
                                    <li class="mdl-menu__item">Female</li>
                                </ul>

                                <label for="gender">
                                    <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form__article employer-form__contacts">
                        <h3>Contacts</h3>

                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--9-col input-group">
                                <i class="material-icons pull-left">call</i>
                                <div class="mdl-textfield mdl-js-textfield pull-left">
                                    <input class="mdl-textfield__input" type="text" id="phone" name="phone" required
                                        oninput="updateSubmitButton()">
                                    <label class="mdl-textfield__label" for="phone">Contact Number</label>
                                </div>
                            </div>
                        </div>

                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--9-col input-group">
                                <i class="material-icons pull-left">mail_outline</i>

                                <div class="mdl-textfield mdl-js-textfield pull-left">
                                    <input class="mdl-textfield__input" type="text" id="Email"
                                        value="lahiruthpala@gmail.com" readonly name="Email"/>
                                    <label class="mdl-textfield__label" for="email">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--9-col input-group">
                                <i class="material-icons pull-left">place</i>
                                <div class="mdl-textfield mdl-js-textfield pull-left">
                                    <input class="mdl-textfield__input" type="text" id="address" name="address"/>
                                    <label class="mdl-textfield__label" for="address">Address</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form__article employer-form__general_skills">
                        <h3>Special Notes</h3>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea class="mdl-textfield__input" type="text" rows="3" id="notes"name="notes"></textarea>
                            <label class="mdl-textfield__label" for="AboutMe"></label>
                        </div>
                    </div>

                    <div class="form__action">
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="isInfoReliable">
                            <input type="checkbox" id="isInfoReliable" class="mdl-checkbox__input" required />
                            <span class="mdl-checkbox__label">Entered information is reliable</span>
                        </label>
                        <button id="submit_button" type="submit"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
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