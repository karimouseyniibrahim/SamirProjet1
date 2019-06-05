<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ getDir() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DZ Express') }} | Accueil</title>

    {{ Html::Style('website/home/diaporama.css') }}
    {{ Html::Style('website/home/general-styles.css') }}
    {{ Html::Style('website/home/iconfont.css') }}
    {{ Html::Style('website/home/css.css') }}
    {{ Html::Style('website/home/css_002.css') }}
    {{ Html::Style('website/home/css_003.css') }}
    {{ Html::Style('website/home/header-menu.css') }}
    {{ Html::Style('website/home/site-footer.css') }}
    {{ Html::Style('website/home/bootstrap.css') }}
    {{ Html::Style('website/home/ihover.css') }}
    {{ Html::Style('website/home/animate.css') }}
    {{ Html::Style('website/home/home.css') }}

    @yield('style')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @stack('css')
</head>
<body class="home page-template-default page page-id-5693">
    <div id="site_wrapper">
        <div id="wrapperHeader" class="home-menu">
            <div class="bootstrap-iso">
                <div id="burger-buttonv2" class="push-toggle push-toggle-right pull-right ">
                    <div class="pull-right" data-toggle="push" data-target="#sidebar-right" data-distance="-350">
                        <span class="i-md i123-filter" aria-hidden="true"></span>
                    </div>
                </div>
            </div>

            <div>
                <div id="logo_white" class="header-cell">
                    <a href="{{ route('home') }}">
                        <img src="{{ url('website') }}/home/logo2x.png" style="width : 50px; height : 50px" title="DZ Express" alt="DZ Express">
                    </a>
                </div>

                <!-- Menu button -->
                <div id="signup-request-buttons_outside" class="signup-request-buttons_outside visible-link-sm">
                    <div class="menu_req_btn">
                        <a class="menu_main_cta " href="{{ route('register') }}">INSCRIPTION</a>
                    </div>
                </div>

                <div id="sidebar_right_scoolbar">
                    <div id="sidebar-right" class="navbar push-sidebar push-sidebar-right hidden home-menu">
                        <div class="signup-request-buttons_small ">
                            <div class="visible-link-sm2">       
                                <div class="menu_req_btn">
                                    <a class="menu_main_cta " href="{{ route('register') }}">INSCRIPTION</a>
                                </div>                        
                            </div>
                        </div>
                        <div class="link_menu_position">
                            <div id="headerUses" class="menu_item_header  menu_header_dropdown ">
                                <div class="menu_item_link remove_pointer">
                                    <a href="#">LIENS</a>
                                </div>
                                <div id="otherUsesLink" class="menu_header_dropdown-content">
                                    <div class="menu_header_nav-sublink">
                                        <a href="https://www.poste.dz/" title="Site officiel pour Algérie poste">ALgérie Poste</a>
                                    </div>
                                    <div class="menu_header_nav-sublink">
                                        <a href="#" title="Paiement direct">Payement en Ligne</a>
                                    </div>
                                </div>
                            </div>
                            <!--Corporate section-->
                            <div id="headerPricing" class="menu_item_header  ">
                                <div class="menu_item_link top-menu">
                                    <a href="Catalogue_tarifs.pdf" title="Tarifs">Tarifs</a>
                                </div>
                            </div>
                            <div class="signup-request-buttons visible-link-big">
                                <div class="menu_req_btn">
                                    <a class="menu_main_cta " href="{{ route('register') }}">INSCRIPTION</a>
                                </div>                        
                            </div>
                            <div class="menu_login_btn top-menu ">
                                <a class="menu_login_cta " href="{{ route('login') }}">Connexion</a>
                            </div><!-- end Signup & Login buttons -->
                        </div>
                    </div><!-- end main_menu -->
                </div>
            </div><!-- end header -->
        </div><!-- end headerContainer -->

        <div id="fancy_page_wrapper">
            <section id="content" role="main">
                <article id="post-5693" class="post-5693 page type-page status-publish">
                    <section class="entry-content">                          
                        <section class="banner">
                            <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
                                <div class="mac">
                                    <img class="lazyloaded" src="{{url('website') }}/home/mac.png">
                                </div>
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active left"> 
                                        <div class="carousel-caption">
                                            <h1>Notre suivi est  temps réel </h1>
                                            <a href="{{ route('register') }}">Inscription gratuite!</a>
                                            <div class="img-container">
                                                <img class="lazyloaded" src="{{ url('website') }}/home/img/event-registration-small.jpg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item next left"> 
                                        <div class="carousel-caption">
                                            <h1>Découvrez l'efficacité de la livraison en ligne</h1>
                                            <a href="{{ route('register') }}">Inscription gratuite!</a>
                                            <div class="img-container">
                                                <img class="lazyloaded" src="{{ url('website') }}/home/img/order-form-small.jpg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item"> 
                                        <div class="carousel-caption">
                                            <h1>Découvrez l'éfficacité de la livraison en ligne</h1>
                                            <a href="{{ route('register') }}">Inscription gratuite!</a>
                                            <div class="img-container">
                                                <img class="lazyloaded" src="{{ url('website') }}/home/contact-form-small.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end #carouselFade -->
                        </section>
                        <section class="build">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h2>Notre suivi en ligne vous donne en temps réel, les détails de l’acheminement de votre envoi.</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="build-animation right-picture-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-5 col-lg-offset-0 col-md-offset-0 col-sm-offset-1 col-sm-10 col-xs-offset-0 col-xs-12 build-text">
                                            <h3>Avec l'application mobile <span></span></h3>
                                            <h4>Gardez le contrôle de vos expéditions</h4>
                                        </div>
                                        <div class="col-lg-5 col-lg-offset-1 col-md-7 col-md-offset-0 col-sm-offset-1 col-sm-10 col-xs-12">
                                            <div class="right-image">
                                                <img class="lazyloaded" src="{{ url('website') }}/home/build-animation.gif">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="home-submissions">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-1 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
                                        <div class="submission-sign">
                                            <div class="submissions">
                                                <div class="row">
                                                    <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
                                                        <p>198.120.834</p>
                                                        <p>Colis en été délivrées cette année.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="signup">
                                                <div class="row">
                                                    <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10  col-sm-offset-1 col-sm-10 col-xs-offset-0 col-xs-12">
                                                        <form method="POST">
                                                            <input type="text" name="colisId" placeholder="Saisissez votre numéro de suivi"> 
                                                            <button>Trouver</button>
                                                        </form>
                                                        <p>S'inscrire prend moins de 60 secondes.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>                    
                        <div class="entry-links"></div>
                    </section>
                </article>
            </section>

            <footer id="sitefooter">
                <div class="container-fluid">
                    <div class="footer_inner">
                        <div class="footer_inner_row row">
                            <div class="col-md-3">
                                <div class="footer_title">Solutions</div>
                            </div>
                            <div class="col-md-3">
                                <div class="footer_title">Politique de l'entreprise</div>
                            </div>
                            <div class="col-md-3">
                                <div class="footer_title">Adresses utiles</div>
                                <div class="footer_links">
                                    <div class="footer_links__inner">
                                        <a class="footer-item-link" href="">Algérie poste</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="footer_title">Envoie Express</div>
                                    <div class="footer_links">
                                        <div class="footer_links__inner">
                                            <a class="footer-item-link" href="">Partenariat</a>
                                        </div>
                                        <div class="footer_links__inner">
                                            <a class="footer-item-link" href="">EMS</a>
                                        </div>
                                        <div class="footer_links__inner">
                                            <a class="footer-item-link" href="">DHL</a>
                                        </div>
                                        <div class="footer_links__inner">
                                            <a class="footer-item-link" href="">Fedex</a>
                                        </div>
                                        <div class="footer_links__inner">
                                            <a class="footer-item-link" href="" title="Statut du site"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{ Html::script('website/home/jquery_002.js') }}
    {{ Html::script('website/home/jquery-migrate.js') }}
    {{ Html::script('website/home/jquery.js') }}
    {{ Html::script('website/home/site-footer.js') }}
    {{ Html::script('website/home/footer.js') }}
    {{ Html::script('website/home/header_menu.js') }}
    {{ Html::script('website/home/wow.js') }}
    {{ Html::script('website/home/lazysize.js') }}
    {{ Html::script('website/home/home.js') }}

</body>
</html>