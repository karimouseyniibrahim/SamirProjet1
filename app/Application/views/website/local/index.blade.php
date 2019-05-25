@extends(layoutExtend('website'))

@section('title')
     {{ trans('local.local') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.local') }}</h1></div>
     <div><a href="{{ url('local/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.local') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="name" class="form-control " placeholder="{{ trans("local.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="description" class="form-control " placeholder="{{ trans("local.description") }}" value="{{ request()->has("description") ? request()->get("description") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="price" class="form-control " placeholder="{{ trans("local.price") }}" value="{{ request()->has("price") ? request()->get("price") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="area" class="form-control " placeholder="{{ trans("local.area") }}" value="{{ request()->has("area") ? request()->get("area") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="section_id" class="form-control " placeholder="{{ trans("local.section_id") }}" value="{{ request()->has("section_id") ? request()->get("section_id") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("local") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("local.name") }}</th> 
				<th>{{ trans("local.edit") }}</th> 
				<th>{{ trans("local.show") }}</th> 
				<th>{{
            trans("local.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->name_lang , 20) }}</td> 
				<td> @include("website.local.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.local.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.local.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
