@extends(layoutExtend('website'))

@section('title')
     {{ trans('colis.colis') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.colis') }}</h1></div>
     <div><a href="{{ url('colis/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.colis') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="colis_id" class="form-control " placeholder="{{ trans("colis.colis_id") }}" value="{{ request()->has("colis_id") ? request()->get("colis_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="client_id" class="form-control " placeholder="{{ trans("colis.client_id") }}" value="{{ request()->has("client_id") ? request()->get("client_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="poids" class="form-control " placeholder="{{ trans("colis.poids") }}" value="{{ request()->has("poids") ? request()->get("poids") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="volume" class="form-control " placeholder="{{ trans("colis.volume") }}" value="{{ request()->has("volume") ? request()->get("volume") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("colis") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("colis.colis_id") }}</th> 
				<th>{{ trans("colis.edit") }}</th> 
				<th>{{ trans("colis.show") }}</th> 
				<th>{{
            trans("colis.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->colis_id , 20) }}</td> 
				<td> @include("website.colis.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.colis.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.colis.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
