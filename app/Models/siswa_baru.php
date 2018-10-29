<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa_baru extends Model
{
  protected $table = 'siswa_baru';
  public $timestamps = false;
  protected $guarded = [];

  /*public function sumber()
  {
    return $this->hasMany(sumber::class);
  }*/

}
