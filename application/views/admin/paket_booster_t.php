<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Paket Booster</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/paket_booster">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/paket_booster/add')) ?>
    <div class="row my-4">


      <div class="col-md-8">

        <!-- Goals -->
        <div class="header mt-md-6">

        </div>
        <div class="card">
          <div class="card-header">
            <h6>Tambah Paket Booster Baru</h6>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label>Nama Paket Booster :</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Booster " name="nama_booster" required>
            </div>
            <div class="form-group">
              <label> Deskripsi Paket Booster :</label>
              <textarea name="desk_booster" id="editor"></textarea>
            </div>
                       
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>

      <div class="col-md-4">

        <!-- Goals -->
        <div class="card mb-2">
          <div class="card-header">
            <h6>Detail Paket Booster</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Kode Paket Booster :</label>
              <input type="text" class="form-control" placeholder="Masukkan Kode Paket " name="kode_paket" required>
            </div>
            <div class="form-group">
              <label>Harga Paket Booster :</label>
              <input type="text" class="form-control" placeholder="Masukkan Harga Paket " name="harga_booster" required>
            </div>
            <div class="form-group">
              <label>Status Paket Booster :</label>   
              <select class="custom-select form-control" name="status_booster">
                <option selected value="1">Published</option>
                <option value="0">Pending</option>
              </select>
            </div>
          </div>
        </div>

      </div>
      
    </div>
    <?php echo form_close(); ?>
  </main>
