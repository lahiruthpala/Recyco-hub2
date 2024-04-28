<div class="card__supporting-text no-padding" id="ArticlesTable" style="display: none;width: 100%;">
    <?php
    if (is_array($rows) && !empty($rows)) { ?>
        <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr>
                    <th class="data-table__cell--header">Company Name</th>
                    <th class="data-table__cell--header">Artical Name</th>
                    <th class="data-table__cell--header" style="padding-left: 70px">Publish Date</th>
                    <th class="data-table__cell--header" style="padding-left: 70px">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Partner_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Article_Title ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 50px">
                            <?= $row->Submition_Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span class="label label--mini <?php
                            $statusColor = '';
                            switch ($row->Status) {
                                case 'Published':
                                    $statusColor = 'color--green';
                                    break;
                                case 'Flaged':
                                    $statusColor = 'color--orange';
                                    break;
                                case 'Band':
                                    $statusColor = 'color--red';
                                    break;
                                case 'Unpublished':
                                    $statusColor = 'color--black';
                                    break;
                                default:
                                    // Default color or handle other cases
                                    break;
                            }

                            echo $statusColor;
                            ?>
">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                    </tr>
                </tbody>
                <?php
                }
    } else {
        ?>
            <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
                <img src="<?= ROOT ?>/images/NoEvents.jpg" alt="No data found" style="width: 400px;">
            </div>
            <?php
    }
    ?>
    </table>
</div>