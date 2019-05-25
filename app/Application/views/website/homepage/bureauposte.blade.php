<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('bureauposte') }}</h2>
<hr>
@php $sidebarBureauPoste = \App\Application\Model\BureauPoste::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarBureauPoste) > 0)
			@foreach ($sidebarBureauPoste as $d)
				 <div>
					<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->adresse , 300) }}</p > 
					<p> {{ str_limit($d->tel , 300) }}</p > 
					 <p><a href="{{ url("bureauposte/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			