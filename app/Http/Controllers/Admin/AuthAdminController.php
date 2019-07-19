<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;

class AuthAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest:admin')->except('logoutAdmin');
  }

  public function showLoginForm()
  {
    return view('authAdmin.login');
  }

  public function login(Request $request){
    $this->validate($request, [
      'username' => 'required|string',
      'password' => 'required|string|min:6'
    ]);

    $credential = [
      'username' => $request->username,
      'password' => $request->password
    ];

    if (!Auth::guard('admin')->attempt($credential, $request->memeber)) {
      return redirect()->back()->withInput($request->only('username','remember'))->with('message','Gagal Login, Silahkan coba lagi');
    }

    return redirect()->route('admin.dashboard');
  }

  public function logoutAdmin(Request $request)
  {
    Auth::guard('admin')->logout();
    return redirect('/admin/login');
  }
}
