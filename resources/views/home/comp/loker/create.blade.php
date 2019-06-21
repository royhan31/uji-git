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
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
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
        <form method="post" action="{{route('company.loker.store')}}" class="form theme-form" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Loker</label>
                  <input name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" type="text" autofocus required>
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
                    <option value="Frontend Develoer" {{old('job') == 'Frontend Develoer' ? 'selected' : ''}}>Frontend Developer</option>
                    <option value="Backend Develoer"  {{old('job') == 'Backend Develoer' ? 'selected' : ''}}>Backend Developer</option>
                    <option value="Web Develoer" {{old('job') == 'Web Developer' ? 'selected' : ''}}>Web Developer</option>
                    <option value="Android Develoer" {{old('job') == 'Android Developer' ? 'selected' : ''}}>Android Developer</option>
                    <option value="Sistem Analisis" {{old('job') == 'Sistem Analis' ? 'selected' : ''}}>Sistem Analis</option>
                    <option value="Database Administrator" {{old('job') == 'Database Administrator' ? 'selected' : ''}}>Database Administrator</option>
                    <option value="UI/UX Designer" {{old('job') == 'UI/UX Designer' ? 'selected' : ''}}>UI/UX Designer</option>
                    <option value="Hardware Engineer" {{old('job') == 'Hardware Engineer' ? 'selected' : ''}}>Hardware Engineer</option>
                    <option value="Network Engineer" {{old('job') == 'Network Engineer' ? 'selected' : ''}}>Network Engineer</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="exampleInputPassword2">Deskripsi</label>
                  <textarea name="description" rows="6" class="form-control @error('description') is-invalid @enderror summernote" required>{{old('description')}}</textarea>
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
                  <input name="date_opened" class="form-control digits" id="minMaxExample" type="text" data-language="en" value="{{old('date_opened')}}" required>
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label>Tanggal Tutup</label>
                  <input name="date_closed" class="form-control @if(Session::has('errorClosed')) is-invalid @endif digits" id="minMaxExample2" type="text" data-language="en" value="{{old('date_closed')}}" required>
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
                  <input name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" type="file" accept="image/*" required>
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
                <div class="form-group mb-5">
                  <img src="" alt="" id="preview_image" width="30%" height="30%">
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
