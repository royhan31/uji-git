<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Loker;
use App\Registration;
use App\Notification;
use App\History;
use Auth;
use DB;
use Storage;
class UserController extends Controller
{
    public function register(Request $request){
      $this->validate($request,[
        'name' => 'required|min:5',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6',
        'address' => 'required|min:5',
        'phone' => 'required|string|min:11|max:13|unique:users',
        'nik' => 'required|string|min:16|max:16|unique:users',
        'ktp' => 'required|image|mimes:jpg,jpeg,png,'
      ]);
      $ktp = $request->file('ktp')->store('ktp');
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'api_token' => bcrypt($request->email),
        'address' => $request->address,
        'phone' => $request->phone,
        'nik' => $request->nik,
        'ktp' => $ktp
      ]);

      Notification::create([
        'user_id' => $user->id,
        'message' => $user->name.' Telah mendaftar',
        'subject' => 'Pendaftaran Pengguna'
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
