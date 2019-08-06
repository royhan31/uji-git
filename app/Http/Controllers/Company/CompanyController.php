<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Loker;
use App\Registration;
use App\Notification;
use App\History;
use Auth;
use Storage;
use DB;

class CompanyController extends Controller
{
    public function __construct(){
      $this->middleware('auth:company');
    }

    public function index(){
      $notifications = Notification::orderBy('id','DESC')->where('company_id',Auth::user()->id)->paginate(4);
      $notif = Notification::where('company_id',Auth::user()->id)->where('read',false)->get();
      $registrations = DB::table('registrations')
                      ->join('lokers','lokers.id','=','registrations.loker_id')
                      ->join('companies','companies.id','=','lokers.company_id')
                      ->where('lokers.company_id',Auth::guard('company')->user()->id)
                      ->get();
      return view('home.comp.dashboard',compact('registrations','notifications','notif'));
    }

    public function profile(){
      $notifications = Notification::orderBy('id','DESC')->where('company_id',Auth::user()->id)->paginate(4);
      $notif = Notification::where('company_id',Auth::user()->id)->where('read',false)->get();
      return view('home.comp.profile', compact('notifications','notif'));
    }

    public function updateProfile(Request $request, Company $company){
      $company = Auth::user();
      $this->validate($request,[
        'email' => "string|email|max:255|unique:companies,email,$company->id",
        'company_number' => "numeric|digits_between:8,8|unique:companies,company_number,$company->id",
        'phone' => 'numeric|digits_between:10,13',
        'address' => 'required|min:10'
      ]);

      if($request->avatar){
        if($company->avatar == 'avatar/default.jpg'){
          $avatar = $request->file('avatar')->store('avatar');
          $company->update([
            'email' => $request->email,
            'company_number' => $request->company_number,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $avatar,
          ]);
        }else {
          $avatar_path = $company->avatar;
          if (Storage::exists($avatar_path)) {
            Storage::delete($avatar_path);
          }
          $avatar = $request->file('avatar')->store('avatar');
          $company->update([
            'email' => $request->email,
            'company_number' => $request->company_number,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $avatar,
          ]);
        }
      }
      else {
        $company->update([
          'email' => $request->email,
          'company_number' => $request->company_number,
          'phone' => $request->phone,
          'address' => $request->address,
        ]);
       }

      return back()->with('success','Profil Berhasil Diubah');
    }

    public function resetPassword(Request $request){
      $user = Auth::user();
      $this->validate($request,[
        'password' => 'string|min:8|confirmed'
      ]);

      $user->update([
        'password' => bcrypt($request->password),
      ]);

      return redirect()->back()->with('success', 'Password berhasil diubah');
    }

    public function notif(Notification $notification){
      $notification->update([
        'read' => true
      ]);
      return redirect()->route('company.jobApplicant');
    }

    public function history(){
      $histories = History::where('company_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(4);
      $notifications = Notification::orderBy('id','DESC')->where('company_id',Auth::user()->id)->paginate(4);
      $notif = Notification::where('company_id',Auth::user()->id)->where('read',false)->get();
      return view('home.comp.history', compact('notifications','notif', 'histories'));
    }

}
