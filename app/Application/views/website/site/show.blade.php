@extends(layoutExtend('website', 'blog'))

@section('title')
    {{ trans('site.site') }} {{ trans('home.view') }}
@endsection

@section('content')
    <section class="extra-margins pb-5 text-center">
        <!-- Grid row -->
        <div class="row pull-{{ getDirection() }}">
            <!-- Grid column -->
            <div class="col-lg-12 col-md-12 mb-0">
                <!-- Featured image -->
                <div class="view overlay rounded z-depth-2 mb-4">
                    <img class="card-img-top mx-auto d-block" style="height: 300px;"
                         src="{{ url('/'.env('UPLOAD_PATH').'/Site/'.$item->id.'/'.$item->image) }}"
                         alt="{{ $item->name_lang }}">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Post title -->
                <h4 class="font-weight-bold mb-3"><strong>{{ $item->name_lang }}</strong></h4>
                <!-- Excerpt -->
                <p class="dark-grey-text">{!! $item->description_lang !!}</p>

                <hr/>

                <!-- Grid row -->
                <div class="row text-center">
                    @foreach ($data['locaux'] as $local)
                        <div class="col-md-4 mb-4">
                            <!--Featured image-->
                            <div class="view overlay z-depth-1 mb-2">
                                <img src="{{ url('/'.env('UPLOAD_PATH').'/Local/'.$local->id.'/'.$local->image) }}"
                                     class="img-fluid" alt="{{ $local->name_lang }}" style="height:200px">
                                <a>
                                    <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                </a>
                            </div>

                            <!--Excerpt-->
                            <h4 class="mb-3 text-uppercase font-weight-bold dark-grey-text spacing">
                                <a href="{{ url($local->url) }}"><strong>{{ $local->name_lang }}</strong></a>
                            </h4>
                            <p class="text-justify dark-grey-text">
                                {!! str_limit($local->description_lang , 300) !!}
                            </p>
                            <div class="text-left">
                                <p>
                                    <i class="fa fa-dollar-sign mr-3"></i> {{ $local->price }} {{ trans('local.price_unit') }}
                                </p>
                                <p>
                                    <i class="fa fa-chart-pie mr-3"></i> {{ $local->area }} {{ trans('local.area_unit') }}
                                </p>

                            </div>

                            <hr class="pb-0 mb-0">
                            <a class="btn btn-primary btn-sm waves-effect waves-light" href="{{ url($local->url) }}">
                                <i class="fa fa-eye"></i> {{ trans("local.show")}}
                            </a>
                            <hr class="pt-0 mt-0">
                        </div>
                    @endforeach
                </div>

                <!-- Read more button -->
                <a class="btn btn-info btn-rounded btn-md" data-toggle="modal"
                   data-target="#modalRequest">{{ trans('site.request') }}</a>

            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
        @include("website.site.request",  ["sections" => $data['data'], "section_id" => $item->id,"local_id" => null])

    </section>
    <a href="{{ url('section') }}" class="btn btn-danger btn-sm"><i
                class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>

@endsection


