<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form BAB Booster</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>admin/bab_booster">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/bab_booster/edit/'.$edit->id_bab_booster)) ?>

<div class="row my-4">

      <div class="col-md-8">

        <!-- Goals -->
        <div class="header mt-md-6">

        </div>
        <div class="card">
          <div class="card-header">  
            <h6>Ubah BAB Booster</h6>
          </div>
          <div class="card-body">


            <div class="form-group">
              <label>Nama Bab Booster :</label>
              <input type="text" class="form-control" value="<?php echo $edit->nama_bab_booster ?>" name="nama_bab_booster" required>
            </div>
            <div class="form-group">
              <label> Deskripsi Bab Booster :</label>
              <textarea name="desk_bab_booster" id="editor"><?php echo $edit->desk_bab_booster ?></textarea>
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
              <select class="custom-select form-control" name="id_booster">
                <?php foreach ($paket_booster as $paket_booster) { ?>
                  <option value="<?php echo $paket_booster->id_booster ?>"
                    <?php if($edit->id_booster == $paket_booster->id_booster) { echo "selected"; } ?>>
                    <?php echo $paket_booster->kode_paket ?>
                  </option>                   
                <?php } ?> 
              </select>             
            </div>
            <div class="form-group">
              <label>Kode Soal :</label>
              <input type="text" class="form-control" value="<?php echo $edit->kode_soal ?>"name="kode_soal" required>
            </div>
            <div class="form-group">
              <label>Status Bab Booster :</label>
              <select class="custom-select form-control" name="status_bab_booster">
                <?php      
                if ($edit->status_bab_booster ==1) { ?>
                  <option selected value="1">Published</option>
                  <option value="0" >Pending</option>
                <?php } else {?>
                  <option value="0" selected>Pending</option>
                  <option value="1">Published</option>
                <?php  } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Waktu Bab Booster :</label>
              <input type="text" class="form-control" value="<?php echo $edit->time_bab_booster ?>" name="time_bab_booster" required>
            </div>
          </div>
        </div>

      </div>

</div>

  <?php echo form_close(); ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Soal BAB Booster</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('admin/paket_booster/add_soal/'.$edit->id_bab_booster); ?>">
        <button class="btn btn-sm btn-outline-primary">Tambah</button></a>
      </div>
  </div>  

  <div class="row my-4">
    <div class="col-12 ">
      <?php
      if ($this->session->flashdata('notifikasi')) {
        echo "<br>";
        echo "<div class='alert alert-success alert-dismissible fade show'><center>";
        echo $this->session->flashdata('notifikasi');
        echo "</center><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button></div>";
      }
      ?>
   <div class="card">
       <div class="table-responsive p-4">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Pertanyaan</th>
              <th>A</th>
              <th>B</th>
              <th>C</th>
              <th>D</th>
              <th>Kunci Soal</th>
              <th>Pembahasan Soal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($soal as $soal):
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $soal->kode_soal; ?></td>
                <td><?php echo $soal->pertanyaan; ?></td>
                <td><?php echo $soal->jawaban_a; ?></td>
                <td><?php echo $soal->jawaban_b; ?></td>
                <td><?php echo $soal->jawaban_c; ?></td>
                <td><?php echo $soal->jawaban_d; ?></td>
                <td><?php echo $soal->kunci_soal; ?></td>
                <td><?php echo $soal->pembahasan_soal; ?></td>
                <td>
                  <a href="<?php echo site_url('admin/paket_booster/edit_soal/'.$soal->id_soal); ?>">
                    <button class="btn btn-sm btn-outline-success">Edit</button>
                  </a>

                  <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $soal->id_soal; ?><?php echo $soal->id_soal; ?>">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo $soal->id_soal; ?><?php echo $soal->id_soal; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda ingin menghapus data <b><?php echo $soal->kode_soal; ?></b> ?
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo site_url('admin/soal/delete/'.$soal->id_soal)?>">
                            <button type="button" class="btn btn-danger">Delete</button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
              $no++;
            endforeach;
            ?>
          </tbody>

        </table>

       </div>
       
     </div>
   </div>
 </div>


</main>
