<div class="card__supporting-text no-padding" id="PendingRequests" style="display: none;">
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
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr onclick="loadScreen2('GeneralManager/PendingRequestDetails/<?= $row->SectorName ?>/<?= $row->Collection_Date ?>')">
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
                }
            } else {
                echo "No data available.";
            }
            ?>
        </tbody>
    </table>
</div>