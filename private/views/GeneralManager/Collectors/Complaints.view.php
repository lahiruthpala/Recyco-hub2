<div class="card__supporting-text no-padding" id="ComplaintsTable"
    style="display: none;background-color: white;border-radius: 20px;">
    <?php
    if (is_array($rows) && !empty($rows)) { ?>
        <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr>
                    <th class="data-table__cell--header">Pickup_ID</th>
                    <th class="data-table__cell--header">Collector_ID</th>
                    <th class="data-table__cell--header" style="padding-left: 70px">Complaints</th>
                    <th class="data-table__cell--header" style="padding-left: 70px">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Pickup_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Collector_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Complaints ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Complaints_Status === 'Resolved' ? 'color--green' : 'color--red'; ?>">
                                <?= $row->Complaints_Status ?? '' ?>
                            </span>
                        </td>
                    </tr>
                    <?php
                } ?>
            </tbody>
            <?php
    } else {
        ?>
            <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
                <img src="<?= ROOT ?>/images/NoTask.jpg" alt="No data found" style="width: 400px;">
            </div>
            <?php
    }
    ?>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>