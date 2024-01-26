<?php $this->view('include/head') ?>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="#" style="width: 800px;">
                <div class="mdl-card__title">
                    <h2></h2>
                    <div class="mdl-card__subtitle"></div>
                </div>

                <div class="mdl-card__supporting-text">
             
                    <form action= "<?= ROOT ?>/collector/updateProfile/<?= $data->collectorId ?? '' ?>" method="POST" class="form">
                        <div class="form__article">
                            <h3>Your Details</h3>

                        <div class="form__article">
                            <h3></h3>

                           

                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" value=<?= $data->firstname ?> id="fname" name="fname" />
                                    <label class="mdl-textfield__label" for="position">First name</label>
                                </div>
                            </div>

                               
                                <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" value=<?= $data->lastname ?> id="lname" name="lname"/>
                                        <label class="mdl-textfield__label" for="position">Last name</label>
                                    </div>
                                </div>

                                    <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" value=<?= $data->address ?> id="address" name="address"/>
                                        <label class="mdl-textfield__label" for="position">Address</label>
                                    </div>

                                    <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" value=<?= $data->email ?> id="email" name="email"/>
                                        <label class="mdl-textfield__label" for="position">Email</label>
                                    </div>


                                    <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" value=<?= $data->contactNo ?> id="contactNo" name="contactNo"/>
                                        <label class="mdl-textfield__label" for="position">Contact Number</label>
                                    </div>
                                    </div>
                                    
                                 
                                    <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" value=<?= $data->vehicleNo ?> id="vehicleNo" name="vehicleNo"/>
                                        <label class="mdl-textfield__label" for="position">Vehicle Number</label>

                    
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


