<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('colis') }}</h2>
<hr>
@php $sidebarColis = \App\Application\Model\Colis::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarColis) > 0)
			@foreach ($sidebarColis as $d)
				 <div>
					<p><a href="{{ url("colis/".$d->id."/view") }}">{{ str_limit($d->colis_id , 20) }}</a></p > 
					<p><a href="{{ url("colis/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			