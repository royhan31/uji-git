@extends('templates.company.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Profil</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active">Profil</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
@if(Session::has('success'))
<div class="col-6">
  <div class="alert alert-success dark alert-dismissible fade show" role="alert"><strong>{{Session::get('success')}}</strong>
      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
</div>
@endif
<div class="container-fluid">
  <div class="edit-profile">
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Profil Saya</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
              <div class="row mb-2">
                <!-- <div class="col-auto"><img class="img-70 rounded-circle" alt="" src="{{asset('images/'.Auth::user()->avatar)}}"></div> -->
                <div class="col">
                  <h3 class="mb-1">{{Auth::user()->name}}</h3>
                  <p class="mb-4">{{Auth::user()->company}}</p>
                </div>
              </div>

              <!-- <div class="form-group">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" value="password">
              </div>
              <div class="form-group">
                <label class="form-label">Website</label>
                <input class="form-control" placeholder="http://Uplor .com">
              </div> -->
              <!-- <div class="form-footer">
                <button class="btn btn-primary btn-block">Save</button>
              </div> -->
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Reset Password</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
              <form class="" action="" method="post">
              <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="**********">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="col-form-label">Ulangi Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="**********">
              </div>
              <div class="form-footer">
                <button class="btn btn-primary btn-block">Simpan</button>
              </div>
              </form>
          </div>
        </div>

      </div>
      <div class="col-lg-8">
        <form class="card" method="post" action="{{route('company.profile.update', Auth::user()->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="card-header">
            <h4 class="card-title mb-0">Edit Profil</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <div class="form-group mb-5">
                      <img src="{{asset('images/'.Auth::user()->avatar)}}" class="img-100 rounded-circle" alt="" id="preview_avatar" width="30%" height="30%">
                    </div>
                    <label class="form-label">Foto</label>
                    <div class="custom-file">
                      <input name="avatar" class="custom-file-input" id="avatar" type="file" accept="image/*">
                      <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar</label>
                    </div>
                  </div>
                </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input name="email" value="{{old('email',Auth::user()->email)}}" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" required>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Nomor Perusahaan</label>
                  <input class="form-control @error('company_number') is-invalid @enderror" name="company_number" value="{{old('company_number',Auth::user()->company_number)}}" type="text" placeholder="" required>
                  @error('number_company')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Nomor Telepon</label>
                  <input class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone',Auth::user()->phone)}}" type="text" placeholder="">
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label">Alamat</label>
                  <!-- <input class="form-control" type="text" placeholder="Home Address"> -->
                  <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="8" cols="80">{{old('address',Auth::user()->address)}}</textarea>
                  @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <!-- <div class="col-sm-6 col-md-4">
                <div class="form-group">
                  <label class="form-label">City</label>
                  <input class="form-control" type="text" placeholder="City">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Postal Code</label>
                  <input class="form-control" type="number" placeholder="ZIP Code">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label class="form-label">Country</label>
                  <select class="form-control btn-square">
                    <option value="0">--Select--</option>
                    <option value="1">Germany</option>
                    <option value="2">Canada</option>
                    <option value="3">Usa</option>
                    <option value="4">Aus</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mb-0">
                  <label class="form-label">About Me</label>
                  <textarea class="form-control" rows="5" placeholder="Enter About your description"></textarea>
                </div>
              </div> -->
            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary" type="submit">Update Profile</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
