<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Loker;
use App\Registration;
use Auth;
use DB;
class UserController extends Controller
{
    public function register(Request $request){
      $this->validate($request,[
        'name' => 'required|min:5',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6'
      ]);

      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'api_token' => bcrypt($request->email)
      ]);

      return response()->json([
        'message' => 'Register Berhasil',
        'status' => true
      ], 201);
    }

    public function login(Request $request){

      $credential =[
          'email' => $request->email,
          'password' => $request->password,
      ];

      if(!Auth::guard('web')->attempt($credential, $request->member))
      {
          return response()->json([
              'message' => 'Gagal Login',
              'status' => false
          ], 200);
      }

      $user = User::find(Auth::user()->id);
      return response()->json([
          'message' => 'Berhasil',
          'status' => true,
          'data' => $user
      ], 200);
    }

    public function userRegistration(Request $request){
      $this->validate($request,[
        'loker_id' => 'required'
      ]);
      $auth = User::find(Auth::user()->id);
      $user_id = $auth->id;
      $loker_id = $request->loker_id;
      $user = User::where('id',$user_id)->first();
      $loker = Loker::where('id',$request->loker_id)->first();
      $registration = Registration::where('user_id',$user_id)->where('loker_id',$loker_id)->first();
      // if($user->status == 0){
      //   return response()->json([
      //       'message' => 'Akun anda belum di konvirmasi',
      //       'status' => false,
      //   ], 200);
      // }
      if($user == null){
        return response()->json([
            'message' => 'user tidak ada',
            'status' => false,
        ], 200);
      }elseif ($loker == null) {
        return response()->json([
            'message' => 'loker tidak ada',
            'status' => false,
        ], 200);
      }
      elseif (!$registration == null) {
        return response()->json([
            'message' => 'Anda sudah mendaftar pada loker ini',
            'status' => false,
        ], 200);
      }
      //
      Registration::create([
        'user_id' => $request->user_id,
        'loker_id' => $request->loker_id
      ]);

      return response()->json([
          'message' => 'Berhasil',
          'status' => true,
          'data' => $auth->id
      ], 201);
    }

    public function userLoker(){
      $user = User::find(Auth::user()->id);
      $loker = DB::table('registrations')
              ->join('lokers','lokers.id','=','registrations.loker_id')
              ->join('companies','companies.id','=','lokers.company_id')
              ->select('lokers.name','lokers.job','lokers.description'
              ,'lokers.date_opened','lokers.date_closed','lokers.image','companies.company as company')
              ->where('registrations.user_id',$user->id)
              ->get();
      return response()->json([
          'message' => 'Berhasil',
          'status' => true,
          'loker' => $loker
      ], 201);
    }
}
