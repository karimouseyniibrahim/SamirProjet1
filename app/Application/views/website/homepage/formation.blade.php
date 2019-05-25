@php
	$formations = \App\Application\Model\Formation::latest()
                    ->limit(5)
                    ->get();
@endphp

<!-- Section Training -->
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
<!--/.Section Training -->