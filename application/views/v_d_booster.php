  <section id="soal">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card" style="margin: 0px ">
            <div class="card-header">Informasi Soal</div>
            <div class="card-body">
              <table class="table soal">
                <tbody>
                  <tr class="t">
                    <td>Nama:</td>
                    <td>Kode Paket:</td>
                  </tr>
                  <tr>
                    <td><?php echo $user->nama_lengkap; ?></td>
                    <td>TU-<?php echo $detail->kode_paket; ?></td>
                  </tr>
                </tbody>
              </table>
              <p class="card-text">Nama paket:</p>
              <p class="card-description"><?php echo $detail->nama_booster ?></p>
              <p class="card-text">Deskripsi soal:</p>
              <p class="card-description"><?php echo $detail->desk_booster ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="row justify-content-center">
            <?php  
            $no=1;
            foreach ($bab_booster as $bab_booster):
              ?>
              <div class="col-md-4 mb-3">
                <div class="card" style="margin-left: 0px ">
                  <div class="card-header">
                    <?php echo 'Latihan '.$no ?>
                  </div>  
                  <div class="card-body" align="center">
                    <p class="card-description"><b><?php echo $bab_booster->nama_bab_booster ?></b></p>
                    <p class="card-description"><?php echo $bab_booster->desk_bab_booster ?></p>
                    <p class="card-description">Waktu <?php echo $bab_booster->time_bab_booster ?> Menit</p>
                    <?php if ($bab_booster->id_ambil_soal==null){ ?>
                      <a type="button" href="<?php echo base_url('paket/bab_booster/'.$bab_booster->kode_soal); ?>" class="btn btn-danger paket">Mulai</a>
                    <?php } else if ($bab_booster->berakhir>=date("Y-m-d H:i:s")){ ?>
                      <a type="button" href="<?php echo base_url('jawab/soal_booster/'.$bab_booster->kode_mulai.'/1'); ?>" class="btn btn-danger paket">Lanjutkan</a> 
                    <?php } else if ($bab_booster->score==0){ ?>
                      <a type="button" href="<?php echo base_url('hasil/soal_booster/'.$bab_booster->kode_mulai.'/1'); ?>" class="btn btn-danger paket">Hasil</a>
                    <?php } else if ($bab_booster->berakhir>=date("Y-m-d H:i:s",strtotime('-24 hours'))){ ?>
                      <a type="button" href="<?php echo base_url('hasil/soal_booster/'.$bab_booster->kode_mulai.'/1'); ?>" class="btn btn-danger paket">Hasil</a>
                    <?php }else{ ?>
                      <a type="button" class="btn btn-secondary ">Disabled</a>
                    <?php } ?>
                  </div>
                </div>
              </div>   
            <?php $no++; endforeach; ?>
          </div>
        </div>


      </div>
    </div>
  </section>

