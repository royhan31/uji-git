<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $guarded = [];
    protected $hidden = [
        'created_at','updated_at','company_id','slug'
    ];

    public function company(){
      return $this->belongsTo(Company::class, 'company_id','id');
    }
    public function registrations(){
      return $this->hasMany(Registration::class, 'loker_id','id');
    }
}
