@extends('templates.company.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Riwayat</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5>Riwayat Perusahaan</h5>
        </div>
        <div class="card-body">
          <div class="timeline-small">
            @foreach($histories as $history)
            <div class="media">
              <div class="timeline-round m-r-30 bg-primary"><i data-feather="tag"></i></div>
              <div class="media-body">
                <h6>{{$history->message}} <span class="pull-right f-14">{{$history->created_at->diffForHumans()}}</span></h6>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="card-footer">
          {{$histories->links()}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
