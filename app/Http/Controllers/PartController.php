<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

use Response;
use Storage;
use Validator;
use App\Models\jenis_soal;
use App\Models\part;
use App\Models\soal;
use App\Models\User;
use Illuminate\Http\Request;

class PartController extends Controller
{

  public function store(Request $request) {
      $file = $request->file('audio_file');
      $name = $file->getClientOriginalName();
      $extention = $file->getClientOriginalExtension();
      $filename = str_slug($name) . '.' . $extention;
      $location = public_path('audio/' . $filename);
      $file->move($location,$filename);

      $par_soal=$request->part_soal;
      $deskripsi=$request->deskripsi;
      $jenis=$request->id_jenis;

      $Kategori = new part;
      $Kategori->nama_part = $par_soal;
      $Kategori->description = $deskripsi;
      $Kategori->audio = $filename;
      $Kategori->jenis_id = $jenis;
      $Kategori->save();
      return response()->json([
       'message'   => 'Audio Upload Successfully'
      ]);
  }

  public function update(Request $request) {
      $par_soal=$request->part_soal_update;
      $deskripsi=$request->deskripsi_update;
      $part=$request->id_part;

      if ($request->check_audio != "ya") {
        $part = part::where('id_part',$part)->update([
          'nama_part'    => $par_soal,
          'description'    => $deskripsi,
        ]);
      }else{
        $part_h = part::where('id_part',$part)->first();
        unlink(public_path('audio/' . $part_h->audio . '/' . $part_h->audio));

        $file = $request->file('audio');
        $name = $file->getClientOriginalName();
        $extention = $file->getClientOriginalExtension();
        $filename = str_slug($name) . '.' . $extention;
        $location = public_path('audio/' . $filename);
        $file->move($location,$filename);

        $part = part::where('id_part',$part)->update([
          'nama_part'    => $par_soal,
          'description'    => $deskripsi,
          'audio'    => $filename,
        ]);
      }

      return response()->json([
       'message'   => 'Audio Upload Successfully',
       'hihi'   => $request->all(),
      ]);
    }

  public function destroy(Request $request) {
    $part = part::where('id_part',$request->id_part)->first();
    unlink(public_path('audio/' . $part->audio . '/' . $part->audio));

    $part_delete = part::where('id_part',$request->id_part);
    $part_delete->delete();
    return response()->json();
  }

    public function soal($id) {
        $Soal = soal::where('part_id', $id)->get();
        if (Auth::user()->level==1) {
          return view('datasoal.index', ['id_part' => $id])
                      ->with('allsoal', $Soal);
        }else{
          return view('datasoal.indexguru', ['id_part' => $id])
                      ->with('allsoal', $Soal);
        }

    }




}
