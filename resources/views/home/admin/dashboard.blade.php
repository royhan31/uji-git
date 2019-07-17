@extends('templates.admin.default')

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
  <div class="row">
    <div class="col-12">
      <div class="row">
          <div class="item col-md-3">
            <div class="card">
              <div class="card-body ecommerce-icons text-center"><i data-feather="clipboard"></i>
                <div><span>Total Perusahaan</span></div>
                <h4 class="font-primary mb-0 counter">{{count($company)}}</h4>
              </div>
            </div>
          </div>
          <div class="item col-md-3">
            <div class="card">
              <div class="card-body ecommerce-icons text-center"><i data-feather="users"></i>
                <div><span>Total Pengguna</span></div>
                <h4 class="font-primary mb-0 counter">{{count($user)}}</h4>
              </div>
            </div>
          </div>
          <div class="item col-md-3">
            <div class="card">
              <div class="card-body ecommerce-icons text-center"><i data-feather="check-square"></i>
                <div><span>Total Loker</span></div>
                <h4 class="font-primary mb-0 counter">{{count($loker)}}</h4>
              </div>
            </div>
          </div>
          <!-- <div class="item col-md-3">
            <div class="card">
              <div class="card-body ecommerce-icons text-center"><i data-feather="trending-down"></i>
                <div><span>Company Loss</span></div>
                <h4 class="font-primary mb-0 counter">89</h4>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
@endsection
