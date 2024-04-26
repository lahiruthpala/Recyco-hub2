<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header is-upgraded">
        <header>
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div>
                <div class="card shadow--2dp">
                    <div class="card__supporting-text">
                        <div class="textfield js-textfield textfield--floating-label full-size">
                            <h6>
                                <?= $article->Article_Title ?>
                            </h6>
                        </div>
                        <div>
                            <?= $article->data ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php $this->view('include/footer') ?>