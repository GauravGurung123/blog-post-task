<!doctype html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
        
        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="{{asset('css/core/libs.min.css')}}" />
        
        <!-- Aos Animation Css -->
        <link rel="stylesheet" href="{{asset('vendor/aos/dist/aos.css')}}" />
        
        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="{{asset('css/hope-ui.min.css?v=1.2.0')}}" />
        
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{asset('css/custom.min.css?v=1.2.0')}}" />
        
        <!-- Dark Css -->
        <link rel="stylesheet" href="{{asset('css/dark.min.css')}}"/>
        
        <!-- Customizer Css -->
        <link rel="stylesheet" href="{{asset('css/customizer.min.css')}}" />
        
        <!-- RTL Css -->
        <link rel="stylesheet" href="{{asset('css/rtl.min.css')}}"/>

        <!-- Select2 Css -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
       
        
    </head>

    <body class="  ">
        <!-- sidebar -->
        @include('dashboard.layouts.sidebar')        
        
        <main class="main-content">
        
            <!--Nav Start-->
            @include('dashboard.layouts.nav')        

            <!-- Main content -->
            <div class="conatiner-fluid content-inner mt-n5 py-0">
                @yield('content-main')
            </div>
            <!-- Main content -->
            <!-- footer -->
            @include('dashboard.layouts.footer')  
        
        </main>


    <!-- Library Bundle Script -->
    <script src="{{asset('js/core/libs.min.js')}}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{asset('js/core/external.min.js')}}"></script>
    
    <!-- Widgetchart Script -->
    <script src="{{asset('js/charts/widgetcharts.js')}}"></script>
    
    <!-- mapchart Script -->
    <script src="{{asset('js/charts/vectore-chart.js')}}"></script>
    <script src="{{asset('js/charts/dashboard.js')}}" ></script>
    
    <!-- fslightbox Script -->
    <script src="{{asset('js/plugins/fslightbox.js')}}"></script>
    
    <!-- Settings Script -->
    <script src="{{asset('js/plugins/setting.js')}}"></script>
    
    <!-- Slider-tab Script -->
    <script src="{{asset('js/plugins/slider-tabs.js')}}"></script>
    
    <!-- Form Wizard Script -->
    <script src="{{asset('js/plugins/form-wizard.js')}}"></script>
    
    <!-- AOS Animation Plugin-->
    <script src="{{asset('vendor/aos/dist/aos.js')}}"></script>
    
    <!-- App Script -->
    <script src="{{asset('js/hope-ui.js')}}" defer></script>
    
    <!-- Jquery Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

    @yield('content-script')
    
</body>
</html>