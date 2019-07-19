<div class="page-sidebar">
  <div class="main-header-left d-none d-lg-block">
    <div class="logo-wrapper"><a href="index.html"><img src="../assets/images/endless-logo.png" alt=""></a></div>
  </div>
  <div class="sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
      <div><img class="img-60 rounded-circle" src="{{asset('images/avatar/default.jpg')}}" alt="#">
      </div>
      <h6 class="mt-3 f-14">{{Auth::user()->name}}</h6>
    </div>
    <ul class="sidebar-menu">
      <li class=""><a class="sidebar-header @if(Request::is('admin/beranda')) active @endif" href="{{route('admin.dashboard')}}"><i data-feather="home"></i><span>Beranda</span></a></li>
      <li><a class="sidebar-header @if(Request::is('admin/perusahaan')) active @endif" href="{{route('admin.company')}}"><i data-feather="globe"></i><span>Data Perusahaan</span></a></li>
      <li><a class="sidebar-header  @if(Request::is('admin/pengguna') || Request::is('admin/pengguna/*')) active @endif" href="{{route('admin.user')}}"><i data-feather="users"></i><span>Data Pengguna</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="clock"></i><span>Riwayat</span></a></li>
    </ul>
  </div>
</div>
