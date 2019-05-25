<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('zoneactivite') }}</h2>
<hr>
@php $sidebarZoneActivite = \App\Application\Model\ZoneActivite::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarZoneActivite) > 0)
			@foreach ($sidebarZoneActivite as $d)
				 <div>
					<p><a href="{{ url("zoneactivite/".$d->id."/view") }}">{{ str_limit($d->nameZone , 20) }}</a></p > 
					<p><a href="{{ url("zoneactivite/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			