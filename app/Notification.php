<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at','company_id','user_id','admin_id'];

    public function company(){
      return $this->belongsTo(Company::class);
    }
}
