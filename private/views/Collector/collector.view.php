<?php $this->view('include/head') ?>
<link rel="stylesheet" href="<?= ROOT ?>/css/sidebar.css">
<div class="nav-bar">
    <div id="menuToggle" class="toggle-menu active">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</div>

<div class="main">
    <div id="sideMenu" class="side-menu">
        <div class="mobile-search">
            <form class="search-form">
                <input autocomplete="off" class="search-input" placeholder="Search" type="search">
                <button class="search-action" type="submit" value=""></button>
            </form>
        </div>
                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                   
                    <div style="width: 100%; display: flex; flex-direction: row;">
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp pie-chart">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Your Progress</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div class="pie-chart__container">
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

                </main>

            </div>

            <?php $this->view('include/footer') ?>
    </div>
<?php $this->view('include/footer') ?>
</div>
<script src="<?= ROOT ?>/js/sidebar.js"></script>
