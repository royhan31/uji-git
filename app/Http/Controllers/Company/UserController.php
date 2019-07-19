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

class UserController extends Controller
{
  public function __construct(){
    $this->middleware('auth:company');
  }

  public function jobApplicant(){
    $notifications = Notification::orderBy('id','DESC')->Where('company_id',Auth::user()->id)->paginate('4');
    $notif = Notification::where('company_id',Auth::user()->id)->Where('read',false)->get();
    $lokers = Loker::where('company_id', Auth::user()->id)->get();
    foreach ($lokers as $loker) {
      $registrations = Registration::where('loker_id', $loker->id)->where('status',0)->orderBy('id','DESC')->get();
    }
    return view('home.comp.applicant.jobApplicant', compact('registrations','notifications','notif'));

  }

  public function requirements(){
    return view('home.comp.applicant.requirements');
  }

  public function accept(Registration $registration){

  }

}
