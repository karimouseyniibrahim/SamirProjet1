@extends(layoutExtend('website'))

@section('title')
     {{ trans('localisationlivreur.localisationlivreur') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.localisationlivreur') }}</h1></div>
     <div><a href="{{ url('localisationlivreur/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.localisationlivreur') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="user_id" class="form-control " placeholder="{{ trans("localisationlivreur.user_id") }}" value="{{ request()->has("user_id") ? request()->get("user_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="trajetlivreur_id" class="form-control " placeholder="{{ trans("localisationlivreur.trajetlivreur_id") }}" value="{{ request()->has("trajetlivreur_id") ? request()->get("trajetlivreur_id") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="status" class="form-control " placeholder="{{ trans("localisationlivreur.status") }}" value="{{ request()->has("status") ? request()->get("status") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("localisationlivreur") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("localisationlivreur.user_id") }}</th> 
				<th>{{ trans("localisationlivreur.edit") }}</th> 
				<th>{{ trans("localisationlivreur.show") }}</th> 
				<th>{{
            trans("localisationlivreur.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->user_id , 20) }}</td> 
				<td> @include("website.localisationlivreur.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.localisationlivreur.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.localisationlivreur.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
