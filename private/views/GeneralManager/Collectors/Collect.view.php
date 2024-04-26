<div class="card__supporting-text no-padding" id="Collect" style="display:none">
    <section id="content">
        <div style="flex-direction: row;border-radius: 16px; width: 94vw;" class="info">
            <div style="width: 35%;margin: 25px;">
                <div class="info" style="border-radius: 15px;">
                    <div class="card__title">
                        <h5 class="card__title-text text-color--white">Collector Details</h5>
                    </div>
                    <div class="form form--basic" style="margin: 20px 2px 20px 30px;">
                        <div class="textfield js-textfield textfield--floating-label full-size"
                            style="padding: 30px 16px 16px 16px;">
                            <input class="textfield__input" type="text" value="" name="Name"
                                placeholder="CollectorID" id="CollectorID" style="width: 70%;">
                            <button type="button" onclick="getCollectorJobsManual()"
                                class="button js-button button--raised js-ripple-effect button--colored-light-blue pull-right"
                                style="bottom: 35px; position: relative;">Get
                                Details</button>
                        </div>
                    </div>
                    <h6 style="margin-left:47%; margin-top:0;">OR</h6>
                    <button style="background-color: #4c504e; border-radius: 20px; margin: 30px 16px 16px 16px;"
                        onclick="getCollectorJobs()" type="button"
                        class="button js-button button--raised js-ripple-effect button--colored-light-blue pull-right">
                        Scan
                    </button>
                    <button style="background-color: #4c504e; border-radius: 20px; margin: 0 16px 16px 16px;"
                        type="button" onclick="submit()"
                        class="button js-button button--raised js-ripple-effect button--colored-light-blue pull-right">
                        Done
                    </button>
                </div>
            </div>
            <video id="preview" style="padding: 40px; max-width: 20%"></video>
            <div style="display:flex;flex-direction: column; width: 35%;">
                <div style="width: auto; height: auto; margin: 25px;">
                    <div class="card shadow--2dp trending" style="margin: 0 0 20px 0;background-color: #444;">
                        <div class="card__title" style="display: flex;justify-content: space-between;">
                            <h2 class="card__title-text">Collected Inventories</h2>
                        </div>
                        <div class="card__supporting-text" style="min-height: 110px;">
                            <ul class="list" id="ScanJobs">
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="width: auto; height: auto; margin: 0 25px 25px 25px;">
                    <div class="card shadow--2dp trending" style="margin: 0 0 20px 0;background-color: #444;">
                        <div class="card__title" style="display: flex;justify-content: space-between;">
                            <h2 class="card__title-text">Pending Inventories</h2>
                        </div>
                        <div class="card__supporting-text" style="min-height: 110px;">
                            <ul class="list" id="jobs">
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