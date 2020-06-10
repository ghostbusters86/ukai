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
          <img class="img-fluid rounded-circle dash" src="<?php echo base_url(); ?>img/img_user/<?php echo $get_user['foto']; ?>" alt="profil-user">
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
                    <div class="form-group col-md-12">
                      <span>Email</span>
                      <input type="email" class="form-control" id="" value="<?php echo $get_user['email']?> ">
                    </div>
                    <!-- <div class="form-group col-md-6">
                      <span>Password</span>
                      <input type="password" class="form-control" id="" value="<?php echo $get_user['password'] ?> ">
                    </div> -->
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
