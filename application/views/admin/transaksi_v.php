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
     <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-reguler-tab" data-toggle="tab" href="#nav-reguler" role="tab" aria-controls="nav-reguler" aria-selected="true">Reguler</a>
        <a class="nav-item nav-link" id="nav-booster-tab" data-toggle="tab" href="#nav-booster" role="tab" aria-controls="nav-booster" aria-selected="false">Booster</a>
      </div>
    </nav>
    <div class="card">
      <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-reguler" role="tabpanel" aria-labelledby="nav-reguler-tab">
         <div class="table-responsive p-4">
          <table class="table table-striped table-bordered example" style="width:100%">
           <thead>
            <tr>
             <th>No</th>
             <th>Nama User</th>
             <th>Kode Transaksi</th>
             <th>Bank</th>
             <th>Nominal</th>
             <th>Kode Paket</th>
             <th>Status Transaksi</th>
             <th>Aksi</th>
           </tr>
         </thead>
         <tbody>
          <?php  
          $no = 1;
          foreach ($reguler as $reguler):
           ?>
           <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $reguler->nama_lengkap; ?></td>
            <td><?php echo $reguler->kode_transaksi; ?></td>
            <td><?php echo $reguler->kode_bank.'<br>A.n '.$reguler->an_rekening; ?></td>
            <td>Rp. <?php echo number_format($reguler->nominal_transfer,'0',',',',') ?></td>
            <td><?php echo $reguler->nama_reguler; ?></td>
            <td>
              <?php if ($reguler->status_transaksi=='0'){ ?>  
                <button class="btn btn-sm btn-danger">Pending</button>
              <?php }else {?>
                <button class="btn btn-sm btn-success">Aktif</button>
              <?php } ?>
              
            </td>
            <td>
             <a href="<?php echo site_url('admin/transaksi/edit/'.$reguler->id_transaksi); ?>">
              <button class="btn btn-sm btn-outline-success">Edit</button>
            </a>

            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $reguler->id_transaksi; ?><?php echo $reguler->id_transaksi; ?>">
              Delete
            </button>

            <!-- Modal -->
            <div class="modal fade" id="<?php echo $reguler->id_transaksi; ?><?php echo $reguler->id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
               <div class="modal-content">
                <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               Apakah Anda ingin menghapus data <b><?php echo $reguler->id_user; ?></b> ?
             </div>
             <div class="modal-footer">
               <a href="<?php echo site_url('admin/transaksi/delete/'.$reguler->id_transaksi)?>">
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
<div class="tab-pane fade" id="nav-booster" role="tabpanel" aria-labelledby="nav-booster-tab">
 <div class="table-responsive p-4">
  <table class="table table-striped table-bordered example" style="width:100%">
   <thead>
    <tr>
     <th>No</th>
     <th>Nama User</th>
     <th>Kode Transaksi</th>
     <th>Bank</th>
     <th>Nominal</th>
     <th>Kode Paket</th>
     <th>Status Transaksi</th>
     <th>Aksi</th>
   </tr>
 </thead>
 <tbody>
  <?php  
  $no = 1;
  foreach ($booster as $booster):
   ?>
   <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $booster->nama_lengkap; ?></td>
    <td><?php echo $booster->kode_transaksi; ?></td>
    <td><?php echo $booster->kode_bank.'<br>A.n '.$booster->an_rekening; ?></td>
    <td>Rp. <?php echo number_format($booster->nominal_transfer,'0',',',',') ?></td>
    <td><?php echo $booster->nama_booster; ?></td>
    <td>
      <?php if ($booster->status_transaksi=='0'){ ?>  
        <button class="btn btn-sm btn-danger">Pending</button>
      <?php }else {?>
        <button class="btn btn-sm btn-success">Aktif</button>
      <?php } ?>

    </td>
    <td>
     <a href="<?php echo site_url('admin/transaksi/edit/'.$booster->id_transaksi); ?>">
      <button class="btn btn-sm btn-outline-success">Edit</button>
    </a>

    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $booster->id_transaksi; ?><?php echo $booster->id_transaksi; ?>">
      Delete
    </button>

    <!-- Modal -->
    <div class="modal fade" id="<?php echo $booster->id_transaksi; ?><?php echo $booster->id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
       <div class="modal-content">
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Apakah Anda ingin menghapus data <b><?php echo $booster->id_user; ?></b> ?
     </div>
     <div class="modal-footer">
       <a href="<?php echo site_url('admin/transaksi/delete/'.$booster->id_transaksi)?>">
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
</div>

</main>

