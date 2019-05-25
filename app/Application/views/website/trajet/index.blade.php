@extends(layoutExtend('website'))

@section('title')
     {{ trans('trajet.trajet') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.trajet') }}</h1></div>
     <div><a href="{{ url('trajet/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.trajet') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="trajetname" class="form-control " placeholder="{{ trans("trajet.trajetname") }}" value="{{ request()->has("trajetname") ? request()->get("trajetname") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("trajet") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("trajet.trajetname") }}</th> 
				<th>{{ trans("trajet.edit") }}</th> 
				<th>{{ trans("trajet.show") }}</th> 
				<th>{{
            trans("trajet.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->trajetname_lang , 20) }}</td> 
				<td> @include("website.trajet.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.trajet.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.trajet.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
