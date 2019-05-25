<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('trajet') }}</h2>
<hr>
@php $sidebarTrajet = \App\Application\Model\Trajet::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarTrajet) > 0)
			@foreach ($sidebarTrajet as $d)
				 <div>
					<a href="{{ url("trajet/".$d->id."/view") }}" ><p>{{ str_limit($d->trajetname_lang , 20) }}</a></p > 
					<p><a href="{{ url("trajet/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			