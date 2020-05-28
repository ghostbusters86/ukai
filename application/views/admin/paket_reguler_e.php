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

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Soal Paket Reguler</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('admin/paket_reguler/add_soal/'.$edit->id_reguler); ?>">
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
                  <a href="<?php echo site_url('admin/paket_reguler/edit_soal/'.$soal->id_soal); ?>">
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
                          <a href="<?php echo site_url('admin/paket_reguler/delete_soal/'.$soal->id_soal)?>">
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
