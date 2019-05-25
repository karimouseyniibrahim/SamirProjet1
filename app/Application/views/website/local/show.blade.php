@extends(layoutExtend('website', 'blog'))

@section('title')
    {{ trans('local.local') }} {{ trans('home.view') }}
@endsection

@section('content')
    <section class="extra-margins pb-5 text-center">
        <!-- Grid row -->
        <div class="row pull-{{ getDirection() }}">
            <!-- Grid column -->
            <div class="col-lg-12 col-md-12 mb-0">
                <div class="card card-cascade wider">
                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                        <img class="card-img-top mx-auto d-block"
                             src="{{ url('/'.env('UPLOAD_PATH').'/Local/'.$item->id.'/'.$item->image) }}"
                             style=" height: 250px;  " alt="{{ $item->name_lang }}">
                    </div>
                    <!-- Card content -->
                    <div class="card-body card-body-cascade text-center">
                        <!-- Title -->
                        <h4 class="card-title blue-text pb-2"><strong>{{ $item->name_lang }}</strong></h4>
                        <!-- Subtitle -->
                        <h5 class="pb-2">
                            <strong>
                                <i class="fa fa-dollar-sign"></i> {{ $item->price }} {{ trans('local.price_unit') }}
                                /
                                <i class="fa fa-chart-pie"></i> {{ $item->area }} {{ trans('local.area_unit') }}
                            </strong>
                        </h5>
                        <!-- Text -->
                        <p class="card-text">{!! $item->description_lang !!}</p>

                        <!-- Linkedin -->
                        <a class="btn btn-info btn-rounded btn-md" data-toggle="modal"
                           data-target="#modalRequest">{{ trans('local.request') }}</a>

                    </div>
                </div>
            </div>
        </div>
        @include("website.site.request", ["sites" => $data['data'], "site_id" => $item->site_id,'local_id'=>$item->id])
        @include(layoutMessage('website'))
    </section>

    <a href="{{ url('site') }}" class="btn btn-danger btn-sm"><i
                class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
@endsection


