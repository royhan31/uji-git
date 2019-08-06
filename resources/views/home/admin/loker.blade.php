@extends('templates.admin.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Pertanyaan</h3>
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
                 <th>Nama Loker</th>
                 <th>Bidang</th>
                 <th>Nama Perusahaan</th>
                 <th>Tanggal Buka</th>
                 <th>Tanggal Tutup</th>
                 <th>Total Pelamar</th>
               </tr>
             </thead>
             <tbody>
               @php($no = 1)
               @foreach($lokers as $loker)
               <tr>
                 <td>{{$no}}</td>
                 <td>{{$loker->name}}</td>
                 <td>{{$loker->job}}</td>
                 <td>{{$loker->company->company}}</td>
                 <td>{{date('d M Y', strtotime($loker->date_opened))}}</td>
                 <td>{{date('d M Y', strtotime($loker->date_closed))}}</td>
                 <td>{{count($loker->registrations)}}</td>
               </tr>
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
