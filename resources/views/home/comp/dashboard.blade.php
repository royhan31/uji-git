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
@if(Auth::user()->address == null || Auth::user()->company_number == null || Auth::user()->phone == null)
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong><i class="icon-alert"></i><a class="text-white" href="{{route('company.profile')}}">Silahkan Lengkapi Profil Anda.</a> </strong>
          <!-- <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> -->
        </div>
      </div>
    </div>
  </div>
</div>
@endif

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="row">
          <div class="item col-md-3">
            <div class="card">
              <div class="card-body ecommerce-icons text-center"><i data-feather="dollar-sign"></i>
                <div><span>Total Earning</span></div>
                <h4 class="font-primary mb-0 counter">72</h4>
              </div>
            </div>
          </div>
          <div class="item col-md-3">
            <div class="card">
              <div class="card-body ecommerce-icons text-center"><i data-feather="map-pin"></i>
                <div><span>Total Web Visitor</span></div>
                <h4 class="font-primary mb-0 counter">65</h4>
              </div>
            </div>
          </div>
          <div class="item col-md-3">
            <div class="card">
              <div class="card-body ecommerce-icons text-center"><i data-feather="shopping-cart"></i>
                <div><span>Total Sale Product</span></div>
                <h4 class="font-primary mb-0 counter">96</h4>
              </div>
            </div>
          </div>
          <div class="item col-md-3">
            <div class="card">
              <div class="card-body ecommerce-icons text-center"><i data-feather="trending-down"></i>
                <div><span>Company Loss</span></div>
                <h4 class="font-primary mb-0 counter">89</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
