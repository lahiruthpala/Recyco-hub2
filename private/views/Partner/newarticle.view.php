<?php $this->view('include/head') ?>

<head>
    <link href="<?= ROOT ?>/css/popup.css" rel="stylesheet">
    <link href="<?= ROOT ?>/css/cropper.css" rel="stylesheet">
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
                        <form id="Article" action="<?= ROOT ?>/Partner/AddNewArticle" method="POST" enctype="multipart/form-data">
                            <div class="textfield full-size" style="display: flex;justify-content: center;">
                                <input class="textfield__input" type="text" id="floating-last-name" placeholder="Title"
                                    name="Article_Title"
                                    style="border: 0;border-bottom: solid 1px black;border-radius: 0;width: 70%;font-size: 61px;text-align: center;"
                                    value="<?= isset($article->Article_Title) ? $article->Article_Title : '' ?>">
                                <label class="textfield__label" for="floating-last-name"></label>
                            </div>
                            <div class="textfield" style="margin: 0px 20px 0px 200px;width: 70%;">
                                <input type="file" id="imageInput" name="imageInput">
                            </div>
                            <div class="textfield" style="margin: 10px 20px 10px 200px;width: 70%;">
                                <div>
                                    <textarea placeholder="Enter the Description" class="textfield__input" type="text"
                                        rows="4" name="Description" style="color: black;"></textarea>
                                </div>
                            </div>
                            <div style="color:black" id="editorjs"></div>
                            <div class="card__actions">
                                <button type="button" onclick="saveData(event,'Save','Article')"
                                    style="background-color: green;color: white;width: 146px;display: flex;"
                                    class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
                                    <img src="<?= ROOT ?>/images/save.svg" style="padding: 6px 10px;">Save</button>
                                <button onclick="saveData(event,'Publish','Article')"
                                    style="background-color: green;color: white;width: 146px;display: flex;"
                                    class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
                                    <img src="<?= ROOT ?>/images/published.svg"
                                        style="padding: 6px 10px;">Publish</button>
                            </div>
                        </form>
                        <div class="modal" id="modal" style="width: 600px;">
                            <div class="container">
                                <h6>Cropper the image image size()</h6>
                                <div>
                                    <div id="hideImage">
                                        <img id="preview" src="" alt="Picture">
                                    </div>
                                    <img id="cropimage" src="">
                                </div>
                                <button id="cropButton">Crop</button>
                            </div>
                        </div>
                        <div id="overlay"></div>
                    </div>
                </div>
            </div>
        </main>
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
        <script src="https://cdn.jsdelivr.net/npm/cropperjs@latest"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var image = document.getElementById('preview');
                var imageInput = document.getElementById('imageInput');
                var cropper;

                imageInput.addEventListener('change', function (event) {
                    const modal = document.getElementById('modal')
                    console.log(modal);
                    openModal(modal)
                    var files = event.target.files;
                    var reader = new FileReader();
                    reader.onload = function () {
                        image.src = reader.result;
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(image, {
                            dragMode: 'move',
                            aspectRatio: 350 / 250,
                            autoCropArea: 0.65,
                            restore: false,
                            guides: false,
                            center: false,
                            highlight: false,
                            cropBoxMovable: false,
                            cropBoxResizable: false,
                            toggleDragModeOnDblclick: false,
                            crop: function (e) {
                                console.log(e.detail.x);
                                console.log(e.detail.y);
                                console.log(e.detail.width);
                                console.log(e.detail.height);
                                console.log(e.detail.rotate);
                                console.log(e.detail.scaleX);
                                console.log(e.detail.scaleY);
                            }
                        });
                    };
                    reader.readAsDataURL(files[0]);
                });

                document.getElementById('cropButton').addEventListener('click', function () {
                    var croppedCanvas = cropper.getCroppedCanvas({
                        width: 350,
                        height: 250,
                    });

                    // Convert cropped canvas to base64 encoded image
                    var croppedImage = croppedCanvas.toDataURL('image/jpeg');
                    console.log('clicked', croppedImage);
                    // You can use the croppedImage data URL for your desired purpose (e.g., setting it as src of an image element)
                    document.getElementById('cropimage').src = croppedImage;
                    document.getElementById('hideImage').style.display = 'none';

                    console.log('clicked', image.src);
                });
            });
        </script>
        <?php $this->view('include/footer') ?>