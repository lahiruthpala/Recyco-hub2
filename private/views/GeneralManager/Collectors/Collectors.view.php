<div class="mdl-card__supporting-text no-padding" id="Collectors" style="display: block;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Collector ID</th>
                <th class="mdl-data-table__cell--non-numeric">Collector Name</th>
                <th class="mdl-data-table__cell--non-numeric">Assign Aria</th>
                <th class="mdl-data-table__cell--non-numeric" style="padding-left: 70px">Performance</th>
                <th class="mdl-data-table__cell--non-numeric" style="padding-left: 70px">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($collectors) && !empty($collectors)) {
                foreach ($collectors as $row) {
                    $array = array_map('intval', explode(',', $row->Collections));
                    $result = '[' . implode(',', $array) . ']';
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Collector_ID ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Collector_Name ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->sector_ID ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric" style="padding: 0;max-height: 150px;">
                            <canvas class="miniChart" width="130" height="40" data-chart-data="<?= $result ?>"></canvas>
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