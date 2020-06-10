
  <section id="wrapping">
    <div class="container">   
      <div class="row wrap">  
        <div class="col-12">
          <h3 class="title-wrapping">Buat Password Baru</h3>
          <hr class="line-wrapping">
          <p class="description-wrapping">Harap Ingat Pasword Baru Anda</p>
          <?php echo form_open_multipart(site_url('/reset_password/new_password/token/'.$token)); ?> 
          <form>
            <div class="form-group">
              <label for="">Password Baru</label>
              <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Isikan Password Baru">
              <p> <?php echo form_error('password'); ?> </p>   
            </div> 
            <div class="form-group">
              <label for="">Konfirmasi Password</label>
              <input type="password" name="passconf" class="form-control" value="<?php echo set_value('passconf'); ?>" placeholder="Konfirmasi Pasword Baru">
              <p> <?php echo form_error('passconf'); ?> </p>   
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
