<!DOCTYPE html>
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
    <meta name="twitter:description" content="<?php echo $title; ?>" />
    <meta name="twitter:title" content="<?php echo $title; ?>" />
    <meta name="twitter:site" content="@hairil_sp" />
    <meta name="keywords" content="<?php echo $metades; ?>">
    <meta name="description" content="<?php echo $metades; ?>">
    <meta itemprop="description" content="<?php echo $metades; ?>">
    <meta name="twitter:description" content="<?php echo $metades; ?>">
    <meta property="og:description" itemprop="description" content="<?php echo $metades; ?>">
</head>
<body>
  <a href="https://api.whatsapp.com/send?phone=628515533724&amp;text=Hallo%20admin%20teman%20UKAI...." class="my-wa" target="_blank" title="Hubungi kami sekarang!"><i class="fa fa-whatsapp my-float"></i></a>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="landingpage">
    <a class="navbar-brand" href="index.html">
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
        <a class="mr-3" data-toggle="modal" data-target="#login-start"><i class="fa fa-user" style="color: #9E1F63"></i> Login</a>
        <a href="daftar.html"><button class="btn btn-danger color my-2 my-sm-0">Daftar Sekarang</button></a>
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
              <form action="profil.html">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" id="" placeholder="Isikan email Anda">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" id="" placeholder="Isikan password Anda">
                </div>
                <button type="submit" class="btn btn-danger color login pl-5 pr-5">Login</button>
              </form>
              <div class="link login">
                <p>Lupa password? <a href="reset-password.html">Reset</a></p>
                <p>Belum punya akun? <a href="daftar.html">Daftar</a></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="wrapping">
    <div class="container">   
      <div class="row wrap">
        <div class="col-lg-6 col-12">
          <img class="img-fluid login" src="<?php echo base_url(); ?>assets/frontend/images/daftar.png" alt="daftar">
        </div>
        <div class="col-lg-6 col-12">
          <h3 class="title-login">Pendaftaran Akun</h3>
          <hr class="line-login"><br><br class="enter">
          <form>
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control" id="" placeholder="Isikan nama lengkap Anda">
            </div>
            <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <select class="custom-select">
                <option selected>Pilih jenis kelamin Anda</option>
                <option value="">Laki-laki</option>
                <option value="">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">No. Handphone</label>
              <input type="number" class="form-control" id="" placeholder="Isikan no. handphone Anda">
            </div>
            <div class="form-group">
              <label for="">Asal Universitas</label>
              <input type="number" class="form-control" id="" placeholder="Isikan asal universitas Anda">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" id="" placeholder="Isikan email Anda">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" id="" placeholder="Isikan password Anda">
            </div>
            <button type="submit" class="btn btn-danger color login pl-5 pr-5">Daftar</button>
          </form>
          <div class="link login">
            <p>Sudah punya akun? <a data-toggle="modal" data-target="#login-start">Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

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