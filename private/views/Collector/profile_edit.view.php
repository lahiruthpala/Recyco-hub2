<?php $this->view('include/head') ?>
<body>
    <div class="layout js-layout layout--fixed-header">
        
        <main class="layout__content color--grey-100">
            <div class="card shadow--2dp employer-form" action="#" style="width: 800px;">
                <div class="card__title">
                    <h2></h2>
                    <div class="card__subtitle"></div>
                </div>

                <div class="card__supporting-text">
             
                    <form action= "<?= ROOT ?>/collector/updateProfile/<?= $data->Collector_ID ?? '' ?>" method="POST" class="form">
                        <div class="form__article">
                            <h3>Your Details</h3>

                        <div class="form__article">
                            <h3></h3>

                           

                            <div class="grid">
                                <div class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                    <input class="textfield__input" type="text" value=<?= $data->firstname ?> id="fname" name="fname" />
                                    <label class="textfield__label" for="position">First name</label>
                                </div>
                            </div>

                               
                                <div class="grid">
                                    <div class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                        <input class="textfield__input" type="text" value=<?= $data->lastname ?> id="lname" name="lname"/>
                                        <label class="textfield__label" for="position">Last name</label>
                                    </div>
                                </div>

                                    <div class="grid">
                                    <div class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                        <input class="textfield__input" type="text" value=<?= $data->address ?> id="address" name="address"/>
                                        <label class="textfield__label" for="position">Address</label>
                                    </div>

                                    <div class="grid">
                                    <div class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                        <input class="textfield__input" type="text" value=<?= $data->email ?> id="email" name="email"/>
                                        <label class="textfield__label" for="position">Email</label>
                                    </div>


                                    <div class="grid">
                                    <div class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                        <input class="textfield__input" type="text" value=<?= $data->contactNo ?> id="contactNo" name="contactNo"/>
                                        <label class="textfield__label" for="position">Contact Number</label>
                                    </div>
                                    </div>
                                    
                                 
                                    <div class="grid">
                                    <div class="cell cell--6-col textfield js-textfield textfield--floating-label">
                                        <input class="textfield__input" type="text" value=<?= $data->vehicleNo ?> id="vehicleNo" name="vehicleNo"/>
                                        <label class="textfield__label" for="position">Vehicle Number</label>

                    
                                    </div>
                                   
                                   
                                   
                        </div>

                            

                        
                        <div class="form__action">
                            <label class="checkbox js-checkbox js-ripple-effect" for="isInfoReliable">
                                <input type="checkbox" id="isInfoReliable" class="checkbox__input" required/>
                                <span class="checkbox__label">Entered information is reliable</span>
                            </label>
                            <button id="submit_button"  class="button js-button button--raised button--colored button--accent"style="position: absolute; bottom: 0; right: 0; margin: 20px;">
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


