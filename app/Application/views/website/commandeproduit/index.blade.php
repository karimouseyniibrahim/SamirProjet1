@extends(layoutExtend('website'))

@section('title')
     {{ trans('commandeproduit.commandeproduit') }} {{ trans('home.control') }}
@endsection

@section('content')
 <div class="pull-{{ getDirection() }} col-lg-9">
    <div><h1>{{ trans('website.commandeproduit') }}</h1></div>
     <div><a href="{{ url('commandeproduit/item') }}" class="btn btn-default"><i class="fa fa-plus"></i> {{ trans('website.commandeproduit') }}</a><br></div>
 	<form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans("admin.from") }}"value="{{ request()->has("from") ? request()->get("from") : "" }}">
		 </div>
		<div class="form-group">
			<input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans("admin.to") }}"value="{{ request()->has("to") ? request()->get("to") : "" }}">
		</div>
		<div class="form-group"> 
			<input type="text" name="modeEnvoi" class="form-control " placeholder="{{ trans("commandeproduit.modeEnvoi") }}" value="{{ request()->has("modeEnvoi") ? request()->get("modeEnvoi") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="devis" class="form-control " placeholder="{{ trans("commandeproduit.devis") }}" value="{{ request()->has("devis") ? request()->get("devis") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="typecommande" class="form-control " placeholder="{{ trans("commandeproduit.typecommande") }}" value="{{ request()->has("typecommande") ? request()->get("typecommande") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="fraistransport" class="form-control " placeholder="{{ trans("commandeproduit.fraistransport") }}" value="{{ request()->has("fraistransport") ? request()->get("fraistransport") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="paye" class="form-control " placeholder="{{ trans("commandeproduit.paye") }}" value="{{ request()->has("paye") ? request()->get("paye") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="dateacheminer" class="form-control " placeholder="{{ trans("commandeproduit.dateacheminer") }}" value="{{ request()->has("dateacheminer") ? request()->get("dateacheminer") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="delaislivraison" class="form-control " placeholder="{{ trans("commandeproduit.delaislivraison") }}" value="{{ request()->has("delaislivraison") ? request()->get("delaislivraison") : "" }}"> 
		</div> 
		<div class="form-group"> 
			<input type="text" name="datedebutacheminement" class="form-control " placeholder="{{ trans("commandeproduit.datedebutacheminement") }}" value="{{ request()->has("datedebutacheminement") ? request()->get("datedebutacheminement") : "" }}"> 
		</div> 
		 <button class="btn btn-success" type="submit" ><i class="fa fa-search" ></i ></button>
		<a href="{{ url("commandeproduit") }}" class="btn btn-danger" ><i class="fa fa-close" ></i></a>
	 </form > 
<br ><table class="table table-responsive table-striped table-bordered"> 
		<thead > 
			<tr> 
				<th>{{ trans("commandeproduit.modeEnvoi") }}</th> 
				<th>{{ trans("commandeproduit.edit") }}</th> 
				<th>{{ trans("commandeproduit.show") }}</th> 
				<th>{{
            trans("commandeproduit.delete") }}</th> 
				</thead > 
		<tbody > 
		@if (count($items) > 0) 
			@foreach ($items as $d) 
				 <tr>
					<td>{{ str_limit($d->modeEnvoi , 20) }}</td> 
				<td> @include("website.commandeproduit.buttons.edit", ["id" => $d->id])</td> 
					<td> @include("website.commandeproduit.buttons.view", ["id" => $d->id])</td> 
					<td> @include("website.commandeproduit.buttons.delete", ["id" => $d->id])</td> 
					</tr> 
					@endforeach
				@endif
			 </tbody > 
		</table > 
	@include(layoutPaginate() , ["items" => $items])
		
</div>
@endsection
