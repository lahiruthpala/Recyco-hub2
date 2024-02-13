<div class="mdl-card__supporting-text no-padding" id="ArticlesTable" style="display: none;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Company Name</th>
                <th class="mdl-data-table__cell--non-numeric">Artical Name</th>
                <th class="mdl-data-table__cell--non-numeric" style="padding-left: 70px">Publish Date</th>
                <th class="mdl-data-table__cell--non-numeric" style="padding-left: 70px">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Partner_ID ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->Artical_Title ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric" style="padding-left: 50px">
                            <?= $row->Submition_Date ?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric" style="padding-left: 70px;">
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