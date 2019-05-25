<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('medias') }}</h2>
<hr>
@php $sidebarMedias = \App\Application\Model\Medias::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarMedias) > 0)
			@foreach ($sidebarMedias as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->description_lang , 300) }}</p > 
					<p> {{ str_limit($d->type , 300) }}</p > 
					 <p><a href="{{ url("medias/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			