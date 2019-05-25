<div class="container mt-5">
    <div class="row mt-5 pt-3">
        <div class="col-lg-3 col-12 px-4 mt-1 grey lighten-4">
            @include(layoutSideBar('website', 'blog-sidebar'))
        </div>
        <div class="col-lg-9 col-12 mt-1">
            @yield('content')
        </div>
    </div>
</div>