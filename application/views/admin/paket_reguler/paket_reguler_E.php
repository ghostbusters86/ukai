<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Reguler</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/paket_reguler">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/paket_reguler/edit/'.$edit->id_reguler)) ?>

<div class="row my-4">

      <div class="col-md-8">

        <!-- Goals -->
        <div class="header mt-md-6">

        </div>
        <div class="card">
          <div class="card-header">  
            <h6>Ubah Paket Reguler</h6>
          </div>
          <div class="card-body">


            <div class="form-group">
              <label>Nama reguler :</label>
              <input type="text" class="form-control" value="<?php echo $edit->nama_reguler ?>" name="nama_reguler" required>
            </div>
            <div class="form-group">
              <label> Deskripsi reguler :</label>
              <textarea name="desk_reguler" id="editor"><?php echo $edit->desk_reguler ?></textarea>
            </div>
                       
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>

      <div class="col-md-4">

        <!-- Goals -->
        <div class="card mb-2">
          <div class="card-header">
            <h6>Detail Bab reguler</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Kode Paket :</label>
              <input type="text" class="form-control" value="<?php echo $edit->kode_paket ?>" name="kode_paket" required>
            </div>
            <div class="form-group">
              <label>Kode Soal :</label>
              <input type="text" class="form-control" value="<?php echo $edit->kode_soal ?>" name="kode_soal" required>
            </div>
            <div class="form-group">
              <label>Harga :</label>
              <input type="text" class="form-control" value="<?php echo $edit->harga_reguler ?>"  name="harga_reguler" required>
            </div>
            <div class="form-group">
              <label>Status :</label>
              <select class="custom-select form-control" name="status_reguler">
                <?php      
                if ($edit->status_reguler ==1) { ?>
                  <option selected value="1">Published</option>
                  <option value="0" >Pending</option>
                <?php } else {?>
                  <option value="0" selected>Pending</option>
                  <option value="1">Published</option>
                <?php  } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Waktu :</label>
              <input type="text" class="form-control" value="<?php echo $edit->time_reguler ?>" name="time_reguler" required>
            </div>
          </div>
        </div>

      </div>

</div>

  <?php echo form_close(); ?>
</main>
