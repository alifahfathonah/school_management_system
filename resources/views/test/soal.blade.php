@extends('admin_template')

@section('header')
<h1>
  Test
<!--<small>Control panel</small>-->
</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  <li class="breadcrumb-item active">Test</li>
</ol>
@endsection

@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $Kategori->nama_kategori }}</h3>
          <br>
          <h5 class="box-title">{{ $quiz->nama_quiz }}</h5>

          <div class="box-tools pull-right">
              <div id='timer'></div>

            </div>
        </div>
        <!-- /.box-header -->
    <div class="box-body wizard-content">
					<form action="#" class="tab-wizard wizard-circle">
        <?php $i = 0;
         $m=0;
         $s=1;
         $f = 1;?>
         <input type="hidden" id="id_kategori" value="{{ $id }}">
         <input type="hidden" id="id_quiz" value="{{ $quiz->id_quiz }}">
         <input type="hidden" id="waktu" value="{{ $Kategori->waktu }}">
        @foreach($alljenis as $jenis)
        <!-- Step 1 -->
  			<h6>{{ $jenis->jenis_soal }}</h6>
				<section>
          <?php
           for ($k=0; $k < $allPart[$i]->count(); $k++) {
             ?>
          <div class="row">
          <?php
          if($allPart[$i][$k]->soal->count()!=0){
          ?>
						<div class="col-md-12">
              {{ $allPart[$i][$k]->nama_part }}
            </div>
            <div class="col-md-12">
              {{ $allPart[$i][$k]->description }}
            </div>
            <div class="col-md-12">
              <?php if ($allPart[$i][$k]->audio != NULL): ?>
              <audio controls>
                <source src="{{ asset("audio/") }}/{{ $allPart[$i][$k]->audio }}/{{ $allPart[$i][$k]->audio }}" type="audio/mpeg">
                  Your browser does not support the audio element.
              </audio>
              <?php endif; ?>
            </div>
          <?php
          }else{
          ?>

          <?php
          }
              for ($j=0; $j < $allSoal[$m]->count(); $j++) {?>
                <div class="col-md-12">
                  {{ $s }}
                  <?php echo "." ?>
                  {{ $allSoal[$m][$j]->soal }}
                </div>

              <div class="col-md-12">
                <div class="form-group">
                  <div class="radio">
                  	  <input name="jawaban_{{ $s }}" type="radio" id="radio_{{$f}}" value="{{ $allSoal[$m][$j]->jawaban_a }}" checked>
					            <label for="radio_{{$f}}">{{ $allSoal[$m][$j]->jawaban_a }}</label>
                        <?php
                          $f++;
                       ?>
                  </div>
                  <div class="radio">
                  	  <input name="jawaban_{{ $s }}" type="radio" id="radio_{{$f}}" value="{{ $allSoal[$m][$j]->jawaban_b }}">
					            <label for="radio_{{$f}}">{{ $allSoal[$m][$j]->jawaban_b }}</label>
                      <?php
                        $f++;
                     ?>
                  </div>
                  <div class="radio">
                  	  <input name="jawaban_{{ $s }}" type="radio" id="radio_{{$f}}" value="{{ $allSoal[$m][$j]->jawaban_c }}">
					            <label for="radio_{{$f}}">{{ $allSoal[$m][$j]->jawaban_c }}</label>
                      <?php
                        $f++;
                     ?>
                  </div>
                  <div class="radio">
                  	  <input name="jawaban_{{ $s }}" type="radio" id="radio_{{$f}}" value="{{ $allSoal[$m][$j]->jawaban_d }}">
					            <label for="radio_{{$f}}">{{ $allSoal[$m][$j]->jawaban_d }}</label>
                      <?php
                        $f++;
                     ?>
                  </div>
                </div>
              </div>
                <?php
                  $s++;
                }
                $m++;
             ?>
					</div>
          <?php
          }
         ?>
        </section>
        <?php $i++; ?>
        @endforeach
        <input name="jumlah" id="jumlah" type="hidden" value="{{ $m+1 }}" >
			</form>
      <div class="">
          <a href="{{ url('siswa/test/') }}" class="btn btn-default">Kembali</a>
      </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
@endsection

@section('script')
<script>
    $(document).ready(function () {
      var menit = $("#waktu").val();
      var waktu = menit*60;
      var detik = 0;
      if(menit<60){
        var jam = 0;
      }else{
        var jam = menit/60;
      }

      function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk
                     * mengulang atau merefresh halaman selama 1000 (1 detik)
                */
                setTimeout(hitung,1000);

                /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                if(menit < 10 && jam == 0){
                    var peringatan = 'style="color:red"';
                };

                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                $('#timer').html(
                    '<h3 class="box-title"' +peringatan+'>Sisa waktu anda ' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h3>'
                );

                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;

                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;

                   /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */

                        if(jam < 0) {
                            clearInterval(hitung);
                            /** Variable yang digunakan untuk submit secara otomatis di Form */
                            submitData();
                            /*window.setInterval(function () {
                              window.location.href='/siswa/test';
                            }, 5000);*/
                        }
                    }
                }
            }
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();

  //$("#sisa").text('Waktu : '+waktu+);
  //var waktu_fix = menit*60*1000;
  //window.setInterval(function () {
    //submitData();
  //}, waktu_fix);
});

  $(".tab-wizard").steps({
      headerTag: "h6"
      , bodyTag: "section"
      , transitionEffect: "none"
      , titleTemplate: '<span class="step">#index#</span> #title#'
      , labels: {
          finish: "Submit"
      }, onFinished: function (event, currentIndex) {
          submitData();
          /*window.setInterval(function () {
            window.location.href='/siswa/test';
          }, 5000);*/
      }
  });

function submitData() {
  var jumlah = $("#jumlah").val();
  var parameters = [];
  var i;
  for (i = 1; i <= jumlah; i++) {
      parameters.push($('input[name=jawaban_'+i+']:checked').val());
  }
  console.log(parameters);
      $.ajax({
          type: 'post',
          url: '/siswa',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_kategori': $('#id_kategori').val(),
              'id_quiz': $('#id_quiz').val(),
              'jawaban': parameters
          },
          success: function(data) {
              swal("Selesai!", "Jawaban Anda Telah Terkirim.");
              console.log(data);
          },
      });
}
</script>
@endsection
