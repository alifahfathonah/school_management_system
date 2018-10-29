@extends('admin_template')


@section('header')
<h1>
  Data Soal
<!--<small>Control panel</small>-->
</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  <li class="breadcrumb-item active">Data Soal</li>
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
                  <th>Soal</th>
                  <th>Jawaban A</th>
                  <th>Jawaban B</th>
                  <th>Jawaban C</th>
                  <th>Jawaban D</th>
                  <th>Jawaban Benar</th>
                  <th style="text-align: center;">Aksi</th>
      					</tr>
      				</thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach($allsoal as $soal)
                <tr>
                  <td style="text-align: center;">{{ $i }}</td>
                  <td>{{ $soal->soal }}</td>
                  <td>{{ $soal->jawaban_a }}</td>
                  <td>{{ $soal->jawaban_b }}</td>
                  <td>{{ $soal->jawaban_c }}</td>
                  <td>{{ $soal->jawaban_d }}</td>
                  <td>{{ $soal->jawaban_benar }}</td>
                  <td style="text-align: center;">
                    <a href="#" class="btn btn-warning modal_edit" id="{{ $soal->id_soal }}">Edit</a>
                    <a href="#" class="btn btn-danger modal_hapus" id="{{ $soal->id_soal }}">Hapus</a>
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
            <h4 class="modal-title">Tambah Data Jenis Soal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
              <div class="form-group row">
                <label for="soal" class="col-sm-2 col-form-label"><b>Soal*</b></label>
                <div class="col-sm-10">
                <textarea class="form-control" rows="4" name="soal" id="soal" placeholder="Soal..."></textarea>
                <input class="form-control" type="hidden" name="nama_quiz" id="id_part" value="{{ $id_part }}">
                <p class="error soal alert alert-danger hidden"></p>
                </div>
              </div>
              <div class="form-group row">
                <label for="jawaban_a" class="col-sm-2 col-form-label"><b>Jawaban A*</b></label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="jawaban_a" placeholder="Jawaban A" id="jawaban_a">
                <p class="error jawaban_a alert alert-danger hidden"></p>
                </div>
              </div>
              <div class="form-group row">
                <label for="jawaban_b" class="col-sm-2 col-form-label"><b>Jawaban B*</b></label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="jawaban_b" placeholder="Jawaban B" id="jawaban_b">
                <p class="error jawaban_b alert alert-danger hidden"></p>
                </div>
              </div>
              <div class="form-group row">
                <label for="jawaban_c" class="col-sm-2 col-form-label"><b>Jawaban C*</b></label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="jawaban_c" placeholder="Jawaban C" id="jawaban_c">
                <p class="error jawaban_c alert alert-danger hidden"></p>
                </div>
              </div>
              <div class="form-group row">
                <label for="jawaban_d" class="col-sm-2 col-form-label"><b>Jawaban D*</b></label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="jawaban_d" placeholder="Jawaban D" id="jawaban_d">
                <p class="error jawaban_d alert alert-danger hidden"></p>
                </div>
              </div>
              <div class="form-group row">
                <label for="jawaban_benar" class="col-sm-2 col-form-label"><b>Jawaban Benar*</b></label>
      				  <div class="col-sm-10">
                  <select name="jawaban_benar" id="jawaban_benar" class="form-control">
                    <option value="jawaban_a">Jawaban A</option>
                    <option value="jawaban_b">Jawaban B</option>
                    <option value="jawaban_c">Jawaban C</option>
                    <option value="jawaban_d">Jawaban D</option>
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
          <h4 class="modal-title">Edit Data Jenis Soal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body">
            <div class="form-group row">
              <label for="jenis_soal" class="col-sm-2 col-form-label"><b>Soal*</b></label>
              <div class="col-sm-10">
              <textarea class="form-control" rows="4" name="soal" id="soal_update" placeholder="Soal..."></textarea>
              <p class="error soal_update alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="jawaban_a" class="col-sm-2 col-form-label"><b>Jawaban A*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="text" name="jawaban_a" placeholder="Jawaban A" id="jawaban_a_update">
              <p class="error jawaban_a_update alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="jawaban_b" class="col-sm-2 col-form-label"><b>Jawaban B*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="text" name="jawaban_b" placeholder="Jawaban B" id="jawaban_b_update">
              <p class="error jawaban_b_update alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="jawaban_c" class="col-sm-2 col-form-label"><b>Jawaban C*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="text" name="jawaban_c" placeholder="Jawaban C" id="jawaban_c_update">
              <p class="error jawaban_c_update alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="jawaban_d" class="col-sm-2 col-form-label"><b>Jawaban D*</b></label>
              <div class="col-sm-10">
              <input class="form-control" type="text" name="jawaban_d" placeholder="Jawaban D" id="jawaban_d_update">
              <input class="form-control" type="hidden" name="id_soal" id="id_soal">
              <p class="error jawaban_d_update alert alert-danger hidden"></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="jawaban_benar_update" class="col-sm-2 col-form-label"><b>Jawaban Benar*</b></label>
    				  <div class="col-sm-10">
                <select name="jawaban_benar" id="jawaban_benar_update" class="form-control">
                  <option value="jawaban_a">Jawaban A</option>
                  <option value="jawaban_b">Jawaban B</option>
                  <option value="jawaban_c">Jawaban C</option>
                  <option value="jawaban_d">Jawaban D</option>
                </select>
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
      url: '/admin/soal/tambah',
      data: {
          '_token': $('input[name=_token]').val(),
          'soal': $('#soal').val(),
          'jawaban_a': $('#jawaban_a').val(),
          'jawaban_b': $('#jawaban_b').val(),
          'jawaban_c': $('#jawaban_c').val(),
          'jawaban_d': $('#jawaban_d').val(),
          'jawaban_benar': $('#jawaban_benar option:selected').val(),
          'part_id': $("#id_part").val()
      },
        success: function(data) {
            console.log(data);
            if(data.errors) {
                $('.error').removeClass('hidden');
                $('.soal').text(data.errors.soal);
                $('.jawaban_a').text(data.errors.jawaban_a);
                $('.jawaban_b').text(data.errors.jawaban_b);
                $('.jawaban_c').text(data.errors.jawaban_c);
                $('.jawaban_d').text(data.errors.jawaban_d);
            }else{
                $('.error').remove();
                $('#tambah-data').modal('hide');
                $.toast({heading: 'Notifikasi!', text: 'Data Berhasil disimpan', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
                window.setInterval(function () {
                  window.location.href='/admin/part/soal/'+$("#id_part").val();
                }, 3500);
            }
        },
    });
    $('#soal').val('');
    $('#jawaban_a').val('');
    $('#jawaban_b').val('');
    $('#jawaban_c').val('');
    $('#jawaban_d').val('');
    });


    $(".modal_edit").click(function (e){
    var m = $(this).attr("id");
    console.log(m);
    var data_row = $(this).closest('tr');

      $("#soal_update").val(data_row[0].children[1].textContent);
      $("#jawaban_a_update").val(data_row[0].children[2].textContent);
      $("#jawaban_b_update").val(data_row[0].children[3].textContent);
      $("#jawaban_c_update").val(data_row[0].children[4].textContent);
      $("#jawaban_d_update").val(data_row[0].children[5].textContent);
      $("#id_soal").val(m);
      $('#edit-data').modal('show');

    });

  $("#edit").click(function() {
    $.ajax({
      type: 'post',
      url: '/admin/soal/edit',
      data: {
          '_token': $('input[name=_token]').val(),
          'soal': $('#soal_update').val(),
          'jawaban_a': $('#jawaban_a_update').val(),
          'jawaban_b': $('#jawaban_b_update').val(),
          'jawaban_c': $('#jawaban_c_update').val(),
          'jawaban_d': $('#jawaban_d_update').val(),
          'jawaban_benar': $('#jawaban_benar_update option:selected').val(),
          'id_soal': $("#id_soal").val()
      },
        success: function(data) {
            console.log(data);
            if(data.errors) {
                $('.error').removeClass('hidden');
                $('.soal').text(data.errors.soal);
                $('.jawaban_a').text(data.errors.jawaban_a);
                $('.jawaban_b').text(data.errors.jawaban_b);
                $('.jawaban_c').text(data.errors.jawaban_c);
                $('.jawaban_d').text(data.errors.jawaban_d);
            }else{
                $('.error').remove();
                $('#edit-data').modal('hide');
                $.toast({heading: 'Notifikasi!', text: 'Data Berhasil diedit', position: 'bottom-right', icon: 'success', hideAfter: 3000, stack: 6 });
                window.setInterval(function () {
                  window.location.href='/admin/part/soal/'+$("#id_part").val();
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
          url: '/admin/soal/hapus',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_soal': m,
          },
          success: function(data) {
                swal("Terhapus!", "Data berhasil dihapus.", "success");
          },
        });
        window.setInterval(function () {
          window.location.href='/admin/part/soal/'+$("#id_part").val();
        }, 2000);
    }
    );
    });

</script>
@endsection
