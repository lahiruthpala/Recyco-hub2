<div class="card__supporting-text no-padding" id="PendingJobs" style="display: block;">z
   
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
        <div class="main-right-top-four-left">
    <div class="mdl-grid" style="display: flex; flex-direction: row;">
        <div class="mdl-cell mdl-cell--6-col" style="display: flex; align-items: center;"> <!-- Adjusted column size -->
            <p>Date</p>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="date" id="selected-date">
                <!-- You can add label here if needed -->
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: flex; align-items: center;margin-left:5px;"> <!-- Adjusted column size -->
            <button class="button js-button button--raised js-ripple-effect button--colored-green" onclick="filterTableByDate()">
                Filter
            </button>
        </div>
    </div>
</div>




 


        <table class="data-table js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header" style="padding:0 0 10px 20px">Pickup ID</th>
                <th class="data-table__cell--header" style="padding:0 0 10px 20px">Assigned Date</th>
                <th class="data-table__cell--header" style="padding:0 0 10px 20px">Status</th>
                <th class="data-table__cell--header" style="padding:0 0 10px 20px"></th>
                <th class="data-table__cell--header" style="padding:0 0 10px 20px"></th>
                <th class="data-table__cell--header" style="padding:0 0 10px 20px"></th>
                <th class="data-table__cell--header" style="padding:0 0 10px 20px"></th>
            </tr>
        </thead>
        <tbody>
                    
         <tr>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <?= $row->Job_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <?= $row->Assigned_Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <?php
                            $statusClass = ''; // Default class
                            if ($row->Status == 'Assigned') {
                                $statusClass = 'color--light-blue'; // Set class for Accepted status
                            } elseif ($row->Status == 'Completed') {
                                $statusClass = 'color--green'; // Set class for Completed status
                            } elseif ($row->Status == 'Accepted') {
                                $statusClass = 'color--green'; // Set class for Completed status
                            } elseif ($row->Status == 'Rejected') {
                                $statusClass = 'color--red'; // Set class for Completed status
                            }

                            ?>
                            <span class="label label--mini <?= $statusClass ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <?= $row->waste_type ?? '' ?>
                        </td>
                        <?php
                        if ($row->Status == 'Assigned') {
                            ?>
                            <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/details/<?= $row->Job_ID ?>/Assigned"
                                    style="margin-right: 10px;">View</a>
                            </td>

                            <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/statusupdate/<?= $row->Job_ID ?>/Accepted"
                                    style="margin-right: 10px;">Accept</a>
                            </td>
                            <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/statusupdate/<?= $row->Job_ID ?>/Rejected"
                                    style="margin-right: 10px;">Reject</a>
                            </td>

                            <?php
                        }
                        ?>
                    </tr>

                    <?php
                }
            } else {
                ?>
                <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
                    <img src="<?= ROOT ?>/images/NoTask.jpg" alt="No data found" style="width: 400px;">
                </div>
                <?php
            }
            ?>


        </tbody>
    </table>

</div>
<script>
   
   
   function filterTableByDate() {
    // Get the selected date from the input element
    var selectedDate = document.getElementById("selected-date").value;
    console.log("Selected Date:", selectedDate);
    // Get all table rows
    var rows = document.querySelectorAll("#assignedTable tbody tr");
    console.log("Total Rows:", rows.length);
    // Loop through each row and check if the date matches the selected date
    rows.forEach(function(row) {
        // Get the date cell value (assuming it's in the second column)
        var dateCell = row.cells[1].textContent.trim();
        console.log("Date Cell Value:", dateCell);
        // Extract only the date part from the cell value
        var cellDate = dateCell.split(" ")[0]; // Extracting only the date part
        console.log("Selected Date: " + selectedDate);
        console.log("Cell Date: " + cellDate);

        // If the date matches the selected date, display the row; otherwise, hide it
        if (cellDate === selectedDate) {
            console.log("Row displayed: " + dateCell);
            row.style.display = ""; // Display the row
        } else {
            console.log("Row hidden: " + dateCell);
            row.style.display = "none"; // Hide the row
        }
    });
}

  

 




</script>

