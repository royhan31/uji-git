<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Notification;
use Auth;


class UserController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $notifications = Notification::orderBy('id', 'DESC')->where('company_id',null)->paginate(4);
      $notif = Notification::where('company_id',null)->where('read',false)->get();
      $users = User::orderBy('id','DESC')->get();
      return view('home.admin.user.index', compact('notifications','notif','users'));
    }

    public function update(User $user){
        if ($user->deleted_at == 1) {
          $user->update([
            'api_token' => bcrypt($user->email),
            'deleted_at' => 0
          ]);
        }else {
          if(Auth::guard('web')->user() != null){
            if ($user->id == Auth::guard('web')->user()->id) {
              Auth::guard('web')->logout();
            }
          }
          $user->update([
            'api_token' => null,
            'deleted_at' => 1
          ]);
        }

      return redirect()->back();
    }

    public function show(User $user){
      $notifications = Notification::orderBy('id', 'DESC')->where('company_id',null)->paginate(4);
      $notif = Notification::where('company_id',null)->where('read',false)->get();

      return view('home.admin.user.show', compact('user','notifications','notif'));
    }

    public function confirm(User $user){
      $user->update([
        'status' => true,
      ]);

      return redirect()->route('admin.user')->with('success','Akun berhasil di konfirmasi');
    }
}
