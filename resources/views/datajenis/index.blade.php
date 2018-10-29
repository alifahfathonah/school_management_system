@extends('admin_template')


@section('header')
<h1>
  Data Jenis
<!--<small>Control panel</small>-->
</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  <li class="breadcrumb-item active">Data Jenis</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-data"><span class="glyphicon glyphicon-plus " ></span> Tambah</button>
                    <br>
                    <br>
              <table id="example1" class="table table-bordered table-striped table-responsive">
              <thead>
      					<tr>
                  <th>No</th>
                  <th>Jenis Soal</th>
                  <th>Deskripsi</th>
                  <th>Quiz</th>
                  <th style="text-align: center;">Aksi</th>
      					</tr>
      				</thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach($alljenis as $jenis)
                <tr>
                  <td style="text-align: center;">{{ $i }}</td>
                  <td>{{ $jenis->jenis_soal }}</td>
                  <td>{{ $jenis->deskripsi }}</td>
                  <td>{{ $jenis->quiz->nama_quiz }}</td>
                  <td style="text-align: center;">
                    <a href="#" class="btn btn-info modal_part" id="{{ $jenis->id_jenis }}">Part</a>
                    <a href="#" class="btn btn-warning modal_edit" id="{{ $jenis->id_jenis }}">Edit</a>
                    <a href="#" class="btn btn-danger modal_hapus" id="{{ $jenis->id_jenis }}">Hapus</a>
                  </td>
                </tr>
              <?php $i++; ?>
              @endforeach
              </tbody>
          </table>
          </div>
              <!-- /.box-body -->
        </div>
      </div>
    </div>


    <input type="hidden" name="nomor" id="nomor" value="{{ $i }}">
    <div class="modal fade" id="tambah-data">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title">Tambah Data Jenis Soal</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
					  </div>

					  <div class="modal-body">
              <div class="form-group row">
      				  <label for="jenis_soal" class="col-sm-2 col-form-label"><b>Jenis Soal*</b></label>
      				  <div class="col-sm-10">
      					<input class="form-control" type="text" name="nama_quiz" placeholder="Jenis Soal" id="jenis_soal">
                <input class="form-control" type="hidden" name="nama_quiz" id="id_quiz" value="{{ $id_quiz }}">
                <p class="error jenis_soal alert alert-danger hidden"></p>
      				  </div>
      				</div>
              <div class="form-group row">
      				  <label for="deskripsi" class="col-sm-2 col-form-label"><b>Deskripsi*</b></label>
      				  <div class="col-sm-10">
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8" placeholder="Deskripsi..."></textarea>
                <p class="error deskripsi alert alert-danger hidden"></p>
      				  </div>
      				</div>
            </div>

            <div class="modal-footer">
						<button type="submit" id="add" class="btn btn-info float-right">Simpan</button>
					  </div>
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
	</div>



  <div class="modal fade" id="edit-data">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Edit Data Jenis Soal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body">
            <div class="form-group row">
              <label for="jenis_soal" class="col-sm-2 col-form-label"><b>Jenis Soal*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="text" name="nama_jenis" placeholder="Jenis Soal" id="jenis_soal_update">
              <input class="form-control" type="hidden" name="id_quiz" id="id_quiz" value="{{ $id_quiz }}">
              <input class="form-control" type="hidden" name="id_jenis" id="id_jenis_update">
              <p class="error jenis_soal_update alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="deskripsi" class="col-sm-2 col-form-label"><b>Deskripsi*</b></label>
              <div class="col-sm-10">
              <textarea class="form-control" name="deskripsi" id="deskripsi_update" rows="8" placeholder="Deskripsi..."></textarea>
              <p class="error deskripsi_update alert alert-danger hidden"></p>
              </div>
            </div>
          </div>


          <div class="modal-footer">
          <button type="submit" id="edit" class="btn btn-info float-right">Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>


@endsection

@section('script')
<script>
$(document).ready(function () {

});


$("#add").click(function() {
  $.ajax({
      type: 'post',
      url: '/admin/jenis/tambah',
      data: {
          '_token': $('input[name=_token]').val(),
          'jenis_soal': $('#jenis_soal').val(),
          'deskripsi': $('#deskripsi').val(),
          'quiz_id': $("#id_quiz").val()
      },
        success: function(data) {
            console.log(data);
            if(data.errors) {
                $('.error').removeClass('hidden');
                $('.jenis_soal').text(data.errors.jenis_soal);
                $('.deskripsi').text(data.errors.deskripsi);
            }else{
                $('.error').remove();
                $('#tambah-data').modal('hide');
                $.toast({heading: 'Notifikasi!', text: 'Data Berhasil disimpan', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
                window.setInterval(function () {
                  window.location.href='/admin/quiz/jenis/'+$("#id_quiz").val();
                }, 3500);
            }
        },
    });
    $('#jenis_soal').val('');
    $('#deskripsi').val('');
});


$(".modal_edit").click(function (e){
		var m = $(this).attr("id");
    console.log(m);
    var data_row = $(this).closest('tr');

    $("#jenis_soal_update").val(data_row[0].children[1].textContent);
    $("#deskripsi_update").val(data_row[0].children[2].textContent);
    $("#id_jenis_update").val(m);
    $('#edit-data').modal('show');
});


$("#edit").click(function() {
  $.ajax({
      type: 'post',
      url: '/admin/jenis/edit',
      data: {
          '_token': $('input[name=_token]').val(),
            'id_jenis': $('#id_jenis_update').val(),
            'jenis_soal': $('#jenis_soal_update').val(),
            'deskripsi': $('#deskripsi_update').val(),
      },
        success: function(data) {
            console.log(data);
            console.log(nomor);
            if(data.errors) {
              $('.jenis_soal_update').text(data.errors.jenis_soal);
              $('.deskripsi').text(data.errors.deskripsi);
            }else{
                $('.error').remove();
                $('#edit-data').modal('hide');
                $.toast({heading: 'Notifikasi!', text: 'Data Berhasil diedit', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
                window.setInterval(function () {
                  window.location.href='/admin/quiz/jenis/'+$("#id_quiz").val();
                }, 3500);
            }
        },
    });
});

$(".modal_hapus").click(function (e){
		var m = $(this).attr("id");
    console.log(m);

    swal({
			title: "Apa anda yakin?",
			text: "Anda tidak akan bisa mengembalikan data yang sudah terhapus!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Ya, hapus!",
			closeOnConfirm: false
		},

		function(){
      $.ajax({
          type: 'post',
          url: '/admin/jenis/hapus',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_jenis': m,
          },
          success: function(data) {
                swal("Terhapus!", "Data berhasil dihapus.", "success");
          },
        });
        window.setInterval(function () {
          window.location.href='/admin/quiz/jenis/'+$("#id_quiz").val();
        }, 2000);
    }
		);
});

  $(".modal_part").click(function (e){
  		var m = $(this).attr("id");
      console.log(m);
      window.location.href='/admin/jenis/part/'+m;
  });

</script>
@endsection
