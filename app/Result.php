<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  protected $guarded=[];

  public $timestamps = false;

  public function users(){
    return $this->hasMany(User::class,'id', 'user_id');
  }
}
