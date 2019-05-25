<!--Grid column-->
<div class="pull-{{ getReverseDirection() }} col-md-3 mb-3" id="sticky-sidebar" >
<!-- Sticky content -->
<div class="sticky-top">
            <!--Card : Dynamic content wrapper-->
            <div class="card mb-4 text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <!--Card content-->
                <div class="card-body">
                    <div class="input-group form-sm form-1 pl-0">
                        <input class="form-control my-0 py-1" type="text" placeholder="{{ trans('website.search') }}" aria-label="Search">
                        <div class="input-group-append">
                            <span class="input-group-text cyan lighten-2"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.Card : Dynamic content wrapper-->

            <!--Card : Dynamic content wrapper-->
            <div class="card mb-4 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <!--Card content-->
                <div class="card-body">
                    <!-- Title -->
                    <h4 class="card-title">{{ trans('website.menu') }}</h4>
                    <ul class="list-group list-group-flush">
                        <ul class="list-group">
                            {!! website_menu("website left", "website.menu.left") !!}
                        </ul>
                    </ul>
                </div>
            </div>
            <!--/.Card : Dynamic content wrapper-->

            <!--Card : Dynamic content wrapper-->
            <div class="card mb-4 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <!--Card content-->
                <div class="card-body">
                    <!-- Title -->
                    <h4 class="card-title">{{ trans('website.link') }}</h4>
                    <ul class="list-group list-group-flush">
                        <ul class="list-group">
                            {!! website_left_menu('website links') !!}
                        </ul>
                    </ul>
                </div>
            </div>

            <!--/.Card : Dynamic content wrapper-->   
            </div>
    </div>
    <!--Grid column-->