<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
  protected $table = 'level';
  public $timestamps = false;
  protected $guarded = [];

  // public function kelas()
  // {
  //   $this->hasOne(kelas::class, 'kelas_id', 'id_kelas');
  // }

  public function user()
  {
    return $this->hasMany(User::class);
  }

}
