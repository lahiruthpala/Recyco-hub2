<?php global $activeTab;
$activeTab = 2;
$this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header">
        <header class="layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div style="margin-top: 34px;">
                <div class="card shadow--2dp">
                    <div class="card__supporting-text">
                        <label id="data" hidden>
                            <?= $article->Data ?>
                        </label>
                        <form id="Article" action="<?= ROOT ?>/Partner/EditArticle/<?= $article->Article_ID ?>"
                            method="POST">
                            <div class="textfield full-size" style="display: flex;justify-content: center;">
                                <input class="textfield__input" type="text" id="floating-last-name" placeholder="Title"
                                    name="Article_Title"
                                    style="border: 0;border-bottom: solid 1px black;border-radius: 0;width: 70%;font-size: 61px;text-align: center;"
                                    value="<?= isset($article->Article_Title) ? $article->Article_Title : '' ?>">
                                <label class="textfield__label" for="floating-last-name"></label>
                            </div>
                            <div class="textfield" style="margin: 10px 20px 10px 200px;width: 70%;">
                                <div>
                                    <textarea placeholder="Enter the Description" class="textfield__input" type="text"
                                        rows="4" name="Description" style="color: black;"><?= isset($article->Description) ? $article->Description : '' ?></textarea>
                                </div>
                            </div>
                            <div style="color:black" id="editorjs"></div>
                            <div class="card__actions">
                                <button type="button" onclick="saveData(event)"
                                    style="background-color: green;color: white;width: 146px;display: flex;"
                                    class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
                                    <img src="<?= ROOT ?>/images/save.svg" style="padding: 6px 10px;">Save</button>
                                <button onclick="saveData(event)"
                                    style="background-color: green;color: white;width: 146px;display: flex;"
                                    class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
                                    <img src="<?= ROOT ?>/images/published.svg"
                                        style="padding: 6px 10px;">Publish</button>
                            </div>
                        </form>
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
        <script>
            var data = JSON.parse(document.getElementById("data").textContent);
            console.log(data)
            const editor = new EditorJS({
                holder: 'editorjs',
                tools: {
                    header: {
                        class: Header,
                        config: {
                            placeholder: 'Enter a header'
                        }
                    },
                    raw: {
                        class: RawTool
                    },
                    simpleImage: {
                        class: SimpleImage
                    },
                    image: {
                        class: ImageTool,
                        endpoints: {
                            byUrl: ROOT + "Partner/uploadImage",
                        },
                    },
                    checklist: {
                        class: Checklist,
                    },
                    list: {
                        class: List
                    },
                    quote: {
                        class: Quote
                    },
                },
                data,
            });
            // Save data when the user clicks the "Save" button
            function saveData(e) {
                e.preventDefault();
                console.log("jsdbhvkjdhv")
                editor.save()
                    .then((outputData) => {
                        // Create a form element
                        const form = document.getElementById('Article');
                        // Create an input element to hold the outputData
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'Data';
                        input.value = JSON.stringify(outputData);

                        // Append the input element to the form
                        form.appendChild(input);

                        // Submit the form
                        form.submit();
                    })
                    .catch((error) => {
                        console.log('Saving failed: ', error);
                    });
            }

        </script>
        <?php $this->view('include/footer') ?>