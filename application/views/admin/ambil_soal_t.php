<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Ambil Soal</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/ambil_soal">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/ambil_soal/add')) ?>
    
    <div class="row my-4">

      <div class="col-md-12">

        <div class="card">
          <div class="card-body">
          	<div class="col-md-6">

          	<div class="form-group">
          		<label>User :</label>
          		<input type="text" class="form-control" placeholder="Masukkan ID User " name="id_user" required>
          	</div>
          	<div class="form-group">
          		<label>Kode Soal :</label>
          		<input type="text" class="form-control" placeholder="Masukkan Kode Soal " name="kode_soal" required>
          	</div>                  
          	<div class="form-group">
          		<label>Mulai :</label>
          		<input type="text" class="form-control" placeholder="Masukkan Mulai Soal" name="mulai" required>
          	</div>            
          	<div class="form-group">
          		<label>Berakhir :</label>
          		<input type="text" class="form-control" placeholder="Masukkan Berakhir Soal " name="berakhir" required>
          	</div>

          	<button type="submit" class="btn btn-primary">Submit</button>
                  
           </div>     
          </div>
        </div>

      </div>
      
    </div>
    <?php echo form_close(); ?>
  </main>
