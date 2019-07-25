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

class RegistrationController extends Controller
{
  public function userRegistration(Request $request){
    $this->validate($request,[
      'loker_id' => 'required',
      'data' => 'required|file|mimes:pdf|max:2048'
    ]);
    $auth = User::find(Auth::user()->id);
    $user_id = $auth->id;
    $loker_id = $request->loker_id;
    $user = User::where('id',$user_id)->first();
    $loker = Loker::where('id',$request->loker_id)->first();
    $registration = Registration::where('user_id',$user_id)->where('loker_id',$loker_id)->first();
    if(!$user->status){
      return response()->json([
          'message' => 'Akun anda belum di konfirmasi',
          'status' => false,
      ], 200);
    }
    if($user->job){
      return response()->json([
          'message' => 'Anda telah bekerja',
          'status' => false,
      ], 200);
    }
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
    $data = $request->file('data')->store('persyaratan');
    Registration::create([
      'user_id' => $auth->id,
      'loker_id' => $request->loker_id,
      'message' => 'Pendaftaran loker masih dalam proses',
      'data' => $data
    ]);
    Notification::create([
      'company_id' => $loker->company->id,
      'message' => 'Pendaftaran Loker '.$loker->name,
      'subject' => 'Pendaftaran Loker'
    ]);
    History::create([
      'user_id' => $auth->id,
      'message' => 'Pendaftaran Loker di '.$loker->name
    ]);
    return response()->json([
        'message' => 'Berhasil',
        'status' => true,
    ], 201);
  }
}
