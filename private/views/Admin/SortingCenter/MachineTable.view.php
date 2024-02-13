<div class="mdl-card__supporting-text no-padding" id="MachineTable" style="display: block;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Machine_ID</th>
                <th class="mdl-data-table__cell--non-numeric">Location</th>
                <th class="mdl-data-table__cell--non-numeric">Machine Type</th>
                <!-- <th class="mdl-data-table__cell--non-numeric">Next Service</th> -->
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
                            <?= $row->Machine_ID ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Location ?? 'Company_abc' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Machine_Type ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'Operational' ? 'color--green' : 'color--red'; ?>">
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