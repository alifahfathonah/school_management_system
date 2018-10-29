<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('/registrasi', 'RegistrasiController@index');
Route::post('/registrasi', 'RegistrasiController@store');


Route::group(['middleware' => ['web']], function()
{
  Auth::routes();
  Route::get('/', function () {
      return view('halamanutama');
  });
  Route::get('/admin', array('as'=>'admin', 'uses'=> 'AdminController@index'));
});


//Route as admin
Route::group(['middleware' => ['web','auth','level:1']], function()
{
  Route::group(['prefix' => 'beranda'], function(){
    Route::get('/admin', 'AdminController@index');
  });

  Route::get('/admin/history', 'TestController@history');

  Route::group(['prefix' => 'admin/user'], function(){
    Route::get('/', 'UserController@index');
    Route::get('/{id}/edit', 'UserController@edit');
    Route::put('/{id}', 'UserController@update');
    Route::delete('{id}', 'UserController@destroy');
  });

  Route::group(['prefix' => 'admin/kategori'], function(){
    Route::get('/', 'KategoriController@index');
    Route::post('/tambah', 'KategoriController@store');
    Route::post('/edit', 'KategoriController@update');
    Route::post('/hapus', 'KategoriController@destroy');
  });

  Route::group(['prefix' => 'admin/quiz'], function(){
    Route::get('/', 'QuizController@index');
    Route::post('/tambah', 'QuizController@store');
    Route::post('/edit', 'QuizController@update');
    Route::post('/hapus', 'QuizController@destroy');
    Route::post('/enable', 'QuizController@enable');
    Route::post('/disable', 'QuizController@disable');
    Route::get('/jenis/{id}', 'QuizController@jenis');
  });

  Route::group(['prefix' => 'admin/jenis'], function(){
    Route::post('/tambah', 'JenisController@store');
    Route::post('/edit', 'JenisController@update');
    Route::post('/hapus', 'JenisController@destroy');
    Route::get('/part/{id}', 'JenisController@part');
  });

  Route::group(['prefix' => 'admin/part'], function(){
    Route::post('/tambah', 'PartController@store');
    Route::post('/edit', 'PartController@update');
    Route::post('/hapus', 'PartController@destroy');
    Route::get('/soal/{id}', 'PartController@soal');
  });

  Route::group(['prefix' => 'admin/soal'], function(){
    Route::post('/tambah', 'SoalController@store');
    Route::post('/edit', 'SoalController@update');
    Route::post('/hapus', 'SoalController@destroy');
  });
});


//Route as Wali Kelas
Route::group(['middleware' => ['web','auth','level:2']], function()
{
  Route::group(['prefix' => 'beranda'], function(){
    Route::get('/siswa', 'AdminController@index');
  });

  Route::group(['prefix' => 'siswa'], function(){
    Route::get('/test', 'TestController@index');
    Route::get('/{id}/soal', 'TestController@soal');
    Route::post('/', 'TestController@store');
  });
});

//Guru
Route::group(['middleware' => ['web','auth','level:3']], function()
{

  Route::group(['prefix' => 'beranda'], function(){
    Route::get('/guru', 'AdminController@index');
  });

  Route::get('/guru/history', 'TestController@history');

  Route::group(['prefix' => 'guru/kategori'], function(){
    Route::get('/', 'KategoriController@index');
    Route::post('/tambah', 'KategoriController@store');
    Route::post('/edit', 'KategoriController@update');
    Route::post('/hapus', 'KategoriController@destroy');
  });

  Route::group(['prefix' => 'guru/quiz'], function(){
    Route::get('/', 'QuizController@index');
    Route::post('/tambah', 'QuizController@store');
    Route::post('/edit', 'QuizController@update');
    Route::post('/hapus', 'QuizController@destroy');
    Route::post('/enable', 'QuizController@enable');
    Route::post('/disable', 'QuizController@disable');
    Route::get('/jenis/{id}', 'QuizController@jenis');
  });

  Route::group(['prefix' => 'guru/jenis'], function(){
    Route::post('/tambah', 'JenisController@store');
    Route::post('/edit', 'JenisController@update');
    Route::post('/hapus', 'JenisController@destroy');
    Route::get('/part/{id}', 'JenisController@part');
  });

  Route::group(['prefix' => 'guru/part'], function(){
    Route::post('/tambah', 'PartController@store');
    Route::post('/edit', 'PartController@update');
    Route::post('/hapus', 'PartController@destroy');
    Route::get('/soal/{id}', 'PartController@soal');
  });

  Route::group(['prefix' => 'guru/soal'], function(){
    Route::post('/tambah', 'SoalController@store');
    Route::post('/edit', 'SoalController@update');
    Route::post('/hapus', 'SoalController@destroy');
  });

});

//Route as Guru Piket
Route::group(['middleware' => ['web','auth','level:4']], function()
{


});

//Route as Siswa
Route::group(['middleware' => ['web','auth','level:5']], function()
{
;
});
