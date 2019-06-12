<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('colis') }}</h2>
<hr>
@php $sidebarColis = \App\Application\Model\Colis::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarColis) > 0)
			@foreach ($sidebarColis as $d)
				 <div>
					<h2 > {{ str_limit($d->colis_id , 50) }}</h2 > 
					<p> {{ str_limit($d->client_id , 300) }}</p > 
					<p> {{ str_limit($d->poids , 300) }}</p > 
					 <p><a href="{{ url("colis/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			