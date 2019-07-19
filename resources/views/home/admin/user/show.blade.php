@extends('templates.admin.default')

@section('content')
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col">
        <div class="page-header-left">
          <h3>Detail Pengguna</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}"><i data-feather="home"></i></a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
 <div class="user-profile">
   <div class="row">
     <!-- user profile first-style start-->
     <div class="col-sm-12">
       <div class="card hovercard text-center">
         <div class="cardheader"></div>
         <div class="user-image">
           <div class="avatar"><img alt="" src="{{asset('images/'.$user->avatar)}}"></div>
           <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
         </div>
         <div class="info">
           <div class="row">
             <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
               <div class="row">
                 <div class="col-md-6">
                   <div class="ttl-info text-left">
                     <h6><i class="fa fa-envelope"></i>   Email</h6><span>Marekjecno@yahoo.com</span>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="ttl-info text-left">
                     <h6><i class="fa fa-calendar"></i>   BOD</h6><span>02 January 1988</span>
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
               <div class="user-designation">
                 <div class="title"><a target="_blank" href="">Mark jecno</a></div>
                 <div class="desc mt-2">designer</div>
               </div>
             </div>
             <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
               <div class="row">
                 <div class="col-md-6">
                   <div class="ttl-info text-left">
                     <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>India +91 123-456-7890</span>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="ttl-info text-left">
                     <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>B69 Near Schoool Demo Home</span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <hr>
           <div class="social-media">
             <ul class="list-inline">
               <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
               <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
             </ul>
           </div>
           <div class="follow">
             <div class="row">
               <div class="col-6 text-md-right border-right">
                 <div class="follow-num counter">25869</div><span>Follower</span>
               </div>
               <div class="col-6 text-md-left">
                 <div class="follow-num counter">659887</div><span>Following</span>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>


@endsection
