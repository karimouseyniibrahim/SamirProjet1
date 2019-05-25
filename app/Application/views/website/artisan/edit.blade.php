@extends(layoutExtend('website'))

@section('title')
    {{ trans('artisan.artisan') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('artisan') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('artisan/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("numero_artisan") ? "has-error" : "" }}" > 
			<label for="numero_artisan">{{ trans("artisan.numero_artisan")}}</label>
				<input type="text" name="numero_artisan" class="form-control" id="numero_artisan" value="{{ isset($item->numero_artisan) ? $item->numero_artisan : old("numero_artisan") }}"  placeholder="{{ trans("artisan.numero_artisan")}}">
		</div>
			@if ($errors->has("numero_artisan"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("numero_artisan") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
			<label for="name">{{ trans("artisan.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "artisan") !!}
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
		 <div class="form-group {{ $errors->has("email") ? "has-error" : "" }}" > 
			<label for="email">{{ trans("artisan.email")}}</label>
				<input type="text" name="email" class="form-control" id="email" value="{{ isset($item->email) ? $item->email : old("email") }}"  placeholder="{{ trans("artisan.email")}}">
		</div>
			@if ($errors->has("email"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("email") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("telephone") ? "has-error" : "" }}" > 
			<label for="telephone">{{ trans("artisan.telephone")}}</label>
				<input type="text" name="telephone" class="form-control" id="telephone" value="{{ isset($item->telephone) ? $item->telephone : old("telephone") }}"  placeholder="{{ trans("artisan.telephone")}}">
		</div>
			@if ($errors->has("telephone"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("telephone") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("address") ? "has-error" : "" }}" > 
			<label for="address">{{ trans("artisan.address")}}</label>
				<input type="text" name="address" class="form-control" id="address" value="{{ isset($item->address) ? $item->address : old("address") }}"  placeholder="{{ trans("artisan.address")}}">
		</div>
			@if ($errors->has("address"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("address") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.artisan') }}
                </button>
            </div>
        </form>
</div>
@endsection
