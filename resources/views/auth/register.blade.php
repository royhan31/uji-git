<!DOCTYPE html>
<html lang="en">
  @include('templates.company.partials._head')
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader bg-white">
        <div class="whirly-loader"> </div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid">
        <!-- sign up page start-->
        <div class="authentication-main">
          <div class="row">
            <div class="col-sm-12 p-0">
              <div class="auth-innerright">
                <div class="authentication-box">
                  <!-- <div class="text-center"><img src="../assets/images/endless-logo.png" alt=""></div> -->
                  <div class="card mt-4 p-4">
                    <h6 class="text-center">#</h6>
                    <form class="theme-form" method="post" action="{{route('company.register')}}">
                      @csrf
                      <div class="form-group">
                        <label class="col-form-label">Nama</label>
                        <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" type="text" required placeholder="Nama" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Nama Perusahaan</label>
                        <input name="company" class="form-control @error('company') is-invalid @enderror" type="text" value="{{old('company')}}" required placeholder="Perusahaan">
                        @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{old('email')}}" required placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Password</label>
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
                      <div class="form-row">
                        <div class="col-sm-4">
                          <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                        <div class="col-sm-8">
                          <div class="text-left mt-2 m-l-20">Sudah punya akun?  <a class="btn-link text-capitalize" href="{{route('login')}}">Login</a></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- sign up page ends-->
      </div>
    </div>
    <!-- page-wrapper Ends-->
    <!-- latest jquery-->
    @include('templates.company.partials._script')
  </body>
</html>
