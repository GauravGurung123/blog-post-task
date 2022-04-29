<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script>document.getElementsByTagName("html")[0].className += " js";</script>
      <title>Phifi - Creative Agency HTML Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('vendor/images/favicon.ico')}}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('vendor/css/bootstrap.min.css')}}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('vendor/css/typography.css')}}">
      <!-- Style CSS -->
      <link rel='stylesheet' href="{{asset('vendor/css/phifi-style.css')}}"/>
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('vendor/css/responsive.css')}}">
   </head>
   <body>
       {{-- header --}}
        @include('layouts.header')        
    
        {{-- breadcumb content --}}
        @yield('content-bread')

        {{-- main content --}}
        @yield('content-main')

        {{-- footer  --}}
        @include('layouts.footer')

    <!-- === back-to-top === -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
     <!-- === back-to-top End === -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="{{asset('vendor/js/jquery-3.4.1.js')}}"></script>
     <!-- jQuery  for scroll me js -->
     <script src="{{asset('vendor/js/jquery-min.js')}}"></script>
     <!-- popper  -->
     <script src="{{asset('vendor/js/popper.min.js')}}"></script>
     <!--  bootstrap -->
     <script src="{{asset('vendor/js/bootstrap.min.js')}}"></script>
     <!-- Appear JavaScript -->
     <script src="{{asset('vendor/js/appear.js')}}"></script>
     <!-- Jquery-migrate JavaScript -->
     <script src="{{asset('vendor/js/jquery-migrate.min.js')}}"></script>
     <!-- countdownTimer JavaScript -->
     <script src="{{asset('vendor/js/jQuery.countdownTimer.min.js')}}"></script>
     <!-- Owl.carousel JavaScript -->
     <script src="{{asset('vendor/js/owl.carousel.min.js')}}"></script>
     <!-- Countdown JavaScript -->
     <script src="{{asset('vendor/js/countdown.js')}}"></script>
     <!-- Jquery.countTo JavaScript -->
     <script src="{{asset('vendor/js/jquery.countTo.js')}}"></script>
     <!-- Magnific-popup JavaScript -->
     <script src="{{asset('vendor/js/jquery.magnific-popup.min.js')}}"></script>
     <!-- Wow JavaScript -->
     <script src="{{asset('vendor/js/wow.min.js')}}"></script>
     <!--  Custom JavaScript -->
     <script src="{{asset('')}}vendor/js/custom.js"></script>
  </body>
</html>
