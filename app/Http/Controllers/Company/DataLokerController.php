<?php

namespace App\Http\Controllers\Company;

use \App\Dataloker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
        //dd($request->all());
        $daftar = strtotime($request->tgl_daftar);
        $penutup = strtotime($request->tgl_penutup);
        $image = $request->file('image')->store('loker');
        $company_id = Auth::user()->id;
        if ($request->man) {
          if ($request->woman) {
            Dataloker::create([
              'id_perusahaan' => $company_id,
              'bidang' => $request->bidang,
              'loc_penempatan' => $request->penempatan,
              'persyaratan' => $request->persyaratan,
              'jenis_kel' => $request->man ." / ". $request->woman,
              'tgl_daftar' => date('Y-m-d', $daftar),
              'tgl_penutup' => date('Y-m-d', $penutup),
              'image' => $image
            ]);
          }else{
          Dataloker::create([
            'id_perusahaan' => $company_id,
            'bidang' => $request->bidang,
            'loc_penempatan' => $request->penempatan,
            'persyaratan' => $request->persyaratan,
            'jenis_kel' => $request->man,
            'tgl_daftar' => date('Y-m-d', $daftar),
            'tgl_penutup' => date('Y-m-d', $penutup),
            'image' => $image
          ]);
        }
        }else {
          Dataloker::create([
            'id_perusahaan' => $company_id,
            'bidang' => $request->bidang,
            'loc_penempatan' => $request->penempatan,
            'persyaratan' => $request->persyaratan,
            'jenis_kel' => $request->woman,
            'tgl_daftar' => date('Y-m-d', $daftar),
            'tgl_penutup' => date('Y-m-d', $penutup),
            'image' => $image
          ]);
        }

        return redirect()->route('company.dashboard.dataloker');
    }
}
