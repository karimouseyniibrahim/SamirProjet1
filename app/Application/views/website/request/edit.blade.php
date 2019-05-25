@extends(layoutExtend('website'))

@section('title')
    {{ trans('request.request') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('request') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('request/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("artisan_id") ? "has-error" : "" }}" > 
			<label for="artisan_id">{{ trans("request.artisan_id")}}</label>
				<input type="text" name="artisan_id" class="form-control" id="artisan_id" value="{{ isset($item->artisan_id) ? $item->artisan_id : old("artisan_id") }}"  placeholder="{{ trans("request.artisan_id")}}">
		</div>
			@if ($errors->has("artisan_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("artisan_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("section_id") ? "has-error" : "" }}" > 
			<label for="section_id">{{ trans("request.section_id")}}</label>
				<input type="text" name="section_id" class="form-control" id="section_id" value="{{ isset($item->section_id) ? $item->section_id : old("section_id") }}"  placeholder="{{ trans("request.section_id")}}">
		</div>
			@if ($errors->has("section_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("section_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("local_id") ? "has-error" : "" }}" > 
			<label for="local_id">{{ trans("request.local_id")}}</label>
				<input type="text" name="local_id" class="form-control" id="local_id" value="{{ isset($item->local_id) ? $item->local_id : old("local_id") }}"  placeholder="{{ trans("request.local_id")}}">
		</div>
			@if ($errors->has("local_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("local_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("status") ? "has-error" : "" }}" > 
			<label for="status">{{ trans("request.status")}}</label>
				<input type="text" name="status" class="form-control" id="status" value="{{ isset($item->status) ? $item->status : old("status") }}"  placeholder="{{ trans("request.status")}}">
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
                    {{ trans('website.Update') }}  {{ trans('website.request') }}
                </button>
            </div>
        </form>
</div>
@endsection
