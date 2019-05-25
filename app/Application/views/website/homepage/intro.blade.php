@php
    $director_speech = page(1);
@endphp
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