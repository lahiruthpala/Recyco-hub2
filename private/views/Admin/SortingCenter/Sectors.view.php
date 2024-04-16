<div class="card__supporting-text no-padding" id="Sectors" style="display: none;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Sector Name</th>
                <th class="data-table__cell--header" style="padding-left: 70px;">Collects</th>
                <th class="data-table__cell--header"></th>
                <th class="data-table__cell--header"></th>
                <th class="data-table__cell--header"></th>
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
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <?php
                            if (!empty($row->Collector_ID)) {
                                $collectorIds = explode(',', $row->Collector_ID);
                                foreach ($collectorIds as $collectorId) {
                                    ?>
                                    <a href="<?= ROOT . '/' . Auth::getRole() . '/profile/' . $collectorId?>" style="font-weight: inherit;"><?= $collectorId . ', '?></a>
                                    <?php
                                }
                            } else {
                                echo "No collectors available.";
                            }
                            ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                onclick="Edit('<?= ROOT . 'Admin/MachineEdit/' . $row->sector_ID?>','AddNewMachine')"
                                style="margin-right: 10px;">View</a>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <a class="button js-button button--raised js-ripple-effect"
                                onclick="Edit('<?= ROOT . 'Admin/MachineEdit/' . $row->sector_ID?>','AddNewMachine')"
                                style="margin-right: 10px; background-color:#51c9c9;">Edit</a>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <a class="button js-button button--raised js-ripple-effect"
                                href="<?= ROOT ?>/Admin/MachineRemove/<?= $row->sector_ID ?>"
                                style="margin-right: 10px;background-color: red;color: white;">Remove</a>
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
    <div style="display:flex;justify-content: end;">
        <button onclick="loadComponent('NewSector')" style="margin: 50px 29px 2px 4px;width: 100px;" id="NewSector_Button"
            class="button js-button button--raised js-ripple-effect button--colored-smoke">Add
            New Sector</Button>
    </div>
</div>