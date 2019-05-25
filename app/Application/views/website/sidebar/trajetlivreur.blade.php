<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('trajetlivreur') }}</h2>
<hr>
@php $sidebarTrajetLivreur = \App\Application\Model\TrajetLivreur::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarTrajetLivreur) > 0)
			@foreach ($sidebarTrajetLivreur as $d)
				 <div>
					<p><a href="{{ url("trajetlivreur/".$d->id."/view") }}">{{ str_limit($d->user_id , 20) }}</a></p > 
					<p><a href="{{ url("trajetlivreur/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			