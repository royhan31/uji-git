<script src="{{ asset('assets/back/js/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/back/js/bootstrap/popper.min.js')}}"></script>
<script src="{{ asset('assets/back/js/bootstrap/bootstrap.js')}}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/back/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{ asset('assets/back/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/back/js/sidebar-menu.js')}}"></script>
<script src="{{ asset('assets/back/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets/back/js/typeahead/handlebars.js')}}"></script>
<script src="{{ asset('assets/back/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{ asset('assets/back/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{ asset('assets/back/js/chat-menu.js')}}"></script>
<script src="{{ asset('assets/back/js/tooltip-init.js')}}"></script>
<script src="{{ asset('assets/back/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{ asset('assets/back/js/typeahead-search/typeahead-custom.js')}}"></script>
<script src="{{ asset('assets/back/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{ asset('assets/back/js/custom-card/custom-card.js')}}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/back/js/script.js')}}"></script>
@if(Request::is('login') || Request::is('register'))
@else
<script src="{{ asset('assets/back/js/theme-customizer/customizer.js')}}"></script>
@endif
<!-- Plugin used-->
