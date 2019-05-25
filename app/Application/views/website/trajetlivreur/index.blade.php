@extends(layoutExtend('website'))

@section('title')
     {{ trans('trajetlivreur.trajetlivreur') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.trajetlivreur') }}</h1></div>
     <div><a href="{{ url('trajetlivreur/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.trajetlivreur') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="user_id" class="form-control " placeholder="{{ trans("trajetlivreur.user_id") }}" value="{{ request()->has("user_id") ? request()->get("user_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="zoneactivite_id" class="form-control " placeholder="{{ trans("trajetlivreur.zoneactivite_id") }}" value="{{ request()->has("zoneactivite_id") ? request()->get("zoneactivite_id") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("trajetlivreur") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("trajetlivreur.user_id") }}</th> 
				<th>{{ trans("trajetlivreur.edit") }}</th> 
				<th>{{ trans("trajetlivreur.show") }}</th> 
				<th>{{
            trans("trajetlivreur.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->user_id , 20) }}</td> 
				<td> @include("website.trajetlivreur.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.trajetlivreur.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.trajetlivreur.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
