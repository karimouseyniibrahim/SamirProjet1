<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('localisationlivreur') }}</h2>
<hr>
@php $sidebarLocalisationlivreur = \App\Application\Model\Localisationlivreur::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarLocalisationlivreur) > 0)
			@foreach ($sidebarLocalisationlivreur as $d)
				 <div>
					<p><a href="{{ url("localisationlivreur/".$d->id."/view") }}">{{ str_limit($d->user_id , 20) }}</a></p > 
					<p><a href="{{ url("localisationlivreur/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			