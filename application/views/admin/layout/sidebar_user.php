<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <center> 
        <img src="<?php echo base_url(); ?>img/img_user/<?php echo $this->session->userdata('gmb_user'); ?>" alt="Foto_Profil" class="rounded-circle coba mb-2" width="50%">
        <br>
        <span><?php echo $this->session->userdata('nama_user'); ?></span> 
        <hr>
      </center>
    </div>

    <ul class="list-unstyled components">
      <li class="active">
        <a href="<?php echo base_url('admin/dasbor'); ?>"><i class="fas fa-tachometer-alt pr-2"></i> Dasboard</a>
      </li>
      <li>
        <a href="#produk" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"><i class="fas fa-box-open pr-2"></i> Layanan </a>
        <ul class="list-unstyled collapse" id="produk" style="">
          <li>
            <a href="<?php echo base_url('admin/kategori'); ?>"> Kategori</a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/produk'); ?>"> Produk</a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/favorit'); ?>"> Favorit</a>
          </li>
        </ul>
      </li>
     
      <li>
        <a href="#"><i class="fas fa-quote-right pr-2"></i> Profil</a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/event'); ?>"><i class="far fa-calendar-alt pr-2"></i> Event</a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/slider'); ?>"><i class="fas fa-sliders-h pr-2"></i> Slider</a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/pesanan'); ?>"><i class="far fa-file-alt pr-2"></i> Pesanan</a>
      </li>
<li>
        <a href="<?php echo base_url('admin/kontak'); ?>"><i class="far fa-handshake pr-2"></i> Kontak</a>
      </li>
       
      <li>
        <a href="<?php echo base_url('login/logout'); ?>"><i class="fas fa-sign-out-alt pr-2"></i> Logout</a>
      </li>
    </ul>
  </nav>