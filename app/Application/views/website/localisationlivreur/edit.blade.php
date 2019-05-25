@extends(layoutExtend('website'))

@section('title')
    {{ trans('localisationlivreur.localisationlivreur') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('localisationlivreur') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('localisationlivreur/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("user_id") ? "has-error" : "" }}" > 
			<label for="user_id">{{ trans("localisationlivreur.user_id")}}</label>
				<input type="text" name="user_id" class="form-control" id="user_id" value="{{ isset($item->user_id) ? $item->user_id : old("user_id") }}"  placeholder="{{ trans("localisationlivreur.user_id")}}">
		</div>
			@if ($errors->has("user_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("user_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("trajetlivreur_id") ? "has-error" : "" }}" > 
			<label for="trajetlivreur_id">{{ trans("localisationlivreur.trajetlivreur_id")}}</label>
				<input type="text" name="trajetlivreur_id" class="form-control" id="trajetlivreur_id" value="{{ isset($item->trajetlivreur_id) ? $item->trajetlivreur_id : old("trajetlivreur_id") }}"  placeholder="{{ trans("localisationlivreur.trajetlivreur_id")}}">
		</div>
			@if ($errors->has("trajetlivreur_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("trajetlivreur_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("status") ? "has-error" : "" }}" > 
			<label for="status">{{ trans("localisationlivreur.status")}}</label>
				<input type="text" name="status" class="form-control" id="status" value="{{ isset($item->status) ? $item->status : old("status") }}"  placeholder="{{ trans("localisationlivreur.status")}}">
		</div>
			@if ($errors->has("status"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("status") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.localisationlivreur') }}
                </button>
            </div>
        </form>
</div>
@endsection
