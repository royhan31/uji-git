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

    //$tour = Tour::with('category')->get();

    return response()->json([
      'message' => 'success',
      'status' => 1,
      'data' => $loker
    ], 200);
  }
}
