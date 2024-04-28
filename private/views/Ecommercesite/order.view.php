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
                                    <form class="form form--basic" action="<?= ROOT ?>/Ecommercesite/order/<?= $row->product_Id ?>" method="POST">
                                        <div class="grid">
                                            <div class="cell cell--6-col-desktop cell--6-col-tablet cell--1-col-phone">
                                              
                                                <img src="<?=ROOT?>/images/ecommercesite_images/<?= strtolower($row->product_name) ?>.jpg" alt="Image" style="width: 400px; height: 300px; margin-top: 40px; margin-left: 40px;">
                                            </div>
                                            <div class="cell cell--6-col-desktop cell--6-col-tablet cell--1-col-phone" style="margin-top: 60px; margin-left: 230px;">
                                               
                                                <div style="display: flex; align-items: center;">
                                                    <label for="product-name" style="margin-right: 80px; color:black; margin-left: 10px; font-size:20px"><p style="margin-right:5px;">Product</p></label>
                                                    <input type="text" id="product-name" name="product-name" style="font-size:15px" value="<?= $row->product_name ?>" readonly>
                                                </div>

                                              
                                                <div style="display: flex; align-items: center;">
                                                    <label for="price" style="margin-right: 30px; color:black; margin-left: 10px; font-size:20px;"><p style="margin-right:30px;">Price(1Kg)</p></label>
                                                    <input type="text" id="price" name="price"  style="font-size:15px" value="<?= $row->price ?>" readonly>
                                                </div>

                                              <?php if($row->discount!=Null): ?>
                                                <div style="display: flex; align-items: center;">
                                                    <label for="discount" style="margin-right: 78px; color:black; margin-left: 10px; font-size:20px"><p>Discount</p></label>
                                                    <input type="text" id="discount" name="discount"  style="font-size:15px" value="<?= $row->discount ?>%" readonly>
                                                </div>
                                               <?php else: ?>
                                                <div style="display: flex; align-items: center;">
                                                    <label for="discount" style="margin-right: 78px; color:black; margin-left: 10px; font-size:20px"><p>Discount</p></label>
                                                    <input type="text" id="discount" name="discount"  style="font-size:15px" value="0%" readonly>
                                                </div>   
                                                <?php endif; ?>

                                             
                                                <div style="display: flex; align-items: center;">
                                                       <label for="quantity" style="margin-right: 50px; color:black; margin-left: 10px; font-size:20px"><p>Quantity(kg)</p></label>
                                                       <input type="number" id="quantity" name="quantity"  style="font-size:15px" value="" required min="1">
                                                </div>


                                               
                                                <div style="margin-top: 30px;">
                                                    <button type="submit" style="padding: 10px 20px; background-color: #139571; color: white; border: none;font-size:20px;">Place Order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>product not available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </main>

        <?php $this->view('include/footer') ?>
    </div>

</body>
</html>
