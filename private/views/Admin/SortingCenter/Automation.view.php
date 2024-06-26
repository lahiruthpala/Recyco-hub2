<div class="card__supporting-text no-padding" id="Automation" style="display: none;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Automation_ID</th>
                <th class="data-table__cell--header">Name</th>
                <th class="data-table__cell--header">Repeat_on</th>
                <th class="data-table__cell--header">Time</th>
                <th class="data-table__cell--header"style="padding-left: 70px;">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr onclick="loadScreen2('/Admin/UpdateAutomation/<?= $row->Automation_ID?>')">
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Automation_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Name ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Repeat ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->hour.":".$row->min ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
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