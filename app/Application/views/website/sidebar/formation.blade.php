<hr>
<p class="font-weight-bold dark-grey-text text-center text-uppercase spacing">
	<strong>{{ trans('website.formation') }}</strong>
</p>
<hr>
@php $sidebarFormation = \App\Application\Model\Formation::latest()
                    ->limit(5)
                    ->get();
@endphp
@if (count($sidebarFormation) > 0)
	@foreach ($sidebarFormation as $d)
		<div class="row mb-4">
			<div class="col-5">
				<!-- Image -->
				<div class="view overlay">
					<img src="{{ url('/'.env('UPLOAD_PATH').'/Formation/'.$d->id.'/'.$d->image) }}" class="img-fluid z-depth-1 rounded-0" alt="{{ $d->libelle_lang  }}">
					<a>
						<div class="mask rgba-white-slight waves-effect waves-light"></div>
					</a>
				</div>
			</div>

			<!-- Excerpt -->
			<div class="col-7">
				<h6 class="mt-0 font-small">
					<a href="{{ url($d->url) }}">
						<strong>{{ str_limit($d->libelle_lang , 20) }}</strong>
					</a>
				</h6>
			</div>
			<!--/ Excerpt -->
		</div>
	@endforeach
	<div class="text-center">
		<a class="btn btn-primary btn-sm btn-squared" href="{{ url('formation') }}"
		   style="text-decoration: none;"><i class="fas fa-eye left"></i> {{trans("formation.show-all")}}</a>
	</div>
@endif
			