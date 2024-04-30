<!DOCTYPE html>
<html>
<?php $this->view("include/homehead") ?>

<body>
    <div class="page-wrapper">
        <?php $this->view("include/homeheader") ?>
        <div style="width: 50%;transform: translate(55%,5%);">
            <section class="donation-section">
                <div class="donation-form-outer">
                    <form id="Request" method="POST">
                        <input type="text" value="" id="latitude" name="latitude" style="display: none;">
                        <input type="text" value="" id="longitude" name="longitude" style="display: none;">
                        <!--Form Portlet-->
                        <div class="form-portlet">
                            <h3 style="display: flex;justify-content: center;">Pickup Order Request</h3>
                        </div>

                        <br>

                        <!--Form Portlet-->
                        <div class="form-portlet">
                            <h4>Waste Information</h4>
                            <div class="row clearfix">
                                <div class="form-group col-lg-3 col-md-3 col-xs-12" style="width: 100%;">
                                    <div class="field-label">Select the waste type<span class="required">*</span></div>
                                    <select name="waste_type">
                                        <?php foreach ($data as $item) { ?>
                                            <option value="<?= $item->Name ?>"><?= $item->Name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">Weight <span class="required">*</span></div>
                                    <input style="height: 52px;width: 100%;padding: 15px;" type="number" name="Weight" value="" placeholder="Enter the rough weight"
                                        required>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">Pickup Date <span class="required">*</span></div>
                                    <input type="date" style="width: 100%;height: 52px;padding: 15px;"
                                        name="Collection_Date" value="" placeholder="Select" required
                                        min="<?= date('Y-m-d') ?>">
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">Email <span class="required">*</span></div>
                                    <input type="email" name="name" value="<?= Auth::getEmail() ?>" placeholder="Email"
                                        required>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                    <div class="field-label">Phone <span class="required">*</span></div>
                                    <input type="text" name="name" value="<?= Auth::getPhone() ?>" placeholder="Phone"
                                        required>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-xs-12" style="width: 100%;">
                                    <div class="field-label">Address<span class="required">*</span></div>
                                    <input type="text" id="pickup_address" value="<?= Auth::getAddress() ?>"
                                        name="pickup_address" placeholder="Enter the Address" required>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-xs-12" style="width: 100%;">
                                    <div class="field-label">Note<span class="required">*</span></div>
                                    <input type="text" id="Note" value="" name="Note"
                                        placeholder="Any thing collector must know?" required>
                                </div>
                                <div id="map" style="width: 100%; height: 400px; overflow: hidden;"></div>
                            </div>
                        </div>

                        <br>
                        <div class="text-right"><button type="submit" class="theme-btn btn-style-two">Submit</button>
                        </div>

                    </form>
                </div>
            </section>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.fancybox-media.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyn3Iymp1NpFUBho-3HfzzMrnJSLKaqgA"></script>
    <script type="text/javascript" src="<?= ROOT ?>/js/gmap.js"></script>
    <?php $this->view("include/footer") ?>