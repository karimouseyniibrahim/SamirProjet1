<h2>{{ ucfirst(trans('admin.Latest'))}} {{ ucfirst('medias') }}</h2>
<hr>
@php $sidebarMedias = \App\Application\Model\Medias::orderBy("id", "DESC")->limit(5)->get(); @endphp
		@if (count($sidebarMedias) > 0)
			@foreach ($sidebarMedias as $d)
				 <div>
					<a href="{{ url("medias/".$d->id."/view") }}" ><p>{{ str_limit($d->name_lang , 20) }}</a></p > 
					<p><a href="{{ url("medias/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			