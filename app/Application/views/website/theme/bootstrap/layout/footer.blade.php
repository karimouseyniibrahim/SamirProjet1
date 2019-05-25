<!-- Footer -->
<footer class="page-footer font-small  light-blue text-md-left mt-5 pt-4">
    <!--Footer Links-->
    <div class="container">
        <div class="row text-center text-md-left mt-3 pb-3">
            <!--First column-->
            <div class="col-md-4 col-lg-4 col-xl-3 mb-4">
                <p>
                    <img src="{{ url('/'.env('UPLOAD_PATH').'/'.logo())}}"
                         class="card-img-top mx-auto d-block">
                </p>
                <h6 class="text-uppercase mb-4 font-weight-bold">{!! trans('setting.cam') !!}</h6>
            </div>
            <!--/.First column-->
            <!--Second column-->
            <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>{{ trans('website.link') }}</strong>
                </h6>
                <hr class="info-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                {!! website_menu('website links', 'website.menu.link') !!}
            </div>
            <!--/.Second column-->
            <!--Third column-->
            <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>{!! trans('contact.contact') !!}</strong>
                </h6>
                <hr class="info-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fas fa-home mr-3"></i> {!! trans('setting.adresse') !!}</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> {!! trans('setting.email') !!}</p>
                <p>
                    <i class="fas fa-phone mr-3"></i>{!! trans('setting.tel') !!}</p>
                <p>
                    <i class="fas fa-print mr-3"></i>{!! trans('setting.fax') !!}</p>
            </div>
            <!--/.Third column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-2 text-center">
        <p class="copyright">{{ getSetting('siteTitle') }} © 2019</p>
    </div>
    <!--/.Copyright-->

</footer>
<!-- Footer -->