<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('produits') }}</h2>
<hr>
@php $sidebarProduits = \App\Application\Model\Produits::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarProduits) > 0)
			@foreach ($sidebarProduits as $d)
				 <div>
					<a href="{{ url("produits/".$d->id."/view") }}" ><p>{{ str_limit($d->Libeller_lang , 20) }}</a></p > 
					<p><a href="{{ url("produits/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			