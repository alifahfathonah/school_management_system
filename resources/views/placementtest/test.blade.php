@extends('placementtest.placementtest_template')

@section('content')
<h3>Skill Test</h3>
<hr>
<br>


<div class="box box-info">
<div class="table-responsive">
<table id="tabel-test" class="table table-striped table-bordered" cellspacing="0">
    <thead>
        <tr>
          <th>No</th>
          <th>Topic</th>
          <th>Jumlah Soal</th>
          <th>Skor Benar</th>
          <th>Skor Salah</th>
          <th>Waktu</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php $i = 1 ?>
      @foreach($allquiz as $quiz)
      <tr>
        <td style="text-align: center;">{{ $i }}</td>
        <td>{{ $quiz->topic }}</td>
        <td>{{ $quiz->soal()->count() }}</td>
        <td>{{ $quiz->skor_benar }}</td>
        <td>{{ $quiz->skor_salah }}</td>
        <td>{{ $quiz->waktu }} Menit</td>
        <td style="text-align: center;">
          <a href="{{ url('placementtest/') }}/{{ $quiz->id_quiz }}/soal" class="btn btn-success"><span class="glyphicon glyphicon-play"></span> Mulai</a>
        </td>
      </tr>
    <?php $i++; ?>
    @endforeach
    </tbody>

    <!--<tbody>
        <tr>
            <td style="text-align: center;">1</td>
            <td>Listening</td>
            <td>5</td>
            <td>2</td>
            <td>0</td>
            <td>2 Menit</td>
            <td style="text-align: center;"><a href="{{ url('/quiz') }}" class="btn btn-success"><span class="glyphicon glyphicon-play"></span> Mulai</a></td>
        </tr>
        <tr>
            <td style="text-align: center;">2</td>
            <td>Reading</td>
            <td>3</td>
            <td>3</td>
            <td>0</td>
            <td>5 menit</td>
            <td style="text-align: center;"><a href="{{ url('/quiz') }}" class="btn btn-success"><span class="glyphicon glyphicon-play"></span> Mulai</a></td>
        </tr>
        <tr>
            <td style="text-align: center;">3</td>
            <td>Structure</td>
            <td>4</td>
            <td>2</td>
            <td>0</td>
            <td>5 menit</td>
            <td style="text-align: center;"><a href="{{ url('/quiz') }}" class="btn btn-success"><span class="glyphicon glyphicon-play"></span> Mulai</a></td>
        </tr>
  <tbody>-->
</table>
</div>
</div>
@endsection

@section('script')
  $('#tabel-test').DataTable();
@endsection
