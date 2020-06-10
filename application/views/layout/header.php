

<body>

  <a href="https://api.whatsapp.com/send?phone=628515533724&amp;text=Hallo%20admin%20teman%20UKAI...." class="my-wa" target="_blank" title="Hubungi kami sekarang!"><i class="fa fa-whatsapp my-float"></i></a>

  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="landingpage">

    <a class="navbar-brand" href="<?php echo base_url('home'); ?>">
      <img class="img-fluid logo" src="<?php echo base_url(); ?>assets/frontend/images/logo-perusahaan.png" alt="logo-perusahaan">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>

    </button>



    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">

          <a class="nav-link" href="#home">Home</a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="#booster">Paket Booster</a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="#reguler">Paket Reguler</a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="#klien">Klien Kami</a>

        </li>

        <li class="nav-item">

          <a class="nav-link" href="#testimoni">Testimoni</a>

        </li>

      </ul>

      <div class="form-inline my-2 my-lg-0">

        <?php if($this->session->userdata('online')==false):?>
            <a class="mr-3" data-toggle="modal" data-target="#login-start" href="<?php echo base_url().'login' ?>"><i class="fa fa-user" style="color: #9E1F63"></i> Login</a>
        <?php else:?>
            <a href="<?php echo base_url().'login/logout' ?>" class="mr-3"><i class="fa fa-user" style="color: #9E1F63"></i> Log Out</a>
        <?php endif;?>
   
        <?php if($this->session->userdata('online')==false):?>
         <a href="<?php echo base_url('daftar'); ?>"><button class="btn btn-danger color my-2 my-sm-0">Daftar Sekarang</button></a>
         <?php else:?>
          <a href="<?php echo base_url().'paket' ?>"> <button class="btn btn-danger color my-2 my-sm-0">Dashboard</button></a></a>
        <?php endif;?>

      </div>

    </div>

  </nav>



  <!-- popup login -->

  <div class="modal fade" id="login-start" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

      <div class="modal-content">

        <div class="modal-body login">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

          <div class="row">

            <div class="col-lg-6 col-12">

              <img class="img-fluid login" src="<?php echo base_url(); ?>assets/frontend/images/login.png" alt="daftar">

            </div>

            <div class="col-lg-6 col-12">

              <h3 class="title-login">Login Sekarang</h3>

              <hr class="line-login">   

              <p class="description-login">Selamat datang kembali, silahkan masuk</p>

              <form action="<?php echo base_url('Login') ?>" method="post">

                <div class="form-group">

                  <label for="">Email</label>

                  <input type="email" class="form-control" id="" name="email" placeholder="Isikan email anda">

                </div>

                <div class="form-group">

                  <label for="">Password</label>

                  <input type="password" class="form-control" id="" name="password" placeholder="Isikan password anda">

                </div>

                <button type="submit" class="btn btn-danger color login pl-5 pr-5">Login</button>

              </form>

              <div class="link login">

                <p>Lupa password? <a href="<?php echo base_url('reset_password'); ?>">Reset</a></p>

                <p>Belum punya akun? <a href="<?php echo base_url('daftar'); ?>">Daftar</a></p>

              </div>

            </div>



          </div>

        </div>

      </div>

    </div>

  </div>