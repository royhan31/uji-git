<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $guarded=[];

    public function loker(){
      return $this->hasMany(Loker::class, 'loker_id');
    }

    public function user(){
      return $this->hasMany(User::class, 'user_id');
    }
}
