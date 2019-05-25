@extends(layoutExtend('website'))

@section('title')
     {{ trans('inscription.inscription') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.inscription') }}</h1></div>
     <div><a href="{{ url('inscription/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.inscription') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="numero_artisan" class="form-control " placeholder="{{ trans("inscription.numero_artisan") }}" value="{{ request()->has("numero_artisan") ? request()->get("numero_artisan") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="name" class="form-control " placeholder="{{ trans("inscription.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="email" class="form-control " placeholder="{{ trans("inscription.email") }}" value="{{ request()->has("email") ? request()->get("email") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="adresse" class="form-control " placeholder="{{ trans("inscription.adresse") }}" value="{{ request()->has("adresse") ? request()->get("adresse") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="telephone" class="form-control " placeholder="{{ trans("inscription.telephone") }}" value="{{ request()->has("telephone") ? request()->get("telephone") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="status" class="form-control " placeholder="{{ trans("inscription.status") }}" value="{{ request()->has("status") ? request()->get("status") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="formation_id" class="form-control " placeholder="{{ trans("inscription.formation_id") }}" value="{{ request()->has("formation_id") ? request()->get("formation_id") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("inscription") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("inscription.numero_artisan") }}</th> 
				<th>{{ trans("inscription.edit") }}</th> 
				<th>{{ trans("inscription.show") }}</th> 
				<th>{{
            trans("inscription.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->numero_artisan , 20) }}</td> 
				<td> @include("website.inscription.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.inscription.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.inscription.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
