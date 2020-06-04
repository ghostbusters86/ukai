<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaksi</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('admin/transaksi/add'); ?>">
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
 	 <div class="card">
       <div class="table-responsive p-4">
       	<table id="example" class="table table-striped table-bordered" style="width:100%">
       		<thead>
       			<tr>
       				<th>No</th>
       				<th>Nama User</th>
       				<th>Kode</th>
       				<th>Bank</th>
       				<th>AN Rekening</th>
       				<th>Nominal TF</th>
       				<th>Kode Paket</th>
       				<th>Status Transaksi</th>
       				<th>Aksi</th>
       			</tr>
       		</thead>
       		<tbody>
       			<?php  
       			$no = 1;
       			foreach ($transaksi as $transaksi):
       				?>
       				<tr>
       					<td><?php echo $no; ?></td>
       					<td><?php echo $transaksi->id_user; ?></td>
       					<td><?php echo $transaksi->kode_transaksi; ?></td>
       					<td><?php echo $transaksi->kode_bank; ?></td>
       					<td><?php echo $transaksi->an_rekening; ?></td>
       					<td>Rp. <?php echo number_format($transaksi->nominal_transfer,'0',',',',') ?>-</td>
       					<td><?php echo $transaksi->kode_paket; ?></td>
       					<!-- <td><?php echo $transaksi->password; ?></td> -->
       					<td><?php echo $transaksi->status_transaksi; ?> <br> <?php echo $transaksi->created; ?></td>
       					<td>
       						<a href="<?php echo site_url('admin/transaksi/edit/'.$transaksi->id_transaksi); ?>">
       							<button class="btn btn-sm btn-outline-success">Edit</button>
       						</a>

       						<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $transaksi->id_transaksi; ?><?php echo $transaksi->id_transaksi; ?>">
       							Delete
       						</button>

       						<!-- Modal -->
       						<div class="modal fade" id="<?php echo $transaksi->id_transaksi; ?><?php echo $transaksi->id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       							<div class="modal-dialog" role="document">
       								<div class="modal-content">
       									<div class="modal-header">
       										<h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
       										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
       											<span aria-hidden="true">&times;</span>
       										</button>
       									</div>
       									<div class="modal-body">
       										Apakah Anda ingin menghapus data <b><?php echo $transaksi->id_user; ?></b> ?
       									</div>
       									<div class="modal-footer">
       										<a href="<?php echo site_url('admin/transaksi/delete/'.$transaksi->id_transaksi)?>">
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

</main>

