  <section id="soal">
    <div class="container">
      <div class="row wrap">
        <div class="card">
          <div class="card-header">Informasi Soal</div>
          <div class="card-body">
            <table class="table soal">
              <tbody>
                <tr class="t">
                  <td>Nama:</td>
                  <td>Kode soal:</td>
                </tr>
                <tr>
                  <td><?php echo $user->nama_lengkap; ?></td>
                  <td>TU-<?php echo $detail->kode_soal; ?></td>
                </tr>
                <tr class="t">
                  <td>ID:</td>
                  <td>Waktu pengerjaan:</td>
                </tr>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $detail->time_reguler ?> menit</td>
                </tr>
              </tbody>
            </table>
            <p class="card-text">Nama paket:</p>
            <p class="card-description"><?php echo $detail->nama_reguler ?></p>
            <p class="card-text">Deskripsi soal:</p>
            <p class="card-description"><?php echo $detail->desk_reguler ?></p>
            <a href="<?php echo base_url().'jawab/ambil/'.$id.'/'.$detail->kode_soal; ?>" class="btn btn-danger color login">Mulai</a>
          </div>
        </div>
        
      </div>
    </div>
  </section>

