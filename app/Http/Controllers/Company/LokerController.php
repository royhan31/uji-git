<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loker;
use Auth;
use App\Notification;
use DateTime;
use Storage;
use App\History;
use App\Registration;
class LokerController extends Controller
{
    public function __construct(){
      $this->middleware('auth:company');
    }

    public function index(){
      $notifications = Notification::orderBy('id','DESC')->Where('company_id',Auth::user()->id)->paginate(4);
      $notif = Notification::where('company_id',Auth::user()->id)->Where('read',false)->get();
      $lokers = Loker::where('company_id',Auth::user()->id)->orderBy('id','DESC')->paginate(9);
      return view('home.comp.loker.index', compact('lokers','notifications','notif'));
    }

    public function create(){
      $jobs= [
        '1' => 'Frontend Developer',
        '2' => 'Backend Developer',
        '3' => 'Web Developer',
        '4' => 'Android Developer',
        '5' => 'Sistem Analisis',
        '6' => 'Database Administrator',
        '7' => 'UI/UX Designer',
        '8' => 'Hardware Engineer',
        '9' => 'Network Engineer',
        '10' => 'Umum',
      ];
      $notifications = Notification::orderBy('id','DESC')->Where('company_id',Auth::user()->id)->paginate(4);
      $notif = Notification::where('company_id',Auth::user()->id)->Where('read',false)->get();
      if(Auth::user()->company_number == null || Auth::user()->phone == null || Auth::user()->address == null){
        return back()->with('error','');
      }
      if (Auth::user()->email_verified_at == null) {
        return back()->with('errors','Silahkan konfirmasi email terlebih dahulu');
      }
      if (!Auth::user()->status) {
        return back()->with('errors','Perusahaan anda belum dikonfirmasi');
      }
      return view('home.comp.loker.create', compact('notifications','notif', 'jobs'));
    }

    public function store(Request $request){
      $this->validate($request,[
        'name' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
        'description' => 'string|min:100',
        'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        'requirements' => 'string|min:5'
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
        ->withInput();
      }else{
      $loker = Loker::create([
          'name' => $request->name,
          'job' => $request->job,
          'description' => $request->description,
          'date_opened' => $opened,
          'date_closed' => $closed,
          'image' => $image,
          'requirements' => $request->requirements,
          'company_id' => Auth::user()->id
        ]);

        History::create([
          'company_id' => Auth::user()->id,
          'message' => 'Anda telah menambahkan loker '.$loker->name
        ]);

        return redirect()->route('company.loker')->with('success','Loker berhasil ditambahkan');
      }

    }

    public function edit(Loker $loker){
      $registraions = Registration::where('loker_id', $loker->id)->get();
      if (!$registraions->isEmpty()) {
        return redirect()->back()->with('error','Loker tidak bisa dirubah saat ada pelamar kerja');
      }
      $jobs= [
        '1' => 'Frontend Developer',
        '2' => 'Backend Developer',
        '3' => 'Web Developer',
        '4' => 'Android Developer',
        '5' => 'Sistem Analisis',
        '6' => 'Database Administrator',
        '7' => 'UI/UX Designer',
        '8' => 'Hardware Engineer',
        '9' => 'Network Engineer',
        '10' => 'Umum',
      ];
      $notifications = Notification::orderBy('id','DESC')->Where('company_id',Auth::user()->id)->paginate(4);
      $notif = Notification::where('company_id',Auth::user()->id)->Where('read',false)->get();
      return view('home.comp.loker.edit', compact('loker','notifications','notif', 'jobs'));
    }

    public function update(Request $request, Loker $loker){
      $this->validate($request,[
        'name' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
        'description' => 'string|min:100',
        'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        'requirements' => 'string|min:5'
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
        ->withInput();
      }else{
        if($request->image){
          $image = $request->file('image')->store('loker');
          $image_path = $loker->image;
          if (Storage::exists($image_path)) {
              Storage::delete($image_path);
          }
          $loker->update([
            'name' => $request->name,
            'job' => $request->job,
            'requirements' => $request->requirements,
            'description' => $request->description,
            'date_opened' => $opened,
            'date_closed' => $closed,
            'image' => $image,
          ]);
        }
        else{
          $loker->update([
            'name' => $request->name,
            'job' => $request->job,
            'requirements' => $request->requirements,
            'description' => $request->description,
            'date_opened' => $opened,
            'date_closed' => $closed,
          ]);
        }
        History::create([
          'company_id' => Auth::user()->id,
          'message' => 'Anda telah merubah loker '.$loker->name
        ]);
        return redirect()->route('company.loker')->with('success','Loker berhasil diubah');
      }
    }

    public function destroy(Loker $loker){
      $registraions = Registration::where('loker_id', $loker->id)->get();
      if (!$registraions->isEmpty()) {
        return redirect()->back()->with('error','Loker tidak bisa dihapus saat ada pelamar kerja');
      }
      History::create([
        'company_id' => Auth::user()->id,
        'message' => 'Anda telah menghapus loker '.$loker->name
      ]);
      $image_path = $loker->image;
      if (Storage::exists($image_path)) {
          Storage::delete($image_path);
      }
      $loker->delete();

      return redirect()->back()->with('success','Loker berhasil dihapus');
    }

    public function show(Loker $loker){
      $notifications = Notification::orderBy('id','DESC')->Where('company_id',Auth::user()->id)->paginate(4);
      $notif = Notification::where('company_id',Auth::user()->id)->Where('read',false)->get();
      return view('home.comp.loker.detail', compact('loker','notifications','notif'));
    }
}
