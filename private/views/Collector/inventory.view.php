<?php $this->view('include/head') ?>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <?php $this->view('include/header') ?>
        <main class="mdl-layout__content">
<div class="mdl-grid mdl-grid--no-spacing dashboard">

                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

                   
                 
                    
                    
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone" style="margin-top: 100px;">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
        style="border-radius: 99px; margin-left: 1vw; width: 400px;">Assigned Inventories</button>

                                    
                            </div>
                          
                            <div class="mdl-card__supporting-text no-padding">
                                <table class="mdl-data-table mdl-js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">Inventory ID</th>
                                            <th class="mdl-data-table__cell--non-numeric">Content</th>
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
                            <?= $row->InventoryId?? '' ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <?= $row->content?? '' ?>
                        </td>
                       
                        <td class="mdl-data-table__cell--non-numeric">
                <?php
                $statusClass = ''; 
                if ($row->Inventorystatus == 'Accepted') {
                    $statusClass = 'color--light-blue'; 
                } elseif ($row->Inventorystatus == 'Completed') {
                    $statusClass = 'color--green'; 
                } elseif ($row->Inventorystatus == 'Rejected') {
                    $statusClass = 'color--red'; 
                }

                ?>
                <span class="label label--mini <?= $statusClass ?>"><?= $row->Inventorystatus ?? '' ?></span>
            </td>
                      
                      

                       
            
                <?php
              
              if ($row->Inventorystatus == 'Assigned') {
                ?>
                    <td class="mdl-data-table__cell--non-numeric">
                    <form action="<?= ROOT ?>/collector/inven/<?= $row->InventoryId ?? '' ?>/Accepted" method="POST">
   
                    <input type="hidden" name="id" value="<?= $row->InventoryId ?? '' ?>">

  
                  
    

                     <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" style="border-radius: 99px;">Accepted</button>
                      </form>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                  <form action="<?= ROOT ?>/collector/inven/<?= $row->InventoryId ?? '' ?>/Rejected" method="POST">
   
                    <input type="hidden" name="id" value="<?= $row->InventoryId ?? '' ?>">


 


                  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" style="border-radius: 99px;">Rejected</button>
                   </form>
              </td>

                <?php
                }
                ?>
            

            <td class="mdl-data-table__cell--non-numeric">
                <?php
              
              if ($row->Inventorystatus == 'Accepted') {
                ?>
                    <form action="<?= ROOT ?>/collector/inven/<?= $row->InventoryId ?? '' ?>/Completed" method="POST">
   
                    <input type="hidden" name="id" value="<?= $row->InventoryId ?? '' ?>">

  
                  
    

                     <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" style="border-radius: 99px;">completed</button>
                    </form>

                <?php
                }
                ?>
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
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
   
<?php $this->view('include/footer') ?>