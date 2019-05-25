<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('inscription') }}</h2>
<hr>
@php $sidebarInscription = \App\Application\Model\Inscription::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarInscription) > 0)
			@foreach ($sidebarInscription as $d)
				 <div>
					<h2 > {{ str_limit($d->numero_artisan , 50) }}</h2 > 
					<p> {{ str_limit($d->name , 300) }}</p > 
					<p> {{ str_limit($d->email , 300) }}</p > 
					 <p><a href="{{ url("inscription/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			