<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

use Response;
use Storage;
use Validator;
use App\Models\kategori;
use App\Models\jenis_soal;
use App\Models\soal;
use App\Models\quiz;
use App\Models\part;
use App\Models\history;
use App\Models\siswa_baru;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
      $Kategori = kategori::all();
      return view('test.index', ['allkategori' => $Kategori]);
    }

    public function soal($id) {
        $Kategori = kategori::where('id_kategori', $id)->first();
        $quiz = quiz::where('kategori_id', $id)
                      ->where('is_active', 1)
                      ->get();

        if ($quiz->count()==0) {
            return view('test.soal_kosong', ['Kategori' => $Kategori]);
        }else{
          for ($o=0; $o < $quiz->count(); $o++) {
              $random_quiz[] = $quiz[$o]->id_quiz;
          }
          $quiz_id  =  array_rand($random_quiz,1);
          $quiz_fix = quiz::where('id_quiz', $random_quiz[$quiz_id])->first();
          $Jenis = jenis_soal::where('quiz_id', $quiz_fix->id_quiz)->get();

            if ($Jenis->count()==0) {
                return view('test.soal_kosong', ['Kategori' => $Kategori]);
            }else{
              for ($i=0; $i < $Jenis->count(); $i++) {
                $Part[] = part::where('jenis_id', $Jenis[$i]->id_jenis)->get();
                $Parti = part::where('jenis_id', $Jenis[$i]->id_jenis)->get();
              }

              if ($Parti->count()==0) {
                  return view('test.soal_kosong', ['Kategori' => $Kategori]);
              }else{
                for ($i=0; $i < $Jenis->count(); $i++) {
                  for ($k=0; $k < $Part[$i]->count(); $k++) {
                    $Soal[] = soal::where('part_id', $Part[$i][$k]->id_part)->get();
                    $Soali = soal::where('part_id', $Part[$i][$k]->id_part)->get();
                  }
                }

                if ($Soali->count()==0) {
                    return view('test.soal_kosong', ['Kategori' => $Kategori]);
                }else{
                  return view('test.soal', ['alljenis' => $Jenis])
                              ->with('Kategori', $Kategori)
                              ->with('allPart', $Part)
                              ->with('allSoal', $Soal)
                              ->with('quiz', $quiz_fix)
                              ->with('id', $id);

              }
            }
          }
        }
    }

    public function store(Request $request) {
        $kategori = kategori::where('id_kategori', $request->id_kategori)->first();
        $quiz = quiz::where('id_quiz', $request->id_quiz)->first();
        $Jenis = jenis_soal::where('quiz_id', $quiz->id_quiz)->get();

        for ($i=0; $i < $Jenis->count(); $i++) {
            $Part[] = part::where('jenis_id', $Jenis[$i]->id_jenis)->get();
              for ($k=0; $k < $Part[$i]->count(); $k++) {
                $Soal[] = soal::where('part_id', $Part[$i][$k]->id_part)->get();
                for ($m=0; $m < $Soal[$k]->count(); $m++) {
                $jawabanbenar[] = $Soal[$k][$m]->jawaban_benar;
                }
              }
        }

        $nilai = 0;
        $id_siswa = siswa_baru::where('nama', Auth::user()->name)->first();

        $arrlength = count($request->jawaban);
        for($i = 0; $i < $arrlength; $i++) {
            if($request->jawaban[$i] == $jawabanbenar[$i]){
                $nilai = $nilai + $kategori->skor_benar;

            }else{
                $nilai = $nilai - $kategori->skor_salah;
            }
        }

        $benar = 0;
        $salah = 0;
        if ($nilai==0) {
          $benar = 0;
          $salah = $arrlength;
        }else{
          $benar_sementara = $nilai / ($kategori->skor_benar);
          //$benar_sementara = $jumlah_soal - $arrlength;
          $benar = ceil($benar_sementara);
          $salah = $arrlength - $benar;
        }


        $history = new history;
        $history->benar   = $benar;
        $history->salah   = $salah;
        $history->total_skor   = $nilai;
        $history->siswabaru_id   = $id_siswa->id_siswabaru;
        $history->quiz_id  = $request->id_quiz;
        $history->save();

        return response()->json([
         'message'   => 'Audio Upload Successfully',
         'kategori'   => $kategori,
         'quiz'   => $quiz,
         'jenis'   => $Jenis,
         'part'   => $Part,
         'soal'   => $Soal,
         'jawaban'   => $jawabanbenar
        ]);
    }

    public function history() {
      $History = history::all();
      if (Auth::user()->level==1) {
          return view('datahistory.index', ['allhistory' => $History]);
      }else{
          return view('datahistory.indexguru', ['allhistory' => $History]);
      }

    }
}
