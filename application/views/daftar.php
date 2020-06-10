  <section id="wrapping">
    <div class="container">   
      <div class="row wrap">
        <div class="col-lg-6 col-12">
          <img class="img-fluid login" src="<?php echo base_url(); ?>assets/frontend/images/daftar.png" alt="daftar">
        </div>
        <div class="col-lg-6 col-12">
          <?php
          if ($this->session->flashdata('notifikasi')) {
            echo "<br>";
            echo $this->session->flashdata('notifikasi');
          }
          ?>
          <h3 class="title-login">Pendaftaran Akun</h3>
          <hr class="line-login"><br><br class="enter">
          <?php
          echo validation_errors('<div class="alert alert-danger">', '</div>');
          echo form_open_multipart(site_url('daftar')) ?>
          <form>
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control" id="" name="nama_lengkap" placeholder="Isikan nama lengkap Anda">
            </div>
            <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <select class="custom-select" name="jk_user">
                <option selected>Pilih jenis kelamin Anda</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">No. Handphone</label>
              <input type="text" class="form-control" id="" name="nohp_user" placeholder="Isikan no. handphone Anda">
            </div>
            <div class="form-group" hidden>
              <input type="text" class="form-control" id="user" name="akses_level" placeholder="user" value="user">
            </div>
            <div class="form-group">
              <label for="">Asal Universitas</label>
              <input type="text" class="form-control" id="" name="universitas_user" placeholder="Isikan asal universitas Anda">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" id="" name="email" placeholder="Isikan email Anda">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" id="" name="password" placeholder="Isikan password Anda">
            </div>
            <button type="submit" class="btn btn-danger color login pl-5 pr-5">Daftar</button>
          </form>          
          <?php echo form_close(); ?>
          <div class="link login">
            <p>Sudah punya akun? <a data-toggle="modal" data-target="#login-start">Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
