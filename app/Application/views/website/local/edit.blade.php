@extends(layoutExtend('website'))

@section('title')
    {{ trans('local.local') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('local') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('local/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
			<label for="name">{{ trans("local.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "local") !!}
		</div>
			@if ($errors->has("name.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("name.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}" >
			<label for="description">{{ trans("local.description")}}</label>
				<input type="text" name="description" class="form-control" id="description" value="{{ isset($item->description) ? $item->description : old("description") }}"  placeholder="{{ trans("local.description")}}">
		</div>
			@if ($errors->has("description.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("description.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("description.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("description.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
			<label for="image">{{ trans("local.image")}}</label>
				@if(isset($item) && $item->image != "")
				<br>
				<img src="{{ small($item->image) }}" class="thumbnail" alt="" width="200">
				<br>
				@endif
				<input type="file" name="image" >
		</div>
			@if ($errors->has("image"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("image") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("price") ? "has-error" : "" }}" > 
			<label for="price">{{ trans("local.price")}}</label>
				<input type="text" name="price" class="form-control" id="price" value="{{ isset($item->price) ? $item->price : old("price") }}"  placeholder="{{ trans("local.price")}}">
		</div>
			@if ($errors->has("price"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("price") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("area") ? "has-error" : "" }}" > 
			<label for="area">{{ trans("local.area")}}</label>
				<input type="text" name="area" class="form-control" id="area" value="{{ isset($item->area) ? $item->area : old("area") }}"  placeholder="{{ trans("local.area")}}">
		</div>
			@if ($errors->has("area"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("area") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("section_id") ? "has-error" : "" }}" > 
			<label for="section_id">{{ trans("local.section_id")}}</label>
				<input type="text" name="section_id" class="form-control" id="section_id" value="{{ isset($item->section_id) ? $item->section_id : old("section_id") }}"  placeholder="{{ trans("local.section_id")}}">
		</div>
			@if ($errors->has("section_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("section_id") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.local') }}
                </button>
            </div>
        </form>
</div>
@endsection
