@extends(layoutExtend('website'))

@section('title')
    {{ trans('bureauposte.bureauposte') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('bureauposte') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('bureauposte/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group  {{  $errors->has("name.fr")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
			<label for="name">{{ trans("bureauposte.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "bureauposte") !!}
		</div>
			@if ($errors->has("name.fr"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.fr") }}</strong>
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
		 <div class="form-group {{ $errors->has("adresse") ? "has-error" : "" }}" > 
			<label for="adresse">{{ trans("bureauposte.adresse")}}</label>
				<input type="text" name="adresse" class="form-control" id="adresse" value="{{ isset($item->adresse) ? $item->adresse : old("adresse") }}"  placeholder="{{ trans("bureauposte.adresse")}}">
		</div>
			@if ($errors->has("adresse"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("adresse") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("tel") ? "has-error" : "" }}" > 
			<label for="tel">{{ trans("bureauposte.tel")}}</label>
				<input type="text" name="tel" class="form-control" id="tel" value="{{ isset($item->tel) ? $item->tel : old("tel") }}"  placeholder="{{ trans("bureauposte.tel")}}">
		</div>
			@if ($errors->has("tel"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("tel") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("email") ? "has-error" : "" }}" > 
			<label for="email">{{ trans("bureauposte.email")}}</label>
				<input type="text" name="email" class="form-control" id="email" value="{{ isset($item->email) ? $item->email : old("email") }}"  placeholder="{{ trans("bureauposte.email")}}">
		</div>
			@if ($errors->has("email"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("email") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("image") ? "has-error" : "" }}" > 
			<label for="image">{{ trans("bureauposte.image")}}</label>
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

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.bureauposte') }}
                </button>
            </div>
        </form>
</div>
@endsection
