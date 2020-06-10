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
              <form>
              <div class="wrap-soal">
                <p class="nomor" id="nomor">No.1</p>
                <p class="description-soal" id="pertanyaan"><?php echo $soal->pertanyaan ?></p>
                <div class="funkyradio">
                  <div class="funkyradio-success">
                    <input type="radio" name="jawaban" id="radio1" value="A" />
                    <label for="radio1" id="jawaban_a">A. <?php echo $soal->jawaban_a ?></label>
                  </div>
                </div>
                <div class="funkyradio">
                  <div class="funkyradio-success">
                    <input type="radio" name="jawaban" id="radio2" value="B" />
                    <label for="radio2" id="jawaban_b">B. <?php echo $soal->jawaban_b ?></label>
                  </div>
                </div>
                <div class="funkyradio">
                  <div class="funkyradio-success">
                    <input type="radio" name="jawaban" id="radio3" value="C" />
                    <label for="radio3" id="jawaban_c">C. <?php echo $soal->jawaban_c ?></label>
                  </div>
                </div>
                <div class="funkyradio">
                  <div class="funkyradio-success">
                    <input type="radio" name="jawaban" id="radio4" value="D" />
                    <label for="radio4" id="jawaban_d">D. <?php echo $soal->jawaban_d ?></label>
                  </div>
                </div>
                <div class="funkyradio">
                  <div class="funkyradio-success">
                    <input type="radio" name="jawaban" id="radio5" value="E" />
                    <label for="radio5" id="jawaban_e">E. <?php echo $soal->jawaban_e ?></label>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>

          <div class="card">
            <div class="card-header">Indikator Soal</div>
            <div class="card-body">
              <div class="row wr">
                <?php $no=1; foreach ($indikator as $key => $value): ?>
                <a type="button" class="indikator" data-id="<?php echo $value->id_soal ?>" data-no="<?php echo $no ?>"><div class="ind-wrap belum" id="<?php echo $no ?>"><h6 class="wr"><?php echo $no ?></h6></div></a>
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
                <div class="col">
                  <a class="indikator" data-id=""><i class="fa fa-backward"></i> <br>Prev</a>
                </div>
                <div class="col">
                  <a class="indikator"><i class="fa fa-step-forward"></i> <br>Skip</a>
                </div>
                <div class="col">
                  <a class="indikator"><i class="fa fa-forward"></i> <br>Next</a>
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
                        ...
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">Peneyelesaian Soal</div>
            <div class="card-body">
              <table class="table soal">
                <tbody>
                  <tr>
                    <td>Jumlah Soal</td>
                    <td>: <?php echo $no-1; ?></td>
                  </tr>
                  <tr>
                    <td>Sudah dijawab</td>
                    <td>: 100</td>
                  </tr>
                  <tr>
                    <td>Ragu-ragu</td>
                    <td>: 100</td>
                  </tr>
                  <tr>
                    <td>Belum dijawab</td>
                    <td>: 100</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

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
  } else if (minutes < 10 && hours < 1) {
    $('.countdown').addClass('text-danger');
    $('.countdown').html('' + hours + ':' + minutes + ':' + seconds + ' ');
  }
}, 1000);

  $(".indikator").click(function() {
            let id = $(this).attr('data-id');
            let no = $(this).attr('data-no');
            let data = {'id' : id};
            // console.log(data);
            $.ajax({
                url: '<?php echo site_url("jawab/get_soal") ?>',
                method: 'post',
                data: data,
                success: function(response) {
                    // console.log(response);
                    if (response != '') {
                        let obj = JSON.parse(response);
                        let soal = $(".soal");
                        $(".ind-wrap").removeClass("posisi");
                        soal.find('#nomor').html('No.'+no);
                        soal.find('#pertanyaan').html(obj.pertanyaan);
                        soal.find('#jawaban_a').html('A. '+obj.jawaban_a);
                        soal.find('#jawaban_b').html('B. '+obj.jawaban_b);
                        soal.find('#jawaban_c').html('C. '+obj.jawaban_c);
                        soal.find('#jawaban_d').html('D. '+obj.jawaban_d);
                        soal.find('#jawaban_e').html('E. '+obj.jawaban_e);
                        $(".indikator").find('[id='+no+']').addClass('posisi');
                    } else {
                        alert('Soal tidak ditemukan');
                    }
                },
            });
        });
</script>