@extends(layoutExtend('website'), ["imag"=>$imag])

@section('title')
    {{ trans('home.home') }}
@endsection

@section('style')
    {{ Html::style('/website/css/animation.css') }}
    <style>
        .show-all {
            width: 100%;
            height: 100%;
            align-self: center;
        }
    </style>
@endsection

@section('content')

    <!--Card Director word-->
    <div class="card mb-4 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <!--Card content-->
        <div class="card-body">
            <!-- Card Title -->
            <h2 class="card-title">{{ trans('website.director-word') }}</h2>

            {!!
                $director_speech->body_lang
            !!}
        </div>
    </div>
    <!--/.Card Director word-->

    <!--Latest News-->
    <section class="text-center mb-3">
        <h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.latest-news') }}</h2>
        <hr class="my-3">
        <!-- Carousel Wrapper -->
        <div id="news-caroussel" class="carousel slide carousel-multi-item" data-ride="carousel">
            <!--Controls-->
            <a class="carousel-control-prev left carousel-control" href="#news-caroussel" role="button"
               data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next right carousel-control" href="#news-caroussel" role="button"
               data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--Controls-->
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($news as $i => $v)
                    <li class="primary-color {{ $i == 0 ? 'active' : ''}}" data-target="#news-caroussel"
                        data-slide-to="{{ $i }}"></li>
                @endforeach
            </ol>
            <!-- Indicators -->
            <!-- Slides -->
            <div class="carousel-inner" role="listbox">
            @foreach($news as $i => $new)
                <!-- First slide -->
                    <div class="carousel-item {{ $i == 0 ? 'active' : ''}}">
                        <!-- Site: Blog v.1 -->
                        <div class="jumbotron text-center hoverable p-4">
                            <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-md-4 offset-md-1 mx-3">
                                    <!-- Featured image -->
                                    <div class="view overlay">
                                        <img src="{{ url('/'.env('UPLOAD_PATH').'/news/'.$new->id.'/'.$new->image) }}"
                                             class="img-fluid" alt="{{ $new->title_lang }}">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class="col-md-7 text-md-left ml-3 mt-3">
                                    <!-- Excerpt -->
                                    <!-- <a href="#!" class="green-text">
                                        <h6 class="h6 pb-1"><i class="fas fa-desktop pr-1"></i> Work</h6>
                                    </a> -->

                                    <h4 class="h4 mb-4">{{ $new->title_lang }}</h4>

                                    <p class="font-weight-normal">
                                        {!! str_limit($new->description_lang, 200) !!}
                                    </p>
                                    <p class="font-weight-normal">{{ $new->created_at }}</p>

                                    <a class="btn btn-indigo btn-md"
                                       href="{{ url($new->url) }}">{{ trans('website.read-more') }}</a>
                                </div>
                                <!-- Grid column -->
                            </div>
                            <!-- Grid row -->
                        </div>
                    </div>
                    <!-- First slide -->
                @endforeach
            </div>
            <!-- Slides -->
        </div>
        <!-- Carousel Wrapper -->
    </section>
    <!--/.Latest News-->

    <!--Site Sites -->
    <section class="text-center mb-3">
        <!-- Site heading -->
        <h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.site') }}</h2>
        <hr class="my-3">
        <!-- Site description -->
        <!-- Grid row -->
        <div class="row">
        @foreach($sites as $site)
            <!-- Grid column -->
                <div class="col-lg-4 col-md-4 mb-lg-0 mb-4">
                    <div class="box3">
                        <img src="{{ url('/'.env('UPLOAD_PATH').'/Site/'.$site->id.'/'.$site->image) }}"
                             style="height:300px">
                        <div class="box-content">
                            <h3 class="title">{{ $site->name_lang }}</h3>
                            <div class="description d">
                                {!! str_limit($site->description_lang , 150) !!}
                            </div>
                            <ul class="icon">
                                <a class="btn btn-primary btn-sm btn-squared " href="{{ url($site->url) }}"><i
                                            class="fas fa-eye left"></i> {{trans("site.show")}}</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Grid column -->
        @endforeach
        <!-- Grid column -->
            <div class="col-lg-4 col-md-4 mb-lg-0 mb-4 show-all">
                <a class="btn btn-primary btn-md btn-squared " href="{{ url('site') }}"
                   style="text-decoration: none;"><i class="fas fa-eye left"></i> {{trans("section.show-all")}}</a>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </section>
    <!--/.SectiSites -->

    <!-- SectiSiteations -->
    <section class="team-section mb-3">
        <!-- SectiSiteing -->
        <h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.formation') }}</h2>
        <hr class="my-3">
        <!-- Grid row-->
        <div class="row text-center text-md-left">
        @foreach ($formations as $formation)
            <!-- Grid column -->
                <div class="col-md-4 mb-2 clearfix  d-md-block">
                    <!-- Card -->
                    <div class="card card-cascade narrower card-ecommerce">
                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img src="{{ url('/'.env('UPLOAD_PATH').'/Formation/'.$formation->id.'/'.$formation->image) }}"
                                 class="card-img-top">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card image -->
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <!-- Category & Title -->
                            <a href="" class="text-muted">
                                <h5>{{ $formation->libelle_lang }}</h5>
                            </a>
                            <!-- Card footer -->
                            <div class="card-footer px-1">
                                <span class="float-left">{{ $formation->price }} {{ trans('formation.price_unit') }}</span>
                                <span class="float-right">
							<a class="" href="{{ url($formation->url) }}" data-toggle="tooltip" data-placement="top"
                               title="{{ trans('formation.show') }}"
                               data-original-title="{{ trans('formation.show') }}">
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
        <!-- Grid column -->
            <div class="col-md-4 mb-2 clearfix d-none d-md-block show-all">
                <a class="btn btn-primary btn-md btn-squared " href="{{ url('formation') }}"
                   style="text-decoration: none;"><i class="fas fa-eye left"></i> {{trans("formation.show-all")}}</a>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row-->

    </section>
    <!--/.SectiSiteations -->

    <!-- SectiSiteery -->
    <section class="team-section mb-3">
        <!-- SectiSiteing -->
        <h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.gallery') }}</h2>
        <hr class="my-3">
        <!-- Grid row-->
        <div class="row text-center text-md-left">
            <!-- Grid column -->
            <div class="col-md-12">
                <div id="mdb-lightbox-ui"></div>
                <div class="mdb-lightbox">
                    @foreach($collections as $img)
                        <figure class="col-md-4">
                            <a href="{{ url($img->src) }}" data-size="1600x1067">
                                <img src="{{ url($img->src) }}" style="height:100px" alt="placeholder"
                                     class="card-img-top mx-auto d-block">
                            </a>
                        </figure>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 mt-3 show-all text-center">
                <a class="btn btn-primary btn-md btn-squared " href="{{ url('galery') }}"
                   style="text-decoration: none;"><i class="fas fa-eye left"></i> {{trans("website.show-all")}}</a>
            </div>
        </div>
        <!-- Grid row-->
    </section>
    <!--/.SectiSiteery -->
@endsection
@push('js')
    <script>
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("website/mdb-lightbox-ui.html");
        });
    </script>
@endpush