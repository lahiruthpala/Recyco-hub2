<div class="mdl-card__supporting-text no-padding" style="margin: 20px;" id="info">
    <div class="form__article">
        <h3>Company Infomation</h3>

        <div class="mdl-grid" style="margin-left: 30px;">
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
                            <?= $partner->JoinDate ?? '' ?>
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
        <div class="mdl-grid" style="gap: 23.5vw;margin-left: 30px;">
            <div>
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
                            <?= $contact[0]->Phone ?? '' ?>
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
            <div>
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
                            <?= $contact[1]->Phone ?? '' ?>
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
        <div style="display: flex;">
            <h3>Remarks</h3>
            <button data-modal-target="#modal"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                style="border-radius: 99px; margin-left: auto;">Add remark</button>
        </div>
        <div id="PartnerTable" style="display: block;">
            <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Note</th>
                        <th class="mdl-data-table__cell--non-numeric">Date</th>
                        <th class="mdl-data-table__cell--non-numeric">Created_BY</th>
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