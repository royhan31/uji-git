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
      $notifications = Notification::orderBy('id','DESC')->where('admin_id',Auth::guard('admin')->user()->id)->paginate('4');
      $notif = Notification::where('status',0)->get();
      $users = User::orderBy('id','DESC')->get();
      return view('home.admin.user', compact('notifications','notif','users'));
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
}
