<?php
$this->view('include/head');


?>

<body>
    <div class="layout js-layout layout--fixed-drawer layout--fixed-header is-small-screen">
        <?php $this->view('include/header') ?>

        <main class="layout__content">
            <div class="grid">
                <div class="cell cell--12-col">

                    <?php if (is_array($row) && !empty($row)) :
                        foreach ($row as $row) : ?>
                            <div class="card shadow--2dp" style="width:900px;height:600px; margin-left: 250px;">
                                <div class="card__title" style="position: relative;">
                                    <h5 class="card__title-text text-color--white"></h5>
                                </div>
                                <div class="card__supporting-text">
                                    <form class= "form form--basic" action="<?= ROOT ?>/Ecommercesite/quantitycheck/<?= $row->product_Id ?>" method="POST">
                                        <div class="grid">
                                            <div class="cell cell--6-col-desktop cell--6-col-tablet cell--1-col-phone">
                                                <!-- Image -->
                                                <img src="<?=ROOT?>/images/ecommercesite_images/<?= strtolower($row->product_name) ?>.jpg" alt="Image" style="width: 400px; height: 300px; margin-top: 40px; margin-left: 40px;">
                                            </div>
                                            <div class="cell cell--6-col-desktop cell--6-col-tablet cell--1-col-phone" style="margin-top: 40px; margin-left: 230px;">
                                                <!-- Text content -->
                                                <h2 style="color: black; text-transform: capitalize;"><?= ($row->product_name) ?></h2>

                                                
                                                <div style="margin-top: 20px;">
                                                    <?php
                                                        $discountedPrice = $row->price - $row->price * ($row->discount / 100);
                                                    ?>
                                                    <p style="color: red; font-size: 30px;">RS&nbsp;<?= $discountedPrice ?>&nbsp;/Kg</p>
                                                    <p style="color: grey; font-size: 15px;"><strike>RS&nbsp;<?= $row->price ?>&nbsp;/Kg&nbsp;</strike>&nbsp;&nbsp;-<?= $row->discount ?>%</p>
                                                </div>
                                                <br>

                                                 <span class="label label--mini color--light-blue"><?= $row->status ?></span>
                                                <?php if ($row->status === 'In stock') : ?>
                                                <div style="margin-top: 20px;color: red;">
                                                <div style="display: flex; align-items: center;">
                                                       <label for="quantity" style="margin-right: 50px; color:black; margin-left: 0px; font-size:20px"><p>Quantity(kg)</p></label>
                                                       <input type="number" id="quantity" name="quantity"  style="font-size:15px" value="" required min="1">
                                                </div>

                                                </div>
                                            
                                                <div style="margin-top: 60px; display: flex;">
                                                <button type="submit" style="font-size: 15px; padding: 10px 20px; margin-right: 10px; width: 150px; background-color:#139571; color: white; border: none;">Pay Now</button>
                                                </div>
                                                <?php else : ?>
                                                    <div style="margin-top: 65px;">
                                                     <a href="<?= ROOT ?>/Ecommercesite/orderform/<?= $row->product_Id ?>"
                                                       style="font-size: 20px; padding: 10px 20px; width: 150px; background-color:#139571; color: white; border: none;margin-top:50px">Order Now</a>
                                                <?php endif; ?>
                                                </div>




                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Product not available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </main>

        <?php $this->view('include/footer') ?>
    </div>

   
</body>
</html>
