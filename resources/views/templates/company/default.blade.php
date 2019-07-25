
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
      <!-- Page Header Start-->
      @include('templates.company.partials._navbar')
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('templates.company.partials._sidebar')
        <!-- Page Sidebar Ends-->

        <div class="page-body">
          @yield('content')
        </div>
        <!-- footer start-->
        @include('templates.company.partials._footer')
      </div>
    </div>
    <!-- latest jquery-->
  @include('templates.company.partials._script')
  </body>
</html>
