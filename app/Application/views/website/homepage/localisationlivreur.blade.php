<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('localisationlivreur') }}</h2>
<hr>
@php $sidebarLocalisationlivreur = \App\Application\Model\Localisationlivreur::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarLocalisationlivreur) > 0)
			@foreach ($sidebarLocalisationlivreur as $d)
				 <div>
					<h2 > {{ str_limit($d->user_id , 50) }}</h2 > 
					<p> {{ str_limit($d->trajetlivreur_id , 300) }}</p > 
					<p> {{ str_limit($d->status , 300) }}</p > 
					 <p><a href="{{ url("localisationlivreur/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			