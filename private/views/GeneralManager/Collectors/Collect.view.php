<div class="mdl-card__supporting-text no-padding" id="Collect" style="display:none">
    <section id="content">
        <div style="display: flex">
            <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone"
                style="width: 35%;">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h5 class="mdl-card__title-text text-color--white">Collector ID</h5>
                    </div>
                    <div class="form form--basic" style="margin: 20px 2px 20px 30px;">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size"
                            style="padding: 30px 16px 16px 16px;">
                            <input class="mdl-textfield__input" type="text" value="" name="Name"
                                placeholder="Collector Name" id="CollectorID" style="width: 70%;">
                            <button type="button" onclick="getCollectorJobsManual()"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right"
                                style="border-radius: 99px;margin-right: 1.5vw; bottom: 35px; position: relative;">Get
                                Details</button>
                        </div>
                    </div>
                    <h6 style="margin-left:50%; margin-top:0;">OR</h6>
                    <button style="background-color: #4c504e; border-radius: 20px; margin-left: 10px;"
                        onclick="getCollectorJobs()" type="button"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right">
                        Scan
                    </button>
                    <button style="background-color: #4c504e; border-radius: 20px; margin: 30px 16px 16px 16px;"
                        type="button" onclick="submit()"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right">
                        Done
                    </button>
                </div>
            </div>
            <video id="preview" style="padding: 40px; max-width: 20%"></video>
            <div style="display:flex;flex-direction: column; width: 35%;">
                <div style="width: auto; height: auto; margin: 3%;"
                    class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp trending" style="margin: 0 0 20px 0;">
                        <div class="mdl-card__title" style="display: flex;justify-content: space-between;">
                            <h2 class="mdl-card__title-text"> Inventories</h2>
                        </div>
                        <div class="mdl-card__supporting-text" style="min-height: 110px;">
                            <ul class="mdl-list" id="ScanJobs">
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="width: auto; height: auto; margin: 3%;"
                    class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                    <div class="mdl-card mdl-shadow--2dp trending" style="margin: 0 0 20px 0;">
                        <div class="mdl-card__title" style="display: flex;justify-content: space-between;">
                            <h2 class="mdl-card__title-text"> Inventories</h2>
                        </div>
                        <div class="mdl-card__supporting-text" style="min-height: 110px;">
                            <ul class="mdl-list" id="jobs">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        var ROOT = "<?= ROOT ?>";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= ROOT ?>/js/Collector.js"></script>
</div>