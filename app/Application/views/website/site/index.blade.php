@extends(layoutExtend('website', 'blog'))

@section('title')
  {{ trans('site.site') }} {{ trans('home.control') }}
@endsection

@section('content')
	<!-- Site: Our Sites -->
	<section class="text-center">
		<!-- Site heading -->
		<h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.site') }}</h2>
		<hr class="my-5" />
	
		@if (count($items) > 0) 
			<!--Card : Dynamic content wrapper-->
			<div class="card mb-4 text-center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
				<!--Card content-->
				<div class="card-body">
					<form method="get">
						<div class="input-group form-md form-1 pl-0">
							<input class="form-control my-0 py-1" name="name" type="text" placeholder="{{ trans('site.name') }}" value="{{ request()->has("name") ? request()->get("name") : "" }}" aria-label="Search">
							<div class="input-group-append">
								<button class="btn input-group-text cyan lighten-2" style="padding: .375rem .75rem; margin: 0;" type="submit"><i class="fas fa-search text-white" aria-hidden="true"></i></button>
								<a  href="{{ url("site") }}" class="btn input-group-text red lighten-2" style="padding: .375rem .75rem; margin: 0;"><i class="fa fa-trash text-white" aria-hidden="true"></i></a>
							</div>
						</div>
					</form >
				</div>
			</div>
			<!--/.Card : Dynamic content wrapper-->
			<div class="text-center mb-3">
				<a class="btn btn-primary btn-md btn-rounded" data-toggle="modal" data-target="#modalRequest">{{ trans('site.request') }}</a>
			</div>
			<!-- Grid row -->
			<div class="row pull-{{ getDirection() }} text-md-leftr">
				@foreach ($items as $d)
					<!-- Grid column -->
					<div class="col-md-6 mb-2 clearfix d-none d-md-block">
						<!-- Card -->
						<div class="card card-cascade narrower card-ecommerce">
							<!-- Card image -->
							<div class="view view-cascade overlay">
								<img src="{{ url('/'.env('UPLOAD_PATH').'/Site/'.$d->id.'/'.$d->image) }}"
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
										<a href="{{ url($d->url) }}">{{ $d->name_lang }}</a>
									</strong>
								</h5>
								<p class="text-justify dark-grey-text">
									{!! str_limit(nl2br($d->description_lang), 200) !!}
								</p>
								<a href="{{ url($d->url) }}" class="btn btn-info btn-sm"><i class="fas fa-eye left"></i> {{ trans('site.show') }}</a>
							</div>
							<!-- Card content -->
						</div>
						<!-- Card -->
					</div>
					<!-- Grid column -->
					@endforeach
			</div>
			<!-- Grid row -->
			@include(layoutPaginate() , ["items" => $items])
			@include("website.site.request",  ["sites" => $data, "site_id" => null,"local_id" => null])
		@else
			<a href="{{ url('/') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
			<!-- Card -->
			<div class="card card-cascade">
				<!-- Card image -->
				<div class="view view-cascade gradient-card-header blue-gradient">
				<!-- Title -->
				<h2 class="card-header-title mb-3">{{ trans('site.empty') }}</h2>
				</div>
			</div>
			<!-- Card -->
		@endif
	</section>
@endsection

