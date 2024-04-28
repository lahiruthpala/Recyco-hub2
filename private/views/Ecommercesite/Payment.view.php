<head>
    <link href="<?= ROOT ?>/css/Checkout.css" rel="stylesheet">
</head>
<div class="row" style="width: 50%;transform: translate(53%,6%);">
    <div class="col-75">
        <div class="container">
            <form id="checkout-form" method="post" action="https://sandbox.payhere.lk/pay/checkout">
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> First Name</label>
                        <input type="text" id="fname" name="first_name" placeholder="Enter the name">
                        <label for="fname"><i class="fa fa-user"></i> Last Name</label>
                        <input type="text" id="fname" name="last_name" placeholder="Enter the name">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="Enter the Email">
                        <label for="email"><i class="fa fa-envelope"></i>Contact No.</label>
                        <input type="text" id="email" name="phone" placeholder="Enter the Email">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="Address">
                        <input type="hidden" name="merchant_id" value="<?= $data['merchantID'] ?>">
                        <input type="hidden" name="return_url" value="<?= ROOT ?>/Ecommercesite">
                        <input type="hidden" name="cancel_url" value="<?= ROOT ?>/Ecommercesite">
                        <input type="hidden" name="notify_url" value="<?= ROOT ?>/Payment">
                        <input type="text" name="amount" value="<?= $data['amount'] ?>" hidden readonly>
                        <input type="text" name="currency" value="<?= $data['currency'] ?>" hidden readonly>
                        <input type="text" name="order_id" value="<?= $data['order_id'] ?>" hidden readonly>
                        <input type="text" name="items" value="<?= $data['items'][0]->product_name ?>" hidden readonly>
                        <div class="row">
                            <div class="col-50">
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                <input type="text" id="city" name="city" placeholder="City">
                            </div>
                            <div class="col-50">
                                <label for="state">Country</label>
                                <input type="text" id="country" name="country" placeholder="country">
                            </div>
                        </div>
                        <input type="hidden" name="hash" value="<?= $data['hash'] ?>" hidden>
                    </div>
                </div>
                <label>
                    <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                </label>
                <input type="submit" value="Continue to checkout" class="btn">
            </form>
        </div>
    </div>

    <div class="col-25">
        <div class="container">
            <h4>Cart
                <span class="price" style="color:black">
                    <i class="fa fa-shopping-cart"></i>
                    <b><?= count($data['items']) ?></b>
                </span>
            </h4>
            <?php foreach ($data['items'] as $item) { ?>
                <p><a href="#"><?= $item->product_name ?></a> <span
                        class="price">Rs:<?= $item->Price ?>x<?= $item->quantity ?></span></p>
            <?php } ?>

            <hr>
            <p>Total <span class="price" style="color:black"><b><?= $data['amount'] ?></b></span></p>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script>
    function submitForm() {
        document.getElementById("checkout-form").submit();
    }
</script>