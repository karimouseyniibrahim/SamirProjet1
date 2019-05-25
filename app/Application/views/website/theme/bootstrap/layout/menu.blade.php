<header class="top-container page-header page-header-sitebrand-topbar">
    <div class="col col-header">
        <div class="container">
            <div class="background-top">
                <div class="row row-with-vspace site-branding">
                    <div class="col-lg-8 col-sm-6 site-title">
                        <div class="padding">
                            <h1 class="site-title-heading">
                                <a href="{{ url('/') }}" title="{{ trans('setting.cam') }}" rel="home">
                                    <img class="img-fluid" src="{{ url('/'.env('UPLOAD_PATH').'/'.logo()) }}"
                                         alt="{{ trans('setting.cam') }}"></a>
                            </h1>
                            <!--<div class="site-description">-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 page-header-top-right">
                        <div class="padding">
                            <div class="d-none d-sm-block">
                                <ul class="list-unstyled list-inline-item circle-icons list-unstyled flex-center">
                                    {!! website_menu('website social', 'website.menu.social') !!}
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                                            <span class="flag-icon flag-icon-{{ getCurrentLang() }}"> </span> {{ LaravelLocalization::getSupportedLocales()[getCurrentLang()]['name'] }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown09">
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a class="dropdown-item" rel="alternate" hreflang="{{$localeCode}}"
                                                   href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                                    <span class="flag-icon flag-icon-{{$localeCode}}"> </span> {{ $properties['native'] }}
                                                </a> @endforeach
                                        </div>
                                    </li>
                                    @if (Auth::check())
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                @php
                                                    $img = isset(auth()->user()->image)? auth()->user()->id.'/'.auth()->user()->image:'user.png';
                                                @endphp
                                                <img src="{{url('/'.env('UPLOAD_PATH').'/users/'.$img)}}"
                                                     class="rounded-circle z-depth-0" alt="avatar image" height="35">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-primary"
                                                 aria-labelledby="navbarDropdownMenuLink-333">
                                                <a class="dropdown-item"
                                                   href="{{ url('/admin/home') }}">{{ trans('website.admin') }}</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ trans('website.logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <div class="d-none d-md-block">
                                <ul class="menu">
                                    {!! website_menu('website top', 'website.menu.top') !!}
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!--.site-branding-->

                <!-- version mobile -->
                <div class="d-block d-sm-none text-center">
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-unstyled list-inline-item circle-icons list-unstyled flex-center">
                                {!! website_menu('website social', 'website.menu.social') !!}
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        <span class="flag-icon flag-icon-{{ getCurrentLang() }}"> </span> {{ LaravelLocalization::getSupportedLocales()[getCurrentLang()]['native'] }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <a class="dropdown-item" rel="alternate" hreflang="{{$localeCode}}"
                                               href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                                <span class="flag-icon flag-icon-{{$localeCode}}"> </span> {{ $properties['native'] }}
                                            </a> @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<header id="header" class="container header">
    <!--Navbar-->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark  theme-light-blue navbar-rounded">

        <!-- Additional container -->
        <div class="container">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                   data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars" style="display: block;"></a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="expanding-hidden" src="{{ url('/'.env('UPLOAD_PATH').'/'.logo()) }}" alt=""/>
                </a>
            </div>
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                    aria-controls="navbar-collapse"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    {!! website_menu('website') !!}
                </ul>
                <!-- Links -->
            </div>
            <!-- Collapsible content -->
        </div>
        <!-- Additional container -->
    </nav>
    <!--/.Navbar-->
</header>