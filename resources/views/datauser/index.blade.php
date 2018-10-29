@extends('admin_template')


@section('header')
<h1>
  Data User
<!--<small>Control panel</small>-->
</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  <li class="breadcrumb-item active">Data User</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                      <thead>
      					<tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Sekolah/Kampus</th>
                  <th>Email</th>
                  <th>No. Hp</th>
                  <th style="text-align: center;">Aksi</th>
      					</tr>
      				</thead>
              <?php $i = 1 ?>
              @foreach($allsiswa as $siswa)
      				<tbody>
      					<tr>
                  <td style="text-align: center;">{{ $i }}</td>
                  <td>{{ $siswa->nama }}</td>
                  <td>{{ $siswa->sekolah }}</td>
                  <td>{{ $siswa->email }}</td>
                  <td>{{ $siswa->no_hp }}</td>
                  <td style="text-align: center;">
                    <a href="#" class="btn btn-danger modal_edit" id="{{ $siswa->id_siswa }}">Nonaktifkan</a>
                  </td>
      					</tr>
      				</tbody>
            <?php $i++; ?>
              @endforeach
            </table>
          </div>
              <!-- /.box-body -->
        </div>
      </div>
    </div>

@endsection
