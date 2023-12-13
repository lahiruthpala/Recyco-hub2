<?php $this->view('include/head') ?>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="#">
                <div class="mdl-card__title">
                    <h2>Please complete the form</h2>
                    <div class="mdl-card__subtitle"></div>
                </div>

                <div class="mdl-card__supporting-text">
                    <form action= "<?= ROOT ?>/collector/store/<?= $data->InventoryId ?? '' ?>/Accepted/<?= $data->pickupId ?? '' ?>" method="POST" class="form">
                        <div class="form__article">
                            <h3>Inventory Details</h3>

                        
                            <div class="mdl-grid">
                                 <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="display: flex; align-items: center;">
                                    <input class="mdl-textfield__input" type="text" id="inventoryId" value=<?= $data->InventoryId ?> name="InventoryId">
                                  <label class="mdl-textfield__label" for="inventoryId">Inventory ID</label>
                                      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"  style="margin-left: 400px; ">scan</button>
                                    </div>
                            </div>

                                

                        <div class="form__article">
                            <h3></h3>

                           

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" value=<?= $data->waste_type ?> id="wasteType" name="wasteType" />
                                    <label class="mdl-textfield__label" for="position">waste Types</label>
                                </div>
                               
                                <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" value=<?= $data->weight ?> id="weight" name="weight"/>
                                        <label class="mdl-textfield__label" for="position">Weight</label>
                                    </div>
                        </div>

                            

                        
                        <div class="form__action">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="isInfoReliable">
                                <input type="checkbox" id="isInfoReliable" class="mdl-checkbox__input" required/>
                                <span class="mdl-checkbox__label">Entered information is reliable</span>
                            </label>
                            <button id="submit_button"  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent"style="position: absolute; bottom: 0; right: 0; margin: 20px;">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

<!-- inject:js -->

<!-- endinject -->
<?php $this->view('include/footer') ?>


