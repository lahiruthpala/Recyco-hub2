<? var_dump($rows)?>
<div class="card__supporting-text no-padding" id="NewPartnership" style="display: none;width: 100%;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Commpany_Name</th>
                <th class="data-table__cell--header">Application Date</th>
                <th class="data-table__cell--header">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr onclick="loadScreen('/GeneralManager/PartnershipReview/<?=$row->Application_ID?>', '')">
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Company_Name ?? 'CompanyName' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Application_Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <span
                                class="label label--mini <?php echo $row->Status === 'New' ? 'color--green' : 'color--red'; ?>">
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