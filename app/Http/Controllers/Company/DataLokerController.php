<?php

namespace App\Http\Controllers\Company;

use \App\Dataloker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataLokerController extends Controller
{
    public function __construct(){
      $this->middleware('auth:company');
    }

    public function index(){

    	$lokers=dataloker::all();
    	// return view('layouts.manage.company.dataloker',compact('datalokers'));
      return view('home.comp.loker.index',compact('lokers'));

    }

    public function create(Request $request)
    {
    	return view('home.comp.loker.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bidang' => 'required|min:5',
            'loc_penempatan' => 'required|min:5',
            'persyaratan' => 'required|min:5',
            'jenis_kel' => 'required|min:5',
            'tgl_daftar' => 'required|date(dd-mm-yy)',
            'tgl_penutup' => 'required|date(dd-mm-yy)',
        ]);
        $dataloker = dataloker::create($validatedData);

        return redirect('Loker/create')->with('success', 'data is successfully saved');

}
}
