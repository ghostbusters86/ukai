  <section id="paket">
    <div class="container">   
      <div class="row justify-content-center">
            <ul class="nav nav-pills paket" id="pills-tab" role="tablist">
              <li class="nav-link">Paket Pengguna</li>
            </ul>  
          <div class="col-12">
            <div class="row justify-content-center">
            <?php  
              foreach ($pengguna_reguler as $reguler):
                ?>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <?php echo $reguler->nama_reguler ?>
                  </div>  
                  <div class="card-body" align="center">
                    <img class="img-fluid paket" src="<?php echo base_url(); ?>assets/frontend/images/dashboard/icon-reguler.png" alt="icon-reguler">
                    <h5 class="card-price">Rp. <?php echo number_format($reguler->harga_reguler,'0','.','.') ?></h5>
                    <?php if ($reguler->status_transaksi=='1'){ ?>
                    <a type="button" href="<?php echo base_url('pembayaran/paket_reg/'.$reguler->slug); ?>" class="btn btn-danger paket">Mulai</a>
                      
                    <?php }else{ ?>
                    <a class="btn btn-secondary paket">Menunggu Konfirmasi</a>
                    <?php } ?>
                  </div>
                </div>
              </div>   
              <?php endforeach; ?>
              <?php  
              foreach ($pengguna_booster as $booster):
                ?>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <?php echo $booster->nama_booster ?>
                  </div>  
                  <div class="card-body" align="center">
                    <img class="img-fluid paket" src="<?php echo base_url(); ?>assets/frontend/images/dashboard/icon-booster.png" alt="icon-reguler">
                    <h5 class="card-price">Rp. <?php echo number_format($booster->harga_booster,'0','.','.') ?></h5>
                    <?php if ($booster->status_transaksi=='1'){ ?>
                    <a type="button" href="<?php echo base_url('pembayaran/paket_reg/'.$reguler->slug); ?>" class="btn btn-danger paket">Mulai</a>
                    <?php }else{ ?>
                    <a class="btn btn-secondary paket">Menunggu Konfirmasi</a>
                    <?php } ?>
                  </div>
                </div>
              </div>   
              <?php endforeach; ?>
              </div>
            </div>
          </div>
      <div class="row justify-content-center">
        <ul class="nav nav-pills paket" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Paket soal reguler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link booster" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Paket soal booster</a>
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
                      <p class="card-text">Waktu <?php echo $paket_reguler->time_reguler;?><b> Menit</b></p>
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
              <?php for ($i=0; $i < $no_paket ; $i++) { ?>
                <div class="col-lg-4 col-md-6 col-12">
                  <div class="card">
                    <div class="card-header">                    
                      <?php echo $paket[$i]['nama_booster']; ?>
                    </div>                
                    <div class="card-body">
                      <img class="img-fluid paket" src="<?php echo base_url(); ?>assets/frontend/images/dashboard/icon-booster.png" alt="icon-booster">
                      <?php for ($j=0; $j < $paket[$i]['jumlah'] ; $j++) { ?>
                        <p class="card-text"><?php  echo $paket[$i]['bab'][$j]['nama_bab'] ?></p>
                      <?php } ?>
                      <h5 class="card-price">Rp. <?php echo number_format($paket[$i]['harga_booster'],'0','.','.') ?></h5>
                      <a href="<?php echo base_url('/pembayaran/paket_bs/'.$paket[$i]['slug']); ?>" class="btn btn-danger paket">Beli Paket</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
