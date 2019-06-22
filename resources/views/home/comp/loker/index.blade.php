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
      <div class="col">
        <div class="bookmark pull-right">
          <ul>
            <li><a data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Calendar"><i data-feather="calendar"></i><strong> {{now()->format('d M Y')}}</strong></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@if(Session::has('error'))
<div class="col-12">
  <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong><i class="icon-alert"></i> Anda tidak bisa menambahkan loker sebelum melengkapi profil, <a class="text-white" href="{{route('company.profile')}}">Silahkan Lengkapi Profil Anda.</a> </strong>
    <!-- <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> -->
  </div>
</div>
@elseif(Session::has('success'))
<div class="col-12">
  <div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="icon-check"></i>{{Session::get('success')}}</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
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
              <li><a href="{{route('company.loker.detail',$loker)}}"><i class="fa fa-eye text-primary"></i></a></li>
              <li><a href="{{route('company.loker.edit',$loker)}}"><i class="fa fa-edit text-primary"></i></a></li>
              <li><button type="button" data-target="#delete{{$loker->id}}" data-toggle="modal" style="border:none; background:none;"><i class="fa fa-trash text-danger"></i></button></li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <!-- <p class="mb-0">{!!str_limit($loker->description, )!!}</p> -->
          <img src="{{asset('images/'.$loker->image)}}" width="265" height="180" alt="">
        </div>
        <div class="card-footer">
          <h5>{{$loker->job}}</h5>
          {{--<p class="mb-1">Tanggal Buka   : {{date('d M Y', strtotime($loker->date_opened))}}</p>--}}
          <p class="mb-1">Tanggal Tutup  : {{date('d M Y', strtotime($loker->date_closed))}}</p>
          <p>Jumlah Pelamar : {{count($loker->registration)}}</p>
        </div>
      </div>

    </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="delete{{$loker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="" action="{{route('company.loker.destroy', $loker)}}" method="post">
          @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Hapus Loker</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <p>Apakah anda akan menghapus loker <strong>{{$loker->name}}</strong></p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">keluar</button>
            <button class="btn btn-danger" type="submit">Hapus</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
            {{$lokers->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
@endsection
