<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use DB;
use Auth;

class Dataloker extends Model
{
   protected $table = 'datalokers';

   protected $filable = [
    'bidang',
    'lok_penempatan',
    'persyaratan',
    'jenis_kel',
    'tgl_daftar',
    'tgl_penutup'
];

   protected $guarded = [];


   protected $hidden = [
   	'password',
   ];
}
