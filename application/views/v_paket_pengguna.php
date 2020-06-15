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
              foreach ($sudah_reguler as $sudah_reguler):
                ?>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <?php echo $sudah_reguler->nama_reguler ?>
                  </div>  
                  <div class="card-body" align="center">
                    <img class="img-fluid paket" src="<?php echo base_url(); ?>assets/frontend/images/dashboard/icon-reguler.png" alt="icon-reguler">
                    <h5 class="card-price">Kode Soal : <?php echo $sudah_reguler->kode_mulai ?></h5>
                    <?php if ($sudah_reguler->berakhir>=date("Y-m-d H:i:s")){ ?>
                    <a type="button" href="<?php echo base_url('jawab/soal/'.$sudah_reguler->kode_mulai.'/1'); ?>" class="btn btn-danger paket">Lanjut Mengerjakan</a>
                    <?php }else if ($sudah_reguler->score==0){ ?>
                    <a type="button" href="<?php echo base_url('jawab/soal/'.$sudah_reguler->kode_mulai.'/1'); ?>" class="btn btn-danger paket">Lihat Hasil</a>
                    <?php }else{ ?>
                    <a type="button" href="<?php echo base_url('hasil/soal/'.$sudah_reguler->kode_mulai.'/1'); ?>" class="btn btn-danger paket">Lihat Hasil</a>
                    <?php } ?>
                  </div>
                </div>
              </div>   
              <?php endforeach; ?>
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
                    <a type="button" href="<?php echo base_url('paket/reguler/'.$reguler->kode_paket); ?>" class="btn btn-danger paket">Mulai</a>
                      
                    <?php }else{ ?>
                    <a class="btn btn-secondary paket">Menunggu Konfirmasi</a>
                    <?php } ?>
                  </div>
                </div>
              </div>   
              <?php endforeach; ?>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
            
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
                    <a type="button" href="<?php echo base_url('paket/booster/'.$booster->slug); ?>" class="btn btn-danger paket">Mulai</a>
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
      </section>
