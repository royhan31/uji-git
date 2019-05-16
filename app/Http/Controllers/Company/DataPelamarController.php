<?php

namespace App\Http\Controllers\company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataPelamarController extends Controller
{
    public function __construct(){
      $this->middleware('auth:company');
    }

    public function index(){
      return view('layouts.manage.company.datapelamar');
    }
}
