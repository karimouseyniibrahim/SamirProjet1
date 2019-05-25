<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CAM Souk Akhras') }} | {{ trans('admin.auth.title') }}</title>
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
    <div class="container">
        <div class="row my-5 d-flex justify-content-center">
            <div class="col-md-6">
                <!-- Default form login -->
                <form role="form" method="POST" action="{{ route('login') }}" class="text-center border border-light p-5">
                    <p class="h4 mb-4">{{ trans('admin.auth.title') }}</p>
                    {{ csrf_field() }}
                    <!-- Email -->
                    <input type="email" name="email" value="{{ old('email') }}" required id="email" class="form-control mb-4" placeholder="{{ trans('admin.auth.email') }}">
                    <!-- Password -->
                    <input type="password" name="password" required id="password" class="form-control mb-4" placeholder="{{ trans('admin.auth.password') }}">
                    <div class="float-left mb-4">
                        <div>
                            <!-- Remember me -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember">{{ trans('admin.auth.remember_me') }}</label>
                            </div>
                        </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">{{ trans('admin.auth.login') }}</button>
                </form>
                <!-- Default form login -->
            </div>
        </div>

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

    @yield('script') @stack('js')

</body>
</html>