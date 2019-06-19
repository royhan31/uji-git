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
            <li class="breadcrumb-item active">Edit</li>
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

@endsection
