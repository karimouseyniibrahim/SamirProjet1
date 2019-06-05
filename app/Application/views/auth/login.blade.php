<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DZ Express') }} | Connexion</title>

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
        <input type="hidden" id="current-page" value="login">
        <input id="isWixUserHidden" type="hidden" value="0">
        <div class="wrapper-container">
            <div class="picture common-background">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ url('website') }}/login/logo2x.png" alt="Logo">
                    </a>
                </div>
            </div>
   
            <div class="form-wrapper">
                <div class="form-container">
                    <div class="formSL">
                        <div class="mobile-header">
                            <div class="logo-mobile">
                                <a href="https://www.dzexpress.com/">
                                    <img src="{{ url('website') }}/login/logo.png" style="width: 100px;" alt="Logo">
                                </a>
                            </div>
                            <div class="create-account-link-mobile">
                                <p class="create-account">
                                    <a href="{{ route('register')}}" class="ignore-validation blue " target="_self">S'inscrire</a>
                                </p>
                            </div>
                        </div>

                        <h1>Se connecter</h1>
           
                        <form class="form-horizontal form-signin" method="post" action="{{ route('login') }}">
                            {{ csrf_field() }}              
                            <div class="form-group form-group-margin">
                                <label for="email" class="no-mobile-display">
                                    Nom d'utilisateur / Mail
                                </label>
                                <input type="text" name="email" value="{{ old('email') }}" required id="email" autofocus="" class="form-control  ajax-convert-lable field-required" data-placeholder="Nom d'utilisateur / Mail" id="inputUsername" placeholder="">
                            </div>

                            <div class="form-group form-group-margin">
                                <label for="password" class="no-mobile-display">
                                    Mot de passe
                                </label>
                                <input type="password" name="password" required id="password" class="form-control ajax-convert-lable field-required" data-placeholder="Mot de passe" id="inputPassword" placeholder="">
                            </div>
                    
                            <div class="form-group keep">
                                <div class="checkbox-regular">
                                    <label class="margin-bottom-10">
                                        <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : '' }} id="remember" class="regular-checkbox" checked="checked"><label for="checkbox-1-1"></label> Rester connecté
                                    </label>
                                </div>
                            </div>

                            <div class="form-group form-group-margin forgot">
                                <a href="{{ route('password.request') }}" class="blue ignore-validation" target="_self">Mot de passe oublié?</a>
                            </div>

                            <div class="form-group ">
                                <button id="submit-form-button" class="btn btn-sm btn-success center margin-bottom-15" type="submit">Se connecter</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="create-account-link">
                <p class="create-account">Pas de compte? 
                    <a href="{{ route('register') }}" class="ignore-validation blue " target="_self">S'inscrire</a>
                </p>
            </div>
        </div>
    </div>


    <!-- Jquery Core Js -->
    {{ Html::script('website/css/js/jquery-3.3.1.min.js') }}
    <!-- Bootstrap Core Js -->
    {{ Html::script('website/css/js/popper.min.js') }}
    <!-- Select Plugin Js -->
    {{ Html::script('website/css/js/bootstrap.min.js') }}
    {!! Links::track(true) !!}

    @yield('script') @stack('js')

</body>
</html>