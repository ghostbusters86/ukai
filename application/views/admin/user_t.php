<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Transaksi</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>/admin/user/">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/user/add')) ?>
    <div class="row my-4">

          <div class="col-md-6">
          	<div class="card">
          		<div class="card-body">
          			<div class="form-group">
          				<label for="">Nama Lengkap</label>
          				<input type="text" class="form-control" id="" name="nama_lengkap" placeholder="Isikan nama lengkap Anda">
          			</div>
          			<div class="form-group">
          				<label for="">Jenis Kelamin</label>
          				<select class="custom-select" name="jk_user">
          					<option selected>Pilih jenis kelamin Anda</option>
          					<option value="Laki-laki">Laki-laki</option>
          					<option value="Perempuan">Perempuan</option>
          				</select>
          			</div>
          			<div class="form-group">
          				<label for="">No. Handphone</label>
          				<input type="number" class="form-control" id="" name="nohp_user" placeholder="Isikan no. handphone Anda">
          			</div>
          			<label>Akses Level</label>
          			<select class="custom-select form-control" name="akses_level">
          				<option selected value="admin">Admin</option>
          				<option value="user">User</option>
          			</select>
          		</div>
          	</div>
          </div>

    	<div class="col-md-6">
    		<div class="card">
    		<div class="card-body">
    			<div class="form-group">
    				<label for="">Asal Universitas</label>
    				<input type="text" class="form-control" id="" name="universitas_user" placeholder="Isikan asal universitas Anda">
    			</div>
    			<div class="form-group">
    				<label for="">Email</label>
    				<input type="email" class="form-control" id="" name="email" placeholder="Isikan email Anda">
    			</div>
    			<div class="form-group">
    				<label for="">Password</label>
    				<input type="password" class="form-control" id="" name="password" placeholder="Isikan password Anda">
    			</div>
    			<div class="form-group">
    				<span>Upload Foto</span>
    				<input type="file" class="form-control" name="foto">
    			</div>
    			<button type="submit" class="btn btn-primary">Submit</button>
    		</div>
    		</div>
    	</div>

   </div>
    <?php echo form_close(); ?>
  </main>

