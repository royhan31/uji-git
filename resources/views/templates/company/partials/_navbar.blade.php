<div class="page-main-header">
  <div class="main-header-right row">
    <div class="main-header-left d-lg-none">
      <div class="logo-wrapper"><a href="{{url('beranda')}}"><img src="{{asset('assets/front/assets/img/iconlokerit.png')}}" alt=""></a></div>
    </div>
    <div class="mobile-sidebar d-block">
      <div class="media-body text-right switch-sm">
        <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
      </div>
    </div>
    <div class="nav-right col p-0">
      <ul class="nav-menus">
        <li>
          <!-- <form class="form-inline search-form" action="#" method="get">
            <div class="form-group">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="q" placeholder="Search...">
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form> -->
        </li>
        <!-- <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li> -->
        <li class="onhover-dropdown"><i data-feather="bell"></i><span class="@if(count($notif) > 0) dot @endif"></span>
          <ul class="notification-dropdown onhover-show-div">
            <li>Notifikasi <span class="badge badge-pill badge-primary pull-right">
                {{count($notif)}}
            </span></li>

            @foreach($notifications as $notification)
            <li class="@if(!$notification->read)bg-light txt-dark @endif">
              <a href="{{route('company.notification',$notification)}}">
              <div class="media">
                <div class="media-body">
                  <h6 class="mt-0"><span><i class="shopping-color"></i>
                  </span>{{$notification->message}}</h6>
                  <p class="mb-0">{{$notification->subject}}</p>
                  <small class="pull-right txt-dark"> {{$notification->created_at->diffForHumans()}}</small>
                </div>
              </div>
              </a>
            </li>
            @endforeach
            @if(!$notifications->isEmpty())
            <li class="bg-light txt-dark"><a href="#">Semua</a> Notifkasi</li>
            @endif
          </ul>
        </li>
        <li class="onhover-dropdown">
          <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle" src="{{asset('images/'.Auth::user()->avatar)}}" alt="header-user">
            <!-- <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div> -->
          </div>
          <ul class="profile-dropdown onhover-show-div p-20">
            <li><a href="{{route('company.profile')}}"><i data-feather="user"></i>Edit Profile</a></li>
            <!-- <li><a href="#"><i data-feather="mail"></i>Inbox</a></li>
            <li><a href="#"><i data-feather="lock"></i>Lock Screen</a></li>
            <li><a href="#"><i data-feather="settings"></i>Settings</a></li> -->
            <li><a href="{{ route('company.logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i data-feather="log-out"></i>Logout</a>
             <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
            </li>
          </ul>
        </li>
      </ul>
      <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
    </div>
    <script id="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">
      <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
      <div class="ProfileCard-details">
      <div class="ProfileCard-realName"></div>
      </div>
      </div>
    </script>
    <script id="empty-template" type="text/x-handlebars-template">
      <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>

    </script>
  </div>
</div>
