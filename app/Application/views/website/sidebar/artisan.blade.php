<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('artisan') }}</h2>
<hr>
@php $sidebarArtisan = \App\Application\Model\Artisan::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarArtisan) > 0)
			@foreach ($sidebarArtisan as $d)
				 <div>
					<p><a href="{{ url("artisan/".$d->id."/view") }}">{{ str_limit($d->numero_artisan , 20) }}</a></p > 
					<p><a href="{{ url("artisan/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			