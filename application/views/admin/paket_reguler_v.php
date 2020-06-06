<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Paket Reguler</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('admin/paket_reguler/add'); ?>">
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
       				<th>Nama</th>
       				<th>Kode Paket</th>
              <th>Kode Soal</th>
       				<th>Harga</th>
       				<th>Deskripsi</th>
              <th>Waktu</th>
       				<th>Status</th>
       				<th>Created</th>
       				<th>Aksi</th>
       			</tr>
       		</thead>
       		<tbody>
       			<?php  
       			$no = 1;
       			foreach ($paket_reguler as $paket_reguler):
       				?>
       				<tr>
       					<td><?php echo $no; ?></td>
       					<td><?php echo $paket_reguler->nama_reguler; ?></td>
                <td><?php echo $paket_reguler->kode_paket; ?></td>
                <td><?php echo $paket_reguler->kode_soal; ?></td>
       					<td>Rp. <?php echo number_format($paket_reguler->harga_reguler,'0',',',',') ?>-</td>
       					<td><?php echo character_limiter($paket_reguler->desk_reguler,400) ?></td>
       					<td><?php echo $paket_reguler->time_reguler;?><b> Menit</b></td>
                <td>
                  <?php if ($paket_reguler->status_reguler == '1'){
                    echo "Published";
                  } else{  
                    echo "Pending";
                  } ?>

                </td>
       					<td><?php echo $paket_reguler->created; ?></td>
       					<td>
       						<a href="<?php echo site_url('admin/paket_reguler/edit/'.$paket_reguler->slug); ?>">
       							<button class="btn btn-sm btn-outline-success">Edit</button>
       						</a>

       						<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $paket_reguler->id_reguler; ?><?php echo $paket_reguler->id_reguler; ?>">
       							Delete
       						</button>

       						<!-- Modal -->
       						<div class="modal fade" id="<?php echo $paket_reguler->id_reguler; ?><?php echo $paket_reguler->id_reguler; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       							<div class="modal-dialog" role="document">
       								<div class="modal-content">
       									<div class="modal-header">
       										<h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
       										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
       											<span aria-hidden="true">&times;</span>
       										</button>
       									</div>
       									<div class="modal-body">
       										Apakah Anda ingin menghapus data <b><?php echo $paket_reguler->id_reguler; ?></b> ?
       									</div>
       									<div class="modal-footer">
       										<a href="<?php echo site_url('admin/paket_reguler/delete/'.$paket_reguler->id_reguler)?>">
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
              <th>Nama</th>
              <th>Kode Paket</th>
              <th>Kode Soal</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Waktu</th>
              <th>Status</th>
              <th>Created</th>
              <th>Aksi</th>   
            </tr>
          </thead>   
          <tbody>  
            <?php
            $no = 1;
            foreach ($paket_reguler_published as $paket_reguler_published):
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $paket_reguler_published->nama_reguler; ?></td>
                <td><?php echo $paket_reguler_published->kode_paket; ?></td>
                <td><?php echo $paket_reguler_published->kode_soal; ?></td>
                <td>Rp. <?php echo number_format($paket_reguler_published->harga_reguler,'0',',',',') ?>-</td>
                <td><?php echo character_limiter($paket_reguler_published->desk_reguler,400) ?></td>
                <td><?php echo $paket_reguler_published->time_reguler;?><b> Menit</b></td>
                <td>
                  <?php if ($paket_reguler_published->status_reguler == '1'){
                    echo "Published";
                  } else{
                    echo "Pending";
                  } ?>

                </td>
                <td><?php echo $paket_reguler_published->created; ?></td>
                <td>
                  <a href="<?php echo site_url('admin/paket_reguler/edit/'.$paket_reguler_published->id_reguler); ?>">
                    <button class="btn btn-sm btn-outline-success">Edit</button>
                  </a>

                  <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $paket_reguler_published->id_reguler; ?><?php echo $paket_reguler_published->status_reguler; ?>">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo $paket_reguler_published->id_reguler; ?><?php echo $paket_reguler_published->status_reguler; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda ingin menghapus data <b><?php echo $paket_reguler_published->id_reguler; ?></b> ?
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo site_url('admin/paket_reguler/delete/'.$paket_reguler_published->id_reguler)?>">
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
              <th>Nama</th>
              <th>Kode Paket</th>
              <th>Kode Soal</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Waktu</th>
              <th>Status</th>
              <th>Created</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($paket_reguler_pending as $paket_reguler_pending):
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $paket_reguler_pending->nama_reguler; ?></td>
                <td><?php echo $paket_reguler_pending->kode_paket; ?></td>
                <td><?php echo $paket_reguler_pending->kode_soal; ?></td>
                <td>Rp. <?php echo number_format($paket_reguler_pending->harga_reguler,'0',',',',') ?>-</td>
                <td><?php echo character_limiter($paket_reguler_pending->desk_reguler,400) ?></td>
                <td><?php echo $paket_reguler_pending->time_reguler;?><b> Menit</b></td>
                <td>
                  <?php if ($paket_reguler_pending->status_reguler == '1'){
                    echo "Published";
                  } else{
                    echo "Pending";
                  } ?>

                </td>
                <td><?php echo $paket_reguler_pending->created; ?></td>
                <td>
                  <a href="<?php echo site_url('admin/paket_reguler/edit/'.$paket_reguler_pending->id_reguler); ?>">
                    <button class="btn btn-sm btn-outline-success">Edit</button>
                  </a>

                  <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $paket_reguler_pending->id_reguler; ?><?php echo $paket_reguler_pending->status_reguler; ?>">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo $paket_reguler_pending->id_reguler; ?><?php echo $paket_reguler_pending->status_reguler; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda ingin menghapus data <b><?php echo $paket_reguler_pending->kode_paket; ?></b> ?
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo site_url('admin/paket_reguler/delete/'.$paket_reguler_pending->id_reguler)?>">
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

