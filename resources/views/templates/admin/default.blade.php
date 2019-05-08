<!DOCTYPE html>
<html>

<head>
    @include('templates.admin.partials.head')

</head>

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
    <!-- Search Bar -->
     {{--bagian search--}}
 @include('templates.admin.partials.search')
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('templates.admin.partials.topbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        {{--bagian side bar--}}
@include('templates.admin.partials.sidebar')
        <!-- #END# Left Sidebar -->
    </section>
@include('templates.admin.partials.conten')

   
                <!-- #END# Answered Tickets -->
            </div>
            </div>
        </div>
    </section>

    @include('templates.admin.partials.script')
</body>

</html>
