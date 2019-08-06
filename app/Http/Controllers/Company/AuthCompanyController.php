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
      'name' => 'string|min:3|regex:/^[\pL\s\-]+$/u',
      'company' => 'string|regex:/^[\pL\s\-]+$/u|min:5',
      'email' => 'required|string|max:150|unique:companies',
      'password' => 'required|string|min:6|confirmed'
    ]);

    $company = Company::create([
      'name'     => $request->name,
      'company'  => $request->company,
      'email'    => $request->email,
      'password' => bcrypt($request->password),
    ]);
    $company->sendEmailCompanyVerificationNotification();
    return redirect()->route('login')->with('success','Berhasil register, Silahkan cek email anda');
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
    if (Auth::guard('company')->user()->deleted_at == 1) {
      Auth::guard('company')->logout();
      return redirect()->back()->with('error','Login gagal, Akun anda telah dinonaktifkan oleh Admin');
    }else{
        return redirect()->route('company.dashboard');
    }
  }

  public function logoutCompany(Request $request)
  {
    Auth::guard('company')->logout();
    return redirect('/');
  }


}
