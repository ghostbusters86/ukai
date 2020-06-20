
  <section id="wrapping">
    <div class="container">      
      <div class="row wrap">  
        <div class="col-12">
          <h3 class="title-wrapping">Buat Password Baru</h3>
          <hr class="line-wrapping">
          <p class="description-wrapping">Harap Ingat Pasword Baru Anda</p>
          <?php echo form_open('reset_password/ubah_password/'.$token); ?>  
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


<!--             //build token   
      $token = $this->M_user->insertToken($userInfo->id_user);
      $qstring = $this->base64url_encode($token);           
      $url = site_url() . '/reset_password/ubah_password/token/' . $qstring;  
      $link = '<a href="' . $url . '">' . $url . '</a>';   
      $message =  $this->load->view('email/reset_password',$url,true);   
      $subject  = "Reset Password Teman Ukai";
      $config   = array(
        'protocol'    => 'smtp',
        'smtp_host'   => 'ssl://mail.temanukai.com',
        'smtp_port'   => '465',
        'smtp_user'   => 'admin@temanukai.com',
        'smtp_pass'   => '@temanukai123',
        'mailtype'    => 'html',
        'charset'     => 'utf-8',
        'wordwrap'    => TRUE
      );
      $this->load->library('email', $config);
    // $this->email->initialize($config); 
      $this->email->set_newline("\r\n");
      $this->email->from('admin@temanukai.com','Teman Ukai');
      $this->email->to($email);
      $this->email->subject($subject);
      $this->email->message($message);

        
      // $message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
      // password anda.</strong><br>';  
      // $message .= '<strong>Silakan klik link ini:</strong> ' . $link;         

   //           echo $message; //send this through mail  
          echo $this->email->print_debugger();
    exit();   

         } 
  }  -->