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
                    <br>
                    <br>
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                      <thead>
      					<tr>
                  <tr>
                    <th>No</th>
                    <th>Siswa</th>
                    <th>Kategori</th>
                    <th>Quiz</th>
                    <th>Benar</th>
                    <th>Salah</th>
                    <th>Total Skor</th>
                  </tr>
      					</tr>
      				</thead>
              <tbody>
                <?php $i = 1 ?>
                @foreach($allhistory as $history)
                <tr>
                  <td style="text-align: center;">{{ $i }}</td>
                  <td>{{ $history->siswa_baru->nama }}</td>
                  <td>{{ $history->quiz->kategori->nama_kategori }}</td>
                  <td>{{ $history->quiz->nama_quiz }}</td>
                  <td>{{ $history->benar }}</td>
                  <td>{{ $history->salah }}</td>
                  <td>{{ $history->total_skor }}</td>
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

@endsection
