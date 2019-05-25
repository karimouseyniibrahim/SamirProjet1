<h2>{{ ucfirst(trans('admin.Random'))}} {{ ucfirst('request') }}</h2>
<hr>
@php $sidebarRequest = \App\Application\Model\Request::inRandomOrder()->limit(5)->get(); @endphp
		@if (count($sidebarRequest) > 0)
			@foreach ($sidebarRequest as $d)
				 <div>
					<h2 > {{ str_limit($d->artisan_id , 50) }}</h2 > 
					<p> {{ str_limit($d->section_id , 300) }}</p > 
					<p> {{ str_limit($d->local_id , 300) }}</p > 
					 <p><a href="{{ url("request/".$d->id."/view") }}" ><i class="fa fa-eye" ></i ></a> <small ><i class="fa fa-calendar-o" ></i > {{ $d->created_at }}</small ></p > 
				<hr > 
				</div> 
			@endforeach
		@endif
			