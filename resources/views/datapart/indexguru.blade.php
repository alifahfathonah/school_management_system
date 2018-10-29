@extends('admin_template')


@section('header')
<h1>
  Data Part
<!--<small>Control panel</small>-->
</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  <li class="breadcrumb-item active">Data Part</li>
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
                  <th>Nama Part</th>
                  <th>Deskripsi</th>
                  <th>Audio</th>
                  <th>Jenis Soal</th>
                  <th style="text-align: center;">Aksi</th>
      					</tr>
      				</thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach($allpart as $part)
                <tr>
                  <td style="text-align: center;">{{ $i }}</td>
                  <td>{{ $part->nama_part }}</td>
                  <td>{{ $part->description }}</td>
                  <td>{{ $part->audio }}</td>
                  <td>{{ $part->jenis_soal->jenis_soal }}</td>
                  <td style="text-align: center;">
                      <a href="#" class="btn btn-info modal_soal" id="{{ $part->id_part }}">Soal</a>
                      <a href="#" class="btn btn-warning modal_edit" id="{{ $part->id_part }}">Edit</a>
                      <a href="#" class="btn btn-danger modal_hapus" id="{{ $part->id_part }}">Hapus</a>
                  </td>
                </tr>
              <?php $i++; ?>
              @endforeach
              </tbody>
          </table>
          <br>
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
						<h4 class="modal-title">Tambah Data Part</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
					  </div>
            <form method="post" id="upload_form" enctype="multipart/form-data">
              {{ csrf_field() }}
					  <div class="modal-body">
              <div class="form-group row">
      				  <label for="part_soal" class="col-sm-2 col-form-label"><b>Nama Part Soal*</b></label>
      				  <div class="col-sm-10">
      					<input class="form-control" type="text" name="part_soal" placeholder="Nama Part Soal" id="part_soal">
                <input class="form-control" type="hidden" name="id_jenis" value="{{ $id_jenis }}" id="id_jenis">
                <p class="error part_soal alert alert-danger hidden"></p>
      				  </div>
      				</div>
              <div class="form-group row">
      				  <label for="deskripsi" class="col-sm-2 col-form-label"><b>Deskripsi*</b></label>
      				  <div class="col-sm-10">
                  <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8" placeholder="Deskripsi..."></textarea>
                  <p class="error deskripsi alert alert-danger hidden"></p>
      				  </div>
      				</div>
              <div class="form-group row">
      				  <label for="upload" class="col-sm-2 col-form-label"><b>File Audio*</b></label>
      				  <div class="col-sm-10">
          					<input class="form-control" type="file" name="audio_file" id="audio_file">
                    <br>
                    <!--<input type="submit" name="upload" class="form-control btn btn-primary" id="upload" value="Upload">-->

                </div>
      				</div>
            </div>

            <div class="modal-footer">
						<button type="submit" id="add" class="btn btn-info float-right">Simpan</button>
					  </div>
            </form>
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
	</div>



  <div class="modal fade" id="edit-data">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Edit Data Part</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>
          <form method="post" id="upload_form_update" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group row">
              <label for="part_soal" class="col-sm-2 col-form-label"><b>Nama Part Soal*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="text" name="part_soal_update" placeholder="Nama Part Soal" id="part_soal_update">
              <input class="form-control" type="hidden" name="id_part" id="id_part">
              <p class="error part_soal alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="deskripsi" class="col-sm-2 col-form-label"><b>Deskripsi*</b></label>
              <div class="col-sm-10">
                <textarea class="form-control" name="deskripsi_update" id="deskripsi_update" rows="8" placeholder="Deskripsi..."></textarea>
                <p class="error deskripsi alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="upload" class="col-sm-2 col-form-label"><b>File Audio*</b></label>
              <div class="col-sm-10">
                  <input class="form-control" type="file" name="audio" id="audio">
                  <br>
                  <input class="form-control" type="checkbox" name="check_audio" id="check_audio" value="ya">
                  <label for="check_audio" class="col-sm-10 col-form-label"><b>Centang jika ingin Update Audio</b></label>
              </div>
            </div>
          </div>

          <div class="modal-footer">
          <button type="submit" id="edit" class="btn btn-info float-right">Simpan</button>
          </div>
          </form>
      </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>


@endsection

@section('script')
<script>
$(document).ready(function () {

      $('#upload_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
        url:"{{ url('guru/part/tambah') }}",
        method:"POST",
        data:new FormData(this),
        success:function(data)
        {
          console.log(data);
          $('#tambah-data').modal('hide');
          $.toast({heading: 'Notifikasi!', text: 'Data Berhasil disimpan', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
          window.setInterval(function () {
            window.location.href='/guru/jenis/part/'+$('#id_jenis').val();
          }, 3500);
        },
        processData: false,
        contentType: false
      })
    });

    $('#upload_form_update').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"{{ url('guru/part/edit') }}",
      method:"POST",
      data:new FormData(this),
      success:function(data)
      {
        console.log(data);
        $('#edit-data').modal('hide');
        $.toast({heading: 'Notifikasi!', text: 'Data Berhasil diedit', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
        window.setInterval(function () {
          window.location.href='/guru/jenis/part/'+$('#id_jenis').val();
        }, 3500);
      },
      processData: false,
      contentType: false
    })
  });

});




$(".modal_edit").click(function (e){
		var m = $(this).attr("id");
    console.log(m);
    var data_row = $(this).closest('tr');

    $("#part_soal_update").val(data_row[0].children[1].textContent);
    $("#deskripsi_update").val(data_row[0].children[2].textContent);
    $("#id_part").val(m);
    $('#edit-data').modal('show');
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
          url: '/guru/part/hapus',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_part': m,
          },
          success: function(data) {
                swal("Terhapus!", "Data berhasil dihapus.", "success");
          },
        });
        window.setInterval(function () {
          window.location.href='/guru/jenis/part/'+$('#id_jenis').val();
        }, 2000);
    }
		);
});


  $(".modal_soal").click(function (e){
  		var m = $(this).attr("id");
      console.log(m);
      window.location.href='/guru/part/soal/'+m;
  });

</script>
@endsection
