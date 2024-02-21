<?php $this->view('include/head') ?>

<head>
    <link href="<?= ROOT ?>/css/popup.css" rel="stylesheet">
</head>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="layout__content">

            <div class="grid grid--no-spacing dashboard">
                <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                    <div class="card shadow--2dp" style="margin: 16px;">
                        <div class="card__title" style="border-radius: 20px 20px 0 0;">
                            <h1 id="tableTitle" class="card__title-text">Info</h1>
                        </div>
                        <div class="card__supporting-text no-padding" style="margin: 20px;" id="info">
                            <div class="form__article">
                                <h3>Company Infomation</h3>

                                <div class="grid" style="margin-left: 30px;">
                                    <div
                                        style="display: flex;justify-content: center;align-items: center;padding-right: 30px;border-right: 2px solid var(--smoke-color);">
                                        <div class="profile-image color--smooth-gray profile-image--round">
                                            <img src="<?= ROOT ?>/images/Bobby.PNG" id="CollecterImage">
                                        </div>
                                    </div>

                                    <div style="margin-left: 30px">
                                        <div style="display: flex; ">
                                            <h6>Company Name</h6>
                                            <h6 style="margin-left:10vw;">
                                                <?= $partner->Company_Name ?? '' ?>
                                            </h6>
                                        </div>

                                        <div style="display: flex;">
                                            <h6>Company Register number</h6>
                                            <h6 style="margin-left:5px;">
                                                <?= $partner->Reg_No ?? '' ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div style="margin-left: 20%;">
                                        <div style="margin-left: 30px">
                                            <div style="display: flex; ">
                                                <h6>Join Date</h6>
                                                <h6 style="margin-left:10vw;">
                                                    <?= $partner->WebsiteLink ?? '' ?>
                                                </h6>
                                            </div>
                                        </div>

                                        <div style="margin-left: 30px">
                                            <div style="display: flex; ">
                                                <h6>Current Status</h6>
                                                <h6 style="margin-left:7.5vw;">
                                                    <?= $partner->Status ?? '' ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form__article">
                                <h3>Contact Info</h3>
                                <div class="grid" style="gap: 23.5vw;margin-left: 30px;">
                                    <div>
                                        <div class="grid">
                                            <div
                                                class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                                <h6>Contact Person Name</h6>
                                                <h6 style="margin-left:5px;">
                                                    <?= $contact[0]->Name ?? '' ?>
                                                </h6>
                                            </div>
                                            <div
                                                class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                                <h6>Contact Person Position</h6>
                                                <h6 style="margin-left:5px;">
                                                    <?= $contact[0]->Title ?? '' ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="grid">
                                            <div
                                                class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                                <h6>Contact Number</h6>
                                                <h6 style="margin-left:5px;">
                                                    <?= $contact[0]->Phone ?? '' ?>
                                                </h6>
                                            </div>
                                            <div
                                                class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                                <h6>Company Email</h6>
                                                <h6 style="margin-left:5px;">
                                                    <?= $contact[0]->Email ?? '' ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="grid">
                                            <div
                                                class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                                <h6>Contact Person2 Name</h6>
                                                <h6 style="margin-left:5px;">
                                                    <?= $contact[1]->Name ?? '' ?>
                                                </h6>
                                            </div>
                                            <div
                                                class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                                <h6>Contact Person Position</h6>
                                                <h6 style="margin-left:5px;">
                                                    <?= $contact[1]->Title ?? '' ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="grid">
                                            <div
                                                class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                                <h6>Contact Number</h6>
                                                <h6 style="margin-left:5px;">
                                                    <?= $contact[1]->Phone ?? '' ?>
                                                </h6>
                                            </div>
                                            <div
                                                class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                                <h6>Company Email</h6>
                                                <h6 style="margin-left:5px;">
                                                    <?= $contact[1]->Email ?? '' ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div >
                                    <button data-modal-target="#modal"
                                        class="button js-button button--raised js-ripple-effect button--colored-green"
                                        style="border-radius: 99px; margin-left: 20px;">Accept</button>
                                    <button data-modal-target="#modal"
                                        class="button js-button button--raised js-ripple-effect button--colored-red"
                                        style="border-radius: 99px;">Decline</button>
                                    <button data-modal-target="#modal"
                                        class="button js-button button--raised js-ripple-effect button--colored-yellow"
                                        style="border-radius: 99px; margin-left: 20px;">Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>

    </main>

    </div>


    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/popup.js"></script>
</body>

</html>