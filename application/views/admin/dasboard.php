<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
      </div>

    </div>
  </div>
  <div class="row card-hover">
    <div class="col-12 col-lg-6 col-xl my-2">
      <a href="<?php echo base_url(); ?>admin/user">
        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="card-title text-uppercase text-muted mb-2">
                 Peserta
               </h6>

              <span class="h2 mr-2 mb-0">
                  <?php echo $peserta; ?>
                </span>
            </div>
            <div class="col-auto">
              <span class="h2 fas fa-user-circle mb-0"></span>
            </div>
          </div> <!-- / .row -->

        </div>
      </div>

    </a>
  </div>
  <div class="col-12 col-lg-6 col-xl my-2">
   <a href="<?php echo base_url(); ?>admin/paket_reguler">

    <!-- Card -->
    <div class="card">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">

            <!-- Title -->
            <h6 class="card-title text-uppercase text-muted mb-2">
              Paket
            </h6>

            <!-- Heading -->

            <span class="h6 mb-0">
              <?php echo $reguler; ?> Reguler
            </span>

            <br>
            <span class="h6 mb-0 mt-4 ">
              <?php echo $booster; ?> Booster
            </span>

          </div>
          <div class="col-auto">

            <!-- Icon -->
            <span class="h2 fas fa-box-open  mb-0"></span>

          </div>
        </div> <!-- / .row -->

      </div>
    </div>

  </a>
</div>

<div class="col-12 col-lg-6 col-xl my-2">

  <!-- Card -->
  <a href="<?php echo base_url(); ?>admin/dasboard">
    <div class="card">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">

            <!-- Title -->
            <h6 class="card-title text-uppercase text-muted mb-2">
              Soal
            </h6>

            <div class="row align-items-center no-gutters">
              <div class="col-auto">

                <!-- Heading -->
                <span class="h2 mr-2 mb-0">
                  <?php echo $soal; ?>
                </span>

              </div>

            </div> <!-- / .row -->

          </div>
          <div class="col-auto">

            <!-- Icon -->
            <span class="h2 fas fa-vote-yea  mb-0"></span>

          </div>
        </div> <!-- / .row -->

      </div>
    </div>

  </a>
</div>
<div class="col-12 col-lg-6 col-xl my-2">
 <a href="<?php echo base_url(); ?>admin/user">

  <!-- Card -->
  <div class="card">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col">

          <!-- Title -->
          <h6 class="card-title text-uppercase text-muted mb-2">
            Universitas
          </h6>

          <!-- Heading -->
          <span class="h2 mb-0">
            <?php echo $universitas ?>
          </span>

        </div>
        <div class="col-auto">

          <!-- Icon -->
          <span class="h2 fas fa-university mb-0"></span>

        </div>
      </div> <!-- / .row -->

    </div>
  </div>

</a>
</div>
</div>


</main>

