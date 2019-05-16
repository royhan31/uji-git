<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OlahDataPerusahaanController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      return view('layouts.manage.admin.olahdataperusahaan');
    }
}
