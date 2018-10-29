<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
  protected $table = 'kategori';
  public $timestamps = false;
  protected $guarded = [];

  public function quiz()
  {
    return $this->hasMany(quiz::class, 'kategori_id', 'id_kategori');
  }

}
