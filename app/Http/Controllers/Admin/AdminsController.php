<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;
use App\Loker;
use App\Notification;
use Auth;
use File;
use App\Result;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index()
    {
        $user = User::all();
        $company = Company::all();
        $loker = Loker::all();
        $notifications = Notification::orderBy('id', 'DESC')->where('company_id',null)->paginate(4);
        $notif = Notification::where('company_id',null)->where('read',false)->get();

        return view('home.admin.dashboard',compact('user','company','notifications','notif','loker'));
    }

    public function showNotif(Notification $notification){
      $notification->update([
        'read' => true
      ]);

      return redirect()->route('admin.user');
    }
}
