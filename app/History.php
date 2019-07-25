<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $guarded = [];
  protected $hidden = ['created_at','updated_at','company_id','user_id','admin_id'];
}
