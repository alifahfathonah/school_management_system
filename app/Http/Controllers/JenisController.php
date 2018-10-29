<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

use Response;
use Storage;
use Validator;
use App\Models\jenis_soal;
use App\Models\kategori;
use App\Models\part;
use App\Models\User;
use Illuminate\Http\Request;

class JenisController extends Controller
{

    public function store(Request $request) {
      $rules = array(
          'jenis_soal' => 'required',
          'deskripsi' => 'required',
      );
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        $Jenis = new jenis_soal;
        $Jenis->jenis_soal = $request->jenis_soal;
        $Jenis->deskripsi = $request->deskripsi;
        $Jenis->quiz_id = $request->quiz_id;
        $Jenis->save();
        return response()->json($Jenis);
      }
    }


    public function update(Request $request) {
      $rules = array(
        'jenis_soal' => 'required',
        'deskripsi' => 'required',
      );
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        $jenis = jenis_soal::where('id_jenis',$request->id_jenis)->update([
          'jenis_soal'    => $request->jenis_soal,
          'deskripsi'    => $request->deskripsi,
        ]);
        return response()->json($jenis);
      }
    }

    public function destroy(Request $request) {
      $jenis = jenis_soal::where('id_jenis',$request->id_jenis);
      $jenis->delete();
      return response()->json();
    }

    public function part($id) {
        $jenis = part::where('jenis_id', $id)->get();
        if (Auth::user()->level==1) {
          return view('datapart.index', ['id_jenis' => $id])
                      ->with('allpart', $jenis);
        }else{
          return view('datapart.indexguru', ['id_jenis' => $id])
                      ->with('allpart', $jenis);
        }

    }




}
