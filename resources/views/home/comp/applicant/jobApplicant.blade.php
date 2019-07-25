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
            <li class="breadcrumb-item active">Daftar Pelamar Kerja</li>
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
                @if($registration->status == 0)
               <tr>
                 <td>{{$no}}</td>
                 <td>{{$loker->name}}</td>
                 <td>{{$registration->user->name}}</td>
                 <td>{{$registration->user->email}}</td>
                 <td>{{$loker->job}}</td>
                 <td width="20%">
                   <a href="#" data-toggle="modal" data-target="#detail{{$registration->id}}"><span class="badge badge-info">Detail</span></a>
                   <a href="#" data-toggle="modal" data-target="#accept{{$registration->id}}"><span class="badge badge-success">Terima</span></a>
                   <a href="#" data-toggle="modal" data-target="#denied{{$registration->id}}"><span class="badge badge-danger">Tolak</span></a>
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
                                <h6>Persyaratan: {{$registration->loker->requirements}}</h6>
                              </div>
                              <div class="card-footer row">
                                <div class="col-6 col-sm-6">
                                  <h6>Persyaratan</h6>
                                  <!-- <a href="#" download><span class="badge badge-info">Download</span></a> -->
                                  <button target="_blank" onclick="window.open('{{asset("images/".$registration->data)}}','_blank')" return false; type="button" class="btn btn-primary" name="button" download>Download</button>
                                </div>
                                <div class="col-6 col-sm-6">
                                  <h6>Loker</h6>
                                  <h3><span class="counter">{{$registration->loker->name}}</span></h3>
                                </div>
                              </div>
                            </div>
                          </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>

                 <!-- Modal terima pelamar -->
                 <div class="modal fade" id="accept{{$registration->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Terima Pelamar</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <form class="" action="{{route('company.jobApplicant.accept', $registration)}}" method="post">
                        @csrf
                        @method('PATCH')
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Pesan</label>
                          <textarea name="message" rows="4" cols="30" class="form-control" minlength="10" required></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal">Kembali</button>
                        <button class="btn btn-success" type="submit">Terima</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Modal tolak pelamar -->
                <div class="modal fade" id="denied{{$registration->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Tolak Pelamar</h5>
                       <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                     </div>
                     <form class="" action="{{route('company.jobApplicant.denied', $registration)}}" method="post">
                       @csrf
                       @method('PATCH')
                     <div class="modal-body">
                       <div class="form-group">
                         <label>Pesan</label>
                         <textarea name="message" rows="4" cols="30" class="form-control" minlength="10" required></textarea>
                       </div>
                     </div>
                     <div class="modal-footer">
                       <button class="btn btn-primary" type="button" data-dismiss="modal">Kembali</button>
                       <button class="btn btn-danger" type="submit">Tolak</button>
                     </div>
                     </form>
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
