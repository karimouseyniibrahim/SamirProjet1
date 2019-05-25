@php
	$sites = \App\Application\Model\Site::latest()
                    ->limit(5)
                    ->get();
@endphp

<!--Section Sites -->
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
<!--/.Section Sites -->