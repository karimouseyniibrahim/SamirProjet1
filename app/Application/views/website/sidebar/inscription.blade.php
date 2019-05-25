<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('inscription') }}</h2>
<hr>
@php $sidebarInscription = \App\Application\Model\Inscription::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarInscription) > 0)
			@foreach ($sidebarInscription as $d)
				 <div>
					<p><a href="{{ url("inscription/".$d->id."/view") }}">{{ str_limit($d->numero_artisan , 20) }}</a></p > 
					<p><a href="{{ url("inscription/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			