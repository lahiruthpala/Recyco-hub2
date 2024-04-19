<?php $this->view('include/head') ?>
<body>
    <div class="layout js-layout layout--fixed-drawer layout--fixed-header is-small-screen">
        <?php $this->view('include/ecommercesiteHeader') ?>
       
        <main class="layout__content">
        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone" style="margin-top: 20px;margin-left: 50px;border-radius: 30px; overflow: hidden;">
    <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title"></div>
        <div class="mdl-card__supporting-text no-padding">
        <table class="mdl-data-table mdl-js-data-table" style="box-shadow: 5px 5px 5px rgba(0,0,0,0.1); width:400px;">
    <tbody>
        <tr style="height:50px;background-color: #ffffff;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='#ffffff';">
            <td class="mdl-data-table__cell--non-numeric" style="color: black;padding:10px; position: relative;">
                <div style="text-align:left;">
                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/polythene">Polythene</a> 
                    <i class="material-icons" style="vertical-align: middle;">chevron_right</i>
                </div>
            </td>
        </tr>

        <tr style="height:50px;background-color: #ffffff;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='#ffffff';">
            <td class="mdl-data-table__cell--non-numeric" style="color: black;padding:10px; position: relative;">
                <div style="text-align: left;">
                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/plastic">Plastic</a> 
                    <i class="material-icons" style="vertical-align: middle;">chevron_right</i>
                </div>
            </td>
        </tr>

        <tr style="height:50px;background-color: #ffffff;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='#ffffff';">
            <td class="mdl-data-table__cell--non-numeric" style="color: black;padding:10px; position: relative;">
                <div style="text-align: left;">
                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/glass">Glass</a>
                    <i class="material-icons" style="vertical-align: middle;">chevron_right</i>
                </div>
            </td>
        </tr>

        <tr style="height:50px;background-color: #ffffff;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='#ffffff';">
            <td class="mdl-data-table__cell--non-numeric" style="color: black;padding:10px; position: relative;">
                <div style="text-align: left;">
                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/cloth">Cloth</a>
                    <i class="material-icons" style="vertical-align: middle;">chevron_right</i>
                </div>
            </td>
        </tr>

        <tr style="height:50px;background-color: #ffffff;" onmouseover="this.style.backgroundColor='#e0e0e0'" onmouseout="this.style.backgroundColor='#ffffff';">
            <td class="mdl-data-table__cell--non-numeric" style="color: black;padding:10px; position: relative;">
                <div style="text-align: left;">
                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/metal">Metal</a>
                    <i class="material-icons" style="vertical-align: middle;">chevron_right</i>
                </div>
            </td>
        </tr>
    </tbody>
</table>

        </div>
    </div>
</div>

<div class="grid ui-cards" style="display: flex; flex-wrap: wrap;">
    <?php if (is_array($rows) && !empty($rows)) :
        foreach ($rows as $data) : ?>
            <div class="cell cell--4-col-desktop cell--4-col-tablet cell--4-col-phone">
                <a href="<?= ROOT ?>/Ecommercesite/details/<?= $data->product_Id ?? '' ?>" style="text-decoration: none; color: inherit;">
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
                        </div>
                    </div>
                </a>
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
