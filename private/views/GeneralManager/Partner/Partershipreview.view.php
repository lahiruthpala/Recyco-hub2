<div class="mdl-card__supporting-text no-padding">
    <div class="form__article">
        <h3>Company Infomation</h3>

        <div class="mdl-grid">
            <div class="profile-image color--smooth-gray profile-image--round">
                <img src="<?= ROOT ?>/images/Bobby.PNG">
            </div>

            <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <h6>Company Name</h6>
                <h6 style="margin-left:5px;">
                    <?= $partner->Company_Name ?? '' ?>
                </h6>
            </div>

            <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <h6>Company Register number</h6>
                <h6 style="margin-left:5px;">
                    <?= $partner->Reg_No ?? '' ?>
                </h6>
            </div>
        </div>

        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <h6>Join Date</h6>
                <h6 style="margin-left:5px;">
                    <?= $partner->JoinDate ?? '' ?>
                </h6>
            </div>

            <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <h6>Current Status</h6>
                <h6 style="margin-left:5px;">
                    <?= $partner->Status ?? '' ?>
                </h6>
            </div>
        </div>
    </div>

    <div class="form__article">
        <h3>Contact Info</h3>
        <div class="mdl-grid">
            <div class="mdl-card mdl-shadow--2dp line-chart">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <h6>Contact Person Name</h6>
                        <h6 style="margin-left:5px;">
                            <?= $contact[0]->Name ?? '' ?>
                        </h6>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <h6>Contact Person Position</h6>
                        <h6 style="margin-left:5px;">
                            <?= $contact[0]->Title ?? '' ?>
                        </h6>
                    </div>
                </div>
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <h6>Contact Number</h6>
                        <h6 style="margin-left:5px;">
                            <?= $contact[0]->Phone  ?? '' ?>
                        </h6>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <h6>Company Email</h6>
                        <h6 style="margin-left:5px;">
                            <?= $contact[0]->Email ?? '' ?>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="mdl-card mdl-shadow--2dp line-chart" style="margin-left:10px">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <h6>Contact Person2 Name</h6>
                        <h6 style="margin-left:5px;">
                            <?= $contact[1]->Name ?? '' ?>
                        </h6>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <h6>Contact Person Position</h6>
                        <h6 style="margin-left:5px;">
                            <?= $contact[1]->Title ?? '' ?>
                        </h6>
                    </div>
                </div>
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <h6>Contact Number</h6>
                        <h6 style="margin-left:5px;">
                            <?= $contact[1]->Phone  ?? '' ?>
                        </h6>
                    </div>
                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <h6>Company Email</h6>
                        <h6 style="margin-left:5px;">
                            <?= $contact[1]->Email ?? '' ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="form__article employer-form__general_skills">
            <h3>Remarks</h3>

            <div class="mdl-card__supporting-text no-padding" id="PartnerTable" style="display: block;">
                <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Note</th>
                            <th class="mdl-data-table__cell--non-numeric">Date</th>
                            <th class="mdl-data-table__cell--non-numeric" style="padding-left: 70px">Created_BY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($remarks) && !empty($remarks)) {
                            foreach ($remarks as $remark) {
                                ?>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <?= $remark->Note ?? '' ?>
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <?= $remark->Date ?? '' ?>
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <?= $remark->User_ID ?? '' ?>
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <form action="<?= ROOT ?>/GeneralManager/partner" method="POST">
                                            <!-- Replace 'your_id_value' with the actual ID -->
                                            <input type="hidden" name="id" value="<?= $remark->Partner_ID ?? '' ?>">
                                            <button type="submit"
                                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                                style="border-radius: 99px;">View</button>
                                        </form>

                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            // If $remarks is not an array or is empty
                            echo "No Rematks.";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>