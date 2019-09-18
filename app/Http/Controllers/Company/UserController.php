<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Registration;
use App\Loker;
use App\Notification;
use App\History;
use Auth;
use DB;

class UserController extends Controller
{
  public function __construct(){
    $this->middleware('auth:company');
  }

  public function jobApplicant(){
    $notifications = Notification::orderBy('id','DESC')->Where('company_id',Auth::user()->id)->paginate(4);
    $notif = Notification::where('company_id',Auth::user()->id)->Where('read',false)->get();
    $lokers = Loker::where('company_id', Auth::user()->id)->get();
    return view('home.comp.applicant.jobApplicant', compact('lokers','notifications','notif'));
  }

  public function jobApplicantAccept(){
    $notifications = Notification::orderBy('id','DESC')->Where('company_id',Auth::user()->id)->paginate(4);
    $notif = Notification::where('company_id',Auth::user()->id)->Where('read',false)->get();
    $lokers = Loker::where('company_id', Auth::user()->id)->get();
    return view('home.comp.applicant.jobApplicantAccept', compact('lokers','notifications','notif'));
  }

  public function jobApplicantDenied(){
    $notifications = Notification::orderBy('id','DESC')->Where('company_id',Auth::user()->id)->paginate(4);
    $notif = Notification::where('company_id',Auth::user()->id)->Where('read',false)->get();
    $lokers = Loker::where('company_id', Auth::user()->id)->get();
    return view('home.comp.applicant.jobApplicantDenied', compact('lokers','notifications','notif'));
  }

  public function accept(Request $request, Registration $registration){
    $registration->update([
      'status' => 1,
      'message' => $request->message
    ]);
    $user = User::find($registration->user_id);
    $user->update([
      'job' => true
    ]);
    History::create([
      'company_id' => Auth::user()->id,
      'message' => 'Penerimaan pelamar kerja'
    ]);

    return redirect()->back()->with('success','Penerimaan pelamar berhasil, '.$user->name.' Telah diterima');

  }

  public function denied(Request $request, Registration $registration){
    $registration->update([
      'status' => 2,
      'message' => $request->message
    ]);
    $user = User::find($registration->user_id);
    History::create([
      'company_id' => Auth::user()->id,
      'message' => 'Penolakan pelamar kerja'
    ]);

    return redirect()->back()->with('success','Penolakan pelamar berhasi, '.$user->name.' Telah ditolak');

  }

  public function printPriview(){
    $lokers = Loker::where('company_id', Auth::user()->id)->get();
    return view('home.comp.print', compact('lokers'));
  }

}
