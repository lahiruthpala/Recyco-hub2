<?php $this->view('include/head') ?>

<head>
    <link rel="stylesheet" href="<?= ROOT ?>/css/popup.css">
</head>

<body>
    <div class="layout js-layout layout--fixed-header">
        <header class="layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div style="margin-top: 34px;">
                <div class="card shadow--2dp">
                    <div class="card__supporting-text">
                        <form id="Event" action="<?= ROOT ?>/Partner/AddNewEvent" method="POST">
                            <div class="textfield full-size" style="display: flex;justify-content: center;">
                                <input class="textfield__input" type="text" placeholder="Event Name" name="Event_Title"
                                    style="border: 0;border-bottom: solid 1px black;border-radius: 0;width: 70%;font-size: 61px;text-align: center;">
                                <label class="textfield__label" for="floating-last-name"></label>
                            </div>
                            <div class="textfield" style="margin: 10px 20px 10px 200px;width: 70%;">
                                <div>
                                    <textarea placeholder="Enter a small description about the event"
                                        class="textfield__input" type="text" rows="4" name="Description"
                                        style="color: black;"></textarea>
                                </div>
                            </div>
                            <div class="textfield full-size"
                                style="display: flex;justify-content: center;align-items: center;">
                                <h6 style="color: black;margin-right: 20px;">Event Starting Date</h6>
                                <input class="textfield__input" type="date" placeholder="Content"
                                    oninput="setEventFinishData()" name="Event_Starting_Data"
                                    style="width: 11%;height: 30px;margin-right: 30px;" required
                                    min="<?= date('Y-m-d') ?>">
                                <h6 style="color: black;margin-right: 20px;">Event Ending Date</h6>
                                <input class="textfield__input" type="date" placeholder="Content"
                                    name="Event_Finish_Data" style="width: 11%;height: 30px;margin-right: 60px;"
                                    required min="" disabled>
                                <h6 style="color: black;margin-right: 20px;">Mode</h6>
                                <select class="textfield__input" name="Event_Mode"
                                    style="width: 11%; height: 30px;color: black;">
                                    <option value="Online">Physical</option>
                                    <option value="Offline">Online</option>
                                    <option value="Online">Semi</option>
                                </select>
                            </div>
                            <div class="textfield full-size"
                                style="display: flex;justify-content: center;justify-content: space-between;width: 70%;margin-left: 16%;">
                                <div style="display: flex;justify-content: start;align-items: center;">
                                    <h6 style="color: black;margin-right: 20px;width: 140px;">Event Location</h6>
                                    <input id='latitude' type="text" name="latitude" hidden>
                                    <input id='longitude' type="text" name="longitude" hidden>
                                    <input class="textfield__input" type="text" placeholder="Content"
                                        name="Event_location" style="width: 50%;height: 30px;margin-right: 30px;"
                                        required>
                                    <button type="button" style="width: 100px;" data-modal-target="#location"
                                        openModal>Get Location</button>
                                </div>
                                <div style="display: flex;justify-content: start;align-items: center;">
                                    <button style="height: 30px;">Add thumbnail</button>
                                </div>
                            </div>
                            <div style="color:black" id="editorjs"></div>
                            <div class="card__actions">
                                <button type="button" onclick="saveData(event, 'Save', 'Event')"
                                    style="background-color: green;color: white;width: 146px;display: flex;"
                                    class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
                                    <img src="<?= ROOT ?>/images/save.svg" style="padding: 6px 10px;">Save</button>
                                <button onclick="saveData(event,'Publish' , 'Event')"
                                    style="background-color: green;color: white;width: 146px;display: flex;"
                                    class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
                                    <img src="<?= ROOT ?>/images/published.svg"
                                        style="padding: 6px 10px;">Publish</button>
                            </div>
                        </form>
                        <div class="modal" id="location" style="display:none">
                            <div id="map" style="height: 500px; width: 1000px"></div>
                        </div>
                        <div id="overlay"></div>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/raw@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= ROOT ?>/js/EditorJS.js"></script>
    <script src="<?= ROOT ?>/js/popup.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyn3Iymp1NpFUBho-3HfzzMrnJSLKaqgA"></script>
    <script type="text/javascript" src="<?= ROOT ?>/js/gmap.js"></script>
    <script>
        function setEventFinishData() {
            var startingDate = document.querySelector('input[name="Event_Starting_Data"]').value;
            var finishDate = document.querySelector('input[name="Event_Finish_Data"]');
            finishDate.value = startingDate;
            finishDate.min = startingDate;
            finishDate.disabled = false;
        }
    </script>

    <?php $this->view('include/footer') ?>