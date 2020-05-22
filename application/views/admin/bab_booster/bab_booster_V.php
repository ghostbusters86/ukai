<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">BAB Booster</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('admin/bab_booster/add'); ?>">
        <button class="btn btn-sm btn-outline-primary">Tambah</button></a>
      </div>
  </div>

  <div class="row my-4">
  	<div class="col-12 ">
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

        <!-- Goals -->
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">All (<?php echo $semua; ?>)</a>
            <a class="nav-item nav-link" id="nav-published-tab" data-toggle="tab" href="#nav-published" role="tab" aria-controls="nav-published" aria-selected="false">Published (<?php echo $publish; ?>)</a>
            <a class="nav-item nav-link" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="false">Pending (<?php echo $pending; ?>)</a>
          </div>
        </nav>
        
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
            <div class="table-responsive p-4">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Booster</th>
              <th>Nama BAB</th>
              <th>Kode Soal</th>
              <th>Deskripsi</th>
              <th>Waktu</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($bab_booster as $bab_booster):
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $bab_booster->kode_paket; ?></td>
                <td><?php echo $bab_booster->nama_bab_booster; ?></td>
                <td><?php echo $bab_booster->kode_soal; ?></td>
                <td><?php echo character_limiter($bab_booster->desk_bab_booster,400) ?></td>
                <td><?php echo $bab_booster->time_bab_booster; ?><b> Menit</b></td>
                <td> 
                  <?php if ($bab_booster->status_bab_booster == '1'){
                    echo "Published";
                  } else{
                    echo "Pending";
                  } ?>
                </td>
                <td>
                  <a href="<?php echo site_url('admin/bab_booster/edit/'.$bab_booster->id_bab_booster); ?>">
                    <button class="btn btn-sm btn-outline-success">Edit</button>
                  </a>

                  <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $bab_booster->id_bab_booster; ?><?php echo $bab_booster->id_bab_booster; ?>">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo $bab_booster->id_bab_booster; ?><?php echo $bab_booster->id_bab_booster; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda ingin menghapus data <b><?php echo $bab_booster->id_bab_booster; ?></b> ?
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo site_url('admin/bab_booster/delete/'.$bab_booster->id_bab_booster)?>">
                            <button type="button" class="btn btn-danger">Delete</button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
              $no++;
            endforeach;
            ?>
          </tbody>

        </table>
        </div>
          </div>
          <div class="tab-pane fade" id="nav-published" role="tabpanel" aria-labelledby="nav-published-tab">
            <div class="table-responsive p-4">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Booster</th>
              <th>Nama BAB</th>
              <th>Kode Soal</th>
              <th>Deskripsi</th>
              <th>Waktu</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($bab_publish as $bab_publish):
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $bab_publish->kode_paket; ?></td>
                <td><?php echo $bab_publish->nama_bab_booster; ?></td>
                <td><?php echo $bab_publish->kode_soal; ?></td>
                <td><?php echo character_limiter($bab_publish->desk_bab_booster,400) ?></td>
                <td><?php echo $bab_publish->time_bab_booster; ?><b> Menit</b></td>
                <td> 
                  <?php if ($bab_publish->status_bab_booster == '1'){
                    echo "Published";
                  } else{
                    echo "Pending";
                  } ?>
                </td>
                <td>
                  <a href="<?php echo site_url('admin/bab_booster/edit/'.$bab_publish->id_bab_booster); ?>">
                    <button class="btn btn-sm btn-outline-success">Edit</button>
                  </a>

                  <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $bab_publish->id_bab_booster; ?><?php echo $bab_publish->id_bab_booster; ?>">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo $bab_publish->id_bab_booster; ?><?php echo $bab_publish->id_bab_booster; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda ingin menghapus data <b><?php echo $bab_publish->id_bab_booster; ?></b> ?
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo site_url('admin/bab_booster/delete/'.$bab_publish->id_bab_booster)?>">
                            <button type="button" class="btn btn-danger">Delete</button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
              $no++;
            endforeach;
            ?>
          </tbody>

        </table>
        </div>
          </div>
          <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">  
            <div class="table-responsive p-4">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Booster</th>
              <th>Nama BAB</th>
              <th>Kode Soal</th>
              <th>Deskripsi</th>
              <th>Waktu</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($bab_pending as $bab_pending):
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $bab_pending->kode_paket; ?></td>
                <td><?php echo $bab_pending->nama_bab_booster; ?></td>
                <td><?php echo $bab_pending->kode_soal; ?></td>
                <td><?php echo character_limiter($bab_pending->desk_bab_booster,400) ?></td>
                <td><?php echo $bab_pending->time_bab_booster; ?><b> Menit</b></td>
                <td> 
                  <?php if ($bab_pending->status_bab_booster == '1'){
                    echo "Published";
                  } else{
                    echo "Pending";
                  } ?>
                </td>
                <td>
                  <a href="<?php echo site_url('admin/bab_booster/edit/'.$bab_pending->id_bab_booster); ?>">
                    <button class="btn btn-sm btn-outline-success">Edit</button>
                  </a>

                  <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $bab_pending->id_bab_booster; ?><?php echo $bab_pending->id_bab_booster; ?>">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo $bab_pending->id_bab_booster; ?><?php echo $bab_pending->id_bab_booster; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda ingin menghapus data <b><?php echo $bab_booster->kode_paket; ?></b> ?
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo site_url('admin/bab_booster/delete/'.$bab_pending->id_bab_booster)?>">
                            <button type="button" class="btn btn-danger">Delete</button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <?php
              $no++;
            endforeach;
            ?>
          </tbody>

        </table>
        </div>
          </div>
        </div>
        

    </div>
  </div>

</main>



