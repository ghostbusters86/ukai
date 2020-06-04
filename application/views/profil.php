<!doctype html>
<html lang="in">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css') ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/media.css') ?>">

    <link rel="icon" href="<?php echo base_url(); ?>assets/frontend/images/favicon-laut-tawar.png">
    <title>Teman UKAI</title>
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
<!--     <meta name="twitter:description" content="<?php echo $title; ?>" />
    <meta name="twitter:title" content="<?php echo $title; ?>" />
    <meta name="twitter:site" content="@hairil_sp" />
    <meta name="keywords" content="<?php echo $metades; ?>">
    <meta name="description" content="<?php echo $metades; ?>">
    <meta itemprop="description" content="<?php echo $metades; ?>">
    <meta name="twitter:description" content="<?php echo $metades; ?>">
    <meta property="og:description" itemprop="description" content="<?php echo $metades; ?>"> -->
</head>
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

        <?php if($this->session->userdata('online')==false):?>
          <a class="mr-3" data-toggle="modal" data-target="#login-start" href="<?php echo base_url().'Login_user' ?>"><i class="fa fa-user" style="color: #9E1F63"></i> Login</a>
          <?php else:?>
            <a href="<?php echo base_url().'Login_user/logout' ?>" class="mr-3"><i class="fa fa-user" style="color: #9E1F63"></i> Log Out</a>
          <?php endif;?>

      </div>
    </div>
  </nav>

  <!-- dasbor user -->
  <div id="dashboard">
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
    <div class="container">
      <div class="row">
        <div class="col-md-3 dash">
          <p class="title-dash">Your Profile</p>
          <hr class="line-dash">
          <img class="img-fluid rounded-circle dash" src="<?php echo base_url(); ?>img/img_artikel/<?php echo $get_user['foto']; ?>" alt="profil-user">
          <p class="description-dash">
            <b><?php echo $get_user['nama_lengkap']?> </b><br>
            <?php echo $get_user['universitas_user']?> 
          </p>
        </div>

        <div class="col-md-9 dash">
          <div class="wrap">
            <div class="row dash-banner">
              <div class="col-md-12">
                <h5 class="dash-nama"><?php echo $get_user['nama_lengkap']?> </h5>
              </div>   
            </div>

            <div class="row dash-informasi">
              <div class="col-md-12">
                <form action="<?php echo site_url('/profil/edit_profil/').$get_user['id_user']; ?>">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <span>Nama Lengkap</span>
                      <input type="text" class="form-control" id="" value="<?php echo $get_user['nama_lengkap']?> "> 
                    </div>
                    <div class="form-group col-md-6">
                      <span>Jenis Kelamin</span>
                      <input type="text" class="form-control" id="" value="<?php echo $get_user['jk_user']?> ">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <span>Nomor Hp</span>
                      <input type="text" class="form-control" id="" value="<?php echo $get_user['nohp_user']?> ">
                    </div>
                    <div class="form-group col-md-6">
                      <span>Asal Universitas</span>
                      <input type="text" class="form-control" id="" value="<?php echo $get_user['universitas_user']?> ">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <span>Email</span>
                      <input type="email" class="form-control" id="" value="<?php echo $get_user['email']?> ">
                    </div>
                    <div class="form-group col-md-6">
                      <span>Password</span>
                      <input type="password" class="form-control" id="" value="<?php echo $get_user['password'] ?> ">
                    </div>
                    <button type="submit" class="btn btn-danger color login pl-5 pr-5">Ganti Informasi</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <img class="image-footer" src="<?php echo base_url(); ?>assets/frontend/images/logo-perusahaan.png" alt="logo-perusahaan">
          <p class="description-footer">Media belajar berbasis teknologi yang terfokus pada kemampuan menjawab soal untuk persiapan ujian UKAImu yang lebih baik. Dengan sistem yang selalu berkambang sesuai kebutuhan, Teman UKAI hadir sebagai solusi belajarmu untuk menjadi teman berjuang menuju perjalanan impianmu.</p>
        </div>
        <div class="col-md-1 ipad">
        </div>
        <div class="col-md-3 d-none d-sm-block" id="about-footer">
          <div class="single-widget widget-contact">
            <h5 class="widget-title">Menu</h5>
            <ul>
              <li>
                  <a href="#booster">Paket Booster</a>
              </li>
              <li>
                  <a href="#reguler">Paket Reguler</a>
              </li>
              <li>
                  <a href="#klien">Klien Kami</a>
              </li>
              <li>
                  <a href="#testimoni">Testimoni</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-12">
          <div class="single-widget widget-contact">
            <h5 class="widget-title">Kontak Kami</h5>
            <ul>
              <li class="phone">
                  <span class="icon"><i class="fa fa-phone"></i></span>
                  <a href="wa.me/628515533724">0851 5533 724</a>
              </li>
              <li class="fax">
                  <span class="icon"><i class="fa fa-instagram"></i></span>
                  <a href="https://www.instagram.com/teman.ukai/">@teman.ukai</a>
              </li>
              <li class="email">
                  <span class="icon"><i class="fa fa-envelope-o"></i></span>
                  <a href="mailto:info@temanukai.com">info@temanukai.com</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <hr class="f-line">
      <div id="copyright">
        <p class="copyright-text">Copyright &copy Teman UKAI 2020</p>
      </div>
    </div>
  </footer>

  <!-- javascript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- tambahan -->
  <script type="text/javascript">
    (function($) {
    "use strict";
    function count($this){
    var current = parseInt($this.html(), 10);
    current = current + 1; /* Where 50 is increment */  
    $this.html(++current);
      if(current > $this.data('count')){
        $this.html($this.data('count'));
      } else {    
        setTimeout(function(){count($this)}, 50);
      }
    }         
    $(".stat-count").each(function() {
      $(this).data('count', parseInt($(this).html(), 10));
      $(this).html('0');
      count($(this));
    });
   })(jQuery);
  </script>
  <script type="text/javascript">
    // vars
    'use strict'
    var testim = document.getElementById("testim"),
        testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
        testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
        testimLeftArrow = document.getElementById("left-arrow"),
        testimRightArrow = document.getElementById("right-arrow"),
        testimSpeed = 4500,
        currentSlide = 0,
        currentActive = 0,
        testimTimer,
        touchStartPos,
        touchEndPos,
        touchPosDiff,
        ignoreTouch = 30;
    ;
    window.onload = function() {
        // Testim Script
        function playSlide(slide) {
            for (var k = 0; k < testimDots.length; k++) {
                testimContent[k].classList.remove("active");
                testimContent[k].classList.remove("inactive");
                testimDots[k].classList.remove("active");
            }
            if (slide < 0) {
                slide = currentSlide = testimContent.length-1;
            }
            if (slide > testimContent.length - 1) {
                slide = currentSlide = 0;
            }
            if (currentActive != currentSlide) {
                testimContent[currentActive].classList.add("inactive");            
            }
            testimContent[slide].classList.add("active");
            testimDots[slide].classList.add("active");
            currentActive = currentSlide;        
            clearTimeout(testimTimer);
            testimTimer = setTimeout(function() {
                playSlide(currentSlide += 1);
            }, testimSpeed)
        }
        testimLeftArrow.addEventListener("click", function() {
            playSlide(currentSlide -= 1);
        })
        testimRightArrow.addEventListener("click", function() {
            playSlide(currentSlide += 1);
        })    
        for (var l = 0; l < testimDots.length; l++) {
            testimDots[l].addEventListener("click", function() {
                playSlide(currentSlide = testimDots.indexOf(this));
            })
        }
        playSlide(currentSlide);
        // keyboard shortcuts
        document.addEventListener("keyup", function(e) {
            switch (e.keyCode) {
                case 37:
                    testimLeftArrow.click();
                    break;                    
                case 39:
                    testimRightArrow.click();
                    break;
                case 39:
                    testimRightArrow.click();
                    break;
                default:
                    break;
            }
        })      
        testim.addEventListener("touchstart", function(e) {
            touchStartPos = e.changedTouches[0].clientX;
        })
        testim.addEventListener("touchend", function(e) {
            touchEndPos = e.changedTouches[0].clientX;
            touchPosDiff = touchStartPos - touchEndPos;
            console.log(touchPosDiff);
            console.log(touchStartPos); 
            console.log(touchEndPos); 
            if (touchPosDiff > 0 + ignoreTouch) {
                testimLeftArrow.click();
            } else if (touchPosDiff < 0 - ignoreTouch) {
                testimRightArrow.click();
            } else {
              return;
            }
        })
    }
  </script>
</body>
</html>