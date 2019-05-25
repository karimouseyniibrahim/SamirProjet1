@extends(layoutExtend('website'))

@section('title')
    {{ trans('zoneactivite.zoneactivite') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('zoneactivite') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('zoneactivite/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("nameZone") ? "has-error" : "" }}" > 
			<label for="nameZone">{{ trans("zoneactivite.nameZone")}}</label>
				<input type="text" name="nameZone" class="form-control" id="nameZone" value="{{ isset($item->nameZone) ? $item->nameZone : old("nameZone") }}"  placeholder="{{ trans("zoneactivite.nameZone")}}">
		</div>
			@if ($errors->has("nameZone"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("nameZone") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.zoneactivite') }}
                </button>
            </div>
        </form>
</div>
@endsection
