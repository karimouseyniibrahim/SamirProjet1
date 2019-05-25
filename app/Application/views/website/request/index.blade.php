@extends(layoutExtend('website'))

@section('title')
     {{ trans('request.request') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.request') }}</h1></div>
     <div><a href="{{ url('request/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.request') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="artisan_id" class="form-control " placeholder="{{ trans("request.artisan_id") }}" value="{{ request()->has("artisan_id") ? request()->get("artisan_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="section_id" class="form-control " placeholder="{{ trans("request.section_id") }}" value="{{ request()->has("section_id") ? request()->get("section_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="local_id" class="form-control " placeholder="{{ trans("request.local_id") }}" value="{{ request()->has("local_id") ? request()->get("local_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="status" class="form-control " placeholder="{{ trans("request.status") }}" value="{{ request()->has("status") ? request()->get("status") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("request") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("request.artisan_id") }}</th> 
				<th>{{ trans("request.edit") }}</th> 
				<th>{{ trans("request.show") }}</th> 
				<th>{{
            trans("request.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->artisan_id , 20) }}</td> 
				<td> @include("website.request.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.request.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.request.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
