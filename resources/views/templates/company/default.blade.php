
<!DOCTYPE html>
<html>

@include('templates.back.partials.head')


<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
 {{--bagian search--}}
 @include('templates.back.partials.search')

 {{--bagian header--}}
 @include('templates.back.partials.header')

{{--bagian side bar--}}
@include('templates.back.partials.sidebar')

@yield('content')

    <!-- Jquery Core Js -->
   @include('templates.back.partials.script')
</body>

</html>
