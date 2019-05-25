@if(isset($images))
<div id="cam-carousel" class="carousel container slide carousel-fade carousel-half" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        @foreach($images as $i => $v)
            <li data-target="#cam-carousel" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : ''}}"></li>
        @endforeach
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @foreach($images as $i => $img)
        <!--slide-->
        <div class="carousel-item {{ $i == 0 ? 'active' : ''}}">
            <div class="view h-100">
                <img class="d-block h-100 w-lg-100" src="{{ url('/'.env('UPLOAD_PATH').'/'.$img) }}" alt="">
                <div class="mask rgba-black-light"></div>
            </div>
        </div>
        <!--/slide-->
        @endforeach
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#cam-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#cam-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
@endif