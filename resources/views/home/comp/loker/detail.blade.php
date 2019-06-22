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
            <li class="breadcrumb-item"><a href="{{route('company.loker')}}">Loker</i></a></li>
            <li class="breadcrumb-item active">Detail</li>
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
<div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="job-search">
                    <div class="card-body">
                      <div class="media"><img class="m-r-20" width="110" height="70" src="{{asset('images/'.$loker->image)}}" alt="">
                        <div class="media-body">
                          <h3 class="f-w-600"><a href="">{{$loker->name}}</a><span class="pull-right"></h3>
                              <!-- <button class="btn btn-primary" type="button">Apply for this job</button></span> -->
                          <p><h6>{{$loker->job}}</h6></p>
                        </div>
                      </div>
                      <div class="job-description">
                        <h6>Deskripsi</h6>
                        <p>{!!$loker->description!!}</p>
                        <!-- <p>Front-end web designers combine design, programming, writing and organizational skills in their work. They help shape the vision for a company's online content.</p>-->
                      </div>
                      <div class="job-description">
                        <h6>Keterangan </h6>
                        <ul>
                          <h5><li>Tanggal Buka  : <strong>{{date('d M Y', strtotime($loker->date_opened))}}</strong></li></h5>
                          <h5><li>Tanggal Tutup : <strong>{{date('d M Y', strtotime($loker->date_closed))}}</strong></li></h5>
                          <h5><li>Total Pelamar : <strong>{{count($loker->registration)}} pelamar</strong></li></h5>
                        </ul>
                      </div>
                      <div class="job-description">
                        <button class="btn btn-primary" onclick="window.location='{{route("company.loker.edit",$loker)}}'" type="button"><span><i class="fa fa-pencil"></i></span> Edit</button>
                        <button class="btn btn-primary" onclick="window.location='{{route("company.loker")}}'" type="button"><span><i class=""></i></span>Kembali</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection
