<?php

namespace App\Http\Controllers;

use App\Models\siswa_baru;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        $Siswa = siswa_baru::all();
        return view('datauser.index', ['allsiswa' => $Siswa]);
    }

    public function destroy($id) {
        $siswa = siswa_baru::where('id_siswabaru',$id);
        $siswa->delete();

        return redirect('admin/user');
    }
}
