<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('trajetlivreur') }}</h2>
<hr>
@php $sidebarTrajetLivreur = \App\Application\Model\TrajetLivreur::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarTrajetLivreur) > 0)
			@foreach ($sidebarTrajetLivreur as $d)
				 <div>
					<h2 > {{ str_limit($d->user_id , 50) }}</h2 > 
					<p> {{ str_limit($d->zoneactivite_id , 300) }}</p > 
					 <p><a href="{{ url("trajetlivreur/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			