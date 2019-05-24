<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Dataloker;
use DB;

class LokerConroller extends Controller
{
  public function index(){
    $loker = DB::table('datalokers')
    ->join('companies','companies.id','=','datalokers.id_perusahaan')
    ->select('companies.id as company id','companies.name as company name',
    'companies.email as company email','companies.avatar as company image',
    'datalokers.id','datalokers.bidang',
    'datalokers.loc_penempatan','datalokers.persyaratan',
    'datalokers.tgl_daftar','datalokers.tgl_penutup','datalokers.image')
    ->get();

    if ($loker->isEmpty()) {
      return response()->json([
        'message' => 'Not Found',
        'status' => false,
      ], 404);
    }
    return response()->json([
      'message' => 'success',
      'status' => true,
      'data' => $loker
    ], 200);
  }
}
