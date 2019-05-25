<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('news') }}</h2>
<hr>
@php $sidebarNews = \App\Application\Model\News::orderBy("id", "DESC")->limit(5)->get(); @endphp
@if (count($sidebarNews) > 0)
	@foreach ($sidebarNews as $d)
			<div>
			<a href="{{ url($d->url) }}" ><p>{{ str_limit($d->title_lang , 20) }}</a></p > 
			<p><a href="{{ url($d->url) }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
		<hr > 
		</div> 
	@endforeach
@endif
			