<div class="card__supporting-text no-padding" id="SortingCenter" style="display: block;">
    <div class="grid">
            <?php if ($row): ?>
                <div class="card shadow--2dp" style="width:100%;">
                    <div class="card__supporting-text" style="color:black; border-radius: 15px;border: 1px solid green;">
                        <form class="form form--basic">
                            <div class="grid">
                                <div class="cell cell--3-col-desktop cell--3-col-tablet cell--1-col-phone" style="width: 14%;border-right: 1px solid;">
                                    <div class="profile-image color--smooth-gray profile-image--rounds"
                                        style="margin-left: 40px;overflow: hidden; border-radius: 50%; width: 100px; height: 100px;">
                                        <img src="<?= ROOT ?>/images/Recycohub.png" alt="City Image"
                                            style="width: 100%; height: 100%; border-radius: 50%; ">
                                    </div>
                                </div>
                                <div class="cell cell--8-col-desktop cell--8-col-tablet cell--4-col-phone form__article" style="width: 60%;margin-left: 44px;">
                                    <div style="display: flex; justify-content: space-between;">

                                        <div class="textfield js-textfield textfield--floating-label full-size"
                                            style="width: 45%; display: inline-block; margin-right: 5%;">
                                            <label class="textfield__label" for="profile-floating-first-name"
                                                >Sorting Center ID</label>
                                            <br>
                                            <br>
                                            <span
                                                style="display: block; font-size: 100%;border-bottom: 1px solid white; padding-top: 1px ">
                                                <?= $row->SortingCenter_ID ?>
                                            </span>
                                        </div>

                                        <div class="textfield js-textfield textfield--floating-label full-size"
                                            style="width: 45%; display: inline-block; margin-right: 5%;">
                                            <label class="textfield__label" for="profile-floating-first-name"
                                                >Address</label>
                                            <br>
                                            <br>
                                            <span
                                                style="display: block; font-size: 100%;border-bottom: 1px solid white; padding-bottom: 1px ">
                                                <?= $row->Address ?>
                                            </span>
                                        </div>

                                    </div>


                                    <div class="textfield js-textfield textfield--floating-label full-size"
                                        style="width: 45%; display: inline-block; margin-right: 5%;">
                                        <br>
                                        <br>
                                        <label class="textfield__label" for="profile-floating-first-name"
                                            >Capacity</label>
                                        <span
                                            style="display: block; font-size: 100%;border-bottom: 1px solid white; padding-bottom: 1px ">
                                            <?= $row->capacity ?>
                                        </span>
                                    </div>


                                    <div class="textfield js-textfield textfield--floating-label full-size"
                                        style="width: 45%; display: inline-block; margin-right: 5%;">
                                        <label class="textfield__label" for="profile-floating-email">Email</label>
                                        <br>
                                        <br>
                                        <span
                                            style="display: block; font-size: 100%;border-bottom: 1px solid white; padding-bottom: 1px; ">
                                            <?= $row->Email ?>
                                        </span>
                                    </div>

                                    <div class="textfield js-textfield textfield--floating-label full-size"
                                        style="width: 45%; display: inline-block;">
                                        <label class="textfield__label" for="profile-floating-contact-no">Contact Number</label>
                                        <br>
                                        <br>
                                        <span
                                            style="display: block; font-size: 100%;border-bottom: 1px solid white; padding-bottom: 1px; ">
                                            <?= $row->Phone_Number ?>
                                        </span>
                                    </div>

                                    <div class="textfield js-textfield textfield--floating-label full-size"
                                        style="width: 45%; display: inline-block; margin-right: 5%;">
                                        <label class="textfield__label" for="profile-floating-email">Working Hours</label>
                                        <br>
                                        <br>
                                        <span
                                            style="display: block; font-size: 100%;border-bottom: 1px solid white; padding-bottom: 1px; ">
                                            <?= $row->Open_From ?>
                                        </span>
                                    </div>

                                    <div class="textfield js-textfield textfield--floating-label full-size"
                                        style="width: 45%; display: inline-block;">
                                        <label class="textfield__label" for="profile-floating-contact-no">To</label>
                                        <br>
                                        <br>
                                        <span
                                            style="display: block; font-size: 100%;border-bottom: 1px solid white; padding-bottom: 1px; ">
                                            <?= $row->Open_To ?>
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