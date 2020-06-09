<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Ubah Soal</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url('admin/paket_reguler/edit/'.$edit->id_reguler); ?>">
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
              <br><textarea id="editor1" name="pertanyaan" r0equired ><?php echo $edit->pertanyaan ?></textarea>
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
            <label>Kode Soal :</label>
            <input type="text" class="form-control" value="<?php echo $paket_reguler->kode_soal ?>" name="kode_soal" required readonly>   
          </div>                
          <div class="form-group">
            <label>Kunci Soal :</label>
            <select class="custom-select form-control" name="kunci_soal">
              <?php                    
              if ($edit->kunci_soal ==A) { ?>
                <option selected value="A">A</option>                
                <option value="B" >B</option>
                <option value="C" >C</option>
                <option value="D" >D</option>
                <option value="E" >E</option>
              <?php } elseif ($edit->kunci_soal ==B) { ?>
                <option selected value="B">B</option>
                <option value="A" >A</option>
                <option value="C" >C</option>
                <option value="D" >D</option>
                <option value="E" >E</option>
              <?php } elseif ($edit->kunci_soal ==C) { ?>
                <option selected value="C">C</option>
                <option value="A" >A</option>
                <option value="B" >B</option>
                <option value="D" >D</option>
                <option value="E" >E</option>
              <?php } elseif ($edit->kunci_soal ==D) { ?>
                <option selected value="D">D</option>
                <option value="B" >B</option>
                <option value="C" >C</option>
                <option value="D" >D</option>
                <option value="E" >E</option>
              <?php } elseif ($edit->kunci_soal ==E) { ?>
                <option selected value="E">E</option>
                <option value="A" >A</option>
                <option value="B" >B</option>
                <option value="C" >C</option>
                <option value="D" >D</option>
              <?php } else { ?>
                <option selected value="A">A</option>
                <option value="B" >B</option>
                <option value="C" >C</option>
                <option value="D" >D</option>
                <option value="E" >E</option>
              <?php  } ?>
            </select>
          </div>  
            <div class="form-group">
              <label>Jawaban A :</label>
              <textarea rows="3" cols="40" name="jawaban_a" class="form-control" required><?php echo $edit->jawaban_a ?></textarea>
            </div>
            <div class="form-group">
              <label>Jawaban B :</label>
              <textarea rows="3" cols="40" name="jawaban_b" class="form-control" required ><?php echo $edit->jawaban_b ?></textarea>
            </div>
            <div class="form-group">
              <label>Jawaban C :</label>
              <textarea rows="3" cols="40" name="jawaban_c" class="form-control" required> <?php echo $edit->jawaban_c ?></textarea>
            </div>
            <div class="form-group">
              <label>Jawban D :</label>
              <textarea rows="3" cols="40"  name="jawaban_d"  class="form-control" required><?php echo $edit->jawaban_d ?></textarea>
            </div>  
            <div class="form-group">
              <label>Jawban E :</label>
              <textarea rows="3" cols="40"  name="jawaban_e" class="form-control" required><?php echo $edit->jawaban_e ?></textarea>
            </div>  

            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </div>
      
    </div>

  <?php echo form_close(); ?>
</main>
