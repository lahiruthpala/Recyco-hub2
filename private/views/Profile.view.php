<?php $this->view('include/head') ?>
<body>
    <body>
        <div class="layout js-layout layout--fixed-header is-small-screen">
            <?php
            if (Auth::getRole() == "Admin") {
                $this->view('include/Adminheader');
            } elseif (Auth::getRole() == "Collector") {
                $this->view('include/Collectorheader');
            } else {
                $this->view('include/header');
            }
            ?>
            <main class="layout__content">
                <div class="grid">
                    <div class="cell cell--12-col">
                        <?php if ($row): ?>
                            <div class="card shadow--2dp" style="width:1000px ;margin-left: 250px;">
                                <div class="card__title" style="position: relative;">
                                    <h5 class="card__title-text text-color--black">PROFILE INFO</h5>
                                    <a href="<?= ROOT ?>/collector/profileedit/<?= $row->Collector_ID ?? '' ?>">
                                        <button class="button"
                                            style="position: absolute; top: 10px; right: 20px; background-color: green; color: white;">
                                            edit
                                        </button>
                                    </a>
                                </div>
                                <div class="card__supporting-text">
                                    <form class="form form--basic">
                                        <div class="grid">
                                            <div class="cell cell--3-col-desktop cell--3-col-tablet cell--1-col-phone"
                                                style="width: 180px;border-right: solid 1px black;margin-right: 50px;display: flex;align-items: center;">
                                                <div class="profile-image color--smooth-gray profile-image--rounds"
                                                    style="margin-left: 40px;overflow: hidden; border-radius: 50%; width: 100px; height: 100px;">
                                                    <img src="<?= ROOT ?>/images/Users/<?= $row->User_ID ?? ''?>.jpg"
                                                        alt="City Image"
                                                        style="width: 100%; height: 100%; border-radius: 50%; ">
                                                </div>
                                            </div>
                                            <div class="cell cell--8-col-desktop cell--8-col-tablet cell--4-col-phone form__article"
                                                style="width: 69%;">
                                                <div style="display: flex; justify-content: space-between;">

                                                    <div class="textfield js-textfield textfield--floating-label full-size"
                                                        style="width: 45%; display: inline-block; margin-right: 5%;">
                                                        <label class="textfield__label" for="profile-floating-first-name"
                                                            style="color: black !important;">First Name</label>
                                                        <br>
                                                        <br>
                                                        <span
                                                            style="display: block; font-size: 100%; color: black !important;border-bottom: 1px solid black; padding-top: 1px ">
                                                            <?= $row->firstname ?>
                                                        </span>
                                                    </div>
                                                    <div class="textfield js-textfield textfield--floating-label full-size"
                                                        style="width: 45%; display: inline-block; margin-right: 5%;">
                                                        <label class="textfield__label" for="profile-floating-first-name"
                                                            style="color: black !important;">Last Name</label>
                                                        <br>
                                                        <br>
                                                        <span
                                                            style="display: block; font-size: 100%; color: black !important;border-bottom: 1px solid black; padding-bottom: 1px ">
                                                            <?= $row->lastname ?>
                                                        </span>
                                                    </div>

                                                </div>


                                                <div class="textfield js-textfield textfield--floating-label full-size"
                                                    style="width: 45%; display: inline-block; margin-right: 5%;">
                                                    <br>
                                                    <br>
                                                    <label class="textfield__label" for="profile-floating-first-name"
                                                        style="color: black !important;">Collector ID</label>
                                                    <span
                                                        style="display: block; font-size: 100%; color: black;border-bottom: 1px solid black; padding-bottom: 1px ">
                                                        <?= $row->Collector_ID ?>
                                                    </span>
                                                </div>


                                                <div class="textfield js-textfield textfield--floating-label full-size"
                                                    style="width: 45%; display: inline-block; margin-right: 5%;">
                                                    <label class="textfield__label" for="profile-floating-email"
                                                        style="color: black !important; ">Email</label>
                                                    <br>
                                                    <br>
                                                    <span
                                                        style="display: block; font-size: 100%; color: black;border-bottom: 1px solid black; padding-bottom: 1px; ">
                                                        <?= $row->Email ?>
                                                    </span>
                                                </div>

                                                <div class="textfield js-textfield textfield--floating-label full-size"
                                                    style="width: 45%; display: inline-block;">
                                                    <label class="textfield__label" for="profile-floating-contact-no"
                                                        style="color: black !important;  ">Contact Number</label>
                                                    <br>
                                                    <br>
                                                    <span
                                                        style="display: block; font-size: 100%; color: black;border-bottom: 1px solid black; padding-bottom: 1px; ">
                                                        <?= $row->Phone ?>
                                                    </span>
                                                </div>

                                                <div class="textfield js-textfield textfield--floating-label full-size"
                                                    style="width: 45%; display: inline-block; margin-right: 5%;">
                                                    <label class="textfield__label" for="profile-floating-email"
                                                        style="color: black !important; ">Assigned Area</label>
                                                    <br>
                                                    <br>
                                                    <span
                                                        style="display: block; font-size: 100%; color: black;border-bottom: 1px solid black; padding-bottom: 1px; ">
                                                        <?= $row->sector_ID ?>
                                                    </span>
                                                </div>
                                                <div class="textfield js-textfield textfield--floating-label full-size"
                                                    style="width: 45%; display: inline-block;">
                                                    <label class="textfield__label" for="profile-floating-contact-no"
                                                        style="color: black !important;  ">Vehicle Number</label>
                                                    <br>
                                                    <br>
                                                    <span
                                                        style="display: block; font-size: 100%; color: black;border-bottom: 1px solid black; padding-bottom: 1px; ">
                                                        <?= $row->Vehicle_NO ?>
                                                    </span>
                                                </div>
                                                <div class="textfield js-textfield textfield--floating-label full-size"
                                                    style="width: 45%; display: inline-block; margin-right: 5%;">
                                                    <label class="textfield__label" for="profile-floating-email"
                                                        style="color: black !important; ">Address</label>
                                                    <br>
                                                    <br>
                                                    <span
                                                        style="display: block; font-size: 100%; color: black;border-bottom: 1px solid black; padding-bottom: 1px; ">
                                                        <?= $row->Address ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php else: ?>
                            <p>No data found</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php $this->view('include/footer') ?>