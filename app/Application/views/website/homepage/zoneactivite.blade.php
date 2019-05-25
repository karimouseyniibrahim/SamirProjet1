<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('zoneactivite') }}</h2>
<hr>
@php $sidebarZoneActivite = \App\Application\Model\ZoneActivite::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarZoneActivite) > 0)
			@foreach ($sidebarZoneActivite as $d)
				 <div>
					<h2 > {{ str_limit($d->nameZone , 50) }}</h2 > 
					 <p><a href="{{ url("zoneactivite/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			