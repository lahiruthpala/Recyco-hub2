<div class="card__supporting-text no-padding" id="AcceptedJobs" style="display: none;">


   <?php
    if (is_array($rows) && !empty($rows)) {
        ?>
        <div class="main-right-top-four-left">
            <div class="mdl-grid" style="display: flex; flex-direction: row;">
                   <div class="mdl-cell mdl-cell--6-col" style="display: flex; align-items: center;">
                      <p>Date</p>
                       <div class="mdl-textfield mdl-js-textfield">
                          <input class="mdl-textfield__input" type="date" id="selected-date">
               
                      </div>
                   </div>
                 <div class="mdl-cell mdl-cell--6-col" style="display: flex; align-items: center;margin-left:5px;"> 
                    <button class="button js-button button--raised js-ripple-effect button--colored-green" onclick="filterTableByDate()">
                        Filter
                    </button>
                  </div>
            </div>
       </div>

        <table class="data-table js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr>
                    <th class="data-table__cell--header">Pickup ID</th>
                    <th class="data-table__cell--header">Assigned Date</th>
                    <th class="data-table__cell--header">Status</th>
                    <th class="data-table__cell--header"></th>
                    <th class="data-table__cell--header"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    ?>
                    <tr style="background-color:#D0D3D3" >
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Job_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Assigned_Date ?? '' ?>
                        </td>


                        <td class="data-table__cell--non-numeric">
                        
                            <span class="label label--mini color--light-blue">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                        <td class="data-table__cell--non-numeric">
                             <?= $row->waste_type ?? '' ?>
                        </td>
                        <?php

                        if ($row->Status == 'Accepted') {
                            ?>
                            <td class="data-table__cell--non-numeric">
                             
                             <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                href="<?= ROOT ?>/collector/details/<?= $row->Job_ID ?>/Accepted"
                                style="margin-right: 10px;background-color: #26AEF4;color:white;">view</a>

                            </td>


                            <?php
                        }
                        ?>


                    </tr>
                </tbody>
            <?php
                }
                ?>
        </table>
        <?php
    } else {
        ?>
        <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
            <img src="<?= ROOT ?>/images/NoTask.jpg" alt="No data found" style="width: 400px;">
        </div>
        <?php
    }
    ?>
</div>
<script>

   function filterTableByDate() {
    
    var selectedDate = document.getElementById("selected-date").value;
    console.log("Selected Date:", selectedDate);
  
    var rows = document.querySelectorAll("#assignedTable tbody tr");
    console.log("Total Rows:", rows.length);
  
    rows.forEach(function(row) {
      
        var dateCell = row.cells[1].textContent.trim();
        console.log("Date Cell Value:", dateCell);
       
        var cellDate = dateCell.split(" ")[0];
        console.log("Selected Date: " + selectedDate);
        console.log("Cell Date: " + cellDate);

       
        if (cellDate === selectedDate) {
            console.log("Row displayed: " + dateCell);
            row.style.display = ""; 
        } else {
            console.log("Row hidden: " + dateCell);
            row.style.display = "none"; 
        }
    });
}


</script>

