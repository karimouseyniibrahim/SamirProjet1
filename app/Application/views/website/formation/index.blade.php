@extends(layoutExtend('website', 'blog'))

@section('title')
    {{ trans('formation.formation') }} {{ trans('home.control') }}
@endsection

@section('content')
    <!-- Site: Our Trainings -->
    <section class="text-center">
        <!-- Site heading -->
        <h2 class="h1-responsive font-weight-bold">{{ trans('website.formation') }}</h2>
        <hr class="my-5">

        @if (count($items) > 0)
        <!--Card : Dynamic content wrapper-->
            <div class="card mb-4 text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <!--Card content-->
                <div class="card-body">
                    <form method="get">
                        <div class="input-group form-md form-1 pl-0">
                            <input class="form-control my-0 py-1" name="libelle" type="text"
                                   placeholder="{{ trans('formation.libelle') }}"
                                   value="{{ request()->has("libelle") ? request()->get("libelle") : "" }}"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn input-group-text cyan lighten-2"
                                        style="padding: .375rem .75rem; margin: 0;" type="submit"><i
                                            class="fas fa-search text-white" aria-hidden="true"></i></button>
                                <a href="{{ url("formation") }}" class="btn input-group-text red lighten-2"
                                   style="padding: .375rem .75rem; margin: 0;"><i class="fa fa-trash text-white"
                                                                                  aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.Card : Dynamic content wrapper-->
            <div class="text-center mb-3">
                <a class="btn btn-primary btn-md btn-rounded" data-toggle="modal"
                   data-target="#modalSubscription">{{ trans('formation.subscribe') }}</a>
            </div>
            <!-- Grid row-->
            <div class="row pull-{{ getDirection() }} text-md-left">
            @foreach ($items as $d)
                <!-- Grid column -->
                <div class="col-md-6 mb-2 clearfix d-none d-md-block">
                    <!-- Card -->
                    <div class="card card-cascade narrower card-ecommerce">
                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img src="{{ url('/'.env('UPLOAD_PATH').'/Formation/'.$d->id.'/'.$d->image) }}"
                                 class="card-img-top">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card image -->
                        <!-- Card content -->
                        <div class="card-body card-body-cascade">
                            <!-- Title -->
                            <h5 class="card-title text-center">
                                <strong>
                                    <a href="{{ url($d->url) }}">{{ $d->libelle_lang }}</a>
                                </strong>
                            </h5>
                            <p class="text-justify dark-grey-text">
                                {!! str_limit(nl2br($d->description_lang), 200) !!}
                            </p>
                            <!-- Card footer -->
                            <div class="card-footer px-1">
                                <p><i class="fa fa-dollar-sign mr-3"></i> {{ $d->price }} {{ trans('formation.price_unit') }}</p>
                                <p><i class="fa fa-calendar-alt mr-3"></i> {{ trans('formation.from') }} : {{ $d->debut_formation }} {{ trans('formation.to') }} {{ $d->fin_formation }}</p>
                                 <span class="float-right">
                            <a class="" href="{{ url($d->url) }}" data-toggle="tooltip" data-placement="top"
                               title="" data-original-title="Quick Look">
                                <i class="fas fa-eye ml-3"></i>
                            </a>
                        </span>
                            </div>
                        </div>
                        <!-- Card content -->
                    </div>
                    <!-- Card -->
                </div>
            @endforeach
            </div>
            <!-- Grid row-->

            @include("website.formation.subscribe", ["formations" => $items->where('fin_formation', '>', \Carbon\Carbon::today()->format('Y-m-d'))-> pluck('libelle_lang', 'id'), "selected_id" => null])
        @else
            <a href="{{ url('formation') }}" class="btn btn-danger btn-sm"><i
                        class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>

            <!-- Card -->
            <div class="card card-cascade">
                <!-- Card image -->
                <div class="view view-cascade gradient-card-header blue-gradient">
                    <!-- Title -->
                    <h2 class="card-header-title mb-3">{{ trans('formation.empty') }}</h2>
                </div>
            </div>
            <!-- Card -->
        @endif
        @include(layoutPaginate() , ["items" => $items])
    </section>
@endsection
