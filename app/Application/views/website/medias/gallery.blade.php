@extends(layoutExtend('website', 'blog'))

@section('title')
    {{ trans('medias.medias') }} {{ trans('home.control') }}
@endsection
@section('style')
    {{ Html::style('/website/css/lightgallery.min.css') }}
    {{ Html::style('/website/css/animation.css') }}
@endsection

@section('content')
    <!-- Section: Our Gallery -->
    <section class="section extra-margins pb-3 text-center text-lg-left">
        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.gallery') }}</h2>
        <hr class="my-5"/>
        <div class="row text-center">
            @if (count($items) > 0)
                @foreach ($items as $d)
                    @php $url =  isset($d->filesmedia) ? $d->filesmedia[0]->src : "/files/82.jpg" @endphp
                    <div class="col-md-6 mb-4">
                        <!--Featured image-->
                        <div class="view overlay z-depth-1 mb-2">
                            <img src="{{ $url }}" class="img-fluid" alt="{{ $d->name_lang }}" style="height:300px">
                            <a>
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>

                        <!--Excerpt-->
                        <a class="blue-text text-center text-uppercase font-small">
                            {{ $d->updated_at }}
                        </a>

                        <h4 class="mb-3 text-uppercase font-weight-bold dark-grey-text spacing">
                            <strong>{{ $d->name_lang }}</strong>
                        </h4>
                        <p class="text-justify dark-grey-text">
                            {!! str_limit($d->description_lang , 300) !!}
                        </p>
                        <hr class="pb-0 mb-0">
                        <a class="btn btn-primary btn-sm waves-effect waves-light" id="{{$d->id}}"
                           onClick="viewlightbox(this,{{$d->id}},{{$d->filesmedia}})">
                            <i class="fa fa-eye"></i> {{ trans("medias.views")}}
                        </a>
                        <a class="btn btn-primary btn-sm waves-effect waves-light"
                           onClick="modal('{!! $d->description_lang !!}')">
                            <i class="fa fa-info"></i> {{trans("medias.details")}}
                        </a>
                        <hr class="pt-0 mt-0">
                    </div>
                @endforeach
            @else
            <!-- Card -->
                <div class="card card-cascade">
                    <!-- Card image -->
                    <div class="view view-cascade gradient-card-header blue-gradient">
                        <!-- Title -->
                        <h2 class="card-header-title mb-3">{{ trans('medias.gallery.empty') }}</h2>
                    </div>
                </div>
                <!-- Card -->
                <a href="{{ url('/') }}" class="btn btn-danger btn-sm"><i
                            class="fa fa-arrow-left"></i> {{ trans('website.BackHome') }}  </a>
            @endif
        </div>
    </section>
@endsection

@section('script')
    @include('sweet::alert')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    {{ Html::script('/website/js/prettify.js') }}
    {{ Html::script('/website/js/transition.js') }}
    {{ Html::script('/website/js/collapse.js') }}
    {{ Html::script('/website/js/lightgallery.js') }}
    {{ Html::script('/website/js/lg-zoom.js') }}
    {{ Html::script('/website/js/demos.js') }}

    @include('website.viewbox')
@endsection