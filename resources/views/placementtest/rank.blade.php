@extends('placementtest.placementtest_template')

@section('content')
<h3>Rank</h3>
<hr>
<br>


<div class="box box-info">
<div class="table-responsive">
<table id="tabel-rank" class="table table-striped table-bordered" cellspacing="0">
    <thead>
        <tr>
          <th>Rangking</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Sekolah/Kampus/Pekerjaan</th>
          <th>Skor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: center;">1</td>
            <td>Fata</td>
            <td>Laki-Laki</td>
            <td>UNIKOM</td>
            <td>85</td>
        </tr>
        <tr>
            <td style="text-align: center;">2</td>
            <td>Hasan</td>
            <td>Laki-Laki</td>
            <td>ITB</td>
            <td>87</td>
        </tr>
        <tr>
            <td style="text-align: center;">3</td>
            <td>Ihromy</td>
            <td>Laki-Laki</td>
            <td>SMA 1 Bandung</td>
            <td>80</td>
        </tr>
  <tbody>
</table>
</div>
</div>
@endsection

@section('script')
  $('#tabel-rank').DataTable();
@endsection
