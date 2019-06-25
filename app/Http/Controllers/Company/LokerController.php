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
      $lokers = Loker::where('company_id',Auth::user()->id)->orderBy('id','DESC')->paginate(9);
      return view('home.comp.loker.index', compact('lokers'));
    }

    public function create(){
      if(Auth::user()->company_number == null || Auth::user()->phone == null || Auth::user()->address == null){
        return back()->with('error','');
      }
      return view('home.comp.loker.create');
    }

    public function store(Request $request){
      $this->validate($request,[
        'name' => 'required|min:6',
        'description' => 'required|min:300',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2000'
      ]);
      $date_opened = strtotime($request->date_opened);
      $date_closed = strtotime($request->date_closed);
      $opened = date('Y-m-d', $date_opened);
      $closed = date('Y-m-d', $date_closed);
      $end_date_opened = new DateTime($opened);
      $end_date_closed = new DateTime($closed);
      $interval_closed = $end_date_opened->diff($end_date_closed);
      $image = $request->file('image')->store('loker');
      if($interval_closed->format('%r%a') < 15){
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

    public function edit(Loker $loker){
      return view('home.comp.loker.edit', compact('loker'));
    }

    public function update(Request $request, Loker $loker){
      $this->validate($request,[
        'name' => 'required|min:6',
        'description' => 'required|min:300',
        'image' => 'image|mimes:jpg,jpeg,png|max:2000'
      ]);
      $date_opened = strtotime($request->date_opened);
      $date_closed = strtotime($request->date_closed);
      $opened = date('Y-m-d', $date_opened);
      $closed = date('Y-m-d', $date_closed);
      $end_date_opened = new DateTime($opened);
      $end_date_closed = new DateTime($closed);
      $interval_closed = $end_date_opened->diff($end_date_closed);
      if($interval_closed->format('%r%a') < 15){
        return back()->with('errorClosed','Tanggal yang anda pilih minimal 14 hari setelah tanggal buka')
        ->withInput($request->only('name','job','description','date_opened','date_closed'));
      }else{
        if($request->image){
          $image = $request->file('image')->store('loker');
          $image_path = $loker->image;
          if (Storage::exists($image_path)) {
              Storage::delete($image_path);
          }
          $loker->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'job' => $request->job,
            'description' => $request->description,
            'date_opened' => $opened,
            'date_closed' => $closed,
            'image' => $image,
          ]);
        }
        else{
          $loker->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'job' => $request->job,
            'description' => $request->description,
            'date_opened' => $opened,
            'date_closed' => $closed,
          ]);
        }

        return redirect()->route('company.loker')->with('success','Loker berhasil diubah');
      }
    }

    public function destroy(Loker $loker){
      $image_path = $loker->image;
      if (Storage::exists($image_path)) {
          Storage::delete($image_path);
      }
      $loker->delete();

      return redirect()->back()->with('success','Loker berhasil dihapus');
    }

    public function show(Loker $loker){
      //$loker = Loker::where('id',$id)->where('slug',$slug)->get();
      return view('home.comp.loker.detail', compact('loker'));
    }
}
