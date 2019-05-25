@extends(layoutExtend('website'))

@section('title')
    {{ trans('trajetlivreur.trajetlivreur') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('trajetlivreur') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('trajetlivreur/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("user_id") ? "has-error" : "" }}" > 
			<label for="user_id">{{ trans("trajetlivreur.user_id")}}</label>
				<input type="text" name="user_id" class="form-control" id="user_id" value="{{ isset($item->user_id) ? $item->user_id : old("user_id") }}"  placeholder="{{ trans("trajetlivreur.user_id")}}">
		</div>
			@if ($errors->has("user_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("user_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("zoneactivite_id") ? "has-error" : "" }}" > 
			<label for="zoneactivite_id">{{ trans("trajetlivreur.zoneactivite_id")}}</label>
				<input type="text" name="zoneactivite_id" class="form-control" id="zoneactivite_id" value="{{ isset($item->zoneactivite_id) ? $item->zoneactivite_id : old("zoneactivite_id") }}"  placeholder="{{ trans("trajetlivreur.zoneactivite_id")}}">
		</div>
			@if ($errors->has("zoneactivite_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("zoneactivite_id") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.trajetlivreur') }}
                </button>
            </div>
        </form>
</div>
@endsection
