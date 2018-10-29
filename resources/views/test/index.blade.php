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
<div class="row">
    <div class="col-12">
      <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body">
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
                  <td>{{ $kategori->waktu }} Menit</td>
                  <td style="text-align: center;">
                    <a href="{{ url('siswa/') }}/{{ $kategori->id_kategori }}/soal" class="btn btn-success"><span class="glyphicon glyphicon-play"></span> Mulai</a>
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

@endsection
