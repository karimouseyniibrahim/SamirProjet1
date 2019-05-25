<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CAM Souk Akhras') }} | @yield('title')</title>

    <!-- Bootstrap Core Css -->      
    @if(getDir() == 'rtl')
        {{ Html::Style('website/css/css/bootstrap-rtl.css') }}
        <!-- <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"> -->
    @else
        {{ Html::Style('website/css/css/bootstrap.css') }}
    @endif
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"> -->
    {{ Html::Style('website/css/css/fontawesome5.css') }}
    {{ Html::style('css/sweetalert.css') }}
    {{ Html::Style('website/css/custom.css') }}
    <!-- Waves Effect Css -->
    {{ Html::Style('website/css/css/mdb.min.css') }}
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

    <div id="app">
        @include(layoutMenu('website'))
        <!--Main layout-->
        <main class="mt-5 pt-2">
            @include(layoutMain('website'))
            @include(layoutContent('website'))
        </main>
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
    @yield('script')
    @stack('js')

</body>
</html>
