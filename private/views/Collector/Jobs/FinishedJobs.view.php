<div class="card__supporting-text no-padding" id="FinishedJobs" style="display: none;">
    <?php
    if (is_array($rows) && !empty($rows)) {
        ?>
        <table class="data-table js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr >
                    <th class="data-table__cell--header">Pickup ID</th>
                    <th class="data-table__cell--header">Assigned Date</th>
                    <th class="data-table__cell--header">Status</th>
                    <th class="data-table__cell--header"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    ?>
                    <tr style="background-color:#D0D3D3" >
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Job_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Assigned_Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                          
                            <span class="label label--mini color--green">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->waste_type ?? '' ?>
                        </td>

                       
                    </tr>
                </tbody>

                <?php
                }
                ?>
        </table>
        <?php
    } else {
        ?>
        <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
            <img src="<?= ROOT ?>/images/NoTask.jpg" alt="No data found" style="width: 400px;">
        </div>
        <?php
    }
    ?>
</div>
