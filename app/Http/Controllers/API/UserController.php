<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Loker;
use App\Registration;
use Auth;
use DB;
use Storage;
class UserController extends Controller
{
    public function register(Request $request){
      $this->validate($request,[
        'name' => 'required|min:5',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6'
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'api_token' => bcrypt($request->email)
      ]);

      return response()->json([
        'message' => 'Register Berhasil',
        'status' => true,
        'data' => $user
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
      if ($user->api_token == null) {
        return response()->json([
            'message' => 'Akun anda telah dinonaktifkan oleh admin',
            'status' => false,
        ], 200);
      }
      return response()->json([
          'message' => 'Berhasil',
          'status' => true,
          'data' => $user
      ], 200);
    }

    public function userRegistration(Request $request){
      $this->validate($request,[
        'loker_id' => 'required',
        'data' => 'required|image|mimes:pdf'
      ]);
      $auth = User::find(Auth::user()->id);
      $user_id = $auth->id;
      $loker_id = $request->loker_id;
      $user = User::where('id',$user_id)->first();
      $loker = Loker::where('id',$request->loker_id)->first();
      $registration = Registration::where('user_id',$user_id)->where('loker_id',$loker_id)->first();
      if($user->status == 0){
        return response()->json([
            'message' => 'Akun anda belum di konvirmasi',
            'status' => false,
        ], 200);
      }
      elseif($user == null){
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
      $data = $request->file('data')->store('persyaratan');
      Registration::create([
        'user_id' => $request->user_id,
        'loker_id' => $request->loker_id,
        'data' => $data
      ]);

      return response()->json([
          'message' => 'Berhasil',
          'status' => true,
          'data' => $auth->id
      ], 201);
    }

    public function show(){
      $user = User::find(Auth::user()->id);
      return response()->json([
        'message' => 'Berhasil',
        'status' => true,
        'data' => $user
      ]);
    }

    public function update(Request $request){
      $user = User::find(Auth::user()->id);
      //$email = User::where('email',$request->email)->first();
      //$phone = User::where('phone',$request->phone)->first();
      // if ($email != null) {
      //   return response()->json([
      //     'message' => 'Email telah digunakan',
      //     'status' => false
      //   ]);
      // }elseif($phone != null) {
      //   return response()->json([
      //     'message' => 'Nomor Telephon telah digunakan',
      //     'status' => false
      //   ]);
      //}
      if ($user->avatar == 'avatar/default.jpg') {
        $avatar = $request->file('avatar')->store('avatar');
        if ($user->nik != null || $user->ktp != null) {
          $user->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar'=> $avatar
          ]);

          return response()->json([
            'message' => 'Update berhasil',
            'status' => true,
            'data' => $user
          ]);
        }
        $ktp = $request->file('ktp')->store('ktp');
        $user->update([
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'avatar'=> $avatar,
          'nik' => $request->nik,
          'ktp' => $ktp
        ]);
        return response()->json([
          'message' => 'Update berhasil',
          'status' => true,
          'data' => $user
        ]);
      }else {
        $avatar_path = $user->avatar;
        if (Storage::exists($avatar_path)) {
            Storage::delete($avatar_path);
        }
        $ktp = $request->file('ktp')->store('ktp');
        $user->update([
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'avatar'=> $avatar,
          'nik' => $request->nik,
          'ktp' => $ktp
        ]);
        return response()->json([
          'message' => 'Update berhasil',
          'status' => true,
          'data' => $user
        ]);
      }
    }

    public function logout(){
      Auth::guard('web')->logout();
      return response()->json([
        'message' => 'Berhasil',
        'status' => true
      ]);
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
