<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Soal Paket Reguler</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/paket_booster">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>  

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/paket_booster/add_soal/'.$soal_bab_booster->id_bab_booster)) ?>
      
    <div class="row my-4">

      <div class="col-md-8">

        <div class="card"> 
          <div class="card-header">
            <h6>Tambah Soal Baru</h6> 
          </div>
          <div class="card-body">  

            <div class="form-group">
              <label>Pertanyaan :</label>
              <input type="text" class="form-control" placeholder="Masukkan Pertanyaan " name="pertanyaan" required>
            </div>
              <label>Kode Soal:</label>
               <select class="custom-select form-control" name="kode_soal">
                <?php foreach ($paket_bab_booster as $paket_bab_booster) { ?>
                  <option value="<?php echo $paket_bab_booster->kode_soal ?>">
                    <?php echo $paket_bab_booster->kode_soal ?> -
                    <?php echo $paket_bab_booster->kode_paket ?>
                  </option>                   
                <?php } ?> 
              </select>                      
            <div class="form-group">
              <label>Kunci Soal :</label>
              <br><textarea rows="2" cols="91" name="kunci_soal" placeholder="Masukkan Kunci Soal" required ></textarea>
            </div>            
            <div class="form-group">
              <label>Pembahasan Soal :</label>
              <textarea name="pembahasan_soal" id="editor"></textarea>
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
              <textarea rows="3" cols="40" name="jawaban_a" placeholder="Masukkan Jawaban A" required></textarea>
            </div>
            <div class="form-group">
              <label>Jawaban B :</label>
              <textarea rows="3" cols="40" name="jawaban_b" placeholder="Masukkan Jawaban B" required ></textarea>
            </div>
            <div class="form-group">
              <label>Jawaban C :</label>
              <textarea rows="3" cols="40" name="jawaban_c" placeholder="Masukkan Jawaban C" required ></textarea>
            </div>
            <div class="form-group">
              <label>Jawban D :</label>
              <textarea rows="3" cols="40"  name="jawaban_d" placeholder="Masukkan Jawaban D" required></textarea>
            </div>  

            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>
      
    </div>
    <?php echo form_close(); ?>
  </main>
