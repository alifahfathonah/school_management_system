@extends('admin_template')


@section('header')
<h1>
  Data Quiz
<!--<small>Control panel</small>-->
</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  <li class="breadcrumb-item active">Data Quiz</li>
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
                  <th>Quiz</th>
                  <th>Level</th>
                  <th>Kategori</th>
                  <th style="text-align: center;">Aksi</th>
      					</tr>
      				</thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach($allquiz as $quiz)
                <tr>
                  <td style="text-align: center;">{{ $i }}</td>
                  <td>{{ $quiz->nama_quiz }}</td>
                  <td>{{ $quiz->level }}</td>
                  <td>{{ $quiz->kategori->nama_kategori }}</td>
                  <td style="text-align: center;">
                    @if($quiz->is_active == 0)
                    <a href="#" class="btn btn-info modal_enable" id="{{ $quiz->id_quiz }}">Enable</a>
                    @else
                    <a href="#" class="btn btn-primary modal_disable" id="{{ $quiz->id_quiz }}">Disable</a>
                    @endif
                    <a href="#" class="btn btn-default modal_jenis" id="{{ $quiz->id_quiz }}">Jenis</a>
                    <a href="#" class="btn btn-warning modal_edit" id="{{ $quiz->id_quiz }}">Edit</a>
                    <a href="#" class="btn btn-danger modal_hapus" id="{{ $quiz->id_quiz }}">Hapus</a>
                  </td>
                </tr>
              <?php $i++; ?>
              @endforeach
              </div>
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
						<h4 class="modal-title">Tambah Data Quiz</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
					  </div>

					  <div class="modal-body">
              <div class="form-group row">
      				  <label for="kategori" class="col-sm-2 col-form-label"><b>Nama Quiz*</b></label>
      				  <div class="col-sm-10">
      					<input class="form-control" type="text" name="nama_quiz" placeholder="Nama Quiz" id="nama_quiz">
                <p class="error quiz alert alert-danger hidden"></p>
      				  </div>
      				</div>
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label"><b>Level*</b></label>
      				  <div class="col-sm-10">
                  <select name="level" id="level"  class="form-control">
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                  </select>
      				  </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label"><b>Kategori*</b></label>
      				  <div class="col-sm-10">
                  <select name="kategori" id="kategori" class="form-control">
                    @foreach($allkategori as $kategori)
                    <option value="{{$kategori->id_kategori}}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                  </select>
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
          <h4 class="modal-title">Edit Data Kategori</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body">
            <div class="form-group row">
              <label for="kategori" class="col-sm-2 col-form-label"><b>Nama Quiz*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="text" name="nama_quiz" placeholder="Nama Quiz" id="nama_quiz_update">
              <p class="error nama_quiz alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label"><b>Level*</b></label>
              <div class="col-sm-10">
                <select name="level" id="level_update"  class="form-control">
                  <option value="Easy">Easy</option>
                  <option value="Medium">Medium</option>
                  <option value="Hard">Hard</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label"><b>Kategori*</b></label>
              <div class="col-sm-10">
                <select name="kategori_update" id="kategori_update" class="form-control">
                  @foreach($allkategori as $kategori)
                  <option value="{{$kategori->id_kategori}}">{{ $kategori->nama_kategori }}</option>
                  @endforeach
                </select>
                <input class="form-control" type="hidden" name="id_quiz" id="id_quiz_update">
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
  console.log($("#kategori option:selected").val());
  console.log($('#nama_quiz').val());
  $.ajax({
      type: 'post',
      url: '/admin/quiz/tambah',
      data: {
          '_token': $('input[name=_token]').val(),
          'nama_quiz': $('#nama_quiz').val(),
          'level': $('#level').val(),
          'kategori_id': $("#kategori option:selected").val()
      },
        success: function(data) {
            console.log(data);
            if(data.errors) {
                $('.error').removeClass('hidden');
                $('.quiz').text(data.errors.nama_quiz);
            }else{
                $('.error').remove();
                $('#tambah-data').modal('hide');
                $.toast({heading: 'Notifikasi!', text: 'Data Berhasil disimpan', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
                window.setInterval(function () {
                  window.location.href='/admin/quiz';
                }, 3500);
            }
        },
    });
    $('#nama_quiz').val('');
});


$(".modal_edit").click(function (e){
		var m = $(this).attr("id");
    console.log(m);
    var data_row = $(this).closest('tr');
    console.log(data_row[0].children[2].textContent);

    $("#nama_quiz_update").val(data_row[0].children[1].textContent);
    $("#id_quiz_update").val(m);
    $('#edit-data').modal('show');
});


$("#edit").click(function() {
  console.log($('#nomor').val());
  $.ajax({
      type: 'post',
      url: '/admin/quiz/edit',
      data: {
          '_token': $('input[name=_token]').val(),
            'id_quiz': $('#id_quiz_update').val(),
            'nama_quiz': $('#nama_quiz_update').val(),
            'level': $('#level_update').val(),
            'kategori_id': $("#kategori_update option:selected").val()
      },
        success: function(data) {
            console.log(data);
            console.log(nomor);
            if(data.errors) {
                $('.error').removeClass('hidden');
                $('.quiz').text(data.errors.nama_quiz);
            }else{
                $('.error').remove();
                $('#edit-data').modal('hide');
                $.toast({heading: 'Notifikasi!', text: 'Data Berhasil diedit', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
                window.setInterval(function () {
                  window.location.href='/admin/quiz';
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
          url: '/admin/quiz/hapus',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_quiz': m,
          },
          success: function(data) {
                swal("Terhapus!", "Data berhasil dihapus.", "success");
          },
        });
        window.setInterval(function () {
          window.location.href='/admin/quiz';
        }, 2000);
    }
		);
});

$(".modal_disable").click(function (e){
		var m = $(this).attr("id");
    console.log(m);
    $.ajax({
        type: 'post',
        url: '/admin/quiz/disable',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_quiz': m,
        },
          success: function(data) {
              console.log(data);
              $.toast({heading: 'Notifikasi!', text: 'Quiz Berhasil didisable', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
              window.setInterval(function () {
                window.location.href='/admin/quiz';
              }, 3500);
          },
      });
});


$(".modal_enable").click(function (e){
		var m = $(this).attr("id");
    console.log(m);
    $.ajax({
        type: 'post',
        url: '/admin/quiz/enable',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_quiz': m,
        },
          success: function(data) {
              console.log(data);
              $.toast({heading: 'Notifikasi!', text: 'Quiz Berhasil dienable', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
              window.setInterval(function () {
                window.location.href='/admin/quiz';
              }, 3500);
          },
      });
});

$(".modal_jenis").click(function (e){
		var m = $(this).attr("id");
    console.log(m);
    window.location.href='/admin/quiz/jenis/'+m;
});

</script>
@endsection
