<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Loker;

class CompanyController extends Controller
{
    public function index(){
      $company = Company::where('status',1)->get();
      if($company->isEmpty()){
        return response()->json([
          'message' => 'Not Found',
          'status' => false,
          'data' => []
        ], 404);
      }
      return response()->json([
        'message' => 'berhasil',
        'status' => true,
        'data' => $company
      ], 200);
    }

    public function companyLoker($id){
      $company = Company::where('id',$id)->first();
      $lokers = Loker::where('company_id',$id)->get();
      if($company == null){
        return response()->json([
          'message' => 'Not Found',
          'status' => false,
          'data' => []
        ], 404);
      }
      return response()->json([
        'message' => 'berhasil',
        'status' => true,
        'data' => [
          'id' => $company->id,
          'company' => $company->company,
          'email' => $company->email,
          'avatar' => $company->avatar,
          'address' => $company->address,
          'phone' => $company->phone,
          'lokers' => $lokers
        ]
      ], 200);
    }
}
