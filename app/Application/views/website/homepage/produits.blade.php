<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('produits') }}</h2>
<hr>
@php $sidebarProduits = \App\Application\Model\Produits::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarProduits) > 0)
			@foreach ($sidebarProduits as $d)
				 <div>
					<h2 > {{ str_limit($d->Libeller_lang , 50) }}</h2 > 
					<p> {{ str_limit($d->description_lang , 300) }}</p > 
					<p> {{ str_limit($d->prix , 300) }}</p > 
					 <p><a href="{{ url("produits/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			