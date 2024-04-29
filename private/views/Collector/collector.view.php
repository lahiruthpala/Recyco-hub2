<?php $this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/Collector.php");
$collector = new collector(); ?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <?php $this->view('include/CollectorHeader') ?>
        <main class="layout__content">
       

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
                            <button onclick="loadComponent('check')" style="margin: 4px 10px 4px 4px;"
                            id="check_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-smoke">Availability set
                            </Button>
                    </div>
                    <?php $collector->PendingJobs(); ?>
                    <?php $collector->AcceptedJobs(); ?>
                    <?php $collector->FinishedJobs(); ?>
                    <?php $collector->availability(); ?>
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