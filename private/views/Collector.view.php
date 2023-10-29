<?php $this->view('include/head') ?>

<body>
    <header>
        <?php $this->view('include/header')?>
    </header>

    <section>
        
      <div class="row">
        <h2 class="section-heading">Our Services</h2>
      </div>
      <div class="row">
      
        <div class="column" id="pickuptable">
          <a href="<?=ROOT?>/collector/table">
           <div class="card">
            <div class="icon-wrapper">
              <i class="fas fa-book"></i>
            </div>
            <h3><b>View Pickup Requests</b></h3>
          
           </div>
          </a>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fas fa-truck-pickup"></i>
            </div>
            <h3><b>Update Pickup Status</b></h3>
          
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fas fa-qrcode"></i>
            </div>
            <h3><b>Generate QR</b></h3>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <h3><b>Upadate Inventory</b></h3>
           
          </div>
       
    </section>
  

    <?php $this->view('include/footer') ?>
</body>
</html>