<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
  public function __construct(){
    $this->middleware('auth:company');
  }

  public function jobApplicant(){
    return view('home.comp.applicant.jobApplicant');
  }

  public function requirements(){
    return view('home.comp.applicant.requirements');
  }

}
