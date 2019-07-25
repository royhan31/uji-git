<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $guarded=[];

    public function loker(){
      return $this->belongsTo(Loker::class, 'loker_id','id');
    }

    public function user(){
      return $this->belongsTo(User::class, 'user_id','id');
    }
}
