<?php $this->view('include/head') ?>
<body>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <?php $this->view('include/header') ?>
    <main class="mdl-layout__content">
        <div class="mdl-grid ui-cards" style="display: flex; flex-wrap: wrap;">
            <?php if (is_array($rows) && !empty($rows)) :
                foreach ($rows as $data) : ?>
                    <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--4-col-phone"> <!-- Adjusted column size to fit 4 tiles -->
                        <div class="mdl-card mdl-shadow--2dp" style="max-width: 300px; max-height: 450px; display: flex; flex-direction: column;">
                        <img src="<?= ROOT ?>/images/<?= strtolower($data->product_name) ?>.jpg" alt="<?= $data->product_name ?>" style="max-width: 100%; height: auto; display: block; margin: 10px auto 5px;">
                            <div class="mdl-card__supporting-text" style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                <div class="mdl-card__supporting-text mdl-card--expand" style="text-align: center; margin-bottom: 10px;">
                                    <h5><?= $data->product_name ?></h5>
                                    <b><?= $data->price ?></b> /Kg
                                    <br>
                                    <span class="label label--mini color--light-blue"><?= $data->status ?></span>
                                </div>
                                <div class="mdl-card__actions" style="text-align: center; margin-top: -10px;padding-bottom: 10px;">
                                    <?php if ($data->status == 'In stock') : ?>
                                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                           href="#"
                                           target="_blank"
                                           style="max-width: 100%;">
                                            Add to cart&nbsp;&nbsp;<i class="material-icons">shopping_cart</i>
                                        </a>
                                    <?php elseif ($data->status == 'Out of stock') : ?>
                                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                           href="#"
                                           target="_blank"
                                           style="max-width: 100%;">
                                            Add to wishlist&nbsp;&nbsp;<i class="material-icons">favorite_border</i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No pickup jobs available.</p>
            <?php endif; ?>
        </div>
    </main>
</div>


<!-- inject:js -->

<!-- endinject -->

<?php $this->view('include/footer') ?>