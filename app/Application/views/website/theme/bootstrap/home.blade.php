@extends(layoutExtend('website', 'home'), ["images"=>$images])

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

    @include('website.homepage.intro')
    @include('website.homepage.news')
    {{--@include('website.homepage.formation')--}}
    {{--@include('website.homepage.site')--}}
    @include('website.homepage.gallery')

@endsection

@push('js')
    <script>
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("website/mdb-lightbox-ui.html");
        });
    </script>
@endpush