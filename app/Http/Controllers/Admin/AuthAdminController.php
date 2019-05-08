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
      'email' => 'required|string',
      'password' => 'required|string|min:6'
    ]);

    $credential = [
      'email' => $request->email,
      'password' => $request->password
    ];

    if (!Auth::guard('admin')->attempt($credential, $request->memeber)) {
      return redirect()->back()->withInput($request->only('email','remember'));
    }

    return redirect()->route('admin.dashboard');
  }

  public function logoutAdmin(Request $request)
  {
    Auth::guard('admin')->logout();
    return redirect('/admin/login');
  }
}
