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
              <input type="text" class="form-control" value="<?php echo $edit->nama_lengkap ?>" name="id_user" required>
            </div>
            <div class="form-group">
              <label>Kode Transaksi</label>
              <input type="text" class="form-control" value="<?php echo $edit->kode_transaksi ?>"  name="kode_transaksi" required>
            </div>
            <div class="form-group">
              <label>Kode Bank</label>
              <input type="text" class="form-control" value="<?php echo $edit->kode_bank ?>" name="kode_bank" required>
            </div>
            <div class="form-group">
              <label>Atas Nama</label>
              <input type="text" class="form-control" value="<?php echo $edit->an_rekening ?>"  name="an_rekening" required>
            </div>
          </div>
        </div>  

      </div>

      <div class="col-md-6">
        <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label>Nominal Transfer</label>
            <input type="text" class="form-control"  value="<?php echo $edit->nominal_transfer ?>"  name="nominal_transfer" required>
          </div>
          <div class="form-group">
            <label>Kode Paket</label>
            <input type="text" class="form-control" value="<?php echo $edit->kode_paket ?>"  name="kode_paket" required>
          </div>
          <div class="form-group">
            <label>Status Transaksi</label>
            <select class="custom-select form-control" name="status_transaksi">
              <?php      
              if ($edit->status_transaksi ==1) { ?>
                <option selected value="1">Aktif</option>
                <option value="0">Tidak</option>
              <?php } else {?>
                <option value="0" selected>Tidak</option>
                <option value="1">Aktif</option>
              <?php  } ?>
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
