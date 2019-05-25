@extends(layoutExtend('website', 'blog'))
@section('title')
    {{ trans('page.page') }} {{ trans('home.view') }}
@endsection

@section('content')
    <!-- Section: Page -->
    <section class="extra-margins pb-5 text-lg-left">
        <!--Grid row-->
        <div class="row pull-{{ getDirection() }}">
            <!--Grid column-->
            <div class="col-lg-12 col-md-12 mb-0">
                @if(isset($imag['imag']))
                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-2 mb-4">
                        <img src="{{ $imag['imag']}}" class="card-img-top mx-auto d-block"
                             alt="{{ $fields->title_lang }}" style="height: 300px;">
                        <a>
                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                        </a>
                    </div>
                @endif
                <!-- Page Title-->
                <h4 class="font-weight-bold mb-3">
                    <strong>{{ $fields->title_lang }}</strong>
                </h4>
                <hr>
                <!-- Page Content-->
                <p class="dark-grey-text mb-3 mt-4 mx-4">
                    {!! nl2br($fields->body_lang) !!}
                </p>
            </div>
            <!--Grid column-->
        </div>
        <!--/Grid row-->
    </section>
@endsection
