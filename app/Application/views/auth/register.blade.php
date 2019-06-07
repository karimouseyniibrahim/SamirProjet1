<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DZ Express') }} | Inscription</title>
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
    <div id="cleancontent" class="createaccount-page">
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
   
                        <h1>Créer un Compte</h1>
                         @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
           
                        <form class="form-horizontal form-signin" method="post" action="{{ route('register') }}">
                            {{ csrf_field() }}       
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} form-group-margin">
                                <label for="name" class="no-mobile-display">
                                    Nom
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" required id="name" autofocus="" class="form-control field-required" placeholder="Nom d'utilisateur / Mail">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} form-group-margin">
                                <label for="email" class="no-mobile-display">
                                    Adresse e-mail
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" required id="email" autofocus="" class="form-control field-required" placeholder="Nom d'utilisateur / Mail">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} form-group-margin">
                                <label for="password" class="no-mobile-display">
                                    Mot de passe
                                </label>
                                <input type="password" name="password" required id="password" class="form-control field-required" placeholder="Mot de passe">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group form-group-margin">
                                <label for="password" class="no-mobile-display">
                                    Confirmer le mot de passe
                                </label>
                                <input type="password" name="password_confirmation" required id="password_confirmation" class="form-control field-required" placeholder="Confirmer le mot de passe">
                            </div>

                            <div class="form-group ">
                                <div class="gdpr_text">
                                    En vous inscrivant, vous acceptez nos 
                                        <a href="dzexpress.html" target="gdpr-compliance" class="termsofservice">conditions d`utilisation</a> et notre <a href="dzexpress/confidentialite/" target="gdpr-compliance" class="privacypolicy">politique de confidentialité</a>.                        </div>
                                <div class="">
                                    <button id="submit-form-button" class="btn btn-sm btn-success center margin-bottom-15" type="submit">
                                        Accepter & S'inscrire                        
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="create-account-link">
                <p class="move-down create-account">
                    Vous avez un compte?            
                    <a href="{{ route('login')}}" class="blue">
                        Se connecter                
                    </a>
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
    <!-- Slimscroll Plugin Js -->
    {{ Html::script('website/css/js/mdb.min.js') }}
    {{ Html::script('website/css/js/request.js') }}
    {{ Html::script('js/sweetalert.min.js') }}
    @include('sweet::alert')
    {!! Links::track(true) !!}

    @yield('script') @stack('js')

</body>
</html>