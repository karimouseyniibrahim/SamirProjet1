@extends(layoutExtend('website'))

@section('title')
     {{ trans('bureauposte.bureauposte') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.bureauposte') }}</h1></div>
     <div><a href="{{ url('bureauposte/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.bureauposte') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="name" class="form-control " placeholder="{{ trans("bureauposte.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="adresse" class="form-control " placeholder="{{ trans("bureauposte.adresse") }}" value="{{ request()->has("adresse") ? request()->get("adresse") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="tel" class="form-control " placeholder="{{ trans("bureauposte.tel") }}" value="{{ request()->has("tel") ? request()->get("tel") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="email" class="form-control " placeholder="{{ trans("bureauposte.email") }}" value="{{ request()->has("email") ? request()->get("email") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("bureauposte") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("bureauposte.name") }}</th> 
				<th>{{ trans("bureauposte.edit") }}</th> 
				<th>{{ trans("bureauposte.show") }}</th> 
				<th>{{
            trans("bureauposte.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{str_limit($d->name_lang , 20) }}</td> 
				<td> @include("website.bureauposte.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.bureauposte.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.bureauposte.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
