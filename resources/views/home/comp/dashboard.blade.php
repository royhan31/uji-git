@extends('templates.company.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Beranda</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i data-feather="home"></i></a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        @if(Auth::user()->address == null || Auth::user()->company_number == null || Auth::user()->phone == null)
        <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong><i class="icon-alert"></i><a class="text-white" href="{{route('company.profile')}}">Silahkan Lengkapi Profil Anda.</a> </strong>
          <!-- <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> -->
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
