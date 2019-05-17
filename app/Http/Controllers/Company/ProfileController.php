<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct(){
      $this->middleware('auth:company');
    }

    public function index(){
      return view('layouts.manage.company.profile');
    }
}
