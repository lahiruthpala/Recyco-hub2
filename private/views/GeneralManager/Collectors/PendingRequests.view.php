<div class="card__supporting-text no-padding" id="PendingRequests" style="display: none;background-color: white;border-radius: 20px;">
    <?php
    if (is_array($rows) && !empty($rows)) { ?>
        <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr>
                    <th class="data-table__cell--header">Area</th>
                    <th class="data-table__cell--header">Collection Date</th>
                    <th class="data-table__cell--header">Number of Collections</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    ?>
                    <tr
                        onclick="loadScreen2('GeneralManager/PendingRequestDetails/<?= $row->SectorName ?>/<?= $row->Collection_Date ?>')">
                        <td class="data-table__cell--non-numeric">
                            <?= $row->SectorName ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Collection_Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->num ?? '' ?>
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