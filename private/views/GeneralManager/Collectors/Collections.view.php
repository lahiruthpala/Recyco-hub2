<div class="card__supporting-text no-padding" id="Collections" style="display: none;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Date</th>
                <th class="data-table__cell--header">Number of Collections</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Count  ?? '' ?>
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