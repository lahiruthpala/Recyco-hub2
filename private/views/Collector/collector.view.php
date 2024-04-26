<?php $this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/Collector.php");
$collector = new collector(); ?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <?php $this->view('include/CollectorHeader') ?>
        <main class="layout__content">
            //
            <?php
            //if (is_array($rows) && !empty($rows)) {
            //    $completedCount = 0;
            //    $rejectedCount = 0;
            //    $acceptedcount = 0;
//
            //    foreach ($rows as $row) {
            //        // Assuming 'Status' is the key for the status field in your $row array
            //        if ($row->Status === 'Completed') {
            //            $completedCount++;
            //        } elseif ($row->Status === 'Rejected') {
            //            $rejectedCount++;
            //        } elseif ($row->Status === 'Accepted') {
            //            $acceptedcount++;
            //        }
//
            //        // Other processing for each row, if needed
            //    }
            //}
            //  ?>
            <!-- <div class="grid grid--no-spacing dashboard">

                <div
                    >

                    <div style="width: 100%; display: flex; flex-direction: row;">

                        <div class="cell cell--2-col-desktop cell--4-col-tablet cell--2-col-phone">
                            <div class="card shadow--2dp" style="width: 150%; height:400px">
                                <div class="card__title">
                                    <h2 class="card__title-text">Your Progress</h2>
                                </div>
                                <div class="card__supporting-text"
                                    style="display: flex; align-items: center; justify-content: space-between;">
                                    <div class="chart2__container" style="width: 70%; height: 200px;">
                                        <div style="display: flex; align-items: center;">
                                            <img src="<?= ROOT ?>/images/success.png" alt="Success Image"
                                                style="width: 20%; height: auto;">
                                            <span style="margin-left: 10px;">
                                                <h4>
                                                    //<?php echo $completedCount; ?>&nbsp;Completed Pickups
                                                </h4>
                                            </span>
                                        </div>
                                        <div style="display: flex; align-items: center;">
                                            <img src="<?= ROOT ?>/images/decline.png" alt="Success Image"
                                                style="width: 20%; height: auto;">
                                            <span style="margin-left: 10px;">
                                                <h4>
                                                    //<?php echo $rejectedCount; ?>&nbsp;Rejected Pickups
                                                </h4>
                                            </span>


                                        </div>

                                    </div>

                                    
                                    <img src="<?= ROOT ?>/images/growth.png" alt="Your Image"
                                        style="width: 30%; height: auto; margin-left:60px">
                                    <div style="display: flex; align-items: center;">
                                        <img src="<?= ROOT ?>/images/target.png" alt="Success Image"
                                            style="width: 20%; height: auto;  margin-left:40px">
                                        <span style="margin-left: 10px;">
                                            <h4>
                                                //<?php echo ($acceptedcount); ?>&nbsp;Accepted pickups left to complete
                                            </h4>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>



            </div> -->



            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <div class="card shadow--2dp">
                    <div id="buttonToggle" class="buttonToggle">
                        <button onclick=" loadComponent('PendingJobs')" style="margin: 4px 10px 4px 4px;"
                            id="PendingJobs_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-green">Pending
                            Jobs</Button>
                        <button onclick="loadComponent('AcceptedJobs')" style="margin: 4px 4px 4px 4px;"
                            id="AcceptedJobs_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-smoke">Accepted
                            Jobs</Button>
                        <button onclick="loadComponent('FinishedJobs')" style="margin: 4px 10px 4px 4px;"
                            id="FinishedJobs_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-smoke">Finished
                            Jobs</Button>
                    </div>
                    <?php $collector->PendingJobs(); ?>
                    <?php $collector->AcceptedJobs(); ?>
                    <?php $collector->FinishedJobs(); ?>
                </div>
            </div>
    </div>
    </div>

    </main>

    </div>
    <script>
        function loadComponent(component, id = "") {
    console.log(component);
    var sections = document.getElementsByClassName('card__supporting-text no-padding');
    // Hide all sections
    console.log("Inside the load component");
    for (var i = 0; i < sections.length; i++) {
        sections[i].style.display = 'none';
        if (typeof isScannerActive !== 'undefined' && isScannerActive) {
            scanner.stop();
        }
    }
    console.log("All are hidden");
    if (id.length != 0) {
        createcomponent(id)
    }
    var partnerTableSection = document.getElementById(component);
    partnerTableSection.style.display = 'block';
    console.log("Done");

    // Get all child elements in the div
    var button = document.getElementById("buttonToggle");
    var childElements = button.children;
    for (var i = 0; i < childElements.length; i++) {
        if (childElements[i].id && childElements[i].id.endsWith("_Button")) {
            if (childElements[i].id != component + "_Button") {
                childElements[i].className = "button js-button button--raised js-ripple-effect button--colored-smoke";
            } else {
                childElements[i].className = "button js-button button--raised js-ripple-effect button--colored-green";
            }
        }
    }
}

    </script>





    <?php $this->view('include/footer') ?>