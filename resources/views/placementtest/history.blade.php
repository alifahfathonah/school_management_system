@extends('placementtest.placementtest_template')

@section('content')
<h3>History</h3>
<hr>
<br>


<div class="box box-info">
<div class="table-responsive">
<table id="tabel-history" class="table table-striped table-bordered" cellspacing="0">
    <thead>
        <tr>
          <th>No</th>
          <th>Topic</th>
          <th>Quiz Solved</th>
          <th>Benar</th>
          <th>Salah</th>
          <th>Total Skor</th>
        </tr>
    </thead>
    <tbody>
      <?php $i = 1 ?>
      @foreach($allhistory as $history)
      <tr>
        <td style="text-align: center;">{{ $i }}</td>
        <td>{{ $history->quiz->topic }}</td>
        <td>{{ $history->quiz->soal()->count() }}</td>
        <td>{{ $history->benar }}</td>
        <td>{{ $history->salah }}</td>
        <td>{{ $history->total_skor }}</td>
      </tr>
    <?php $i++; ?>
    @endforeach

<!--        <tr>
            <td style="text-align: center;">1</td>
            <td>Listening</td>
            <td>3</td>
            <td>2</td>
            <td>0</td>
            <td>6</td>
        </tr>
        <tr>
            <td style="text-align: center;">2</td>
            <td>Reading</td>
            <td>3</td>
            <td>3</td>
            <td>0</td>
            <td>9</td>
        </tr>
        <tr>
            <td style="text-align: center;">3</td>
            <td>Structure</td>
            <td>2</td>
            <td>2</td>
            <td>0</td>
            <td>4</td>
        </tr>-->
  <tbody>
</table>
</div>
</div>
@endsection

@section('script')
  $('#tabel-history').DataTable();
@endsection
