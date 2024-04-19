<?php global $activeTab;
$activeTab = 2;
$this->view('include/head');
require_once (APP_ROOT . "/controllers/Partner.php");
$partner = new Partner(); ?>

<body>
    <div class="layout js-layout layout--fixed-header">
        <header class="layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <div class="card shadow--2dp">
                    <div id="buttonToggle" class="buttonToggle">
                        <button onclick="loadComponent('PublishedArticles')" style="margin: 4px 10px 4px 4px;"
                            id="PublishedArticles_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-green">Published
                            Articles</Button>
                        <button onclick="loadComponent('DraftArticles')" style="margin: 4px 10px 4px 4px;"
                            id="DraftArticles_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-smoke">Draft
                            Article</Button>
                        <button onclick="window.location.href = '<?= ROOT ?>/Partner/AddNewArticle'" style="margin: 4px 10px 4px 4px;"
                            id="NewArticle_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-smoke">New
                            Article</Button>
                    </div>
                    <?php
                    $partner->PublishedArticles();
                    $partner->DraftsArticles();
                    ?>
                </div>
            </div>
    </div>
    </main>

    </div>
<?php $this->view('include/footer') ?>