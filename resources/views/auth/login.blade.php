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
                  @if(Session::has('success'))
                  <div class="alert alert-success dark alert-dismissible fade show" role="alert"><strong>{{Session::get('success')}}</strong>
                      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    @elseif(Session::has('error'))
                    <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>{{Session::get('error')}}</strong>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                    @endif
                  <div class="card mt-4 p-4">
                    <div class="card-body">
                      <div class="text-center">
                        <h4>LOGIN</h4>
                        <!-- <h6>Enter your Username and Password </h6> -->
                      </div>
                      <form class="theme-form" method="post" action="{{route('company.login')}}">
                        @csrf
                        <div class="form-group">
                          <label class="col-form-label pt-0">Email</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label class="col-form-label">Password</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukan Password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        <div class="checkbox p-0">
                          <input id="checkbox1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label for="checkbox1">Remember me</label>
                        </div>
                        <div class="form-group form-row mt-3 mb-0">
                          <button class="btn btn-primary btn-block" type="submit">Login</button>
                        </div>
                        <div class="form-group form-row mt-3 mb-0">
                          <a href="#">Lupa Password ?</a>
                          <div class="ml-5">
                            Belum punya akun ? <a href="{{route('register')}}">Register</a>
                          </div>
                        </div>

                      </form>
                    </div>
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
