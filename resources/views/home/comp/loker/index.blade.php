@extends('templates.comp.default')

@section('content')
<div class="text-right m-b-20">
    <a href="{{route('loker.create')}}" class="btn bg-blue btn-lg waves-effect waves-light">Tambah</a>
</div>
@if($lokers->isEmpty())
<div class="m-t-15">
  <ol class="breadcrumb breadcrumb-bg-pink align-center">
    <h4 class="col-white">Tidak ada lowongan kerja</h4>
  </ol>
</div>
@else
<div class="row clearfix">
  @foreach($lokers as $loker)
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
            <div class="header bg-red">
                <h2>
                    {{$loker->bidang}} <small>{{$loker->loc_penempatan}}</small>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Detail</a></li>
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Hapus</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
              {!! str_limit($loker->persyaratan,300) !!}
            </div>
        </div>
    </div>
    @endforeach
  </div>
  @endif
@endsection
