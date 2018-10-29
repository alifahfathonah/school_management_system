<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jenis_soal extends Model
{
  protected $table = 'jenis_soal';
  public $timestamps = false;
  protected $guarded = [];

  public function part()
  {
    return $this->hasMany(part::class, 'jenis_id', 'id_jenis');
  }

  public function quiz()
  {
    return $this->belongsTo(quiz::class, 'quiz_id', 'id_quiz');
  }

}
