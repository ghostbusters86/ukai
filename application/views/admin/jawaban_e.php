<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Ubah Jawaban</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/jawaban">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/jawaban/edit/'.$edit->id_jawaban)) ?>
    <div class="row my-4">


      <div class="col-md-6">

        <div class="card">
          <div class="card-header">
            <h6>Tambah BAB Booster Baru</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>ID Soal :</label>
              <input type="text" class="form-control" value="<?php echo $edit->id_soal ?>" name="id_soal" required>
            </div>
            <div class="form-group">
              <label>ID Ambil Soal :</label>
              <input type="text" class="form-control" value="<?php echo $edit->id_ambil_soal ?>" name="id_ambil_soal" required>
            </div>
            <div class="form-group">
              <label>Status Jawaban :</label>
              <input type="text" class="form-control" value="<?php echo $edit->status_answer ?>" name="status_answer" required>
            </div>
                       
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>

      <div class="col-md-6">

        <!-- Goals -->
        <div class="card mb-2">
          <div class="card-header">
            <h6>Detail Jawaban</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Created :</label>
              <input type="text" class="form-control" pvalue="<?php echo $edit->created ?>" name="created" >
            </div>
            <div class="form-group">
              <label>Modified :</label>
              <input type="text" class="form-control" value="<?php echo $edit->modified ?>" name="modified" >
            </div>
          </div>
        </div>

      </div>

      
    </div>
    <?php echo form_close(); ?>
  </main>
