<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
  protected $table = 'soal';
  public $timestamps = false;
  protected $guarded = [];

  public function part()
  {
    return $this->belongsTo(part::class, 'part_id', 'id_part');
  }

}
