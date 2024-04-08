<div class="card__supporting-text no-padding" id="Sectors" style="display: none;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Sector Name</th>
                <th class="data-table__cell--header">Latitude</th>
                <th class="data-table__cell--header">Longitude</th>
                <th class="data-table__cell--header">Radius</th>
                <th class="data-table__cell--header" style="padding-left: 70px;">Collects</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->SectorName ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->latitude ?? 'Company_abc' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->longitude ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->radius ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <?php
                            if (!empty($row->Collector_ID)) {
                                $collectorIds = explode(',', $row->Collector_ID);
                                foreach ($collectorIds as $collectorId) {
                                    ?>
                                    <a href="#" style="font-weight: inherit;"><?= $collectorId . ', '?></a>
                                    <?php
                                }
                            } else {
                                echo "No collectors available.";
                            }
                            ?>
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