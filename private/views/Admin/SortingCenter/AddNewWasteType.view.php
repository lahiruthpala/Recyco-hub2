<div class="card__supporting-text no-padding"
    style="margin: 20px; display: none;  width: 95%; border-radius: 15px; border: 1px solid green;color: black;"
    id="NewWasteType">
    <form method="POST" onsubmit="validateForm(event)" action="<?= ROOT ?>/Admin/NewWasteTypeCreation"
        enctype="multipart/form-data" id="CreateAccountForm">
        <div class="form__article">
            <h3>Waste type info</h3>

            <div class="grid" style="margin-left: 30px;">
                <div
                    style="display: flex;justify-content: center;align-items: center;padding-right: 30px;border-right: 2px solid var(--smoke-color);">
                    <div class="profile-image color--smooth-gray profile-image--round">
                        <label for="profileImage">
                            <img src="<?= ROOT ?>/images/WasteType.jpg" id="Image" style="max-width: 100%;">
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
                        <h6>Name</h6>
                        <input id="Action" name="Action" value="AddNew" hidden>
                        <input id="Waste_ID" name="Waste_ID" hidden>
                        <input id="Status" name="Status" value="Collecting" hidden>
                        <h6 style="margin-left:5.8vw;">
                            <input type="text" placeholder="Enter the Name" id="Name" name="Name"
                                class="textfield__input">
                            <label class="textfield__error" id="NameError" for="Name"></label>
                        </h6>
                    </div>

                    <div style="display: flex;">
                        <h6>Description</h6>
                        <h6 style="margin-left:3vw;">
                            <input type="Name" placeholder="Enter the Description" id="Description" name="Description"
                                class="textfield__input">
                            <label class="textfield__error" id="DescriptionError" for="Description"></label>
                        </h6>
                    </div>
                </div>

                <div style="margin-left: 20%;">
                    <div style="display: flex;">
                        <h6>Price(per Kg)</h6>
                        <h6 style="margin-left:3vw;">
                            <input type="Name" placeholder="Enter the Price" id="Price" name="Price"
                                class="textfield__input">
                            <label class="textfield__error" id="PriceError" for="Price"></label>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <button id="CreateButton"
            class="button js-button button--raised js-ripple-effect button--colored-green"
            style="border-radius: 99px; margin-left: auto;">Create</button>
    </form>
</div>