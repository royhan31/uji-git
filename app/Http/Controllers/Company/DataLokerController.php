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
   
    	$datalokers=dataloker::all();
    	return view('layouts.manage.company.dataloker',compact('datalokers'));
    	
    }

    public function create(Request $request)
    {
    	// return redirect('Loker/create');
    	return view('layouts.manage.company.add-loker');
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
