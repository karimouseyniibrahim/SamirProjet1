@extends(layoutExtend('website'))

@section('title')
    {{ trans('formation.formation') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('formation') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('formation/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group  {{  $errors->has("libelle.en")  &&  $errors->has("libelle.ar")  ? "has-error" : "" }}" >
			<label for="libelle">{{ trans("formation.libelle")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "libelle", isset($item->libelle) ? $item->libelle : old("libelle") , "text" , "formation") !!}
		</div>
			@if ($errors->has("libelle.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("libelle.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("libelle.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("libelle.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}" >
			<label for="description">{{ trans("formation.description")}}</label>
				<input type="text" name="description" class="form-control" id="description" value="{{ isset($item->description) ? $item->description : old("description") }}"  placeholder="{{ trans("formation.description")}}">
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

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.formation') }}
                </button>
            </div>
        </form>
</div>
@endsection
