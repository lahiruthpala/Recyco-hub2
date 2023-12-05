<div class="mdl-card__supporting-text no-padding" id="NewPartnership" style="display: none;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Company_ID</th>
                <th class="mdl-data-table__cell--non-numeric">Commpany_Name</th>
                <th class="mdl-data-table__cell--non-numeric">Application Date</th>
                <th class="mdl-data-table__cell--non-numeric" style="padding-left: 70px">Events</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Company_ID ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Company_Name ?? 'CompanyName' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Application_Date ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'Active' ? 'color--green' : 'color--red'; ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>

                        <td class="mdl-data-table__cell--non-numeric">
                            <form action="<?= ROOT ?>/GeneralManager/PartnershipReview/<?=$row->Application_ID?>" method="POST">
                                <!-- Replace 'your_id_value' with the actual ID -->
                                <input type="hidden" name="id" value="<?= $row->Partner_ID ?? '' ?>">
                                <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                    style="border-radius: 99px;">View</button>
                            </form>

                        </td>
                    </tr>
                    <?php
                }
            } else {
                // If $rows is not an array or is empty
                echo "No data available.";
            }
            ?>
        </tbody>
    </table>
</div>