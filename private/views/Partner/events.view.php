<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header">
        <header class="layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <div class="card shadow--2dp">
                    <div id="buttonToggle" class="buttonToggle">
                        <button onclick="window.location.href = '<?= ROOT ?>/Partner/Articles'"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            style="margin: 4px 10px 4px 4px;">Upcomming Events</Button>
                        <button onclick="window.location.href = '<?= ROOT ?>/Partner/Articles'"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            style="margin: 4px 10px 4px 4px;">OnGoing Events</Button>
                        <button id="stock" onclick="window.location.href = '<?= ROOT ?>/Partner/addnew'"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            style="margin: 4px 10px 4px 4px;"> Finished Events</Button>
                        <button id="stock" onclick="window.location.href = '<?= ROOT ?>/Partner/addnew'"
                            class="button js-button button--raised js-ripple-effect button--colored-green"
                            style="margin: 4px 10px 4px 4px;"> + New Events</Button>
                    </div>
                    <div style="display: flex;flex-direction: row;flex-wrap: wrap;">
                        <?php
                        if (is_array($articles) && !empty($articles)) {
                            foreach ($articles as $article) {
                                // Your table row generation code here
                                ?>
                                <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone">
                                    <div class="card shadow--2dp" style="background-color: #444;">
                                        <div class="card__title">
                                            <h2 class="card__title-text">
                                                <?= $article->Event_Title ?>
                                            </h2>
                                        </div>
                                        <div class="card__supporting-text card--expand">
                                            <?= $article->Discription ?><br><br>
                                        </div>
                                        <div class="card__actions">
                                            <a style="background-color: #16C784; border-radius: 20px; margin-left: 10px;"
                                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/Partner/addNew/<?= $article->Event_ID ?>">
                                                Edit
                                            </a>
                                            <a style="background-color: #16C784; border-radius: 20px;"
                                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/Partner/ArticleDelete/<?= $article->Event_ID ?>">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            // If $rows is not an array or is empty
                            echo "No data available.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php $this->view('include/footer') ?>