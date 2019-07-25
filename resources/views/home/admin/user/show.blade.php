@extends('templates.admin.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Detail Pengguna</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i data-feather="home"></i></a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="col-xl-4 xl-100 col-md-12">
   <div class="card user-card">
     <div class="card-body">
       <div class="online-user">
         <h5 class="@if($user->deleted_at) font-danger @else font-success @endif f-18 mb-0">@if($user->deleted_at) Tidak aktif @else Aktif @endif</h5>
       </div>
       <div class="user-card-image"><img class="img-fluid rounded-circle image-radius" src="{{asset('images/'.$user->avatar)}}" alt=""></div>
       <div class="user-deatils text-center">
         <h4>{{$user->name}}</h4>
         <h5 class="mb-1">{{$user->email}}</h5>
         <h5 class="mb-1">{{$user->address}}</h5>
         <h5 class="mb-1">{{$user->phone}}</h5>
       </div>
         <div class="user-deatils text-center">
           <i class="m-r-10" data-feather="briefcase"></i>
             <h6 class="f-18 mb-2">Data Diri</h6>
             <h4 class="">NIK : {{$user->nik}}</h4>
             <div class="mt-2">
               <h4 class="">Foto KTP : </h4>
               <img width="920px" height="500px" src="{{asset('images/'.$user->ktp)}}" alt="">
             </div>
         </div>
         @if(!$user->status)
       <form class="" action="{{route('admin.user.confirm', $user)}}" method="post">
         @csrf
         @method('PATCH')
          <button type="button" onclick="window.location='{{route("admin.user")}}'" class="btn btn-light btn-lg">Kembali</button>
          <button type="submit" class="btn btn-primary btn-lg">Konfirmasi</button>
       </form>
       @endif
     </div>
   </div>
 </div>
</div>



@endsection
