<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
  protected $table = 'quiz';
  public $timestamps = false;
  protected $guarded = [];

  public function soal()
  {
    return $this->hasMany(soal::class, 'quiz_id', 'id_quiz');
  }

  public function kategori()
  {
    return $this->belongsTo(kategori::class, 'kategori_id', 'id_kategori');
  }

}
