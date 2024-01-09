<section id="cards">
    <form class="form form--basic" method="POST"
        style="margin: 20px 2px 20px 30px;">
        <div>
            <div class="mdl-grid" style="justify-content: center;">
                <div>
                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                        <h6>Batch_ID -> </h6>
                        <h6>
                            <?php $var = $data[0]->pagetype . "_ID";
                            echo $data[0]->$var; ?>
                        </h6>
                    </div>
                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                        <h6>Created BY -> </h6>
                        <h6>
                            <?= $data[0]->User_ID; ?>
                        </h6>
                    </div>
                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                        <h6>Created Date -> </h6>
                        <h6>
                            <?= $data[0]->Date; ?>
                        </h6>
                    </div>
                </div>
                <div style="margin-left: 10vw;">
                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                        <h6>Description -> </h6>
                        <h6>
                            <?= $data[0]->Description; ?>
                        </h6>
                    </div>
                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                        <h6>Assigned to -> </h6>
                        <h6>
                            <?= $data[0]->Collector_Name ?? "Not assigned"; ?>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="mdl-card__supporting-text no-padding" id="NewInventory" style="display: block;">
                <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
                    <thead>
                        <tr style="background-color: #333;width: 100%;">
                            <th class="mdl-data-table__cell--non-numeric">Inventory_ID</th>
                            <th class="mdl-data-table__cell--non-numeric">Status</th>
                        </tr>
                    </thead>
                    <?php
                    if (is_array($rows) && !empty($rows)) {
                        $id = 1; // Initialize ID counter
                        foreach ($rows as $row) {
                            ?>
                            <tr onclick="loadScreen('Inventory/progress/Batch', '<?= $row->Inventory_ID ?>')">
                                <td class="mdl-data-table__cell--non-numeric" id="batch<?= $id ?>">
                                    <?= $row->Inventory_ID ?>
                                </td>
                                <td class="mdl-data-table__cell--non-numeric" style="text-align: center;">
                                    <span class="label label--mini color--<?= statuscolor($row->Status) ?>">
                                        <?= $row->Status ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                            $id++; // Increment ID for the next row
                        }
                    } else {
                        echo "No data available.";
                    }
                    ?>
                </table>
            </div>
        </div>
        </div>
    </form>
</section>