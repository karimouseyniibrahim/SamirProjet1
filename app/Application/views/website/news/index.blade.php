@extends(layoutExtend('website', 'blog'))

@section('title')
     {{ trans('news.news') }} {{ trans('home.control') }}
@endsection

@section('content')
	<!-- Section: Our News -->
	<section class="section extra-margins pb-3 text-center text-lg-left">
		<!-- Section heading -->
		<h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.news') }}</h2>
		<hr class="my-5" />
		@if (count($items) > 0) 
			@foreach ($items as $d)
				<!-- Grid row -->
				<div class="row">
					<!--Grid column-->
					<div class="col-lg-5 mb-4">
						<!--Featured image-->
						<div class="view overlay z-depth-1">
							<img class="img-fluid" src="{{ url('/'.env('UPLOAD_PATH').'/news/'.$d->id.'/'.$d->image) }}" alt="{{$d->title_lang}}">
							<a>
								<div class="mask rgba-white-slight waves-effect waves-light"></div>
							</a>
						</div>
					</div>
					<!--Grid column-->

					<!--Grid column-->
					<div class="col-lg-6 ml-xl-4 mb-4">
						<!--Grid row-->
						<div class="row">
							<!--Grid column-->
							<div class="col-xl-12 col-md-12 text-sm-center text-md-left">
								<p class="font-small grey-text">
									<em>{{ $d->created_at }}</em>
								</p>
							</div>
							<!--Grid column-->
						</div>
						<!--Grid row-->

						<!-- Title -->
						<h4 class="mb-3 dark-grey-text mt-0">
							<strong>
								<a>{{ $d->title_lang }}</a>
							</strong>
						</h4>

						<!-- Excerpt -->
						<p class="dark-grey-text">
							{!! str_limit($d->description_lang, 200) !!}
						</p>

						<!-- Read more button -->
						<a class="btn btn-primary btn-rounded btn-sm waves-effect waves-light" href="{{ url($d->url) }}">
							{{ trans('website.read-more') }}
						</a>
					</div>
					<!--Grid column-->

				</div>
				<!-- Grid row -->
				<hr class="mb-5">
			@endforeach
			@include(layoutPaginate() , ["items" => $items])
		@else
			<a href="{{ url('/') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
			<!-- Card -->
			<div class="card card-cascade">
				<!-- Card image -->
				<div class="view view-cascade gradient-card-header blue-gradient">
				<!-- Title -->
				<h2 class="card-header-title mb-3">{{ trans('news.empty') }}</h2>
				</div>
			</div>
			<!-- Card -->
		@endif
	</section>
@endsection
