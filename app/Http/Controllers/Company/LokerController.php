<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loker;
use Auth;
use DateTime;
use Storage;

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
      dd($request->all());
      $this->validate($request,[
        'name' => 'required|min:6',
        'description' => 'required|min:10',
        'image' => 'image|mimes:jpg,jpeg,png|max:2000'
      ]);

      $now = now()->format('Y-m-d');
      $date_opened = strtotime($request->date_opened);
      $date_closed = strtotime($request->date_closed);
      $opened = date('Y-m-d', $date_opened);
      $closed = date('Y-m-d', $date_closed);
      $start_date = new DateTime($now);
      $end_date_opened = new DateTime($opened);
      $end_date_closed = new DateTime($closed);
      $interval_opened = $start_date->diff($end_date_opened);
      $interval_closed = $end_date_opened->diff($end_date_closed);
      $image = $request->file('image')->store('loker');
      //dd($interval_opened->format('%r%a'));
      if($interval_opened->format('%r%a') < 0){
        return back()->with('errorOpened','Tanggal yang anda pilih salah')
        ->withInput($request->only('name','job','description','date_opened','date_closed'));
      }elseif($interval_closed->format('%r%a') < 15){
        return back()->with('errorClosed','Tanggal yang anda pilih minimal 14 hari setelah tanggal buka')
        ->withInput($request->only('name','job','description','date_opened','date_closed'));
      }else{
        Loker::create([
          'name' => $request->name,
          'slug' => str_slug($request->name),
          'job' => $request->job,
          'description' => $request->description,
          'date_opened' => $opened,
          'date_closed' => $closed,
          'image' => $image,
          'company_id' => Auth::user()->id
        ]);

        return redirect()->route('company.loker')->with('success','Loker berhasil ditambahkan');
      }

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
