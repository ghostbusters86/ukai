<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah BAB Booster</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/paket_booster/edit/<?php echo $add_bab->slug ?>">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/paket_booster/add_bab/'.$add_bab->slug)) ?>
    <div class="row my-4">


      <div class="col-md-8">

        <div class="card">
          <div class="card-header">
            <h6>Tambah BAB Booster Baru</h6>
          </div>
          <div class="card-body">


            <div class="form-group">
              <label>Nama Bab Booster :</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Bab Booster" name="nama_bab_booster" required>
            </div>
            <div class="form-group">
              <label> Deskripsi Bab Booster :</label>
              <textarea name="desk_bab_booster" id="editor"></textarea>
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
               <input type="text" class="form-control" value="<?php echo $add_bab->kode_paket?>"  name="id_booster" required readonly>              
            </div>
            <div class="form-group">
              <label>Kode Soal :</label>
              <input type="text" class="form-control" placeholder="Masukkan Kode Soal" name="kode_soal" required>
            </div>
            <div class="form-group">
              <label>Status Bab :</label>
              <select class="custom-select form-control" name="status_bab_booster">
                <option selected value="1">Published</option>
                <option value="0">Pending</option>
              </select>
            </div>
            <div class="form-group">
              <label>Waktu Bab :</label>
              <input type="number" class="form-control" placeholder="Masukkan Waktu Bab Booster" name="time_bab_booster" required>
            </div>
          </div>
        </div>

      </div>

      
    </div>
    <?php echo form_close(); ?>
  </main>
