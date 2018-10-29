<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

use Response;
use Storage;
use Validator;
use App\Models\quiz;
use App\Models\soal;
use App\Models\User;
use App\Models\history;
use App\Models\siswa_baru;
use Illuminate\Http\Request;

class PlacementTestController extends Controller
{
    public function index() {
      $Quiz = quiz::all();
      return view('placementtest.test', ['allquiz' => $Quiz]);
    }

    public function history() {
      $id_siswa = siswa_baru::where('nama', Auth::user()->name)->first();
      //dd($id_siswa->id_siswabaru);
      $History = history::where('siswabaru_id',$id_siswa->id_siswabaru)->get();

      return view('placementtest.history', ['allhistory' => $History]);
    }

    public function rank() {
      //$id_siswa = siswa_baru::where('nama', Auth::user()->name)->first();
      //dd($id_siswa->id_siswabaru);
      //$History = history::where('siswabaru_id',$id_siswa->id_siswabaru)->get();
      $allsiswa = siswa_baru::all();

      dd($allsiswa);
      return view('placementtest.rank');
    }

    public function soal($id) {
        $Soal = soal::where('quiz_id', $id)->get();
        return view('placementtest.quiz', ['allsoal' => $Soal])
                    ->with('id', $id);
    }

    public function store(Request $request) {
        //masukkan data ke database
        //dd($request);
        $quiz = quiz::where('id_quiz', $request->id)->first();

        $nilai = 0;

        $soal = soal::where('quiz_id', $request->id)->get();
        $id_siswa = siswa_baru::where('nama', Auth::user()->name)->first();

        //dd($soal[0]->jawaban_benar);
        for ($i=1; $i <= $soal->count(); $i++) {
            if($request->jawaban[$i] == $soal[$i-1]->jawaban_benar){
                $nilai = $nilai + $quiz->skor_benar;

            }else{
                $nilai = $nilai + 0;
            }
        }
        $benar = 0;
        $salah = 0;
        $benar = $nilai / $soal->count();
        $salah = $soal->count() - $benar;

        $history = new history;
        $history->benar   = $benar;
        $history->salah   = $salah;
        $history->total_skor   = $nilai;
        $history->siswabaru_id   = $id_siswa->id_siswabaru;
        $history->quiz_id   = $request->id;
        $history->save();
        return redirect('placementtest/history');
    }


    /*public function create() {

      return view('dataquiz.create');
    }

    public function store(Request $request) {
        //masukkan data ke database
        $Quiz = new quiz;
        $Quiz->topic   = $request->topic;
        $Quiz->skor_benar   = $request->skor_benar;
        $Quiz->skor_salah   = $request->skor_salah;
        $Quiz->waktu   = $request->waktu;
        $Quiz->save();

        return redirect('admin/quiz');
    }*/



}
