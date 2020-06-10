<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Transaksi</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/transaksi">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>  
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/transaksi/edit/'.$edit->id_transaksi)) ?>
    <div class="row my-4">

      <div class="col-md-6">  

        <div class="card">
          <div class="card-body">   
            <div class="form-group">
              <label>Nama User</label>
              <input type="text" class="form-control" value="<?php echo $edit->nama_lengkap ?>" name="id_user" disabled>
            </div>
            <div class="form-group">
              <label>Kode Transaksi</label>
              <input type="disabled" class="form-control" value="<?php echo $edit->kode_transaksi ?>" name="kode_transaksi" disabled>
            </div>
            <div class="form-group">
              <label>Kode Bank</label>
              <input type="disabled" class="form-control" value="<?php echo $edit->kode_bank ?>" name="kode_bank" disabled>
            </div>
            <div class="form-group">
              <label>Atas Nama</label>
              <input type="disabled" class="form-control" value="<?php echo $edit->kode_paket ?>"  name="an_rekening" disabled>
            </div>
            <div class="form-group">
            <label>Nominal Transfer</label>
            <input type="text" class="form-control"  value="<?php echo $edit->nominal_transfer ?>"  name="nominal_transfer" disabled>
          </div>
          <div class="form-group">
            <label>Kode Paket</label>
            <input type="text" class="form-control" value="<?php echo $edit->kode_paket ?>"  name="kode_paket" disabeld>
          </div>
          </div>
        </div>  

      </div>

      <div class="col-md-6">
        <div class="card">
        <div class="card-body">
          <label>Status Transaksi</label>
          <div class="card">
          <img src="<?php echo base_url().'img/img_transaksi/'.$edit->bukti_transfer ?>" class="img-fluid" width="300px">
          </div>
          <div class="form-group mt-3">
            <label>Status Transaksi</label>
           <select class="custom-select form-control" name="status_transaksi">
                  <option value="1" <?php if ($edit->status_transaksi==1){echo "selected";} ?>>Aktif</option>
                  <option value="0" <?php if ($edit->status_transaksi==0){echo "selected";} ?>>Pending</option>
              </select>
          </div>
          <br><br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
      </div>

   </div>

  <?php echo form_close(); ?>
</main>
