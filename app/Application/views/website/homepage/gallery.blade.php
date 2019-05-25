@php
    $galleries = \App\Application\Model\Medias::latest()
                ->with('filesmedia:medias_id,url as src')
                ->where('type',1)
                ->limit(5)
                ->get();
    $collections = collect([]);
    foreach ($galleries as $gallery) {
        $collections = $collections->merge($gallery->filesmedia->slice(0,3));
    }
@endphp

<!-- Section Gallery -->
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
<!--/.Section Gallery -->