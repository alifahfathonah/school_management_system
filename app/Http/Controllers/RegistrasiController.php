<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;

use Response;
use Storage;
use Validator;
use App\Models\siswa_baru;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index() {
        return view('registrasi');
    }

    public function store(Request $request) {
        //dd($request);
        //masukkan data ke database
        $Siswa = new siswa_baru;
        $Siswa->nama   = $request->nama;
        $Siswa->nama_ayah   = $request->nama_ayah;
        $Siswa->alamat   = $request->alamat;
        $Siswa->jk   = $request->jenis_kelamin;
        $Siswa->sekolah   = $request->sekolah;
        $Siswa->pekerjaan   = $request->pekerjaan;
        $Siswa->no_hp   = $request->no_hp;
        $Siswa->email   = $request->email;
        $Siswa->password   = $request->password;
        $Siswa->save();

        $username_pengguna = User::select('username')->where('username', $request->email)->first();
        if ($username_pengguna == null) {
          $user = new User;
          $user->name   = $request->nama;
          $user->username   = $request->email;
          $user->password   = bcrypt($request->password);
          $user->level   = 2;
          $user->save();
        }

        return redirect('login');

    }


}
