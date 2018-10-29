<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class part extends Model
{
  protected $table = 'part';
  public $timestamps = false;
  protected $guarded = [];

  public function soal()
  {
    return $this->hasMany(soal::class, 'part_id', 'id_part');
  }

  public function jenis_soal()
  {
    return $this->belongsTo(jenis_soal::class, 'jenis_id', 'id_jenis');
  }

}
