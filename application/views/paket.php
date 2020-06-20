  <section id="paket">
    <div class="container">   
      <div class="row justify-content-center">
        <ul class="nav nav-pills paket" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Paket Reguler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link booster" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Paket Booster</a>
          </li>
        </ul>   
      </div>
      <div class="row">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
              <?php  
              foreach ($paket_reguler as $paket_reguler):
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                  <div class="card">
                    <div class="card-header">
                      <?php echo $paket_reguler->nama_reguler ?>
                    </div>  
                    <div class="card-body">
                      <img class="img-fluid paket" src="<?php echo base_url(); ?>assets/frontend/images/dashboard/icon-reguler.png" alt="icon-reguler">
                      <?php echo $paket_reguler->desk_reguler ?>
                      <p class="card-text mt-3">Waktu <?php echo $paket_reguler->time_reguler;?><b> Menit</b></p>
                      <h5 class="card-price">Rp. <?php echo number_format($paket_reguler->harga_reguler,'0','.','.') ?></h5>
                      <a href="<?php echo base_url('/pembayaran/paket_reg/'.$paket_reguler->slug); ?>" class="btn btn-danger paket">Beli Paket</a>
                    </div>
                  </div>
                </div>   
              <?php endforeach; ?>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
              <?php  
              foreach ($paket_booster as $paket_booster):
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                  <div class="card">
                    <div class="card-header">
                      <?php echo $paket_booster->nama_booster ?>
                    </div>  
                    <div class="card-body">
                      <img class="img-fluid paket" src="<?php echo base_url(); ?>assets/frontend/images/dashboard/icon-booster.png" alt="icon-booster">
                      <?php echo $paket_booster->desk_booster ?>
                      <h5 class="card-price">Rp. <?php echo number_format($paket_booster->harga_booster,'0','.','.') ?></h5>
                      <a href="<?php echo base_url('/pembayaran/paket_bs/'.$paket_booster->slug); ?>" class="btn btn-danger paket">Beli Paket</a>
                    </div>
                  </div>
                </div>   
              <?php endforeach; ?>
              
            </div>
          </div>
        </div>
      </section>
