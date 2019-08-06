<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Notification;
use Auth;
use App\History;

class CompanyController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $notifications = Notification::orderBy('id', 'DESC')->where('company_id',null)->paginate(4);
      $notif = Notification::where('company_id',null)->where('read',false)->get();
      $companies = Company::orderBy('id','DESC')->get();
      return view('home.admin.company', compact('notifications','notif','companies'));
    }

    public function update(Company $company){
        if ($company->deleted_at) {
          $company->update([
            'deleted_at' => false
          ]);

          History::create([
            'message' => 'Anda telah mengaktifkan perusahaan '.$company->company
          ]);
        }else {
          if(Auth::guard('company')->user() != null){
            if ($company->id == Auth::guard('company')->user()->id) {
              Auth::guard('company')->logout();
            }
          }
          $company->update([
            'deleted_at' => true
          ]);

          History::create([
            'message' => 'Anda telah menonaktifkan perusahaan '.$company->company
          ]);
        }

      return redirect()->back();
    }
}
