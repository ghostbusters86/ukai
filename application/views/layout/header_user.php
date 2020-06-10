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
          <a class="nav-link" href="<?php echo base_url('home'); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('profil'); ?>">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('paket'); ?>">Paket Soal</a>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <a href="<?php echo base_url().'login/logout' ?>"><i class="fa fa-user" style="color: #9E1F63"></i> Logout</a>
      </div>
    </div>
  </nav>