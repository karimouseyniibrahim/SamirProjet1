<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('commandeproduit') }}</h2>
<hr>
@php $sidebarCommandeProduit = \App\Application\Model\CommandeProduit::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarCommandeProduit) > 0)
			@foreach ($sidebarCommandeProduit as $d)
				 <div>
					<h2 > {{ str_limit($d->modeEnvoi , 50) }}</h2 > 
					<p> {{ str_limit($d->devis , 300) }}</p > 
					<p> {{ str_limit($d->typecommande , 300) }}</p > 
					 <p><a href="{{ url("commandeproduit/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			