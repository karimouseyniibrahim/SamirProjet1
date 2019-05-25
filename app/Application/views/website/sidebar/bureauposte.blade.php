<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('bureauposte') }}</h2>
<hr>
@php $sidebarBureauPoste = \App\Application\Model\BureauPoste::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarBureauPoste) > 0)
			@foreach ($sidebarBureauPoste as $d)
				 <div>
					<a href="{{ url("bureauposte/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("bureauposte/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			