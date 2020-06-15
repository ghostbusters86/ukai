  <form id="form-jawab" action="<?php echo base_url().'jawab/soal/'.$detail->kode_mulai.'/'.$this->uri->segment(4) ?>" method="post">
    <section id="latihan">
      <div class="container">
        <div class="row wrap">
          <div class="col-lg-3 col-md-12">
            <div class="card">
              <div class="card-header">Data Peserta</div>
              <div class="card-body">
                <table class="table soal">
                  <tbody>
                    <tr class="t">
                      <td>Nama:</td>
                    </tr>
                    <tr>
                      <td><?php echo $detail->nama_lengkap ?></td>
                    </tr>
                    <tr class="t">
                      <td>ID:</td>
                    </tr>
                    <tr>
                      <td><?php echo $detail->kode_mulai ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card">
              <div class="card-header">Sisa Waktu</div>
              <div class="card-body">
                <h1 class="countdown"></h1>
              </div>
            </div>

            <div class="card">
              <div class="card-header">Keterangan Warna</div>
              <div class="card-body">
                <div class="row body">
                  <div class="ind-yakin"></div>: Jawaban yakin
                </div>
                <div class="row body">
                  <div class="ind-ragu"></div>: Ragu-ragu
                </div>
                <div class="row body">
                  <div class="ind-belum"></div>: Belum dijawab
                </div>
                <div class="row body">
                  <div class="ind-posisi"></div>: Posisi sekarang
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-12">
            <div class="card soal" >
              <div class="card-header">Soal</div>
              <div class="card-body">
                <div class="wrap-soal">
                  <p class="nomor" id="nomor">No.<?php echo $this->uri->segment(4); ?></p>
                  <p class="description-soal" id="pertanyaan"><?php echo $soal->pertanyaan ?></p>
                  <input type="hidden" name="id_soal" value="<?php echo $soal->id_soal ?>">
                  <input type="hidden" name="kode_mulai" value="<?php echo $detail->kode_mulai ?>">
                  <div class="funkyradio">
                    <div class="funkyradio-success">
                      <input type="radio" name="jawaban" id="radio1" value="A" <?php if ($list_soal[$this->uri->segment(4)]['jawaban']=='A'): ?>
                      checked
                      <?php endif ?> />
                      <label for="radio1" id="jawaban_a">A. <?php echo $soal->jawaban_a ?></label>
                    </div>
                  </div>
                  <div class="funkyradio">
                    <div class="funkyradio-success">
                      <input type="radio" name="jawaban" id="radio2" value="B" <?php if ($list_soal[$this->uri->segment(4)]['jawaban']=='B'): ?>
                      checked
                      <?php endif ?>/>
                      <label for="radio2" id="jawaban_b">B. <?php echo $soal->jawaban_b ?></label>
                    </div>
                  </div>
                  <div class="funkyradio">
                    <div class="funkyradio-success">
                      <input type="radio" name="jawaban" id="radio3" value="C" <?php if ($list_soal[$this->uri->segment(4)]['jawaban']=='C'): ?>
                      checked
                      <?php endif ?>/>
                      <label for="radio3" id="jawaban_c">C. <?php echo $soal->jawaban_c ?></label>
                    </div>
                  </div>
                  <div class="funkyradio">
                    <div class="funkyradio-success">
                      <input type="radio" name="jawaban" id="radio4" value="D" <?php if ($list_soal[$this->uri->segment(4)]['jawaban']=='D'): ?>
                      checkedu
                      <?php endif ?>/>
                      <label for="radio4" id="jawaban_d">D. <?php echo $soal->jawaban_d ?></label>
                    </div>
                  </div>
                  <div class="funkyradio">
                    <div class="funkyradio-success">
                      <input type="radio" name="jawaban" id="radio5" value="E" <?php if ($list_soal[$this->uri->segment(4)]['jawaban']=='E'): ?>
                      checked
                      <?php endif ?>/>
                      <label for="radio5" id="jawaban_e">E. <?php echo $soal->jawaban_e ?></label>
                    </div>
                  </div>
                </div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input saran" id="ragu" name="status_answer" value="2" <?php if ($list_soal[$this->uri->segment(4)]['status_answer']=='2'): ?>
                  checked
                  <?php endif ?>>
                  <label class="custom-control-label" for="ragu">klik Untuk Menjawab Ragu</label>
                </div>

              </div>
            </div>

            <div class="card">
              <div class="card-header">Indikator Soal</div>
              <div class="card-body">
                <div class="row wr">
                  <?php $no=1; foreach ($list_soal as $key => $value): ?>
                  <button type="submit" class="indikator ind-wrap <?php 
                  if ($value['no_soal']==$this->uri->segment(4)){ 
                    echo 'posisi';
                    }else if($value['status_answer']=='1'){
                      echo ' ';
                      }else if($value['status_answer']=='2'){
                        echo 'ragu';
                        } else if($value['status_answer']=='0'){ 
                          echo 'belum';
                        } ?>" data-id="<?php echo $value['id_soal'] ?>" data-no="<?php echo $no ?>" style="border:1px solid;cursor: pointer;" onclick=""><h6 class="wr" style="padding-top: 0;font-size: 0.9rem"><?php echo $no ?></h6></button>
                        <?php $no++; endforeach ?>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-lg-3 col-md-12">
                  <div class="card">
                    <div class="card-header">Navigasi Soal</div>
                    <div class="card-body">
                      <div class="row navigasi">
                        <div class="col-4">
                          <?php if ($list_soal[$this->uri->segment(4)]['no_soal']-1!=0): ?>
                            <button class="indikator" data-id="<?php echo $list_soal[$this->uri->segment(4)]['id_soal'] ?>" data-no="<?php echo $list_soal[$this->uri->segment(4)]['no_soal']-1 ?>" style="background: none; border: 0;cursor: pointer;"><i class="fa fa-backward"></i> <br>Prev</button>
                          <?php endif ?>
                        </div>
                        <div class="col-4">
                    <!-- <button class="indikator" data-id="<?php echo $list_soal[$this->uri->segment(4)]['id_soal'] ?>" data-no="<?php echo $list_soal[$this->uri->segment(4)]['no_soal']+1 ?>" style="background: none;
                      border: 0;cursor: pointer;"><i class="fa fa-step-forward"></i> <br>Skip</button> -->
                    </div>
                    <div class="col-4">
                      <?php if ($list_soal[$this->uri->segment(4)]['no_soal']+1<=$penyelesaian['total']): ?>
                        <button class="indikator" data-id="<?php echo $list_soal[$this->uri->segment(4)]['id_soal'] ?>" data-no="<?php echo $list_soal[$this->uri->segment(4)]['no_soal']+1 ?>" style="background: none;  border: 0;cursor: pointer;"><i class="fa fa-forward"></i> <br>Next</a>
                        <?php endif ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">Tabel Normal Lab</div>
                  <div class="card-body">
                    <div class="normal-lab">
                      <a href="" class="btn btn-danger paket" data-toggle="modal" data-target="#exampleModalCenter">Detail Normal Lab</a>
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Normal Lab</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:none">
                                <tbody>
                                  <tr>
                                    <td colspan="4" style="background-color:#d99594; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:220px">
                                      <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">TEST</span></span></p>
                                    </td>
                                    <td style="background-color:#d99594; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:208px">
                                      <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">SI UNITS</span></span></p>
                                    </td>
                                    <td style="background-color:#d99594; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:210px">
                                      <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">TRADITIONAL UNITS</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Albumin (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">35-50 g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.5-5.0 g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Amylase (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">25-125 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">25-125 U/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Bicarbonate (HCO3) (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">23-29 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">23-29 mEq/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" rowspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:121px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Bilirubin (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Neonates (Conjugated)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0-10 &micro;mol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0-0.6 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Neonates (Total)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.7-180 &micro;mol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.0-10.5 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Adults (Conjugated)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0-5 &micro;mol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0-0.3 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Adults (Total)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3-22 &micro;mol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.2-1.3 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Bleeding time</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt; 5 min</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt; 5 min</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:121px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Calsium (serum)**</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Total</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2.10-2.50 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">8.4-10.6 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Ionized</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.15-1.35 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.6-5.1 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Calsium (urine)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt;6.2 mmol/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt;250 mg/24 h</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Carcinoembryonic antigen (CEA) (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt; 3.0 &micro;g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt; 3.0 ng/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">CO2 (Total)**</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">22-29 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">22-29 mEq/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Chloride (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">96-106 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">96-106 mmol/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" rowspan="3" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:121px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Chloride (Urine)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Infant</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2-10 mmol/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2-10 mEq/24h</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Child</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">14-50 mmol/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">14-50 mmol/d</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Adults</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">110-250 mmol/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">110-250 mEq/24h</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Cholesterol (serum)**</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">170-635 nmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6-23 &micro;g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:121px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Cortisol (Plasma)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">8.00 PM</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">170-635 nmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6-23 &micro;g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:100px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.00 PM</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">82-413 nmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3-15 &micro;g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Creatinin (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5-110 &micro;mol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.6-1.2 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Creatinine (Urine)</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Males</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">8.8-17.6 mmol/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.0-2.0 g/24h</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Females</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">7.0-15.8 mmol/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.8-1.8 g/24h</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Creatinine kinase (CK, CPK)</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Males</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">20-215 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">20-215 U/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Females</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">20-160 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">20-160 U/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="3" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Erythrocytes (RBCs)</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Children**</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.5-5.1 x 10<sup>12</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.5-5.1 million/mm<sup>3</sup></span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Males</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.6-6.2 x10<sup>12</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.6-6.2million/mm<sup>3</sup></span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Females</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.2-5.4 x 10<sup>12</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.2-5.4 million/mm3</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Ferritin (serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">20-200 &micro;g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">20-200 ng/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="3" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Follicle-stimulating hormone (FSH) (Plasma)</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Males</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1-10 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1-10 mU/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Females, Premenopausal</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">20-50 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">40-250 mU/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Females, Postmenopausal</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">40-250 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">70-110 mU/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Glucose (Fasting) (Plasma or Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.9-6.1 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">70-110 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Growth hormone (hGH) (Serum, adult) Fasting</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0-10 &micro;g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0-10 ng/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Hematocrit</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Newborn</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.49-0.54</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">49-54 %</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Children</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.35-0.49</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">35-49 %</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Males</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.40-0.54</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">40-54 %</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Females</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.37-0.47</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">37-47 %</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Hemoglobin (Hb)</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Newborn</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">165-195 g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">16.5-19.5 g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Children</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">112-165 g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">11.2-16.5 g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Males</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">140-180 g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">14.0-18.0 g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Females</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">120-160 g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">12.0-16.0 g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">High Density Lipoproteins (HDL)</span></span></p>

                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">(Recommended Range)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&gt;0.91 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&gt;35mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Iron (Serum)</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Males</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">13-31 &micro;mol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">75-175 &micro;g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Females</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5-29 &micro;mol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">28-162 &micro;g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Iron Binding Capacity (serum) TBC</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">45-73</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">250-410 &micro;g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="3" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Lactate dehydrogenase (LDH) (serum)</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Adult</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">45-90 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5-90 U/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Children</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">60-170 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">60-170 U/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&gt;60 years old</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">55-100 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">55-100 U/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td rowspan="6" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:106px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Leukocytes</span></span></p>
                                    </td>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Total</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.5-12.0 x 10<sup>9</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3500-12000/mm<sup>2</sup></span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Neutrophils</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3000-5800 x 10<sup>6</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3000-5800/mm2</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Lymphocytes</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1500-3000 x 10<sup>6</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1500-3000/mm2</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Monocytes</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">300-500 x 10<sup>6</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">300-500/mm2</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Eosinophills</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">50-250 x 10<sup>6</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">50-250/mm2</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:114px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Basophils</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">15-50 x 10<sup>6</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">15-50/mm2</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Low density lipoproteins (LDL) (recommended range)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt;3.4 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt;130 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Magnesium</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.65-1.05 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.3-2.1 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Magnesium</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.0-4.3 mmol/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6.0-8.5 mEq/24h</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Oxygen</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">94-99%</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">94-99%</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Parathyroid hormone</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">10-65ng/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">10-65 pg/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Partial thromboplastin time</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">22-37 sec</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">22-37 sec</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">pCO2 (arterial)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">35-45 mm Hg</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">35-45 mm Hg</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">pH (arterial)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">7.35-7.45</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">7.35-7.45</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Phosphatase, alkaline (serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">40-160 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">40-160 U/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Phosphate</span></span></p>
                                    </td>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Adults</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.0-1.5 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.0-4.5mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Children</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.3-2.3 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.0-7.0 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Platelet Count</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">150-400 x 10<sup>9</sup>/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">150.000-400.000/mm<sup>3</sup></span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">pO2 (arterial)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">80-100 mm Hg</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">80-100 mm Hg</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" rowspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Pottasium (Serum)</span></span></p>
                                    </td>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Newborn</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.7-5.9 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">307-5.9 mEq/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Infant</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.1-5.3 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.1-5.3 mEq/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Children</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.4-4.7 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.4-4.7 mEq/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Adult</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.5-5.1 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.5-5.1 mEq/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Pottasium (Urine)***</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">25-125 mmol/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">25-125 mEq/24h</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Protein (serum)</span></span></p>
                                    </td>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Total</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">60-80 g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6.0-8.0 g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Albumin</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">35-55&nbsp; g/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">3.5-5.5 g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Protein Urine</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">10-150 mg/d</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">10-150 mg/24h</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Prothrombine time (PT)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">9-12 sec</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">9-12 sec</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:25px; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Thrombine time (Plasma)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:25px; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt;17 sec</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:25px; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&lt;17 sec</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Thyroid-stimulating hormone (TSH) (Serum)</span></span></p>
                                    </td>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Adults</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.4-4.8 mlU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.4-4.8 mlU/L</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Thyroxine (T4) (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">66-155 nmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5-12 &micro;g/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Thyroxine, Free (FT4) (Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">13-27 pmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.0-2.1 ng/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Transaminase (Serum)</span></span></p>
                                    </td>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">AST (SGOT)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">7-40 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">7-40 mU/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">ALT (SGPT)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5-35 IU/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5-35 mU/mL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Triiodothyronine (T3) (serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.1-2.9 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">70-190 ng/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Triglycerides</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">0.45-1.71 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">40-150 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Urea (Plasma or Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.0-8.2 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">24-49 ng/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Urea Nitrogen (BUN) (Plasma or Serum)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">8.0-16.4 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">22-46 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Uric acid (serum) (enzymatic)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">120-420 &micro;mol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">2.0-7.0 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:220px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Mean Corpuscular Volume (MCV)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Adults</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">80-96 fL/red cell</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Glucose (serum)</span></span></p>
                                    </td>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Fasting (Pre Prandial)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">4.0 to 5.9 mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">70 mg/dL-110 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Non Fasting (Post Prandial)</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Under 7.8&nbsp; mmol/L</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Under 140 mg/dL</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" rowspan="3" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">HbA1C</span></span></p>
                                    </td>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Normal </span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">42 mmol/mol</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6.0%</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Prediabetes</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">42 to 47 mmol/mol</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6.0-6.4 %</span></span></p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:110px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Diabetes</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:208px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">48 mmol/mol</span></span></p>
                                    </td>
                                    <td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:210px">
                                      <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">6.5 % or over</span></span></p>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">Penyelesaian Soal</div>
                  <div class="card-body">
                    <table class="table soal">
                      <tbody>
                        <tr>
                          <td>Jumlah Soal</td>
                          <td>: <?php echo $penyelesaian['total']; ?></td>
                        </tr>
                        <tr>
                          <td>Sudah dijawab</td>
                          <td>: <?php echo $penyelesaian['sudah']; ?></td>
                        </tr>
                        <tr>
                          <td>Ragu-ragu</td>
                          <td>: <?php echo $penyelesaian['ragu']; ?></td>
                        </tr>
                        <tr>
                          <td>Belum dijawab</td>
                          <td>: <?php echo $penyelesaian['belum']; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>
      </form>

      <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
      <script type="text/javascript">
        
    // Set the date we're counting down to
    var countDownDate = new Date(<?php echo '"'.date("M d, Y H:i:s", strtotime($detail->berakhir)).'"' ?>).getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  $('.countdown').html( '' + hours + ':' + minutes + ':' + seconds + ' ');

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    $('.countdown').html( 'waktu habis ');
    window.location.href = "<?php echo base_url().'jawab/selesai_booster/'.$detail->kode_mulai; ?>";
  } else if (minutes < 10 && hours < 1) {
    $('.countdown').addClass('text-danger');
    $('.countdown').html('' + hours + ':' + minutes + ':' + seconds + ' ');
  } 
}, 1000);
  $(".indikator").click(function() {
    let id = $(this).attr('data-id');
    let no = $(this).attr('data-no');
    let url = '<?php echo base_url().'jawab/soal_booster/'.$detail->kode_mulai.'/' ?>';
    $("#form-jawab").attr("action",url+no);
    console.log(url+no);
  });

</script>