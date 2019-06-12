@extends(layoutExtend('website'))

@section('title')
    {{ trans('colis.colis') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('colis') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('colis/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("colis_id") ? "has-error" : "" }}" > 
			<label for="colis_id">{{ trans("colis.colis_id")}}</label>
				<input type="text" name="colis_id" class="form-control" id="colis_id" value="{{ isset($item->colis_id) ? $item->colis_id : old("colis_id") }}"  placeholder="{{ trans("colis.colis_id")}}">
		</div>
			@if ($errors->has("colis_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("colis_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("client_id") ? "has-error" : "" }}" > 
			<label for="client_id">{{ trans("colis.client_id")}}</label>
				<input type="text" name="client_id" class="form-control" id="client_id" value="{{ isset($item->client_id) ? $item->client_id : old("client_id") }}"  placeholder="{{ trans("colis.client_id")}}">
		</div>
			@if ($errors->has("client_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("client_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("poids") ? "has-error" : "" }}" > 
			<label for="poids">{{ trans("colis.poids")}}</label>
				<input type="text" name="poids" class="form-control" id="poids" value="{{ isset($item->poids) ? $item->poids : old("poids") }}"  placeholder="{{ trans("colis.poids")}}">
		</div>
			@if ($errors->has("poids"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("poids") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("volume") ? "has-error" : "" }}" > 
			<label for="volume">{{ trans("colis.volume")}}</label>
				<input type="text" name="volume" class="form-control" id="volume" value="{{ isset($item->volume) ? $item->volume : old("volume") }}"  placeholder="{{ trans("colis.volume")}}">
		</div>
			@if ($errors->has("volume"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("volume") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.colis') }}
                </button>
            </div>
        </form>
</div>
@endsection
