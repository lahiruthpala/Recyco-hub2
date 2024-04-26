<div class="form-wrap column-12" style="height: 1000px; !important;">
    <div class="tab-form row-4">

        <div class="myheader">
            <div class="active-login">
                <h2>Payment Details</h2>
            </div>
        </div>
        <div class="tab-body">
            <div class="active1">
                <form id="checkout-form" method="post" action="https://sandbox.payhere.lk/pay/checkout">

                    <input type="hidden" name="merchant_id" value="<?= $data['merchantID'] ?>">
                    <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="<?= ROOT ?>/company/payments">
                    <input type="hidden" name="cancel_url" value="<?= ROOT ?>/company/payments">
                    <input type="hidden" name="notify_url" value="<?= ROOT ?>/payment">

                    </br>
                    <h3>Item Details</h3>
                    <hr>

                    <div class="form-input">
                        <label>Payment ID</label>
                        <input type="text" name="order_id" value="<?= $data['order_id'] ?>" readonly>

                    </div>
                    <div class="form-input">
                        <label>Description</label>
                        <input type="text" name="items" value="<?= $data['items'] ?>" readonly>

                    </div>

                    <div class="form-input">
                        <label>Currency</label>
                        <input type="text" name="currency" value="<?= $data['currency'] ?>" readonly>

                    </div>
                    <div class="form-input">
                        <label>Task Value</label>
                        <input type="text" name="taskVal" value="<?= $data['taskVal'] ?>" readonly>

                    </div>
                    <div class="form-input">
                        <label>Commission</label>
                        <input type="text" name="commission" value="<?= $data['commission'] ?>" readonly>

                    </div>
                    <div class="form-input">
                        <label>Total Amount</label>
                        <input type="text" name="amount" value="<?= $data['amount'] ?>" readonly>

                    </div>

                    </br>
                    <h3>Your Details</h3>
                    <hr>
                    <div class="form-input">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="<?= $data['first_name'] ?>" readonly>
                    </div>
                    <div class="form-input">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="<?= $data['last_name'] ?>" readonly>
                    </div>
                    <div class="form-input">
                        <label>Email</label>
                        <input type="text" name="email" value="<?= $data['email'] ?>" readonly>
                    </div>
                    <div class="form-input">
                        <label>Contact No.</label>
                        <input type="text" name="phone" value="<?= $data['phone'] ?>" readonly>
                    </div>

                    <div class="form-input">
                        <label>Address</label>
                        <input type="text" name="address" value="<?= $data['address'] ?>" readonly>
                    </div>

                    <input type="hidden" name="city" value="Colombo">
                    <input type="hidden" name="country" value="<?= $data['country'] ?>">
                    <input type="hidden" name="hash" value="<?= $data['hash'] ?>"> <!-- Replace with generated hash -->


                    <div class="form-input">
                        <div class="checkout-container" onclick="submitForm()">
                            <div class="checkout-left-side">
                                <div class="checkout-card">
                                    <div class="checkout-card-line"></div>
                                    <div class="checkout-buttons"></div>
                                </div>
                                <div class="checkout-post">
                                    <div class="checkout-post-line"></div>
                                    <div class="screen">
                                        <div class="dollar">$</div>
                                    </div>
                                    <div class="numbers"></div>
                                    <div class="numbers-line2"></div>
                                </div>
                            </div>
                            <div class="checkout-right-side">
                                <div class="new">Checkout</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

<script>
    function submitForm() {
        document.getElementById("checkout-form").submit();
    }
</script>