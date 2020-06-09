<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Soal Paket Reguler</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url('admin/paket_reguler/edit/'.$soal_reguler->id_reguler); ?>">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
            
      </div>   

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/paket_reguler/add_soal/'.$soal_reguler->id_reguler)) ?>
      
    <div class="row my-4">  

      <div class="col-md-8">

        <div class="card"> 
          <div class="card-header">
            <h6>Tambah Soal Baru</h6>    
          </div>
          <div class="card-body">  

            <div class="form-group">
              <label>Pertanyaan :</label>  
              <br><textarea name="pertanyaan" id="editor"></textarea>
            </div>           
            <div class="form-group">
              <label>Pembahasan Soal :</label>
              <textarea name="pembahasan_soal" id="editor1"></textarea>
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
            <label>Kode Soal:</label>
            <input type="text" class="form-control" value="<?php echo $paket_reguler->kode_soal ?>" name="kode_soal" required readonly> 
          </div>                   
          <div class="form-group" >
            <label>Kunci Soal :</label>
            <select class="custom-select form-control" name="kunci_soal">
              <option selected value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
            </select>
          </div>  
            <div class="form-group">
              <label>Jawaban A :</label>
              <textarea rows="3" cols="40" name="jawaban_a" class="form-control" placeholder="Masukkan Jawaban A" required></textarea>
            </div>
            <div class="form-group">
              <label>Jawaban B :</label>
              <textarea rows="3" cols="40" name="jawaban_b" class="form-control" placeholder="Masukkan Jawaban B" required ></textarea>
            </div>
            <div class="form-group">
              <label>Jawaban C :</label>
              <textarea rows="3" cols="40" name="jawaban_c" class="form-control" placeholder="Masukkan Jawaban C" required ></textarea>
            </div>
            <div class="form-group">
              <label>Jawban D :</label>
              <textarea rows="3" cols="40"  name="jawaban_d" class="form-control" placeholder="Masukkan Jawaban D" required></textarea>
            </div> 
            <div class="form-group">
              <label>Jawban E :</label>
              <textarea rows="3" cols="40"  name="jawaban_e" class="form-control" placeholder="Masukkan Jawaban E" required></textarea>
            </div>  

            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>
      
    </div>
    <?php echo form_close(); ?>
  </main>
