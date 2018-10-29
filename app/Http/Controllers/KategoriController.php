<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

use Response;
use Storage;
use Validator;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
      $Kategori = kategori::all();
      if (Auth::user()->level==1) {
          return view('datakategori.index', ['allkategori' => $Kategori]);
      }else{
          return view('datakategori.indexguru', ['allkategori' => $Kategori]);
      }

    }

    public function store(Request $request) {
      $rules = array(
          'kategori' => 'required',
          'skor_benar' => 'required',
          'skor_salah' => 'required',
          'waktu' => 'required'
      );
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
          $Kategori = new kategori;
          $Kategori->nama_kategori = $request->kategori;
          $Kategori->skor_benar = $request->skor_benar;
          $Kategori->skor_salah = $request->skor_salah;
          $Kategori->waktu = $request->waktu;
          $Kategori->save();
          return response()->json($Kategori);
      }
    }


    public function update(Request $request) {
      $rules = array(
          'kategori' => 'required',
          'skor_benar' => 'required',
          'skor_salah' => 'required',
          'waktu' => 'required'
      );

      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
      else {
        $Kategori = kategori::where('id_kategori',$request->id_kategori)->update([
          'nama_kategori'    => $request->kategori,
          'skor_benar'      => $request->skor_benar,
          'skor_salah'      => $request->skor_salah,
          'waktu'      => $request->waktu,
        ]);
        return response()->json($Kategori);
      }
    }

    public function destroy(Request $request) {
      $kategori = kategori::where('id_kategori',$request->id_kategori);
      $kategori->delete();
      return response()->json();
    }
}
