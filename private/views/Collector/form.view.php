<?php
global $activeTab;
$activeTab = 3;
$this->view('include/head');
?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/CollectorHeader') ?>
        </header>
        <main class="layout__content">
            <div class="grid grid--no-spacing dashboard">
                <div style="width:100%">
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div class="card__supporting-text no-padding"
                                style="margin: 20px; width: 94.7%;color:black;border: solid 1px green;border-radius: 15px;">
                                <form method="POST"
                                    action="<?= ROOT ?>/collector/store/<?= $data[0]->Pickup_ID ?? '' ?>/Accepted/<?= $data[0]->Job_ID ?? '' ?>">
                                    <div class="form__article">
                                        <div style="display: flex;justify-content: space-between;">
                                            <div style="margin-left: 30px">
                                                <div style="display: flex; ">
                                                    <h6>Customer Name</h6>
                                                    <h6 style="margin-left:50px;">
                                                        <input type="text" placeholder="Enter the Name" id="Name"
                                                            name="Name" class="textfield__input"
                                                            value="<?= $data[0]->FirstName . " " . $data[0]->LastName ?>"
                                                            disabled>
                                                        <label class="textfield__error" id="NameError"
                                                            for="Name"></label>
                                                    </h6> 
                                                </div>
                                            </div>
                                            <div style="margin-right:150px">
                                                <div style="margin-left: 30px">
                                                    <div style="display: flex;">
                                                        <h6>Waste Type</h6>
                                                        <h6 style="margin-left:39px;margin-top: 16px;">
                                                            <div class="textfield js-textfield textfield--floating-label get-select full-size dropdown2"
                                                                style="display: flex; padding:0">
                                                                <input class="textfield__input" type="text"
                                                                    style="padding-left: 16px;width: 112px;"
                                                                    value="<?= $data[0]->waste_type ?>" id="waste_type"
                                                                    name="waste_type" readonly tabIndex="-1" />
                                                                <ul class="menu menu--bottom-left js-menu dark_dropdown"
                                                                    for="waste_type">
                                                                    <?php foreach ($waste as $w): ?>
                                                                        <li class="menu__item"
                                                                            onclick="SetForm('waste_type','<?= $w->Name ?>')">
                                                                            <?= $w->Name ?>
                                                                        </li>
                                                                    <?php endforeach; ?>
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
                                                    <h6>Weight</h6>
                                                    <h6 style="margin-left:50px;display: flex;">
                                                        <input type="text" placeholder="Enter the Weight" id="Weight"
                                                            name="Weight" class="textfield__input"
                                                            value="<?= $data[0]->Weight?>"> Kg
                                                        <label class="textfield__error" id="WeightError"
                                                            for="Weight"></label>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div style="margin-right: 100px">
                                                <div style="display: flex; margin-right: 60px;">
                                                    <h6>Note</h6>
                                                    <h6 style="margin-left:50px;">
                                                        <input type="text" placeholder="Enter the Note" id="Note"
                                                            name="Note" class="textfield__input"
                                                            value="<?= $data[0]->Note ?>" readonly>
                                                        <label class="textfield__error" id="NoteError"
                                                            for="Note"></label>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-left: 30px; display: flex;justify-content: space-between;">
                                            <div style="display: flex; ">
                                                <h6>pickup_address</h6>
                                                <h6 style="margin-left:50px;">
                                                    <input type="text" placeholder="Enter the pickup_address"
                                                        id="pickup_address" name="pickup_address"
                                                        class="textfield__input"
                                                        value="<?= $data[0]->pickup_address ?>">
                                                    <label class="textfield__error" id="pickup_addressError"
                                                        for="pickup_address"></label>
                                                </h6>
                                            </div>
                                            <div style="display: flex; margin-right: 105px;" id="InventoryIDdiv">
                                                <h6>Inventory ID</h6>
                                                <h6 style="margin-left:50px;">
                                                    <input type="text" placeholder="Enter the Inventory_ID"
                                                        id="Inventory_ID" name="Inventory_ID" class="textfield__input"
                                                        value="None" readonly>
                                                    <label class="textfield__error" id="Inventory_IDError"
                                                        for="Inventory_ID"></label>
                                                </h6>
                                            </div>
                                            <div style="margin-right: 242px; display: none" id="video">
                                                <video style="width: 200px;" id="preview"></video>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: flex;justify-content: end;margin-right: 74px;">
                                        <button type="button" onclick="getInvenId()"
                                            class="button js-button button--raised js-ripple-effect button--colored-green"
                                            style="border-radius: 99px;background-color: gray;color: white;">Scan</button>
                                        <button type="submit"
                                            class="button js-button button--raised js-ripple-effect button--colored-green"
                                            style="border-radius: 99px;background-color: green;color: white;">Collect</button>
                                    </div>
                                </form>
                            </div>

                            <script>
                                function SetForm(selection, form) {
                                    document.getElementById(selection).value = form;
                                 
                                }

                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php $this->view('include/footer') ?>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        let isScannerActive = false;
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });

        function getInvenId() {
            document.getElementById('video').style.display = 'block';
            document.getElementById('InventoryIDdiv').style.display = 'none';
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                    isScannerActive = true;
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
            scanner.addListener('scan', function (content) {
                console.log(content);
                verifyInventory(content);
            });
        }
        function verifyInventory(content) {
            // Create an XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Define the PHP file URL and the request method (POST in this example)
            var url = ROOT + '/collector/VerifyInventory';
            var method = 'POST';
            // Set up the request
            xhr.open(method, url, true);

            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            // Add session ID to the request header
            var data = 'Inventory_ID=' + encodeURIComponent(content);

            // Set up the callback function to handle the response
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Parse the response (assuming it's a JSON response)
                        var response = JSON.parse(xhr.responseText);
                        if(response == 'false'){
                            SideNotification(["Error: Invalid inventory", 'error']);
                        }else{
                            setdata(content);
                        }
                    } else {
                        console.error('Error: ' + xhr.status);
                    }
                }
            };
            // Send the request with the data
            xhr.send(data);
        }
        function setdata(content) {
            document.getElementById('Inventory_ID').value = content;
            document.getElementById('video').style.display = 'none';
            document.getElementById('InventoryIDdiv').style.display = 'flex';
        }
    </script>
    <?php $this->view('include/footer') ?>