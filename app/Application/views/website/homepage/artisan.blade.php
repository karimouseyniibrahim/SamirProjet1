<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('artisan') }}</h2>
<hr>
@php $sidebarArtisan = \App\Application\Model\Artisan::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarArtisan) > 0)
			@foreach ($sidebarArtisan as $d)
				 <div>
					<h2 > {{ str_limit($d->numero_artisan , 50) }}</h2 > 
					<p> {{ str_limit($d->name_lang , 300) }}</p > 
					<p> {{ str_limit($d->email , 300) }}</p > 
					 <p><a href="{{ url("artisan/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			