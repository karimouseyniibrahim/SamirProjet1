@extends(layoutExtend('website'))

@section('title')
    {{ trans('commandeproduit.commandeproduit') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('commandeproduit') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('commandeproduit/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("modeEnvoi") ? "has-error" : "" }}" > 
			<label for="modeEnvoi">{{ trans("commandeproduit.modeEnvoi")}}</label>
				<input type="text" name="modeEnvoi" class="form-control" id="modeEnvoi" value="{{ isset($item->modeEnvoi) ? $item->modeEnvoi : old("modeEnvoi") }}"  placeholder="{{ trans("commandeproduit.modeEnvoi")}}">
		</div>
			@if ($errors->has("modeEnvoi"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("modeEnvoi") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("devis") ? "has-error" : "" }}" > 
			<label for="devis">{{ trans("commandeproduit.devis")}}</label>
				<input type="text" name="devis" class="form-control" id="devis" value="{{ isset($item->devis) ? $item->devis : old("devis") }}"  placeholder="{{ trans("commandeproduit.devis")}}">
		</div>
			@if ($errors->has("devis"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("devis") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("typecommande") ? "has-error" : "" }}" > 
			<label for="typecommande">{{ trans("commandeproduit.typecommande")}}</label>
				<input type="text" name="typecommande" class="form-control" id="typecommande" value="{{ isset($item->typecommande) ? $item->typecommande : old("typecommande") }}"  placeholder="{{ trans("commandeproduit.typecommande")}}">
		</div>
			@if ($errors->has("typecommande"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("typecommande") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("fraistransport") ? "has-error" : "" }}" > 
			<label for="fraistransport">{{ trans("commandeproduit.fraistransport")}}</label>
				<input type="text" name="fraistransport" class="form-control" id="fraistransport" value="{{ isset($item->fraistransport) ? $item->fraistransport : old("fraistransport") }}"  placeholder="{{ trans("commandeproduit.fraistransport")}}">
		</div>
			@if ($errors->has("fraistransport"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("fraistransport") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("paye") ? "has-error" : "" }}" > 
			<label for="paye">{{ trans("commandeproduit.paye")}}</label>
				<input type="text" name="paye" class="form-control" id="paye" value="{{ isset($item->paye) ? $item->paye : old("paye") }}"  placeholder="{{ trans("commandeproduit.paye")}}">
		</div>
			@if ($errors->has("paye"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("paye") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("dateacheminer") ? "has-error" : "" }}" > 
			<label for="dateacheminer">{{ trans("commandeproduit.dateacheminer")}}</label>
				<input type="text" name="dateacheminer" class="form-control" id="dateacheminer" value="{{ isset($item->dateacheminer) ? $item->dateacheminer : old("dateacheminer") }}"  placeholder="{{ trans("commandeproduit.dateacheminer")}}">
		</div>
			@if ($errors->has("dateacheminer"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("dateacheminer") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("delaislivraison") ? "has-error" : "" }}" > 
			<label for="delaislivraison">{{ trans("commandeproduit.delaislivraison")}}</label>
				<input type="text" name="delaislivraison" class="form-control" id="delaislivraison" value="{{ isset($item->delaislivraison) ? $item->delaislivraison : old("delaislivraison") }}"  placeholder="{{ trans("commandeproduit.delaislivraison")}}">
		</div>
			@if ($errors->has("delaislivraison"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("delaislivraison") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("datedebutacheminement") ? "has-error" : "" }}" > 
			<label for="datedebutacheminement">{{ trans("commandeproduit.datedebutacheminement")}}</label>
				<input type="text" name="datedebutacheminement" class="form-control" id="datedebutacheminement" value="{{ isset($item->datedebutacheminement) ? $item->datedebutacheminement : old("datedebutacheminement") }}"  placeholder="{{ trans("commandeproduit.datedebutacheminement")}}">
		</div>
			@if ($errors->has("datedebutacheminement"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("datedebutacheminement") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.commandeproduit') }}
                </button>
            </div>
        </form>
</div>
@endsection
