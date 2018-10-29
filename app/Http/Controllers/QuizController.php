<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

use Response;
use Storage;
use Validator;
use App\Models\quiz;
use App\Models\kategori;
use App\Models\jenis_soal;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
      $quiz = quiz::all();
      $kategori = kategori::all();
      if (Auth::user()->level==1) {
        return view('dataquiz.index', ['allquiz' => $quiz])
                    ->with('allkategori', $kategori);
      }else{
        return view('dataquiz.indexguru', ['allquiz' => $quiz])
                    ->with('allkategori', $kategori);
      }

    }

    public function store(Request $request) {
      $rules = array(
          'nama_quiz' => 'required'
      );
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        $Quiz = new quiz;
        $Quiz->nama_quiz = $request->nama_quiz;
        $Quiz->level = $request->level;
        $Quiz->is_active = 1;
        $Quiz->kategori_id = $request->kategori_id;
        $Quiz->save();
        return response()->json($Quiz);
      }
    }


    public function update(Request $request) {
      $rules = array(
          'nama_quiz' => 'required'
      );
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        $Quiz = quiz::where('id_quiz',$request->id_quiz)->update([
          'nama_quiz'    => $request->nama_quiz,
          'level'    => $request->level,
          'kategori_id'  => $request->kategori_id,
        ]);
        return response()->json($Quiz);
      }
    }

    public function disable(Request $request) {
        $Quiz = quiz::where('id_quiz',$request->id_quiz)->update([
          'is_active'    => 0
        ]);
        return response()->json($request);
    }

    public function enable(Request $request) {
        $Quiz = quiz::where('id_quiz',$request->id_quiz)->update([
          'is_active'    => 1
        ]);
        return response()->json($request);
    }

    public function destroy(Request $request) {
      $quiz = quiz::where('id_quiz',$request->id_quiz);
      $quiz->delete();
      return response()->json();
    }

    public function jenis($id) {
      $jenis = jenis_soal::where('quiz_id',$id)->get();
      if (Auth::user()->level==1) {
        return view('datajenis.index', ['alljenis' => $jenis])
                    ->with('id_quiz', $id);
      }else{
        return view('datajenis.indexguru', ['alljenis' => $jenis])
                    ->with('id_quiz', $id);
      }
    }
}
