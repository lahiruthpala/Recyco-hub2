<div class="mdl-card__supporting-text no-padding" id="UserAccounts" style="display: block;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">User_Name/Emp_ID</th>
                <th class="mdl-data-table__cell--non-numeric">First Name</th>
                <th class="mdl-data-table__cell--non-numeric">Last Name</th>
                <th class="mdl-data-table__cell--non-numeric">Role</th>
                <th class="mdl-data-table__cell--non-numeric" style="padding-left: 70px;">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->User_ID ?? '' ?>
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