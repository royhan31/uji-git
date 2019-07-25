@extends('templates.admin.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Data Pengguna</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i data-feather="home"></i></a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
@if(Session::has('success'))
<div class="col-12">
  <div class="alert alert-success alert-dismissible fade show" role="alert"><strong><i class="icon-check"></i>{{Session::get('success')}}</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
</div>
@endif
<div class="container-fluid">
 <div class="row">
   <!-- Zero Configuration  Starts-->
   <div class="col-sm-12">
     <div class="card">
       <div class="card-header">
       </div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="display" id="basic-1">
             <thead>
               <tr>
                 <th>No</th>
                 <th>Nama</th>
                 <th>Email</th>
                 <th>No Hp</th>
                <th>Konfirmasi</th>
                 <th>Pekerjaan</th>
                 <th>Status</th>
                 <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
               @php($no = 1)
               @foreach($users as $user)
               <tr>
                 <td>{{$no}}</td>
                 <td>{{$user->name}}</td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->phone}}</td>
                 <td>@if($user->status)
                   <span class="badge badge-success">Sudah</span>
                   @else
                    <span class="badge badge-danger">Belum</span>
                   @endif
                 </td>
                 <td>@if($user->job)
                   <span class="badge badge-success">Bekerja</span>
                   @else
                    <span class="badge badge-danger">Belum Bekerja</span>
                   @endif
                 </td>
                 <td>@if($user->deleted_at)
                   <span class="badge badge-danger">Tidak aktif</span>
                   @else
                   <span class="badge badge-success">Aktif</span>
                   @endif</td>
                 <td width="20%">
                   <a href="{{route('admin.user.show', $user)}}"><span class="badge badge-info">Detail</span></a>
                   @if($user->deleted_at)
                   <a href="#" data-toggle="modal" data-target="#update{{$user->id}}"><span class="badge badge-success">Aktifkan</span></a>
                   @else
                   <a href="#" data-toggle="modal" data-target="#update{{$user->id}}"><span class="badge badge-danger">Non Aktifkan</span></a>
                   @endif
                 </td>
               </tr>
               <div class="modal fade" id="update{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">@if($user->deleted_at) Aktifkan Pengguna
                        @else Non Aktifkan Pengguna
                         @endif</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                      @if($user->deleted_at)
                      <h5>Aktifkan <strong> {{$user->name}}</strong></h5>
                      @else
                      <h5>Nonaktifkan <strong> {{$user->name}}</strong></h5>
                      @endif
                    </div>
                    <form class="" action="{{route('admin.user.update', $user)}}" method="post">
                      @csrf
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                      @if($user->deleted_at)
                      <button class="btn btn-success" type="submit">Aktifkan</button>
                      @else
                      <button class="btn btn-danger" type="submit">Non Aktifkan</button>
                      @endif
                    </div>
                    </form>
                  </div>
                </div>
               @php($no++)
               @endforeach
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
