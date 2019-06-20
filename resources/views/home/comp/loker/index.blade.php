@extends('templates.company.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Loker</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Loker</li>
          </ol>
        </div>
      </div>
      <!-- <div class="col">
        <div class="bookmark pull-right">
          <ul>
            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Calendar"><i data-feather="calendar"></i></a></li>
            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Mail"><i data-feather="mail"></i></a></li>
            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
          </ul>
        </div>
      </div> -->
    </div>
  </div>
</div>
@if(Session::has('error'))
<div class="col-12">
  <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong><i class="icon-alert"></i> Anda tidak bisa menambahkan loker sebelum melengkapi profil, <a class="text-white" href="{{route('company.profile')}}">Silahkan Lengkapi Profil Anda.</a> </strong>
    <!-- <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> -->
  </div>
</div>
@endif
<div class="col-2 mb-3">
  <button class="btn btn-primary" type="button" name="button" onclick="window.location='{{route("company.loker.create")}}'">Tambah</button>
</div>
@if($lokers->isEmpty())
<div class="col-12">
  <div class="dark fade show text-center" role="alert"><h4><strong>Belum ada loker</strong></h4>
    </div>
</div>
@else
<div class="container-fluid">
  <div class="row">
    @foreach($lokers as $loker)
    <div class="col-sm-12 col-xl-4">
      <div class="card">
        <div class="card-header">
          <h5>{{$loker->name}}</h5>
          <div class="card-header-right">
            <ul class="list-unstyled card-option">
              <li><i class="icofont icofont-simple-left"></i></li>
              <li><a href="{{route('company.loker.detail')}}"><i class="fa fa-eye text-primary"></i></a></li>
              <li><a href="{{route('company.loker.edit')}}"><i class="fa fa-edit text-primary"></i></a></li>
              <li><button type="button" data-target="#delete" data-toggle="modal" style="border:none; background:none;"><i class="fa fa-trash text-danger"></i></button></li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <p class="mb-0">{!!$loker->description!!}</p>
        </div>
        <div class="card-footer">
          <h5></h5>
        </div>
      </div>

    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="button">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endif
@endsection
