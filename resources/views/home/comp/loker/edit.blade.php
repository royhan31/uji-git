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
                        <strong>Nama Loker Terlalu Pendek</strong>
                    </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleFormControlSelect9">Bidang</label>
                <select name="job" class="form-control digits">
                  <option value="Frontend Develoer" {{old('job') == 'Frontend Develoer' ? 'selected' : ''}}
                  @if($loker->job == 'Frontend Develoer') selected @endif
                  >Frontend Developer</option>
                  <option value="Backend Develoer"  {{old('job') == 'Backend Develoer' ? 'selected' : ''}}
                  @if($loker->job == 'Backend Develoer') selected @endif
                  >Backend Developer</option>
                  <option value="Web Develoer" {{old('job') == 'Web Developer' ? 'selected' : ''}}
                  @if($loker->job == 'Web Develoer') selected @endif
                  >Web Developer</option>
                  <option value="Android Develoer" {{old('job') == 'Android Developer' ? 'selected' : ''}}
                  @if($loker->job == 'Android Develoer') selected @endif
                  >Android Developer</option>
                  <option value="Sistem Analisis" {{old('job') == 'Sistem Analis' ? 'selected' : ''}}
                  @if($loker->job == 'Sistem Analis') selected @endif
                  >Sistem Analis</option>
                  <option value="Database Administrator" {{old('job') == 'Database Administrator' ? 'selected' : ''}}
                  @if($loker->job == 'Database Administrator') selected @endif
                  >Database Administrator</option>
                  <option value="UI/UX Designer" {{old('job') == 'UI/UX Designer' ? 'selected' : ''}}
                  @if($loker->job == 'UI/UX Designer') selected @endif
                  >UI/UX Designer</option>
                  <option value="Hardware Engineer" {{old('job') == 'Hardware Engineer' ? 'selected' : ''}}
                  @if($loker->job == 'Hardware Engineer') selected @endif
                  >Hardware Engineer</option>
                  <option value="Network Engineer" {{old('job') == 'Network Engineer' ? 'selected' : ''}}
                  @if($loker->job == 'Network Engineer') selected @endif
                  >Network Engineer</option>
                </select>
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
