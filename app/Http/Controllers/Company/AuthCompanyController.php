<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;

class AuthCompanyController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest:company')->except('logoutCompany');
  }

  public function showRegisterForm(){
    return view('auth.register');
  }

  public function register(Request $request){
    $this->validate($request, [
      'name' => 'required|string|min:3|max:255',
      'company' => 'required|string|min:5',
      'email' => 'required|string|max:150|unique:companies',
      'password' => 'required|string|min:6|confirmed'
    ]);

    Company::create([
      'name'     => $request->name,
      'company'  => $request->company,
      'email'    => $request->email,
      'password' => bcrypt($request->password),
    ]);

    return redirect()->route('login')->with('success','Berhasil register, Silahkan login');
  }

  public function showLoginForm(){
    return view('auth.login');
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

    if (!Auth::guard('company')->attempt($credential, $request->memeber)) {
      return redirect()->back()
      ->withInput($request->only('email','remember'))
      ->with('error','Login gagal, Silahkan coba lagi');
    }

    return redirect()->route('company.dashboard');
  }

  public function logoutCompany(Request $request)
  {
    Auth::guard('company')->logout();
    return redirect('/');
  }
}
