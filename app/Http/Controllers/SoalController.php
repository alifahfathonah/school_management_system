<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

use Response;
use Storage;
use Validator;
use App\Models\soal;
use App\Models\quiz;
use App\Models\User;
use Illuminate\Http\Request;

class SoalController extends Controller
{

    public function store(Request $request) {
      $rules = array(
          'soal' => 'required',
          'jawaban_a' => 'required',
          'jawaban_b' => 'required',
          'jawaban_c' => 'required',
          'jawaban_d' => 'required',
      );
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        //masukkan data ke database
        if ($request->jawaban_benar == "jawaban_a") {
          $hiks = $request->jawaban_a;
        }else if($request->jawaban_benar == "jawaban_b"){
          $hiks = $request->jawaban_b;
        }else if($request->jawaban_benar == "jawaban_c"){
          $hiks = $request->jawaban_c;
        }else if($request->jawaban_benar == "jawaban_d"){
          $hiks = $request->jawaban_d;
        }

        $Soal = new soal;
        $Soal->soal   = $request->soal;
        $Soal->jawaban_a   = $request->jawaban_a;
        $Soal->jawaban_b   = $request->jawaban_b;
        $Soal->jawaban_c   = $request->jawaban_c;
        $Soal->jawaban_d   = $request->jawaban_d;
        $Soal->jawaban_benar   = $hiks;
        $Soal->part_id   = $request->part_id;
        $Soal->save();
        return response()->json($Soal);
      }
    }


    public function update(Request $request) {
      $rules = array(
          'soal' => 'required',
          'jawaban_a' => 'required',
          'jawaban_b' => 'required',
          'jawaban_c' => 'required',
          'jawaban_d' => 'required',
      );
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        if ($request->jawaban_benar == "jawaban_a") {
          $hiks = $request->jawaban_a;
        }else if($request->jawaban_benar == "jawaban_b"){
          $hiks = $request->jawaban_b;
        }else if($request->jawaban_benar == "jawaban_c"){
          $hiks = $request->jawaban_c;
        }else if($request->jawaban_benar == "jawaban_d"){
          $hiks = $request->jawaban_d;
        }

        $soal = soal::where('id_soal',$request->id_soal)->update([
          'soal'    => $request->soal,
          'jawaban_a'    => $request->jawaban_a,
          'jawaban_b'    => $request->jawaban_b,
          'jawaban_c'    => $request->jawaban_c,
          'jawaban_d'    => $request->jawaban_d,
          'jawaban_benar'    => $hiks,
        ]);
        return response()->json($soal);
      }
    }

    public function destroy(Request $request) {
      $soal = soal::where('id_soal',$request->id_soal);
      $soal->delete();
      return response()->json();
    }
}
