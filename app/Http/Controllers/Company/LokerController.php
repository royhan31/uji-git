<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loker;
use Auth;

class LokerController extends Controller
{
    public function __construct(){
      $this->middleware('auth:company');
    }

    public function index(){
      $lokers = Loker::where('company_id',Auth::user()->id)->get();
      return view('home.comp.loker.index', compact('lokers'));
    }

    public function create(){
      if(Auth::user()->company_number == null || Auth::user()->phone == null || Auth::user()->address == null){
        return back()->with('error','');
      }
      return view('home.comp.loker.create');
    }

    public function store(Request $request){

    }

    public function edit(Request $request, Loker $loker){
      return view('home.comp.loker.edit');
    }

    public function update(Request $request, Loker $loker){

    }

    public function destroy(Request $request, Loker $loker){

    }

    public function show(Request $request, Loker $loker){
      return view('home.comp.loker.detail');
    }
}
