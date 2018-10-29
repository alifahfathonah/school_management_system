<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
  protected $table = 'history';
  public $timestamps = false;
  protected $guarded = [];

  public function siswa_baru()
  {
    return $this->belongsTo(siswa_baru::class, 'siswabaru_id', 'id_siswabaru');
  }

  public function quiz()
  {
    return $this->belongsTo(quiz::class, 'quiz_id', 'id_quiz');
  }

}
