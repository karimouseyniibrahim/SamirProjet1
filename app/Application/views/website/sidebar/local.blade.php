<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('local') }}</h2>
<hr>
@php $sidebarLocal = \App\Application\Model\Local::orderBy("id", "DESC")->limit(5)->get(); @endphp
@if (count($sidebarLocal) > 0)
	@foreach ($sidebarLocal as $d)
			<div>
			<a href="{{ url($d->url) }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
			<p><a href="{{ url($d->url) }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
		<hr > 
		</div> 
	@endforeach
@endif
			