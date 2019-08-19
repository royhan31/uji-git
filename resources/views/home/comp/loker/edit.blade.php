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
    </div>
  </div>
</div>
@if($errors->all() || Session::has('errorClosed'))
<div class="col-12">
  <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Gagal menambahkan loker</strong>
      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
</div>
@endif
<div class="container-fluid">
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5>Tambahkan Loker Anda</h5>
      </div>
      <form method="post" action="{{route('company.loker.update', $loker)}}" class="form theme-form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama Loker</label>
                <input name="name" value="{{old('name', $loker->name)}}" class="form-control @error('name') is-invalid @enderror" type="text" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>@if($message == 'validation.regex')
                        Masukan nama loker dengan benar
                        @else
                        Nama loker terlalu pendek
                        @endif
                      </strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleFormControlSelect9">Bidang</label>
                <select name="job" class="form-control digits" disabled>
                  @foreach($jobs as $job)
                  <option value="{{$job}}" {{old('job', $loker->job) == $job ? 'selected' : ''}} >{{$job}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputPassword2">Persyaratan</label>
                <textarea name="requirements" rows="6" class="form-control @error('requirements') is-invalid @enderror" required>{{old('requirements', $loker->requirements)}}</textarea>
                @error('requirements')
                    <span class="invalid-feedback" role="alert">
                      <strong>@if($message == 'validation.regex')
                        Masukan persyaratan dengan benar
                        @else
                        Persyaratan terlalu pendek
                        @endif
                      </strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" rows="6" class="form-control @error('description') is-invalid @enderror summernote" required>{{old('description', $loker->description)}}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>Deskripsi Terlalu Pendek</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label>Tanggal Buka</label>
                <input name="date_opened" id="minMaxExample" value="{{old('date_opened', date('d-m-Y', strtotime($loker->date_opened)))}}" class="form-control digits" type="text" data-language="en" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label>Tanggal Tutup</label>
                <input name="date_closed" id="minMaxExample2" value="{{old('date_closed', date('d-m-Y', strtotime($loker->date_closed)))}}" class="form-control @if(Session::has('errorClosed')) is-invalid @endif digits" type="text" data-language="en" required>
                @if(Session::has('errorClosed'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{Session::get('errorClosed')}}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Foto</label>
              <div class="custom-file">
                <input name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" type="file" accept="image/*">
                <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar</label>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>Gambar harus jpg,jpeg,png dan kurang dari 2MB</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <label for="">Gambar Sebelumnya</label>
                <div class="form-group mb-5">
                  <img src="{{asset('images/'.$loker->image)}}" alt="" id="preview_image" width="30%" height="30%">
                </div>
              </div>
            </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit">Simpan</button>
          <button class="btn btn-light" onclick="window.location='{{route("company.loker")}}'" type="reset">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

@endsection
