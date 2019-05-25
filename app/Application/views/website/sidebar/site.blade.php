<hr>
<p class="font-weight-bold dark-grey-text text-center text-uppercase spacing">
	<strong>{{ trans('website.site') }}</strong>
</p>
<hr>
@php $sidebarSite = \App\Application\Model\Site::latest()
					->withCount('locaux')
                    ->limit(5)
                    ->get();
@endphp
@if (count($sidebarSite) > 0)
	@foreach ($sidebarSite as $d)
		<div class="row mb-4">
			<div class="col-5">
				<!-- Image -->
				<div class="view overlay">
					<img src="{{ url('/'.env('UPLOAD_PATH').'/Site/'.$d->id.'/'.$d->image) }}" class="img-fluid z-depth-1 rounded-0" alt="{{ $d->name_lang  }}">
					<a>
						<div class="mask rgba-white-slight waves-effect waves-light"></div>
					</a>
				</div>
			</div>

			<!-- Excerpt -->
			<div class="col-7">
				<h6 class="mt-0 font-small">
					<a href="{{ url($d->url) }}">
						<strong>{{ str_limit($d->name_lang , 20) }}</strong>
					</a>
				</h6>

				<div class="post-data">
					<p class="font-small grey-text mb-0">
						<i class="fab fa-clock-o"></i> {{ $d->locaux_count }} {{ trans('local.locals') }}</p>
				</div>
			</div>
			<!--/ Excerpt -->
		</div>
	@endforeach
	<div class="text-center">
		<a class="btn btn-primary btn-sm btn-squared" href="{{ url('site') }}"
		   style="text-decoration: none;"><i class="fas fa-eye left"></i> {{trans("site.show-all")}}</a>
	</div>

@endif
			