<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('commandeproduit') }}</h2>
<hr>
@php $sidebarCommandeProduit = \App\Application\Model\CommandeProduit::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarCommandeProduit) > 0)
			@foreach ($sidebarCommandeProduit as $d)
				 <div>
					<p><a href="{{ url("commandeproduit/".$d->id."/view") }}">{{ str_limit($d->modeEnvoi , 20) }}</a></p > 
					<p><a href="{{ url("commandeproduit/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			