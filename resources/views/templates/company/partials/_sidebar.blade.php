<div class="page-sidebar">
  <div class="main-header-left d-none d-lg-block">
    <div class="logo-wrapper"><a href="index.html"><img src="../assets/images/endless-logo.png" alt=""></a></div>
  </div>
  <div class="sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
      <div><img class="img-60 rounded-circle" src="{{asset('images/'.Auth::user()->avatar)}}" alt="#">
        <div class="profile-edit"><a href="{{route('company.profile')}}"><i data-feather="edit"></i></a></div>
      </div>
      <h6 class="mt-3 f-14">{{Auth::user()->name}}</h6>
      <p>{{Auth::user()->company}}</p>
    </div>
    <ul class="sidebar-menu">
      <li class=""><a class="sidebar-header @if(Request::is('beranda')) active @endif" href="{{route('company.dashboard')}}"><i data-feather="home"></i><span>Beranda</span></a></li>
      <li class="
      @if(Request::is('daftar-pelamar-kerja') || Request::is('persyaratan') )
      active
      @endif
      "><a class="sidebar-header" href="#"><i data-feather="airplay"></i><span>Data Pelamar</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li class="@if(Request::is('daftar-pelamar-kerja'))
          active
          @endif
          "><a href="{{route('company.jobApplicant')}}"><i class="fa fa-circle"></i>Daftar Pelamar Kerja</a></li>
          <li class="@if(Request::is('persyaratan'))
          active
          @endif"><a href="{{route('company.requirements')}}"><i class="fa fa-circle"></i>Dokumen Persyaratan</a></li>
          <li><a href="#"><i class="fa fa-circle"></i>Pelamar Kerja Diterima</a></li>
          <li><a href="#"><i class="fa fa-circle"></i>Pelamar Kerja Ditolak</a></li>

        </ul>
      </li>
      <li><a class="sidebar-header @if(Request::is('loker'))
         active
         @elseif(Request::is('loker/tambah'))
         active
         @elseif(Request::is('loker/edit'))
         active
         @elseif(Request::is('loker/detail'))
         active
         @endif"
        href="{{route('company.loker')}}"><i data-feather="clipboard"></i><span>Data Lowongan Kerja</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="clock"></i><span>Riwayat</span></a></li>

      <!-- <li><a class="sidebar-header" href="#"><i data-feather="disc"></i><span>Color Version</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="layout-light.html"><i class="fa fa-circle"></i>Layout Light</a></li>
          <li><a href="layout-dark.html"><i class="fa fa-circle"></i>Layout Dark</a></li>
        </ul>
      </li> -->

    </ul>
  </div>
</div>
