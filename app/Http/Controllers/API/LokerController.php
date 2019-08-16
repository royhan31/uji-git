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
              ->select('lokers.id','lokers.name','lokers.job','lokers.requirements',
              'lokers.description','lokers.date_opened','lokers.date_closed','lokers.image','companies.company as company')
              ->orderBy('id','DESC')
              ->where('companies.deleted_at', 0)
              ->get();
    return response()->json([
      'message' => 'success',
      'status' => true,
      'data' => $lokers
    ], 200);
  }

  public function details($id){
    $loker = Loker::find($id);
    return response()->json([
      'message' => 'success',
      'status' => true,
      'data' => [
        'id' => $loker->id,
        'name' => $loker->name,
        'job' => $loker->job,
        'requirements' => $loker->requirements,
        'description' => $loker->description,
        'image' => $loker->image,
        'date_opened' => date('d M Y', strtotime($loker->date_opened)),
        'date_closed' => date('d M Y', strtotime($loker->date_closed)),
        'company' => $loker->company->company,
        'email' => $loker->company->email,
        'avatar' => $loker->company->avatar,
        'address' => $loker->company->address,
        'phone' => $loker->company->phone,
      ]
    ], 200);
  }

  public function search(Request $request){
    $search = $request->search;
    $lokers = DB::table('lokers')
                ->join('companies','companies.id','=','lokers.company_id')
                ->select('lokers.id','lokers.name','lokers.job','lokers.requirements','lokers.description',
                'lokers.image','lokers.date_opened','lokers.date_closed','companies.company','companies.email',
                'companies.avatar','companies.address','companies.phone')
                ->where('lokers.job', 'LIKE', '%' . $search . '%')
                ->orWhere('lokers.name', 'LIKE', '%' . $search . '%')
                ->orWhere('companies.company', 'LIKE', '%' . $search . '%')
                ->get();
    $result = array();
    foreach ($lokers as $loker) {
      $result[] = [
        'id' => $loker->id,
        'name' => $loker->name,
        'job' => $loker->job,
        'requirements' => $loker->requirements,
        'description' => $loker->description,
        'image' => $loker->image,
        'date_opened' => date('d M Y', strtotime($loker->date_opened)),
        'date_closed' => date('d M Y', strtotime($loker->date_closed)),
        'company' => $loker->company,
        'email' => $loker->email,
        'avatar' => $loker->avatar,
        'address' => $loker->address,
        'phone' => $loker->phone,
      ];
    }
    return response()->json([
      'message' => 'Berhasil',
      'status' => true,
      'data' => $result
    ]);
  }

  public function job($job){
    $lokers = Loker::where('job',$job)->get();
    $result = array();
    foreach ($lokers as $loker) {
      $result[] = [
        'id' => $loker->id,
        'name' => $loker->name,
        'job' => $loker->job,
        'requirements' => $loker->requirements,
        'description' => $loker->description,
        'image' => $loker->image,
        'date_opened' => date('d M Y', strtotime($loker->date_opened)),
        'date_closed' => date('d M Y', strtotime($loker->date_closed)),
        'company' => $loker->company->company,
        'email' => $loker->company->email,
        'avatar' => $loker->company->avatar,
        'address' => $loker->company->address,
        'phone' => $loker->company->phone,
      ];
    }
    return response()->json([
      'message' => 'Berhasil',
      'status' => true,
      'data' => $result
    ]);
  }
}
