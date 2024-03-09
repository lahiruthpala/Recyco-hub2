<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header">
        <header class="layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div>
                <h5 class="card__title-text" id="tableTitle"
                    style="color: black;margin: 68px 15px 15px 42px;font-size: 15px;">
                    Create New Article</h5>
                <div class="card shadow--2dp">
                    <div class="card__supporting-text">
                        <form class="form form--basic" method="POST">
                            <div class="textfield js-textfield textfield--floating-label full-size">
                                <input class="textfield__input" type="text" id="floating-last-name" placeholder="Title"
                                    name="Artical_Title"
                                    value="<?= isset($article->Artical_Title) ? $article->Artical_Title : '' ?>">
                                <label class="textfield__label" for="floating-last-name"></label>
                            </div>

                            <div class="textfield js-textfield textfield--floating-label full-size">
                                <input class="textfield__input" type="text" id="floating-e-mail"
                                    placeholder="Discription" name="Discription"
                                    value="<?= isset($article->Discription) ? $article->Discription : '' ?>">
                                <label class="textfield__label" for="floating-e-mail"></label>
                            </div>
                            <div style="color:black" id="editorjs"></div>
                            <div class="card__actions">
                                <button type="submit"
                                    style="background-color: green;color: white;width: 146px;display: flex;"
                                    class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
                                    <img src="<?= ROOT ?>/images/save.svg" style="padding: 6px 10px;">Save</button>
                                <button type="submit" id="save-button"
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
        <script>
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
                        config: {
                            uploader: {
                                uploadByFile(file) {
                                    // your own uploading logic here
                                    return MyAjax.upload(file).then(() => {
                                        return {
                                            success: 1,
                                            file: {
                                                url: 'https://example.com/uploads/image.jpg',
                                                // any other image data you want to store, such as width, height, color, extension, etc
                                            }
                                        };
                                    });
                                },
                                uploadByUrl(url) {
                                    // your ajax request for uploading
                                    return MyAjax.upload(url).then(() => {
                                        return {
                                            success: 1,
                                            file: {
                                                url: 'https://example.com/uploads/image.jpg',
                                                // any other image data you want to store, such as width, height, color, extension, etc
                                            }
                                        };
                                    });
                                }
                            }
                        }
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
                }
            });
            var temp = "";
            // Save data when the user clicks the "Save" button
            document.getElementById('save-button').addEventListener('click', () => {
                editor.save().then((savedData) => {
                    // Display the saved data in the textarea
                    temp = savedData;
                    console.log(temp);
                });
            });
        </script>
        <?php $this->view('include/footer') ?>