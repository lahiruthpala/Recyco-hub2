<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Account </title>

    <link rel="shortcut icon" href="<?= ROOT ?>/images/fav.jpg">
    <link rel="stylesheet" href="<?= ROOT ?>/css/profile.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/css/profile.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
    <div class="container-fluid overcover">
        <div class="container profile-box">
            <div class="top-cover" style="background-image:<?= ROOT ?>/images/resource/bg.png;">
                <div class="covwe-inn">
                    <div class="row no-margin">
                        <div class="col-md-3 img-c">
                            <img src="<?= ROOT ?>/images/Users/<?= $user[0]->User_ID ?>" alt="">
                            <div class="change-icon" onclick="inputchangepropic()">
                                <img src="<?= ROOT ?>/images/icons/change-icon.png" alt="Change Profile Picture"
                                    style="height: auto;">
                                <input type="file" id="profileImage" name="profileImage" style="display: none;"
                                    onchange="displayImage(this)">


                            </div>
                        </div>

                        <div class="col-md-9 tit-det">
                            <h2><?= $user[0]->UserName ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin: auto;" ;>

                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#review" role="tab"
                        aria-controls="profile" aria-selected="false">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#earning" role="tab"
                        aria-controls="profile" aria-selected="false">Earnings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Contact</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form method="POST" action="<?= ROOT ?>/Customer/UpdateUser">
                        <table id="user-data">
                            <tr>
                                <td style="left: 20px;">First Name</td>
                                <td><input type="text" value="<?= $user[0]->FirstName ?>" id="FirstName"
                                        name="FirstName" placeholder="Enter Name"></td>
                            </tr>
                            <tr>
                                <td style="left: 20px">Last Name</td>
                                <td><input type="text" value="<?= $user[0]->LastName ?>" id="LastName" name="LastName"
                                        placeholder="Enter Name"></td>
                            </tr>
                            <tr>
                                <td style="left: 20px">Current Address</td>
                                <td><input type="text" value="<?= $user[0]->Address ?>" id="Address" name="Address"
                                        placeholder="Enter Address"></td>
                            </tr>
                            <tr>
                                <td style="left: 20px">Contact Number</td>
                                <td><input type="text" value="<?= $user[0]->Phone ?>" id="Phone" name="Phone"
                                        placeholder="Enter Number"></td>
                            </tr>
                            <tr>
                                <td style="left: 20px">Email Address</td>
                                <td><input type="text" value="<?= $user[0]->Email ?>" id="Email" name="Email"
                                        placeholder="Enter address"></td>
                            </tr>

                        </table>
                        <button type="submit"> edit</button>

                    </form>

                </div>

                <div class="tab-pane fade exp-cover" id="review" role="tabpanel" aria-labelledby="contact-tab">

                    <div class="service no-margin row">
                        <div class="col-sm-3 resume-dat serv-logo">
                            <h6>Add a review</h6>
                        </div>
                        <div class="col-sm-9 rgbf" style="height: 75%; width: 80%;margin: 50px;">
                            <table id="reviews">
                                <tr>
                                    <td style="top: 10px;"><input type="text" style="height: 250px;"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade gallcoo" id="earning" role="tabpanel" aria-labelledby="contact-tab"
                    style="min-height: 400px;">
                    <div class="row no-margin earning" style="margin-top: 10px;">

                        <table style="border-collapse:collapse;width: 100%; max-width: 80%; margin: auto;">
                            <tr style="display: flex;">
                                <td
                                style="padding: 8px;text-align: center;background-color: #85a3f1;padding: 10px;border-radius: 8px;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);margin: auto;color: white;">
                                    Earned points<br><span>
                                        <?php if (isset($customers->Credits)): ?>
                                            <h3 style="font-weight: bold;color: #001c3a;"><?= $customers->Credits ?></h3>
                                        <?php else: ?>
                                            <h3 style="font-weight: bold;color: #001c3a;">0</h3>
                                        <?php endif; ?>
                                    </span></td>
                            </tr>
                        </table>
                        <div style="margin-top: 25px;display: flex;width: 100%;">
                            <?php
                            if (is_array($earnings) && !empty($earnings)) {
                                ?>
                                <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
                                    <thead>
                                        <th class="data-table__cell--header" style="width: 20%">Date</th>
                                        <th class="data-table__cell--header" style="width: 20%">Wate Type</th>
                                        <th class="data-table__cell--header">Weight</th>
                                        <th class="data-table__cell--header" style="text-align: center;">Price</th>
                                        <th class="data-table__cell--header" style="text-align: center;">Earning</th>
                                    </thead>
                                    <?php
                                    foreach ($earnings as $earning) {
                                        if(!isset($earning['Items'])){
                                            $earning['Items'] = $earning[0];
                                        }
                                        if (is_array($earning['Items']) && !empty($earning['Items'])) {
                                            foreach ($earning['Items'] as $key => $Items) {
                                                ?>
                                                <tr>
                                                    <td class="data-table__cell--non-numeric">
                                                        <?= $earning['Date'] ?>
                                                    </td>
                                                    <td class="data-table__cell--non-numeric">
                                                        <?= $key ?>
                                                    </td>
                                                    <td class="data-table__cell--non-numeric">
                                                        <?= $Items['Weight'] ?>
                                                    </td>
                                                    <td class="data-table__cell--non-numeric" style="text-align: center;">
                                                        <?= $Items['Price'] ?>
                                                    </td>
                                                    <td class="data-table__cell--non-numeric" style="text-align: center;">
                                                        <?= floatval($Items['Price']) * floatval($Items['Weight']) ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    }
                            } else {
                                ?>
                                    <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
                                        <img src="<?= ROOT ?>/images/NoEarnings.jpg" alt="No data found"
                                            style="width: 400px;">
                                    </div>
                                    <?php
                            }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade contact-tab" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row no-margin">
                        <div class="col-md-6 no-padding">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3176144.0450019627!2d-107.79423426090409!3d38.97644533805396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x874014749b1856b7%3A0xc75483314990a7ff!2sColorado%2C+USA!5e0!3m2!1sen!2sin!4v1547222354537"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="col-md-6">
                            <div class="row cont-row no-margin">
                                <div class="col-sm-6">
                                    <input placeholder="Enter Full Name" type="text"
                                        class="form-control form-control-sm">
                                </div>
                                <div class="col-sm-6">
                                    <input placeholder="Enter Email Address" type="text"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row cont-row no-margin">
                                <div class="col-sm-6">
                                    <input placeholder="Enter Mobile Number" type="text"
                                        class="form-control form-control-sm">
                                </div>

                            </div>
                            <div class="row cont-row no-margin">
                                <div class="col-sm-12">
                                    <textarea placeholder="Enter your Message" class="form-control form-control-sm"
                                        rows="10"></textarea>
                                </div>

                            </div>
                            <div class="row cont-row no-margin">
                                <div class="col-sm-6">
                                    <button class="btn btn-sm btn-primary">Send Message</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- change-icon -->
<script>
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var fileSize = input.files[0].size; // Get the file size in bytes
            var maxSize = 1 * 1024 * 1024; // 1MB in bytes
            var fileExtension = input.files[0].name.split('.').pop().toLowerCase(); // Get the file extension

            if (fileSize > maxSize) {
                SideNotification(["Error: The uploaded image size exceeds the maximum allowed size of 1MB.", 'error']);
                return;
            }

            if (!['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                SideNotification(["Error: Only image files (JPG, JPEG, PNG, GIF) are allowed.", 'error']);
                return;
            }

            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('Image').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function changepropic() {
        document.getElementById("profileImage").click;
    }
</script>

<script src="<?= ROOT ?>/js/profileview.min.js"></script>
<script src="<?= ROOT ?>/js/popper.min.js"></script>
<script src="<?= ROOT ?>/js/profile.min.js"></script>
<script src="<?= ROOT ?>/js/profileformat.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<?php $this->view("include/footer");