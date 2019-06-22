<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $guarded = [];
    protected $hidden = [
        'created_at','updated_at','company_id','slug'
    ];

    public function registration(){
      return $this->hasMany(Registration::class);
    }
}
