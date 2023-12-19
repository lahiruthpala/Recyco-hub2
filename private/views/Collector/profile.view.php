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
                        <br>
                        <label class="mdl-textfield__label" for="profile-floating-first-name" style="color: white !important;">First Name</label>
                        <span style="display: block; font-size: 100%; color: white !important; text-decoration: underline;">Your additional text goes here</span>
                        </div>

                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                        <br>
                        <br>
                       <label class="mdl-textfield__label" for="profile-floating-last-name" style="color: white !important;">Last Name</label>
                       <span style="display: block; font-size: 100%; color: white !important; text-decoration: underline;">Your additional text goes here</span>
                       </div>

                      </div>


                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                           <br>
                           <br>
                         <label class="mdl-textfield__label" for="profile-floating-first-name" style="color: white !important;">Collector ID</label>
                          <span style="display: block; font-size: 100%; color: white; text-decoration: underline;">Your additional text goes here</span>
                         </div>
                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                           <br>
                           <br>
                         <label class="mdl-textfield__label" for="profile-floating-first-name" style="color: white !important;">Address</label>
                          <span style="display: block; font-size: 100%; color:white; text-decoration: underline;">Your additional text goes here</span>
                         </div> 

                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size" style="width: 45%; display: inline-block; margin-right: 5%;">
                          <label class="mdl-textfield__label" for="profile-floating-email"style="color: white !important;" >Email</label>
                           <br>
                           <br>
                          <span style="display: block; font-size: 100%; color: white; text-decoration: underline;">Your additional text goes here</span>
                         </div>

                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size" style="width: 45%; display: inline-block;">
                             <label class="mdl-textfield__label" for="profile-floating-contact-no"style="color: white !important;" >Contact No</label>
                             <br>
                             <br>
                          <span style="display: block; font-size: 100%; color: white; text-decoration: underline;">Your additional text goes here</span>
                          </div>

                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <br>
                            <br>
                            <label class="mdl-textfield__label" for="profile-floating-first-name"style="color: white !important;" >Assigned Area</label>
                             <span style="display: block; font-size: 100%; color: white; text-decoration: underline;">Your additional text goes here</span>
                            </div>
   


                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    




    <!-- inject:js -->
    <script src="<?= ROOT ?>/js/d3.min.js"></script>
    <script src="<?= ROOT ?>/js/getmdl-select.min.js"></script>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/nv.d3.min.js"></script>
    <script src="<?= ROOT ?>/js/layout/layout.min.js"></script>
    <script src="<?= ROOT ?>/js/scroll/scroll.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/discreteBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/linePlusBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/stackedBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/employer-form/employer-form.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/line-chart/line-charts-nvd3.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/map/maps.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/table/table.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/todo/todo.min.js"></script>
    <script src="<?= ROOT ?>/js/sortingManage.js"></script>
    <!-- endinject -->
</body>

</html>