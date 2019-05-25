@extends(layoutExtend('website'))

@section('title')
     {{ trans('produits.produits') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.produits') }}</h1></div>
     <div><a href="{{ url('produits/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.produits') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="Libeller" class="form-control " placeholder="{{ trans("produits.Libeller") }}" value="{{ request()->has("Libeller") ? request()->get("Libeller") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="description" class="form-control " placeholder="{{ trans("produits.description") }}" value="{{ request()->has("description") ? request()->get("description") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="prix" class="form-control " placeholder="{{ trans("produits.prix") }}" value="{{ request()->has("prix") ? request()->get("prix") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("produits") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("produits.Libeller") }}</th> 
				<th>{{ trans("produits.edit") }}</th> 
				<th>{{ trans("produits.show") }}</th> 
				<th>{{
            trans("produits.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->Libeller_lang , 20) }}</td> 
				<td> @include("website.produits.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.produits.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.produits.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
