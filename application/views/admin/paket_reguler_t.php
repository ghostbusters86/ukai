<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Paket Reguler</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/paket_reguler">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/paket_reguler/add')) ?>
    <div class="row my-4">


      <div class="col-md-8">
    
        <!-- Goals -->
        <div class="header mt-md-6">

        </div>
        <div class="card">
          <div class="card-header">
            <h6>Tambah Paket reguler Baru</h6>
          </div>
          <div class="card-body">


            <div class="form-group">
              <label>Nama Paket Reguler :</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Reguler " name="nama_reguler" required>
            </div>
            <div class="form-group">
              <label> Deskripsi :</label>
              <textarea name="desk_reguler" id="editor"></textarea>
            </div>
                       
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>

      <div class="col-md-4">

        <!-- Goals -->
        <div class="card mb-2">
          <div class="card-header">
            <h6>Detail Paket reguler</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Kode Paket :</label>
              <input type="text" class="form-control" placeholder="Masukkan Kode Paket" name="kode_paket" required>
            </div>
            <div class="form-group">
              <label>Kode Soal :</label>
              <input type="text" class="form-control" placeholder="Masukkan Kode Soal" name="kode_soal" required>
            </div>
            <div class="form-group">
              <label>Harga :</label>
              <input type="number" class="form-control" placeholder="Masukkan Harga" name="harga_reguler" required>
            </div>
            <div class="form-group">
              <label>Status Paket :</label>
              <select class="custom-select form-control" name="status_reguler">
                <option selected value="1">Published</option>
                <option value="0">Pending</option>
              </select>
            </div>
            <div class="form-group">
              <label>Waktu :</label>
              <input type="number" class="form-control" placeholder="Masukkan Waktu" name="time_reguler" required>
            </div>
          </div>
        </div>

      </div>
      
    </div>
    <?php echo form_close(); ?>
  </main>
