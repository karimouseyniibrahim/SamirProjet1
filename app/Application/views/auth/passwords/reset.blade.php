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
    
    {{ Html::Style('website/login/css.css') }}
    {{ Html::Style('website/login/urnqre_zrah_i3.css') }}
    {{ Html::Style('website/login/messageToUser.css') }}
    {{ Html::Style('website/login/styleGuidCSS.css') }}
    {{ Html::Style('website/login/customSpinner.css') }}
    {{ Html::Style('website/login/jquery.css') }}
    
    @yield('style')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @stack('css')
</head>

<body class="hiddenlayout ">
    <div id="cleancontent" class="login-page">
        <div class="wrapper-container">
            <div class="picture common-background">
                <div class="logo">
                    <a href="{{ url('home') }}">
                        <img src="{{ url('website') }}/login/logo2x.png" alt="Logo">
                    </a>
                </div>
            </div>
   
            <div class="form-wrapper">
                <div class="form-container">
                    <div class="formSL password-reset">
                        <div class="mobile-header">
                            <div class="logo-mobile">
                                <a href="https://www.dzexpress.com/">
                                    <img src="{{ url('website') }}/login/logo.png" alt="Logo">
                                </a>
                            </div>
                            <div class="create-account-link-mobile">
                                <p class="create-account">
                                    <a href="{{ route('login')}}" class="ignore-validation blue">Se connecter</a>
                                </p>
                            </div>
                        </div>
                        <p class="flotte">
   
                        <h1>Modifier le mot de passe</h1>
                        <p>
                            Merci de saisir le mail associé à votre compte, et nous allons envoyer par mail le lien du nouveau mot de passe.
                        </p>

                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                
                        <form class="form-horizontal form-signin" method="post" action="{{ route('password.email') }}">
                            {{ csrf_field() }}              
                            <div class="form-group form-group-margin">
                                <label for="email" class="no-mobile-display">
                                    Compte Mail
                                </label>
                                <input type="text" name="email" value="{{ old('email') }}" required id="email" autofocus="" class="form-control  ajax-convert-lable field-required" data-placeholder="Nom d'utilisateur / Mail" id="inputUsername" placeholder="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group form-group-margin forgot">
                                <a href="{{ route('register') }}" class="blue ignore-validation" target="_self">Je ne souviens plus de mon mail d'inscription?</a>
                            </div>

                            <div class="form-group ">
                                <button id="submit-form-button" class="btn btn-sm btn-success center margin-bottom-15" type="submit">Continuez</button>
                            </div>
                        </form>

                    </div>
                </div>
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