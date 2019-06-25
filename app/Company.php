<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token','created_at'
        ,'updated_at','company_number','status','email_verified_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lokers(){
      return $this->hasMany(Loker::class);
    }
}
