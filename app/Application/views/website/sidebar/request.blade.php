<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('request') }}</h2>
<hr>
@php $sidebarRequest = \App\Application\Model\Request::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarRequest) > 0)
			@foreach ($sidebarRequest as $d)
				 <div>
					<p><a href="{{ url("request/".$d->id."/view") }}">{{ str_limit($d->artisan_id , 20) }}</a></p > 
					<p><a href="{{ url("request/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			