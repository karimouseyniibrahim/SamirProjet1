@extends(layoutExtend('website'))

@section('title')
     {{ trans('zoneactivite.zoneactivite') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.zoneactivite') }}</h1></div>
     <div><a href="{{ url('zoneactivite/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.zoneactivite') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="nameZone" class="form-control " placeholder="{{ trans("zoneactivite.nameZone") }}" value="{{ request()->has("nameZone") ? request()->get("nameZone") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("zoneactivite") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("zoneactivite.nameZone") }}</th> 
				<th>{{ trans("zoneactivite.edit") }}</th> 
				<th>{{ trans("zoneactivite.show") }}</th> 
				<th>{{
            trans("zoneactivite.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->nameZone , 20) }}</td> 
				<td> @include("website.zoneactivite.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.zoneactivite.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.zoneactivite.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
