<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-drawer layout--fixed-header is-small-screen">
        <?php $this->view('include/ecommercesiteHeader') ?>
        <main class="layout__content">
            <div class="grid ui-cards" style="display: flex; flex-wrap: wrap;">
                <?php if (is_array($rows) && !empty($rows)) :
                    foreach ($rows as $data) : ?>
                        <div class="cell cell--4-col-desktop cell--4-col-tablet cell--4-col-phone">
                            <div class="card shadow--2dp" style="max-width: 250px; max-height: 450px; display: flex; flex-direction: column;">
                                <img src="<?= ROOT ?>/images/ecommercesite_images/<?= strtolower($data->product_name) ?>.jpg" alt="<?= $data->product_name ?>" style="max-width: 100%; height: auto; display: block;">
                                <div class="card__supporting-text" style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                    <div class="card__supporting-text card--expand" style="padding: 0; text-align: center; margin-bottom: 10px;">
                                        <h4 style="color: black;"><?= $data->product_name ?></h4>
                                        <b><h5 style="color: black;"><?= $data->price ?> /Kg</h5></b>
                                        <?php if ($data->discount) : ?>
                                          <b><h4 style="color: red;"><?= $data->discount ?>% Off</h4></b>
                                          <?php endif; ?>

                                        <span class="label label--mini color--light-blue"><?= $data->status ?></span>
                                    </div>
                                    <div class="card__actions" style="padding: 0; text-align: center; margin-top: -10px; padding-bottom: 10px;">
                                        <?php if ($data->status == 'In stock') : ?>
                                            <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                               href="<?= ROOT ?>/Ecommercesite/details/<?= $data->product_Id ?? '' ?>"
                                               target="_blank"
                                               style="max-width: 100%;">
                                                Add to cart&nbsp;&nbsp;<i class="material-icons">shopping_cart</i>
                                            </a>
                                        <?php elseif ($data->status == 'Out of stock') : ?>
                                            <a class="button js-button button--raised js-ripple-effect button--colored-green"
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
</body>
</html>
