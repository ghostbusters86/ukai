  <section id="home">

    <div class="container"> 
            <?php
            if ($this->session->flashdata('notifikasi')) {
              ?>
              <p style="text-align: center; color: red;"><b><?php echo $this->session->flashdata('notifikasi'); ?></b></p>  
            <?php } ?>
      <div class="row">

        <h1 class="title-header">Platform Penyedia Layanan <br class="enter"> Latihan Soal UKAI Berbasis Teknologi</h1>

        <p class="description-header">Akses belajar asik dan santai dengan program kelas online untuk <br class="enter"> mempersiapkan UKAI bagi calon Apoteker baru Indonesia.</p>

      </div>

    </div>

  </section>

  <section id="booster">

    <div class="container">

      <div class="row">

        <!-- mobile -->

        <div class="col-md-6 d-block d-sm-none">

          <img class="img-fluid" src="<?php echo base_url(); ?>assets/frontend/images/paket-booster.png" alt="paket-booster">

        </div>

        <div class="col-lg-5 col-md-6" style="margin: auto;">

          <h2 class="title-paket">Paket <br><b>Booster</b></h2>

          <p class="description-paket">Platform terbaik untuk belajar mempersiapkan menuju UKAI mendatang. Menyuguhkan pembelajaran UKAI secara online berupa latihan soal dengan jenis bervariatif serta dilengkapi pembahasan secara ringkas dengan Mentor Teman UKAI.</p>

          <a href="#daftar"><button class="btn btn-danger color" type="submit">Daftar Sekarang</button></a>

        </div>

        <!-- dekstop -->

        <div class="col-md-6 d-none d-sm-block">

          <img class="img-fluid" src="<?php echo base_url(); ?>assets/frontend/images/paket-booster.png" alt="paket-booster">

        </div>

      </div>

    </div>

  </section>



  <section id="reguler">

    <div class="container">

      <div class="row">

        <div class="col-md-6">

          <img class="img-fluid" src="<?php echo base_url(); ?>assets/frontend/images/paket-reguler.png" alt="paket-reguler">

        </div>

        <div class="col-lg-5 col-md-6" style="margin: auto;">

          <h2 class="title-paket">Paket <br><b>Reguler</b></h2>

          <p class="description-paket">Platform terbaik untuk mengasah kemampuan menjawab soal untuk mempersiapkan menuju UKAI mendatang. Menyuguhkan pembelajaran UKAI secara online berupa latihan soal dengan jenis bervariatif serta dilengkapi pembahasan secara ringkas dengan Mentor Teman UKAI.</p>

          <a href="#daftar"><button class="btn btn-danger color" type="submit">Daftar Sekarang</button></a>

        </div>

      </div>

    </div>

  </section>



  <section id="klien">

    <div class="container">

      <div class="row">

        <h3 class="title-klien">Klien <b>Kami</b></h3>

      </div>

        <div class="wrap-klien">

      <div class="row">

        <div class="col-12 col-md-4">

          <div class="card">

            <img class="card-img-top klien" src="<?php echo base_url(); ?>assets/frontend/images/klien-pt.png" alt="klien-pt">

            <p class="card-text stat-count highlight">25</p>

            <p class="title-peserta">Perguruan Tinggi</p>

          </div>

        </div>



        <div class="col-12 col-md-4">

          <div class="card">

            <img class="card-img-top klien" src="<?php echo base_url(); ?>assets/frontend/images/klien-peserta.png" alt="klien-peserta">

            <p class="card-text stat-count highlight">482</p>

            <p class="title-peserta">Peserta</p>

          </div>

        </div>



        <div class="col-12 col-md-4">

          <div class="card">

            <img class="card-img-top klien" src="<?php echo base_url(); ?>assets/frontend/images/klien-produk.png" alt="klien-produk">

            <p class="card-text stat-count highlight">2</p>

            <p class="title-peserta">Produk</p>

          </div>

        </div>

        </div>

      </div>

    </div>

  </section>



  <section id="testimoni">

    <div class="container">

      <div class="row">

        <h3 class="title-klien">Apa kata <b>Mereka?</b></h3>

        <div id="testim" class="testim">

          <div class="wrap">

            <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>

            <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>

            <ul id="testim-dots" class="dots">

              <li class="dot active"></li>

              <li class="dot"></li>

              <li class="dot"></li>

            </ul>

            <div id="testim-content" class="cont">                    

              <div class="active">

                <div class="img"><img src="https://image.ibb.co/hgy1M7/5a6f718346a28820008b4611_750_562.jpg" alt=""></div>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>               

                <div class="h4">Kellie</div>

                <div class="h5">CEO Sevenpion</div>

              </div>

              <div>

                <div class="img"><img src="https://image.ibb.co/cNP817/pexels_photo_220453.jpg" alt=""></div>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    

                <div class="h4">Jessica</div>

                <div class="h5">CEO Sevenpion</div>

              </div>



              <div>

                <div class="img"><img src="https://image.ibb.co/iN3qES/pexels_photo_324658.jpg" alt=""></div>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>                    

                <div class="h4">Kellie</div>

                <div class="h5">CEO Sevenpion</div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>



  <section id="daftar">

    <div class="container">

      <h3 class="title-daftar">Siap untuk <b>Belajar?</b></h3>

      <p class="description-daftar">Rasakan pengalaman belajar asik dan santai bersama Teman UKAI.</p>

      <center>

        <a href="<?php echo base_url('daftar'); ?>"><button class="btn btn-danger color" type="submit">Daftar Sekarang</button></a>

      </center>

    </div>

  </section>



  