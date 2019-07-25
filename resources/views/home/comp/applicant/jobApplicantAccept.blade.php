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
            <li class="breadcrumb-item active">Data pelamar</li>
            <li class="breadcrumb-item active">Daftar Pelamar Kerja Diterima</li>
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
                 <th>Nama Loker</th>
                 <th>Nama Pelamar</th>
                 <th>Email Pelamar</th>
                 <th>Bidang</th>
                 <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
               @php($no = 1)
               @foreach($lokers as $loker)
                @foreach($loker->registrations as $registration)
                @if($registration->status == 1)
               <tr>
                 <td>{{$no}}</td>
                 <td>{{$loker->name}}</td>
                 <td>{{$registration->user->name}}</td>
                 <td>{{$registration->user->email}}</td>
                 <td>{{$loker->job}}</td>
                 <td width="10%">
                   <a href="#" data-toggle="modal" data-target="#detail{{$registration->id}}"><span class="badge badge-info">Detail</span></a>
                 </td>
               </tr>
               @endif
          <!-- Modal detail Pelamar -->
                  <div class="modal fade" id="detail{{$registration->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Detail Pelamar</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                       </div>
                       <div class="modal-body">
                         <div class="row">
                          <div class="col-md-12 col-lg-12">
                            <div class="card custom-card">
                              <div class="card-profile"><img class="rounded-circle" src="{{asset('images/'.$registration->user->avatar)}}" alt=""></div>
                              <div class="text-center mb-2">
                                <h4>{{$registration->user->name}}</h4>
                                <h6>{{$registration->user->email}}</h6>
                                <h6>{{$registration->user->phone}}</h6>
                                <h6>{{$registration->user->address}}</h6>
                                <h6>{{$registration->loker->job}}</h6>
                              </div>
                            </div>
                          </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
              @endforeach
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
