@extends(layoutExtend('website', 'blog'))

@section('title')
    {{ trans('formation.formation') }} {{ trans('home.view') }}
@endsection

@section('content')
<section class="extra-margins pb-5 text-center">
	<!-- Grid row -->
	<div class="row pull-{{ getDirection() }}">
		<!-- Grid column -->
		<div class="col-lg-12 col-md-12 mb-0">
			<!-- Featured image -->
			<div class="view overlay rounded z-depth-2 mb-4">
				<img class="card-img-top mx-auto d-block" src="{{ url('/'.env('UPLOAD_PATH').'/Formation/'.$item->id.'/'.$item->image) }}" style="height:300px"alt="{{ $item->libelle_lang }}">
				<a>
					<div class="mask rgba-white-slight"></div>
				</a>
			</div>
		  
			<!-- Price -->
			<a class="blue-text">
				<h6 class="font-weight-bold mb-3">{{ $item->price }} {{ trans('formation.price_unit') }}</h6>
			</a>
			<!-- Post title -->
			<h4 class="font-weight-bold mb-3"><strong>{{ $item->libelle_lang }}</strong></h4>
			<!-- Post data -->
			<p>{{ trans('formation.from') }} : {{ $item->debut_formation }} {{ trans('formation.to') }} {{ $item->fin_formation }}</p>
			<!-- Excerpt -->
			<p class="dark-grey-text text-md-left">{!! $item->description_lang !!}</p>
			<!-- Read more button -->
			@if(\Carbon\Carbon::today()->format('Y-m-d')< $item->fin_formation)
			<a class="btn btn-info btn-rounded btn-md" data-toggle="modal" data-target="#modalSubscription">{{ trans('formation.subscribe') }}</a>
		  	@endif
			</div>
			<!-- Grid column -->
		</div>
		<!-- Grid row -->
		@if(\Carbon\Carbon::today()->format('Y-m-d')< $item->fin_formation)
			@include("website.formation.subscribe", ["formations" => $data['data'], "selected_id" => $item->id])
			@include(layoutMessage('website'))
		@endif
</section>

<a href="{{ url('formation') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
@endsection
