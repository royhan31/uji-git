<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Notification;
use Auth;

class CompanyController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $notifications = Notification::orderBy('id','DESC')->where('user_id','<>',null)->orWhere('company_id','<>',null)->paginate('4');
      $notif = Notification::where('read',false)->get();
      $companies = Company::orderBy('id','DESC')->get();
      return view('home.admin.company', compact('notifications','notif','companies'));
    }

    public function update(Company $company){
        if ($company->deleted_at == 1) {
          $company->update([
            'deleted_at' => 0
          ]);
        }else {
          if(Auth::guard('company')->user() != null){
            if ($company->id == Auth::guard('company')->user()->id) {
              Auth::guard('company')->logout();
            }
          }
          $company->update([
            'deleted_at' => 1
          ]);
        }

      return redirect()->back();
    }
}
