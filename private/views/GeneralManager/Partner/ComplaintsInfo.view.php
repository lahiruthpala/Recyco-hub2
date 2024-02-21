<div class="card__supporting-text no-padding" id="ComplaintsTable" style="display: none;width: 100%;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--non-numeric">Complaint ID</th>
                <th class="data-table__cell--non-numeric">Company Name</th>
                <th class="data-table__cell--non-numeric" style="padding-left: 70px">Subject</th>
                <th class="data-table__cell--non-numeric" style="padding-left: 70px">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Complaint_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Company_Name ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Subject ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'Resolved' ? 'color--green' : 'color--red'; ?>">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>