<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-drawer layout--fixed-header is-small-screen">
        <?php $this->view('include/ecommercesiteHeader') ?>
        <main class="layout__content">
            <div
                style="width:1200px;height:500px; margin-left: 100px;margin-bottom:100px;background-color: green;margin-top:20px;border-radius: 15px; overflow: hidden;">
                <div class="card__supporting-text">
                    <div class="grid">
                        <div class="cell cell--6-col-desktop cell--6-col-tablet cell--1-col-phone"
                            style="position: relative;">
                            <div style="position: relative; display: inline-block;">
                                <img id="image" src="<?= ROOT ?>/images/ecommercesite_images/glass.jpg" alt="Image"
                                    style="width: 600px; height: 400px; margin-top: 10px; margin-left: 40px;">
                                <button onclick="changeImage('prev')"
                                    style="position: absolute; top: 50%; left: 40px; transform: translateY(-50%);"><i
                                        class="material-icons">chevron_left</i></button>
                                <button onclick="changeImage('next')"
                                    style="position: absolute; top: 50%; right: 0px; transform: translateY(-50%);"><i
                                        class="material-icons">chevron_right</i></button>
                                <div id="product-info"
                                    style="position: absolute; bottom: 10px; left: 40px; color: #333; font-size: 18px; font-weight: bold; background-color: green; padding: 10px;">
                                    <h2 id="product-name" style="display: inline; margin-right: 10px;color:black"></h2>
                                    <h2 style="display: inline;"> <span id="product-discount"
                                            style="color: white;"></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="cell cell--6-col-desktop cell--6-col-tablet cell--1-col-phone"
                            style="margin-top: 40px; margin-left: 400px;">
                            <div class="mdl-card__supporting-text no-padding">
                                <table class="mdl-data-table mdl-js-data-table"
                                    style="box-shadow: 5px 5px 5px rgba(0,0,0,0.1); width:300px;">
                                    <tbody>
                                        <tr style="height:50px;background-color: #ffffff;"
                                            onmouseover="this.style.backgroundColor='#e0e0e0'"
                                            onmouseout="this.style.backgroundColor='#ffffff';">
                                            <td class="mdl-data-table__cell--non-numeric"
                                                style="color: black;padding:10px; position: relative;">
                                                <div style="text-align:left;">
                                                    <a
                                                        href="<?= ROOT ?>/Ecommercesite/productclasses/polythene">Polythene</a>
                                                    <i class="material-icons"
                                                        style="vertical-align: middle;">chevron_right</i>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr style="height:50px;background-color: #ffffff;"
                                            onmouseover="this.style.backgroundColor='#e0e0e0'"
                                            onmouseout="this.style.backgroundColor='#ffffff';">
                                            <td class="mdl-data-table__cell--non-numeric"
                                                style="color: black;padding:10px; position: relative;">
                                                <div style="text-align: left;">
                                                    <a
                                                        href="<?= ROOT ?>/Ecommercesite/productclasses/plastic">Plastic</a>
                                                    <i class="material-icons"
                                                        style="vertical-align: middle;">chevron_right</i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="height:50px;background-color: #ffffff;"
                                            onmouseover="this.style.backgroundColor='#e0e0e0'"
                                            onmouseout="this.style.backgroundColor='#ffffff';">
                                            <td class="mdl-data-table__cell--non-numeric"
                                                style="color: black;padding:10px; position: relative;">
                                                <div style="text-align: left;">
                                                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/glass">Glass</a>
                                                    <i class="material-icons"
                                                        style="vertical-align: middle;">chevron_right</i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="height:50px;background-color: #ffffff;"
                                            onmouseover="this.style.backgroundColor='#e0e0e0'"
                                            onmouseout="this.style.backgroundColor='#ffffff';">
                                            <td class="mdl-data-table__cell--non-numeric"
                                                style="color: black;padding:10px; position: relative;">
                                                <div style="text-align: left;">
                                                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/Paper">Paper</a>
                                                    <i class="material-icons"
                                                        style="vertical-align: middle;">chevron_right</i>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr style="height:50px;background-color: #ffffff;"
                                            onmouseover="this.style.backgroundColor='#e0e0e0'"
                                            onmouseout="this.style.backgroundColor='#ffffff';">
                                            <td class="mdl-data-table__cell--non-numeric"
                                                style="color: black;padding:10px; position: relative;">
                                                <div style="text-align: left;">
                                                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/cloth">Cloth</a>
                                                    <i class="material-icons"
                                                        style="vertical-align: middle;">chevron_right</i>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr style="height:50px;background-color: #ffffff;"
                                            onmouseover="this.style.backgroundColor='#e0e0e0'"
                                            onmouseout="this.style.backgroundColor='#ffffff';">
                                            <td class="mdl-data-table__cell--non-numeric"
                                                style="color: black;padding:10px; position: relative;">
                                                <div style="text-align: left;">
                                                    <a href="<?= ROOT ?>/Ecommercesite/productclasses/metal">Metal</a>
                                                    <i class="material-icons"
                                                        style="vertical-align: middle;">chevron_right</i>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid ui-cards" style="display: flex; flex-wrap: wrap;margin-left: 130px;">
                <?php if (is_array($rows) && !empty($rows)):
                    foreach ($rows as $data): ?>
                        <div class="cell cell--4-col-desktop cell--4-col-tablet cell--4-col-phone">
                            <a href="<?= ROOT ?>/Ecommercesite/details/<?= $data->product_Id ?? '' ?>"
                                style="text-decoration: none; color: inherit;">
                                <div class="card shadow--2dp"
                                    style="max-width: 250px; max-height: 450px; display: flex; flex-direction: column;">
                                    <img src="<?= ROOT ?>/images/ecommercesite_images/<?= strtolower($data->product_name) ?>.jpg"
                                        alt="<?= $data->product_name ?>" style="max-width: 100%; height: auto; display: block;">
                                    <div class="card__supporting-text"
                                        style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                        <div class="card__supporting-text card--expand"
                                            style="padding: 0; text-align: center; margin-bottom: 10px;">
                                            <h4 style="color: black;"><?= $data->product_name ?></h4>
                                            <b>
                                                <h5 style="color: black;"><?= $data->price ?> /Kg</h5>
                                            </b>
                                            <?php if ($data->discount): ?>
                                                <b>
                                                    <h4 style="color: red;"><?= $data->discount ?>% Off</h4>
                                                </b>
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
    <?php $this->view('include/footer') ?>
</body>
<script>
    var images = [];
    var productNames = [];
    var discounts = [];

    <?php foreach ($rows as $data): ?>
        <?php if (!is_null($data->discount)): ?>
            images.push("<?= ROOT ?>/images/ecommercesite_images/<?= strtolower($data->product_name) ?>.jpg");
            productNames.push("<?= $data->product_name ?>");
            discounts.push("<?= $data->discount ?>% off");
        <?php endif; ?>
    <?php endforeach; ?>

    var currentIndex = 0;


    function updateContent() {
        document.getElementById('image').src = images[currentIndex] || '<?= ROOT ?>/images/no-image.jpg'; // Fallback to a default image
        document.getElementById('product-name').textContent = productNames[currentIndex] || 'No Product';
        document.getElementById('product-discount').textContent = discounts[currentIndex] || 'No Discount';
    }

    if (images.length > 0) {
        updateContent();
    }

    function changeImage(direction) {
        if (direction === 'prev') {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
        } else {
            currentIndex = (currentIndex + 1) % images.length;
        }
        updateContent();
    }
</script>

</html>