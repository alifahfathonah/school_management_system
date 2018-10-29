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

        </div>
        <!-- /.box-header -->
    <div class="box-body wizard-content">
      <h3 class="box-title">Soal Belum Ada !</h3>
					  <div class="">
          <a href="{{ url('siswa/test/') }}" class="btn btn-default">Kembali</a>
      </div>
        </div>
        <!-- /.box-body -->
</div>
      <!-- /.box -->
@endsection
