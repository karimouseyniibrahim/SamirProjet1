@push('css')
    {{ Html::style('/website/css/lightgallery.min.css') }}
    {{ Html::style('/website/css/animation.css') }}
@endpush
<hr>
<p class="font-weight-bold dark-grey-text text-center text-uppercase spacing">
    <strong>{{ trans('website.gallery') }}</strong>
</p>
<hr>
@php $sidebarGalleries = \App\Application\Model\Medias::latest()
                    ->with('filesmedia:medias_id,url as src')
                    ->where('type',1)
                    ->limit(5)
                    ->get();
@endphp
@if (count($sidebarGalleries) > 0)
    <div class="row">
        @foreach ($sidebarGalleries as $item)
            <div class="col-md-6 col-sm-6 mb-3">
                @php $url =  isset($item->filesmedia) ? $item->filesmedia[0]->src : "/files/82.jpg" @endphp
                {{--<a id="{{$item->id}}" onClick="viewlightbox(this,{{$item->id}},{{$item->filesmedia}})">--}}
                    {{--<img src="{{$url}}" class="img-fluid">--}}
                {{--</a>--}}
                <div class="view overlay z-depth-1">
                    <img src="{{$url}}" class="img-fluid" alt="{{ $item->title_lang }}">
                    <a onClick="viewlightbox(this,{{$item->id}},{{$item->filesmedia}})">
                        <div class="mask rgba-white-slight waves-effect waves-light"></div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        <a class="btn btn-primary btn-sm btn-squared" href="{{ url('gallery') }}"
           style="text-decoration: none;"><i class="fas fa-eye left"></i> {{trans("medias.show-all")}}</a>
    </div>
@endif

@push('js')
    {{ Html::script('/website/js/lightgallery.js') }}
    {{ Html::script('/website/js/lg-zoom.js') }}
    {{ Html::script('/website/js/demos.js') }}

    @include('website.viewbox')
@endpush