<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="#">
                <div class="mdl-card__title">
                    <h2>Please complete the form</h2>
                    <div class="mdl-card__subtitle"></div>
                </div>

                <div class="mdl-card__supporting-text">
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                        header("Location: " . ROOT . "collector/index"); // Change "/redirect-page" to the appropriate URL
                        exit();
                    }
                    ?>
                    <form
                        action="<?= ROOT ?>/collector/store/<?= $data->Pickup_ID ?? '' ?>/Accepted/<?= $data->Job_ID ?? '' ?>"
                        method="POST" class="form">
                        <div class="form__article">
                            <h3>Inventory Details</h3>
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label"
                                    style="display: flex; align-items: center;">
                                    <input class="mdl-textfield__input" type="text" id="inventoryId" value=""
                                        name="InventoryId" readonly>
                                    <button type="button" onclick="getInvenId()"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                        style="margin-left: 400px; ">scan</button>
                                </div>
                            </div>
                            <div class="form__article">
                                <div class="mdl-grid">
                                    <div
                                        class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" value=<?= $data->waste_type ?>
                                            id="wasteType" name="wasteType" />
                                        <label class="mdl-textfield__label" for="position">waste Types</label>
                                    </div>

                                    <div class="mdl-grid">
                                        <div
                                            class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" value=<?= $data->weight ?>
                                                id="weight" name="weight" />
                                            <label class="mdl-textfield__label" for="position">Weight</label>
                                        </div>
                                    </div>
                                    <div class="form__action">
                                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect"
                                            for="isInfoReliable">
                                            <input type="checkbox" id="isInfoReliable" class="mdl-checkbox__input"
                                                required />
                                            <span class="mdl-checkbox__label">Entered information is reliable</span>
                                        </label>
                                        <button id="submit_button"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent"
                                            style="position: absolute; bottom: 0; right: 0; margin: 20px;">
                                            Submit
                                        </button>
                                    </div>
                    </form>
                    <video id="preview" style="padding: 100px; transform: scaleX(-1);max-width: 400px;max-height: 400px;""></video>
                </div>
            </div>
        </main>
    </div>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        let isScannerActive = false;
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });

        function getInvenId() {
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
                document.getElementById('inventoryId').value = content;
            });
        }
    </script>
    <?php $this->view('include/footer') ?>