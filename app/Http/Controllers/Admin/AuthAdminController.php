<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest:admin');
  }

  public function showLoginForm()
  {
    return view('authAdmin.login');
  }
}
