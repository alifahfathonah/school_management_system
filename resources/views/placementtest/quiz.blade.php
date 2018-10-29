@extends('placementtest.placementtest_template')

@section('content')
<br>
  <h3 style="display:inline;">Quiz</h3>
  <h4 style="float:right;display:inline;">Waktu tersisa :  03:10:12</h4>
  <hr>
<br>


<form class="" method="POST" action="{{ url ('/placementtest') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $id }}">
  <?php $i = 1 ?>
  @foreach($allsoal as $soal)
<div class="panel panel-primary">
    <div class="panel-heading">Soal {{ $i }}</div>
    <div class="panel-body">
      <div class="">
        {{ $soal->soal }}
      </div>
      <div class="radio">
        <label><input type="radio" name="jawaban[{{ $i }}]" value="{{ $soal->jawaban_a }}" checked>{{ $soal->jawaban_a }}</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="jawaban[{{ $i }}]" value="{{ $soal->jawaban_b }}" >{{ $soal->jawaban_b }}</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="jawaban[{{ $i }}]" value="{{ $soal->jawaban_c }}" >{{ $soal->jawaban_c }}</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="jawaban[{{ $i }}]" value="{{ $soal->jawaban_d }}" >{{ $soal->jawaban_d }}</label>
      </div>
    </div>
</div>
<?php $i++; ?>
@endforeach
<div class="">
  <a href="{{ url('/placementtest/test') }}" class="btn btn-info">Kembali</a>
  <button type="submit" class="btn btn-success">
      Submit
  </button>
</div>
<br>
</form>
@endsection
