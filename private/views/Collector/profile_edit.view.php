<?php $this->view('include/head') ?>

<body img src="images/Icon_header.png">
    <header>
        <?php $this->view('include/header') ?>
    </header>
    <div style="display: flex;  margin-left:300px">
    <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone">
    
    <div class="mdl-card mdl-shadow--2dp" style="width:1000px;">
    <div class="mdl-card__title" style="position: relative;">
    <h5 class="mdl-card__title-text text-color--white">PROFILE INFO</h5>
    <button class="mdl-button mdl-js-button mdl-button--icon" style="position: absolute; top: 10px; right: 20px;">
        <i class="material-icons">edit</i>
    </button>
</div>


            <div class="mdl-card__supporting-text">
                <form class="form form--basic">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--1-col-phone">
                            <div class="profile-image color--smooth-gray profile-image--round">
                            <img src="<?= ROOT ?>/images/login.png" alt="City Image" style="width: 100%; height: 100%; border-radius: 50%;">
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article">
                        <div style="display: flex; justify-content: space-between;">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <br>
                        <input class="mdl-textfield__input" type="text" value="Bob" id="profile-floating-first-name">
                                <label class="mdl-textfield__label" for="profile-floating-first-name">First Name</label>
                        </div>

                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size" style="margin-left:30px;">
                        <br>
                        <input class="mdl-textfield__input"  type="text" value="Kelso" id="profile-floating-last-name">
                        <label class="mdl-textfield__label" for="profile-floating-last-name">Last Name</label> 
                    </div>

                      </div>


                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                           <br>
                           <input class="mdl-textfield__input" value="25435" id="profile-floating-e-Id">
                                <label class="mdl-textfield__label" for="floating-e-mail">collector ID</label>
                        </div>
                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                           <br>
                          
                           <input class="mdl-textfield__input" type="text" value="colombo" id="profile-floating-address">
                                <label class="mdl-textfield__label" for="floating-e-mail">Address</label>
                         </div> 

                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size" style="width: 45%; display: inline-block; margin-right: 5%;">
                         <br>
                         <input class="mdl-textfield__input" type="text" value="BobbyK@darkboard.io" id="profile-floating-e-mail">
                                <label class="mdl-textfield__label" for="floating-e-mail">Email</label>
                         </div>

                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size" style="width: 45%; display: inline-block;">
                         <br>
                         <input class="mdl-textfield__input" type="number" value="073456690" id="profile-floating-contact_no">
                          <label class="mdl-textfield__label" for="floating-e-mail">contact No</label>   
                        
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select full-size">
                        <br>
                        <input class="mdl-textfield__input" type="text" id="location" readonly tabIndex="-1"/>
                         <label class="mdl-textfield__label" for="location">Location</label>
    
                          <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="location" style="background: lightseagreen;">
                          <li class="mdl-menu__item" onclick="selectOption('Colombo')">Colombo</li>
                          <li class="mdl-menu__item" onclick="selectOption('Gampaha')">Gampaha</li>
                           <li class="mdl-menu__item" onclick="selectOption('Kaluthara')">Kaluthara</li>
                           <li class="mdl-menu__item" onclick="selectOption('Kandy')">Kandy</li>
                          </ul>
    
                        <label for="location">
                         <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                        </label>
                        </div>

                        <div class="mdl-card__actions">
                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" style="margin-left: 500px;">Update</a>
                           </div>


                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function selectOption(value) {
        document.getElementById('location').value = value;
    }
</script>

    
<?php $this->view('include/footer') ?>
