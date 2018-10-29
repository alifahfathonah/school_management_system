<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\quiz;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

      public function index(Request $request){
        $level = Auth::user()->level;

        switch ($level) {
          case "1":
              return $this->dashboardLevel1(); //Admin
              break;
          case "2":
              return $this->dashboardLevel2(); //Siswa
              break;
          case "3":
              return $this->dashboardLevel3(); //Guru
              break;
          case "4":
              return $this->dashboardLevel4(); //Orang Tua
              break;
          case "5":
              return $this->dashboardLevel5(); //Staff
              break;
          default:
              echo "Dashboard";
        }
      }

      protected function dashBoardLevel1(){
        return view('beranda.admin');
      }

      protected function dashBoardLevel2(){
        return view('beranda.admin');
      }

      protected function dashBoardLevel3(){
        return view('beranda.admin');
      }

      protected function dashBoardLevel4(){
        //return view('beranda.guru_piket');
      }

      protected function dashBoardLevel5(){
        //return view('beranda.siswa');
      }
}
