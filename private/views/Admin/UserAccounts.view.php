<div class="mdl-card__supporting-text no-padding" id="UserAccounts" style="display: block;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">User_Name/Emp_ID</th>
                <th class="mdl-data-table__cell--non-numeric">First Name</th>
                <th class="mdl-data-table__cell--non-numeric">Last Name</th>
                <th class="mdl-data-table__cell--non-numeric">Role</th>
                <th class="mdl-data-table__cell--non-numeric">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->UserName ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->FirstName ?? 'Company_abc' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->LastName ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Role ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'Active' ? 'color--green' : 'color--red'; ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>

                        <td class="mdl-data-table__cell--non-numeric">
                            <form action="<?= ROOT ?>/GeneralManager/partner" method="POST">
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