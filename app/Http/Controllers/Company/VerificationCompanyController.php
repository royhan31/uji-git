<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;


class VerificationCompanyController extends Controller
{
  use VerifiesEmails;

  public function verify(Request $request){
    $companyID = $request['id'];
    $company = Company::findOrFail($companyID);
    if ($company->email_verified_at != null) {
        $message = "Email Anda Telah di Verifikasi";
        return view('auth.verify', compact('message'));
    }else {
      $date = date("Y-m-d g:i:s");
      $company->email_verified_at = $date;
      $company->save();
      $message = "Selamat, Email Anda telah di Verifikasi";
      return view('auth.verify', compact('message'));
    }
  }
}
