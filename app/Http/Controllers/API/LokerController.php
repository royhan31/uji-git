<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loker;
use DB;
class LokerController extends Controller
{
  public function index(){
    $lokers = DB::table('lokers')
              ->join('companies','companies.id','=','lokers.company_id')
              ->select('lokers.id','lokers.name','lokers.job',
              'lokers.description','lokers.date_opened','lokers.date_closed','companies.company as company')
              ->orderBy('id','DESC')
              ->get();
    //$loker = Loker::all();
    if ($lokers->isEmpty()) {
      return response()->json([
        'message' => 'Not Found',
        'status' => false,
        'data' => []
      ], 404);
    }
    return response()->json([
      'message' => 'success',
      'status' => true,
      'data' => $lokers
    ], 200);
  }

  public function details($id){
    $loker = DB::table('lokers')
              ->join('companies','companies.id','=','lokers.company_id')
              ->select('lokers.id','lokers.name','lokers.job','lokers.image',
              'lokers.description','lokers.date_opened','lokers.date_closed','companies.company as company')
              ->where('lokers.id',$id)
              ->first();

    if ($loker == null) {
      return response()->json([
        'message' => 'Not Found',
        'status' => false,
        'data' => []
      ], 404);
    }
    return response()->json([
      'message' => 'success',
      'status' => true,
      'data' => [
        'id' => $loker->id,
        'name' => $loker->name,
        'job' => $loker->job,
        'description' => $loker->description,
        'image' => $loker->image,
        'date_opened' => date('d M Y', strtotime($loker->date_opened)),
        'date_closed' => date('d M Y', strtotime($loker->date_closed)),
        'company' => $loker->company
      ]
    ], 200);
  }
}
