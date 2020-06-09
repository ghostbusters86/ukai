<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Ubah Transaksi</h1>
    
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo base_url(); ?>/admin/user/">
        <button class="btn btn-sm btn-outline-success">Kembali</button></a>
        
      </div>

    </div>
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('/admin/user/edit/'.$edit->id_user)) ?>
    <div class="row my-4">

          <div class="col-md-6">
          	<div class="card">
          		<div class="card-body">
          			<div class="form-group">
          				<label for="">Nama Lengkap</label>
          				<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $edit->nama_lengkap ?>">
          			</div>
          			<div class="form-group">
          				<label for="">Jenis Kelamin</label>
          				<select class="custom-select" name="jk_user">
          				<?php      
          				if ($edit->akses_level == perempuan) { ?>
          					<option value="Perempuan" >Perempuan</option>
          					<option selected value="Laki-laki">Laki-laki</option>
          				<?php } else {?>
          					<option selected value="Laki-laki">Laki-Laki</option>
          					<option value="Perempuan" >Perempuan</option>
          				<?php  } ?>
          				</select>
          			</div>
          			<div class="form-group">
          				<label for="">No. Handphone</label>
          				<input type="number" class="form-control" id="nohp_user" name="nohp_user" value="<?php echo $edit->nohp_user ?>">
          			</div>
          			<label>Akses Level</label>
          			<select class="custom-select form-control" name="akses_level">
          				<?php      
          				if ($edit->akses_level == admin) { ?>
          					<option selected value="admin">Admin</option>
          					<option value="user" >User</option>
          				<?php } else {?>
          					<option value="user" selected>User</option>
          					<option value="admin">Admin</option>
          				<?php  } ?>
          			</select>
          		</div>
          	</div>
          </div>

    	<div class="col-md-6">
    		<div class="card">
    		<div class="card-body">
    			<div class="form-group">
    				<label for="">Asal Universitas</label>
    				<input type="text" class="form-control" id="universitas_user" name="universitas_user" value="<?php echo $edit->universitas_user ?>">
    			</div>
    			<div class="form-group">
    				<label for="">Email</label>
    				<input type="email" class="form-control" id="email" name="email" value="<?php echo $edit->email ?>">
    			</div>
    			<div class="form-group">
    				<span>Upload Foto</span>
    				<input type="file" class="form-control" name="foto">
    			</div>
    			<input class="form-control" name="gambar_lama" id="gambar_lama" type="text" value="<?php echo $edit->foto ?>" hidden> <br><br>
    			<button type="submit" class="btn btn-primary">Submit</button>
    		</div>
    		</div>
    	</div>

    <?php echo form_close(); ?>
   </div>
  </main>

