
  <section id="wrapping">
    <div class="container">  
      <?php
      if ($this->session->flashdata('notifikasi')) {
        echo "<br>";
        echo $this->session->flashdata('notifikasi');
      }
      ?> 
      <div class="row wrap">
        <div class="col-12">  
          <h3 class="title-wrapping">Reset Password</h3>
          <hr class="line-wrapping">
          <p class="description-wrapping">Kami akan mengirimkan link untuk mereset password ke email Anda</p>
          <?php echo form_open('Reset_password');?>
          <form>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Isikan email Anda" name="email">
            </div>
            <button type="submit" class="btn btn-danger color login pl-5 pr-5">Reset Password</button>
          </form>
          <?php echo form_close(); ?>
          <div class="link login">
            <p>Sudah punya akun? <a data-toggle="modal" data-target="#login-start">Login</a></p>
            <p>Belum punya akun? <a href="<?php echo base_url('daftar') ?>">Daftar</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
