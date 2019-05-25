<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('local') }}</h2>
<hr>
@php $sidebarLocal = \App\Application\Model\Local::inRandomOrder()->limit(5)->get(); @endphp
@if (count($sidebarLocal) > 0)
	@foreach ($sidebarLocal as $d)
			<div>
			<h2 > {{ str_limit($d->name_lang , 50) }}</h2 > 
			<p> {{ str_limit($d->description_lang , 300) }}</p > 
				<img src="{{ small($d->image)}}"  width = "80" />
				<p><a href="{{ url($d->url) }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
		<hr > 
		</div> 
	@endforeach
@endif
			