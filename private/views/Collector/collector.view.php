<?php $this->view('include/head') ?>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <?php $this->view('include/header') ?>
        <main class="mdl-layout__content">
        <?php
        if (is_array($rows) && !empty($rows)) {
             $completedCount = 0;
             $rejectedCount = 0;

    foreach ($rows as $row) {
        // Assuming 'Status' is the key for the status field in your $row array
      

        if ($row->Status=== 'Completed') {
            $completedCount++;
        } elseif ($row->Status === 'Rejected') {
            $rejectedCount++;
        }

        // Other processing for each row, if needed
       }
     }
     ?>
            <div class="mdl-grid mdl-grid--no-spacing dashboard">

                <div
        class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                   
            <div style="width: 100%; display: flex; flex-direction: row;">
                   
            <div class="mdl-cell mdl-cell--2-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
    <div class="mdl-card mdl-shadow--2dp" style="width: 150%; height:400px">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Your Progress</h2>
        </div>
        <div class="mdl-card__supporting-text" style="display: flex; align-items: center; justify-content: space-between;">
            <div class="chart2__container" style="width: 70%; height: 200px;">
            <div style="display: flex; align-items: center;">
            <img src="<?= ROOT ?>/images/success.png" alt="Success Image" style="width: 20%; height: auto;">
            <span style="margin-left: 10px;"><h4> <?php echo $completedCount; ?>&nbsp;Completed Pickups</h4></span>
        </div>
        <div style="display: flex; align-items: center;">
            <img src="<?= ROOT ?>/images/decline.png" alt="Success Image" style="width: 20%; height: auto;">
            <span style="margin-left: 10px;"><h4> <?php echo $rejectedCount; ?>&nbsp;Rejected Pickups</h4></span>
        </div>

            </div>

            <!-- Image on the left-hand side -->
            <img src="<?= ROOT ?>/images/growth.png" alt="Your Image" style="width: 30%; height: auto; margin-left:60px">
            <div style="display: flex; align-items: center;">
            <img src="<?= ROOT ?>/images/target.png" alt="Success Image" style="width: 20%; height: auto;  margin-left:40px">
            <span style="margin-left: 10px;"><h4>  <?php echo (100-$completedCount); ?>&nbsp;left to 100 pickups</h4></span>
        </div>
        </div>
    </div>
</div>



          
    </div>
</div>


                
        </div>

                    
                    
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW; width: 400px;" >Assigned Pickups</button>
                                </div>
                          
                            <div class="mdl-card__supporting-text no-padding">
                                <table class="mdl-data-table mdl-js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">Pickup ID</th>
                                            <th class="mdl-data-table__cell--non-numeric">Assigned Date</th>
                                            <th class="mdl-data-table__cell--non-numeric">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->pickupId?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->AssignedDate?? '' ?>
                        </td>
                       
                      
                        <td class="mdl-data-table__cell--non-numeric">
                <?php
                $statusClass = ''; // Default class
                if ($row->Status == 'Assigned') {
                    $statusClass = 'color--light-blue'; // Set class for Accepted status
                } elseif ($row->Status == 'Completed') {
                    $statusClass = 'color--green'; // Set class for Completed status
                } 

                ?>
                <span class="label label--mini <?= $statusClass ?>"><?= $row->Status ?? '' ?></span>
            </td>
            <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->waste_type?? '' ?>
                        </td>
        
                <?php
              
              if ($row->Status == 'Assigned') {
                ?>
                    <td class="mdl-data-table__cell--non-numeric">
                   <form action="<?= ROOT ?>/collector/details/<?= $row->pickupId?? '' ?>" method="POST">
                                <!-- Replace 'your_id_value' with the actual ID -->
                                <input type="hidden" name="id" value="<?= $row->Partner_ID ?? '' ?>">
                                <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                    style="border-radius: 99px;">View</button>
                    </form>
              </td>
              <td class="mdl-data-table__cell--non-numeric">
                   <form action="<?= ROOT ?>/collector/start/<?= $row->pickupId?? '' ?>" method="POST">
                                <!-- Replace 'your_id_value' with the actual ID -->
                                <input type="hidden" name="id" value="<?= $row->Partner_ID ?? '' ?>">
                                <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px;">Start</button>
                    
                                </form>
              </td>

                <?php
                }
                ?>     
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
                        </div>
                        

                        
                    </div>
                   

                    
                 
                    
                    
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW; width: 400px;" >Assigned Pickups</button>
                                </div>
                          
                            <div class="mdl-card__supporting-text no-padding">
                                <table class="mdl-data-table mdl-js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">Pickup ID</th>
                                            <th class="mdl-data-table__cell--non-numeric">Assigned Date</th>
                                            <th class="mdl-data-table__cell--non-numeric">Status</th>
                                           
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->pickupId?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->AssignedDate?? '' ?>
                        </td>
                       
                      
                        <td class="mdl-data-table__cell--non-numeric">
                <?php
                $statusClass = ''; // Default class
                if ($row->Status == 'Assigned') {
                    $statusClass = 'color--light-blue'; // Set class for Accepted status
                } elseif ($row->Status == 'Completed') {
                    $statusClass = 'color--green'; // Set class for Completed status
                } 

                ?>
                <span class="label label--mini <?= $statusClass ?>"><?= $row->Status ?? '' ?></span>
            </td>
            <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->waste_type?? '' ?>
                        </td>
        
                <?php
              
              if ($row->Status == 'Assigned') {
                ?>
                    <td class="mdl-data-table__cell--non-numeric">
                   <form action="<?= ROOT ?>/collector/details/<?= $row->pickupId?? '' ?>" method="POST">
                                <!-- Replace 'your_id_value' with the actual ID -->
                                <input type="hidden" name="id" value="<?= $row->Partner_ID ?? '' ?>">
                                <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                    style="border-radius: 99px;">View</button>
                    </form>
              </td>
              <td class="mdl-data-table__cell--non-numeric">
                   <form action="<?= ROOT ?>/collector/start/<?= $row->pickupId?? '' ?>" method="POST">
                                <!-- Replace 'your_id_value' with the actual ID -->
                                <input type="hidden" name="id" value="<?= $row->Partner_ID ?? '' ?>">
                                <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px;">Start</button>
                    
                                </form>
              </td>

                <?php
                }
                ?>     
            
               
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
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
   


   
    
<?php $this->view('include/footer') ?>
