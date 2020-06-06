<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Ubah Soal</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url('admin/paket_reguler/edit/'.$edit->slug); ?>">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/paket_reguler/edit_soal/'.$edit->id_soal)) ?>

    <div class="row my-4">

      <div class="col-md-8">

        <div class="card">
          <div class="card-header">
            <h6>Tambah Soal Baru</h6>
          </div>    
          <div class="card-body">

            <div class="form-group">
              <label>Pertanyaan :</label>
              <br><textarea rows="2" cols="90" name="pertanyaan" r0equired ><?php echo $edit->pertanyaan ?></textarea>
            </div> 
            <div class="form-group">
              <label>Kode Soal :</label>
                <input type="text" class="form-control" value="<?php echo $paket_reguler->kode_soal ?>" name="kode_soal" required readonly>   
            </div>                
            <div class="form-group">
              <label>Kunci Soal :</label>
              <input type="text" class="form-control" value="<?php echo $edit->kunci_soal ?>"  name="kunci_soal" required>
            </div>            
            <div class="form-group">
              <label>Pembahasan Soal :</label>
              <textarea name="pembahasan_soal" id="editor"><?php echo $edit->pembahasan_soal ?> </textarea>
            </div>
                       
          </div>
        </div>

      </div>

      <div class="col-md-4">

        <!-- Goals -->
        <div class="card">
          <div class="card-header">
            <h6>Jawaban Soal</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Jawaban A :</label>
              <textarea rows="3" cols="40" name="jawaban_a" required><?php echo $edit->jawaban_a ?></textarea>
            </div>
            <div class="form-group">
              <label>Jawaban B :</label>
              <textarea rows="3" cols="40" name="jawaban_b"  required ><?php echo $edit->jawaban_b ?></textarea>
            </div>
            <div class="form-group">
              <label>Jawaban C :</label>
              <textarea rows="3" cols="40" name="jawaban_c" required> <?php echo $edit->jawaban_c ?></textarea>
            </div>
            <div class="form-group">
              <label>Jawban D :</label>
              <textarea rows="3" cols="40"  name="jawaban_d"  required><?php echo $edit->jawaban_d ?></textarea>
            </div>  
            <div class="form-group">
              <label>Jawban E :</label>
              <textarea rows="3" cols="40"  name="jawaban_e" required><?php echo $edit->jawaban_e ?></textarea>
            </div>  

            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>
      
    </div>

  <?php echo form_close(); ?>
</main>
