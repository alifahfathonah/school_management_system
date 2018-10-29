@extends('admin_template')


@section('header')
<h1>
  Data Kategori
<!--<small>Control panel</small>-->
</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  <li class="breadcrumb-item active">Data Kategori</li>
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
                  <th>Kategori</th>
                  <th>Skor Benar</th>
                  <th>Skor Salah</th>
                  <th>Waktu</th>
                  <th style="text-align: center;">Aksi</th>
      					</tr>
      				</thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach($allkategori as $kategori)
                <tr>
                  <td style="text-align: center;">{{ $i }}</td>
                  <td>{{ $kategori->nama_kategori }}</td>
                  <td>{{ $kategori->skor_benar }}</td>
                  <td>{{ $kategori->skor_salah }}</td>
                  <td>{{ $kategori->waktu }}</td>
                  <td style="text-align: center;">
                    <a href="#" class="btn btn-warning modal_edit" id="{{ $kategori->id_kategori }}">Edit</a>
                    <a href="#" class="btn btn-danger modal_hapus" id="{{ $kategori->id_kategori }}">Hapus</a>
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
						<h4 class="modal-title">Tambah Data Kategori</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
					  </div>

					  <div class="modal-body">
              <div class="form-group row">
      				  <label for="kategori" class="col-sm-2 col-form-label"><b>Kategori*</b></label>
      				  <div class="col-sm-10">
      					<input class="form-control" type="text" name="kategori" placeholder="Kategori" id="kategori">
                <p class="error kategori alert alert-danger hidden"></p>
      				  </div>
      				</div>
              <div class="form-group row">
      				  <label for="skor_benar" class="col-sm-2 col-form-label"><b>Skor Benar*</b></label>
      				  <div class="col-sm-10">
      					<input class="form-control" type="number" name="skor_benar" placeholder="Skor Salah" id="skor_benar">
                <p class="error skor_benar alert alert-danger hidden"></p>
      				  </div>
      				</div>
              <div class="form-group row">
      				  <label for="skor_salah" class="col-sm-2 col-form-label"><b>Skor Salah*</b></label>
      				  <div class="col-sm-10">
      					<input class="form-control" type="number" name="skor_salah" placeholder="Skor Salah" id="skor_salah">
                <p class="error skor_salah alert alert-danger hidden"></p>
      				  </div>
      				</div>
              <div class="form-group row">
      				  <label for="waktu" class="col-sm-2 col-form-label"><b>Waktu (Menit)*</b></label>
      				  <div class="col-sm-10">
      					<input class="form-control" type="number" name="waktu" placeholder="Waktu (Menit)" id="waktu">
                <p class="error waktu alert alert-danger hidden"></p>
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
              <label for="kategori" class="col-sm-2 col-form-label"><b>Kategori*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="text" name="kategori" placeholder="Kategori" id="kategori_update">
              <p class="error kategori alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="skor_benar" class="col-sm-2 col-form-label"><b>Skor Benar*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="number" name="skor_benar" placeholder="Skor Salah" id="skor_benar_update">
              <p class="error skor_benar alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="skor_salah" class="col-sm-2 col-form-label"><b>Skor Salah*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="number" name="skor_salah" placeholder="Skor Salah" id="skor_salah_update">
              <p class="error skor_salah alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="waktu" class="col-sm-2 col-form-label"><b>Waktu (Menit)*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="number" name="waktu" placeholder="Waktu (Menit)" id="waktu_update">
              <input class="form-control" type="hidden" name="id_kategori" id="id_kategori_update">
              <p class="error waktu alert alert-danger hidden"></p>
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
  console.log($('#nomor').val());
  $.ajax({
      type: 'post',
      url: '/guru/kategori/tambah',
      data: {
          '_token': $('input[name=_token]').val(),
          'kategori': $('#kategori').val(),
          'skor_benar': $('#skor_benar').val(),
          'skor_salah': $('#skor_salah').val(),
          'waktu': $('#waktu').val()
      },
        success: function(data) {
            console.log(data);
            console.log(nomor);
            if(data.errors) {
                $('.error').removeClass('hidden');
                $('.kategori').text(data.errors.kategori);
                $('.skor_benar').text(data.errors.skor_benar);
                $('.skor_salah').text(data.errors.skor_salah);
                $('.waktu').text(data.errors.waktu);
            }else{
                $('.error').remove();
                $('#tambah-data').modal('hide');
                //window.location.href='/admin/kategori';
                initTable(data);
                $.toast({heading: 'Notifikasi!', text: 'Data Berhasil disimpan', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
                window.setInterval(function () {
                  window.location.href='/guru/kategori';
                }, 3500);
            }
        },
    });
    $('#kategori').val('');
    $('#skor_benar').val('');
    $('#skor_salah').val('');
    $('#waktu').val('');
});


$(".modal_edit").click(function (e){
		var m = $(this).attr("id");
    console.log(m);
    var data_row = $(this).closest('tr');
    console.log(data_row[0].children[1].textContent);
    $("#kategori_update").val(data_row[0].children[1].textContent);
    $("#skor_benar_update").val(data_row[0].children[2].textContent);
    $("#skor_salah_update").val(data_row[0].children[3].textContent);
    $("#waktu_update").val(data_row[0].children[4].textContent);
    $("#id_kategori_update").val(m);
    $('#edit-data').modal('show');
});


$("#edit").click(function() {
  console.log($('#nomor').val());
  console.log($('#skor_benar_update').val());
  console.log($('#id_kategori_update').val());
  $.ajax({
      type: 'post',
      url: '/guru/kategori/edit',
      data: {
          '_token': $('input[name=_token]').val(),
          'id_kategori': $('#id_kategori_update').val(),
          'kategori': $('#kategori_update').val(),
          'skor_benar': $('#skor_benar_update').val(),
          'skor_salah': $('#skor_salah_update').val(),
          'waktu': $('#waktu_update').val()
      },
        success: function(data) {
            console.log(data);
            console.log(nomor);
            if(data.errors) {
                $('.error').removeClass('hidden');
                $('.kategori').text(data.errors.kategori);
                $('.skor_benar').text(data.errors.skor_benar);
                $('.skor_salah').text(data.errors.skor_salah);
                $('.waktu').text(data.errors.waktu);
            }else{
                $('.error').remove();
                $('#edit-data').modal('hide');
                $.toast({heading: 'Notifikasi!', text: 'Data Berhasil diedit', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
                window.setInterval(function () {
                  window.location.href='/guru/kategori';
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
          url: '/guru/kategori/hapus',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_kategori': m,
          },
          success: function(data) {
                swal("Terhapus!", "Data berhasil dihapus.", "success");
          },
        });
        window.setInterval(function () {
          window.location.href='/guru/kategori';
        }, 2000);
    }
		);
});

function initTable(data){
  $('tbody').append("<tr>"+
            "<td style='text-align: center;'>" + $('#nomor').val() + "</td>"+
            "<td>" + data.nama_kategori + "</td>"+
            "<td>" + data.skor_benar + "</td>"+
            "<td>" + data.skor_salah + "</td>"+
            "<td>" + data.waktu + "</td>"+
            "<td style='text-align: center;'><button class='edit-modal btn btn-warning btn-sm'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' '><span class='glyphicon glyphicon-trash'></span></button></td>"+
            "</tr>");
}

</script>
@endsection
