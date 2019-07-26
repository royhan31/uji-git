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
        'message' => $user->name.' Telah mendaftar',
        'subject' => 'Pendaftaran Pengguna'
      ]);
      return response()->json([
        'message' => 'Register Berhasil',
        'status' => true,
        'data' => [
          'id' => $user->id,
          'name' => $user->name,
          'email' => $user->email,
          'api_token' => $user->api_token,
          'address' => $user->address,
          'phone' => $user->phone,
          'status' => $user->status == true ? 'Terkonfirmasi' : 'Belum Terkonfirmasi'
        ]
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
          'data' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'api_token' => $user->api_token,
            'address' => $user->address,
            'phone' => $user->phone,
            'status' => $user->status == true ? 'Terkonfirmasi' : 'Belum Terkonfirmasi'
          ]
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
      if ($user->avatar == 'avatar/default.jpg') {
        $avatar = $request->file('avatar')->store('avatar');
        $user->update([
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'avatar'=> $avatar,
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
        $user->update([
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'avatar'=> $avatar,
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
      $lokers = array();
      $registrations = Registration::where('user_id', $user->id)->get( );
      foreach ($registrations as $registration) {
        if ($registration->status == 0) {
          $status = 'Menunggu';
        }
        if ($registration->status == 1) {
          $status = 'Diterima';
        }
        if ($registration->status == 2) {
          $status = 'Ditolak';
        }
        $lokers[] = [
          'id' => $registration->loker->id,
          'name' => $registration->loker->name,
          'job' => $registration->loker->job,
          'requirements' => $registration->loker->requirements,
          'job' => $registration->loker->job,
          'image' => $registration->loker->image,
          'description' => $registration->loker->description,
          'date_opened' => date('d M Y', strtotime($registration->loker->date_opened)),
          'date_closed' => date('d M Y', strtotime($registration->loker->date_closed)),
          'company' => $registration->loker->company->company,
          'status' => $status,
          'message' => $registration->message,
          'time' => $registration->updated_at->diffForHumans(),
        ];
      }
      return response()->json([
          'message' => 'Berhasil',
          'status' => true,
          'data' => $lokers
      ], 200);
    }
}
