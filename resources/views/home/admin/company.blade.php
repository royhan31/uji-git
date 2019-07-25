@extends('templates.admin.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Data Perusahaan</h3>
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
                 <th>Perusahaan</th>
                 <th>Pemilik</th>
                 <th>Email</th>
                 <th>No HP</th>
                 <th>Status</th>
                 <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
               @php($no = 1)
               @foreach($companies as $company)
               <tr>
                 <td>{{$no}}</td>
                 <td>{{$company->company}}</td>
                 <td>{{$company->name}}</td>
                 <td>{{$company->email}}</td>
                 <td>{{$company->phone}}</td>
                 <td>@if($company->deleted_at == 1)
                   <span class="badge badge-danger">Tidak aktif</span>
                   @else
                  <span class="badge badge-success">Aktif</span>
                   @endif
                 </td>
                 <td>
                   <a href="#"><span class="badge badge-info">Detail</span></a>
                   @if($company->deleted_at)
                   <a href="#" data-toggle="modal" data-target="#update{{$company->id}}"><span class="badge badge-success">Aktifkan</span></a>
                   @else
                   <a href="#" data-toggle="modal" data-target="#update{{$company->id}}"><span class="badge badge-danger">Non Aktifkan</span></a>
                   @endif
                 </td>
               </tr>
               <div class="modal fade" id="update{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">@if($company->deleted_at) Aktifkan Perusahaan
                        @else Non Aktifkan Perusahaan
                         @endif</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                      @if($company->deleted_at)
                      <h5>Aktifkan <strong> {{$company->company}}</strong></h5>
                      @else
                      <h5>Nonaktifkan <strong> {{$company->company}}</strong></h5>
                      @endif
                    </div>
                    <form class="" action="{{route('admin.company.update', $company)}}" method="post">
                      @csrf
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                      @if($company->deleted_at)
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
