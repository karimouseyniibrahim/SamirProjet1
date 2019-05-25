<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CAM Souk Akhras') }} | @yield('title')</title>
    <!-- Bootstrap Core Css -->
    @if(getDir() == 'rtl') {{ Html::Style('website/css/css/bootstrap-rtl.css') }}
    @else {{ Html::Style('website/css/css/bootstrap.css') }} @endif
    <!-- Font Awesome -->
    {{ Html::Style('website/css/css/fontawesome5.css') }}
    {{ Html::style('css/sweetalert.css') }}
    {{ Html::Style('website/css/custom.css') }}
    <!-- Waves Effect Css -->
    {{ Html::Style('website/css/css/mdb.min.css') }}
    {{ Html::Style('website/css/css/custom.css') }}
    {{ Html::Style('website/plugins/flag-icon-css/css/flag-icon.min.css') }}
    {{ Html::Style('website/css/themes/all-themes.min.css') }}
    @yield('style')

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @stack('css')
</head>

<body class="theme-light-blue">

    <div id="top-section">
        @include(layoutMenu('website'))
        <!--Main layout-->
        <main>
            @include(layoutContent('website', 'blogcontent'))
        </main>
        <div id="topBtn" class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px; display: none">
            <a href="#top-section" class="btn-floating btn-large light-blue">
                <i class="fas fa-arrow-up"></i>
            </a>
        </div>
        @include(layoutFooter('website'))
    </div>

    <!-- Jquery Core Js -->
    {{ Html::script('website/css/js/jquery-3.3.1.min.js') }}
    <!-- Bootstrap Core Js -->
    {{ Html::script('website/css/js/popper.min.js') }}
    <!-- Select Plugin Js -->
    {{ Html::script('website/css/js/bootstrap.min.js') }}
    <!-- Slimscroll Plugin Js -->
    {{ Html::script('website/css/js/mdb.min.js') }}
    {{ Html::script('website/css/js/request.js') }}
    {{ Html::script('js/sweetalert.min.js') }}
    @include('sweet::alert')
    {!! Links::track(true) !!}
    <script>
        window.onscroll = function () {
            myFunction()
        };

        var header = document.getElementById("header");
        var navbar = document.getElementById("navbar");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("fixed-top");
                header.classList.remove("container");
                navbar.classList.remove("navbar-rounded")
            } else {
                header.classList.remove("fixed-top");
                header.classList.add("container");
                navbar.classList.add("navbar-rounded")
            }
            if (document.body.scrollTop > sticky || document.documentElement.scrollTop > sticky) {
                document.getElementById("topBtn").style.display = "block";
            } else {
                document.getElementById("topBtn").style.display = "none";
            }
        }
    </script>
    @yield('script') @stack('js')

</body>
</html>