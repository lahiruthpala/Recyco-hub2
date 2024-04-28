<div class="card__supporting-text no-padding" id="NewSortingJobs" style="display:none">
    <form class="form form--basic" method="POST" action="<?= ROOT ?>/SortingManager/CreateSortingJobs"
        id="newSortingJob" onsubmit="NewSortingJob(event)">
        <div class="info" style="flex-direction: row;border-radius: 16px;">
            <div style="margin:5%; margin-bottom: 5%;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <div>
                        <div style="display: flex; ">
                            <h6>Waste Type</h6>
                            <h6 style="margin-left:50px;">
                                <input type="text" placeholder="Enter the WasteType" id="WasteType" name="waste_type"
                                    class="textfield__input" value="" readonly>
                                <label class="textfield__error" id="WasteTypeError" for="WasteType"></label>
                            </h6>
                        </div>
                        <div style="display: flex;">
                            <h6 style="width: 70%;">Sorting Machine Type</h6>
                            <h6 style="margin-top: 18px;margin-bottom: 49px;margin-right: 15px;">
                                <div class="textfield js-textfield textfield--floating-label getmdl-select full-size dropdown2"
                                    style="display: flex;">
                                    <input class="textfield__input" type="text" id="Machine_Type" name="Machine_Type"
                                        readonly tabIndex="-1" disabled />
                                    <input type="hidden" id="Machine_ID" name="Machine_ID" value="" hidden>
                                    <ul class="menu menu--bottom-left js-menu dark_dropdown" for="Machine_Type" id="MachineTypes">
                                    </ul>

                                    <label for="Position">
                                        <i class="icon-toggle__label material-icons">arrow_drop_down</i>
                                    </label>
                                </div>
                            </h6>
                        </div>
                        <div>
                            <button type="submit"
                                style="border-radius: 20px; margin-top:0; background-color: #027855; color:white;"
                                class="button js-button button--raised js-ripple-effect button--colored-green pull-right">
                                Create</button>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <video id="preview" style="width: 23%;"></video>
            <div style="width: 30%; height: 30%; margin: 3%;">
                <div style="display:flex">
                    <h6 class="card__title-text" id="tableTitle" style="color: black;margin: 15px;font-size: 15px;">
                        Inventories
                    </h6>
                    <button style="border-radius: 99px;margin: 20px 25px 25px auto;background-color: #027855;"
                        onclick="Addinventory()" type="button"
                        class="button js-button button--raised js-ripple-effect button--colored-light-blue pull-right">
                        Add Inventory
                    </button>
                </div>
                <div class="card__supporting-text"
                    style="min-height: 110px;background-color: #EDEDED;border-radius: 15px;">
                    <ul class="list" id="inventory">
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        var ROOT = "<?= ROOT ?>";
    </script>
    <script src="<?= ROOT ?>/js/QrScaner.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= ROOT ?>/js/NewSortingJob.js"></script>
    <script>
        function SetForm(id, form) {
            document.getElementById("Machine_Type").value = form;
            document.getElementById("Machine_ID").value = id;
        }
    </script>
</div>