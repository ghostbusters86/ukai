<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Jawaban</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/jawaban">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/jawaban/add')) ?>
    <div class="row my-4">


      <div class="col-md-8">

        <!-- Goals -->
        <div class="header mt-md-6">

        </div>
        <div class="card">
          <div class="card-header">
            <h6>Tambah BAB Booster Baru</h6>
          </div>
          <div class="card-body">


            <div class="form-group">
              <label>Nama Bab Booster :</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Bab Booster" name="nama_jawaban" required>
            </div>
            <div class="form-group">
              <label> Deskripsi Bab Booster :</label>
              <textarea name="desk_jawaban" id="editor"></textarea>
            </div>
                       
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>

      <div class="col-md-4">

        <!-- Goals -->
        <div class="card mb-2">
          <div class="card-header">
            <h6>Detail Bab Booster</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Nama Paket Booster :</label>
              <input type="text" class="form-control" placeholder="Masukkan Paket Booster" name="id_booster" required>
            </div>
            <div class="form-group">
              <label>Kode Soal :</label>
              <input type="text" class="form-control" placeholder="Masukkan Kode Soal" name="kode_soal" required>
            </div>
            <div class="form-group">
              <label>Status Bab Booster :</label>
              <input type="text" class="form-control" placeholder="Masukkan Status Bab Booster" name="status_jawaban" required>
            </div>
            <div class="form-group">
              <label>Waktu Bab Booster :</label>
              <input type="time" class="form-control" placeholder="Masukkan Waktu Bab Booster" name="time_jawaban" required>
            </div>
          </div>
        </div>

      </div>

      
    </div>
    <?php echo form_close(); ?>
  </main>
