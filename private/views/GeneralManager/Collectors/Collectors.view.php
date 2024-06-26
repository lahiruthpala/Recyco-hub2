<div class="card__supporting-text no-padding" id="Collectors" style="display: block;background-color: white;border-radius: 20px;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Collector Name</th>
                <th class="data-table__cell--header">Assign Aria</th>
                <th class="data-table__cell--header" style="padding-left: 70px">Performance</th>
                <th class="data-table__cell--header" style="padding-left: 70px">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($collectors) && !empty($collectors)) {
                foreach ($collectors as $row) {
                    if ($row->Collections) {
                        $array = array_map('intval', explode(',', $row->Collections));
                        $result = '[' . implode(',', $array) . ']';
                    }else{
                        $result = '[]';
                    }
                    ?>
                    <tr onclick="loadScreen2('/Profile/viewProfile/<?=$row->User_ID?>')">
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Collector_Name ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->SectorName ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding: 0;max-height: 150px;">
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