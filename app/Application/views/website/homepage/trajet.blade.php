<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('trajet') }}</h2>
<hr>
@php $sidebarTrajet = \App\Application\Model\Trajet::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarTrajet) > 0)
			@foreach ($sidebarTrajet as $d)
				 <div>
					<h2 > {{ str_limit($d->trajetname_lang , 50) }}</h2 > 
					 <p><a href="{{ url("trajet/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			