  <!-- dasbor user -->
  <div id="dashboard">
    <div class="container">
      <?php  echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
      <div class="row">
        <div class="col-md-3 dash">
          <p class="title-dash">Your Profile</p>
          <hr class="line-dash">
          <img class="img-fluid rounded-circle dash" src="<?php echo base_url(); ?>img/img_user/<?php echo $edit->foto; ?>" alt="profil-user">
          <p class="description-dash">
            <b><?php echo $edit->nama_lengkap ?></b><br>
            <?php echo $edit->universitas_user ?>
          </p>

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

          <p class="title-dash" style="padding-bottom: 13px; ">Ubah Password</p>
          <form method="post" action="<?php echo base_url('profil/reset_password/'.$edit->id_user); ?>">
              <?php
              echo form_open_multipart(site_url('profil/edit_profil/'.$edit->id_user)) ?>
            <br><br><br>
            <div class="form-group">
              <label>Password Baru</label>
              <input type="password" class="form-control" id="" name="password" placeholder="Isi Password Baru Anda" required>
              <?php form_error('password'); ?>
            </div> 
            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" class="form-control"  placeholder="Isi Password sebelumnya"  name="passconf" required=""> 
              <?php form_error('passconf'); ?> 
            </div>
            <button type="submit" class="btn btn-danger color login pl-5 pr-5">Ubah</button>
              <?php echo form_close(); ?>
          </form>
        </div>    

        <div class="col-md-9 dash">
          <div class="wrap">
            <div class="row dash-banner">
              <div class="col-md-12">
                <h5 class="dash-nama"><?php echo $edit->nama_lengkap ?></h5>
              </div>
            </div>

            <div class="row dash-informasi">
              <div class="col-md-12">

                <?php               
                echo form_open_multipart(site_url('profil/edit_profil/'.$edit->id_user)) ?>

                <form action="">
                  <div class="form-row">   
                    <div class="form-group col-md-6">
                      <span>Nama Lengkap</span>
                      <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $edit->nama_lengkap ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <span>Jenis Kelamin</span>
                      <input type="text" class="form-control" name="jk_user"value="<?php echo $edit->jk_user ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <span>Nomor Hp</span>
                      <input type="number" class="form-control" name="nohp_user" value="<?php echo $edit->nohp_user ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <span>Asal Universitas</span>
                      <input type="text" class="form-control" name="universitas_user" value="<?php echo $edit->universitas_user ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <span>Email</span>
                      <input type="email" class="form-control" name="email" value="<?php echo $edit->email ?>">
                    </div>
                    <div class="form-group col-md-6" required>
                      <span>Password</span>
                      <input type="password" class="form-control" id="" value="<?php echo $edit->password ?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <span>Ganti Foto</span>
                    <input type="file" class="form-control-file ganti-foto" name="foto">
                  </div>
                  <button type="submit" class="btn btn-danger color login pl-5 pr-5">Simpan</button>
                </form>

                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>