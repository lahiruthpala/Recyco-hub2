<div class="card__supporting-text no-padding" id="EventsTable" style="display: none;width: 100%;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Event Name</th>
                <th class="data-table__cell--header">Company Name</th>
                <th class="data-table__cell--header" style="padding-left: 70px">Published Date</th>
                <th class="data-table__cell--header" style="padding-left: 70px">Event Date</th>
                <th class="data-table__cell--header" style="padding-left: 70px">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Event_Title?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Company_Name ?? 'Company_abc' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Publish_Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Event_Data ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'UpComing' ? 'color--green' : 'color--red'; ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>

                        <!-- <td class="data-table__cell--non-numeric">
                            <form action="<?= ROOT ?>/GeneralManager/partner" method="POST">
                                <input type="hidden" name="id" value="<?= $row->Partner_ID ?? '' ?>">
                                <button type="submit"
                                    class="button js-button button--raised js-ripple-effect button--colored-teal"
                                    style="border-radius: 99px;">View</button>
                            </form>

                        </td> -->
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