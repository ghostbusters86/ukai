  <section id="pembayaran">
    <div class="container">
      <div class="row wrap">
        <h2 class="title-pembayaran">Informasi Pembayaran</h2>
        <hr class="line-pembayaran">
        <table class="table pembayaran">
          <tbody>
            <tr>
              <td>Kode Transaksi</td>
              <td class="r"><?php echo $invoice?></td>   
            </tr>
            <tr>
              <td>Nominal Transfer</td>
              <td class="r">Rp. <?php echo number_format($paket_b->harga_booster,'0','.','.');?>
              
            </td>
          </tr>
          <tr>
            <td>Nama Paket</td>
            <td class="r"><?php echo $paket_b->nama_booster ?></td>
          </tr>
          <tr>
            <td colspan="2">  
              Rekening
              <hr>
              <div class="row">
                <!-- <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <img src="<?php echo base_url().'assets/images/bca.jpg' ?>" class="img-fluid" width="300px">
                        </div>
                        <div class="col-8 text-center">
                          <h5 class="card-title">An. Teman Ukai</h5>
                          <p class="card-text">10928309128391</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <img src="<?php echo base_url().'assets/images/mandiri.jpg' ?>" class="img-fluid" width="300px">
                        </div>
                        <div class="col-8 text-center">
                          <h5 class="card-title">An. Teman Ukai</h5>
                          <p class="card-text">10928309128391</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <img src="<?php echo base_url().'assets/images/bri.jpg' ?>" class="img-fluid" width="300px">
                        </div>
                        <div class="col-8 text-center">
                          <h5 class="card-title">An. Imas Amalia Wardani</h5>
                          <p class="card-text">1792-01-015182-50-8</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <div class="row wrap">
      <h2 class="title-pembayaran">   
        Konfirmasi Pembayaran  
        <div class="float-right pembayaran"><?php echo $invoice?></div>
      </h2>
      <hr class="line-pembayaran">
      <div class="col-md-12">          
        <?php echo validation_errors('<div class="alert alert-danger"> ','</div>');?>
        <?php echo form_open_multipart(site_url('pembayaran/paket_bs/'.$paket_b->slug)); ?>  
        <form class="form-wrap"> 
          <div class="form-row">
            <div class="form-group col-md-6">  
              <span>Nama Pembayar</span>
              <input type="text" class="form-control" value="<?php echo $get_user['nama_lengkap']?>" name="id_user" id="" readonly>
            </div>
            <div class="form-group col-md-6">
              <span>a/n Rekening Pembayar</span>
              <input type="text" class="form-control" id="" placeholder="Masukkan a/n Nama Pembayar" name="an_rekening">
            </div>
            <input type="text" class="form-control" value="<?php echo $invoice?>" name="kode_transaksi" id="" hidden>
            <input type="text" class="form-control" value="<?php echo $paket_b->kode_paket?>" name="kode_paket" id="" hidden>
            <input type="text" class="form-control" value="1" name="status_transaksi" id="" hidden>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <span>Bank</span>
              <select class="form-control" name="kode_bank">
                  <option value="BCA">BCA</option>
                  <option value="Mandiri">Mandiri</option>
                  <option value="BRI">BRI</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <span>Jumlah Pembayaran</span>
              <input type="text" class="form-control" id="" placeholder="Masukkan Jumlah Pembayaran" name="nominal_transfer" >
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6"> 
              <span>Tanggal Bayar</span>
              <input type="date" class="form-control" name="tanggal" >
            </div>
            <div class="form-group col-md-6">
              <span>Bukti Transfer</span>
              <input type="file" class="form-control-file pembayaran" name="bukti_transfer" >
            </div>
          </div>
          <button type="submit" class="btn btn-danger color login pl-5 pr-5">Konfirmasi Pembayaran</button>
        </form>
        <?php echo form_close(); ?>
      </div>
    </div>          
  </div>
</div>
</section>
