<div class="card__supporting-text no-padding" id="PartnerTable" style="display: block;width: 100%;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--non-numeric">Partnership ID</th>
                <th class="data-table__cell--non-numeric">Company Name</th>
                <th class="data-table__cell--non-numeric" style="padding-left: 70px">Events</th>
                <th class="data-table__cell--non-numeric" style="padding-left: 70px">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    $array = array_map('intval', explode(',', $row->Events));
                    $result = '[' . implode(',', $array) . ']';
                    ?>
                    <tr onclick="loadScreen('/GeneralManager/partner', '<?= $row->Partner_ID?>')">
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Partner_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Company_Name ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="max-height:80px; padding:0">
                            <canvas class="miniChart" width="130" height="40" data-chart-data="<?= $result ?>"></canvas>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
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