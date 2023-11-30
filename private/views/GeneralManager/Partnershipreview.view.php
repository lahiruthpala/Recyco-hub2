<?php $this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/GeneralManager.php");
$generalmanager = new GeneralManager();
?>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="mdl-layout__content">

            <div class="mdl-grid mdl-grid--no-spacing dashboard">

                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">Istanbul</h2>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <small>City in Turkey</small>
                                Istanbul is a major city in Turkey that straddles Europe and Asia across the Bosphorus
                                Strait.
                                Its Old City reflects cultural influences of the many empires that once ruled here.
                                In the Sultanahmet district, the open-air, Roman-era Hippodrome was for centuries the
                                site of chariot races,
                                and Egyptian obelisks also remain.
                                The iconic Byzantine Hagia Sophia features a soaring 6th-century dome and rare Christian
                                mosaics.
                                <br><br>
                                <b>Weather:</b> 12°C, Wind S at 13 km/h, 71% Humidity
                                <br>
                                <b>Local time:</b> Friday 4:00 PM
                                <br>
                                <b>Population:</b> 14.8 million (Dec 31, 2016)
                            </div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button onclick="loadComponent('PartnerTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Partnerships</Button>
                                <button onclick="loadComponent('EventsTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Events</Button>
                                <button onclick="loadComponent('ArticlesTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Articals</Button>
                                <button onclick="loadComponent('ComplaintsTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Complaints</Button>
                                <button onclick="loadComponent('NewPartnership')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;">New Partnerships</button>
                            </div>
                            <div class="mdl-card__title">
                                <h1 id="tableTitle" class="mdl-card__title-text">Partnerships</h1>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"
                                    style="margin-left: 50%; padding:0;">
                                    <label class="mdl-button mdl-js-button mdl-button--icon" for="search1"
                                        style="top:0px;">
                                        <i class="material-icons">search</i>
                                    </label>

                                    <div class="mdl-textfield__expandable-holder">
                                        <input class="mdl-textfield__input" type="text" id="search1" />
                                        <label class="mdl-textfield__label" for="search1">Enter your query...</label>
                                    </div>
                                </div>
                                <button onclick="loadComponent('GeneralManager/Generate')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;"><i
                                        class="material-icons">keyboard_arrow_left</i></button>
                                <button onclick="loadComponent('GeneralManager/Generate')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;"><i
                                        class="material-icons">keyboard_arrow_right</i></button>
                            </div>
                            <?php $generalmanager->partnershipTable(); ?>
                            <?php $generalmanager->partnerArticals(); ?>
                            <?php $generalmanager->partnerEvents(); ?>
                            <?php //$generalmanager->complaints(); ?>
                            <?php $generalmanager->NewPartnership() ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
    
    <script>
        function loadComponent(component) {
            document.getElementById('tableTitle').innerHTML = component.substring(component.lastIndexOf("/") + 1).replace(/([a-z0-9])([A-Z])/g, '$1 $2');
            var sections = document.getElementsByClassName('mdl-card__supporting-text no-padding');
            // Hide all sections
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }

            var partnerTableSection = document.getElementById(component);
            partnerTableSection.style.display = 'block';
            console.log(sections);
            console.log()
        }
    </script>
    <script src="<?= ROOT ?>/js/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>