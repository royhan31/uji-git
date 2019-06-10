<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;
use Storage;

class CompanyController extends Controller
{
    public function __construct(){
      $this->middleware('auth:company');
    }

    public function index(){
      return view('home.comp.dashboard');
    }

    public function profile(){
      return view('home.comp.profile');
    }

    public function updateProfile(Request $request, Company $company){
      $this->validate($request,[
        'email' => 'required|email',
        'company_number' => 'required|min:5',
        'phone' => 'required|min:10|max:13',
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
            'avatar' => $avatar
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
            'avatar' => $avatar
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

    }
}
