@extends(layoutExtend('website'))

@section('title')
    {{ trans('inscription.inscription') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('inscription') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('inscription/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group {{ $errors->has("numero_artisan") ? "has-error" : "" }}" > 
			<label for="numero_artisan">{{ trans("inscription.numero_artisan")}}</label>
				<input type="text" name="numero_artisan" class="form-control" id="numero_artisan" value="{{ isset($item->numero_artisan) ? $item->numero_artisan : old("numero_artisan") }}"  placeholder="{{ trans("inscription.numero_artisan")}}">
		</div>
			@if ($errors->has("numero_artisan"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("numero_artisan") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("name") ? "has-error" : "" }}" > 
			<label for="name">{{ trans("inscription.name")}}</label>
				<input type="text" name="name" class="form-control" id="name" value="{{ isset($item->name) ? $item->name : old("name") }}"  placeholder="{{ trans("inscription.name")}}">
		</div>
			@if ($errors->has("name"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("email") ? "has-error" : "" }}" > 
			<label for="email">{{ trans("inscription.email")}}</label>
				<input type="text" name="email" class="form-control" id="email" value="{{ isset($item->email) ? $item->email : old("email") }}"  placeholder="{{ trans("inscription.email")}}">
		</div>
			@if ($errors->has("email"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("email") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("adresse") ? "has-error" : "" }}" > 
			<label for="adresse">{{ trans("inscription.adresse")}}</label>
				<input type="text" name="adresse" class="form-control" id="adresse" value="{{ isset($item->adresse) ? $item->adresse : old("adresse") }}"  placeholder="{{ trans("inscription.adresse")}}">
		</div>
			@if ($errors->has("adresse"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("adresse") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("telephone") ? "has-error" : "" }}" > 
			<label for="telephone">{{ trans("inscription.telephone")}}</label>
				<input type="text" name="telephone" class="form-control" id="telephone" value="{{ isset($item->telephone) ? $item->telephone : old("telephone") }}"  placeholder="{{ trans("inscription.telephone")}}">
		</div>
			@if ($errors->has("telephone"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("telephone") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("status") ? "has-error" : "" }}" > 
			<label for="status">{{ trans("inscription.status")}}</label>
				<input type="text" name="status" class="form-control" id="status" value="{{ isset($item->status) ? $item->status : old("status") }}"  placeholder="{{ trans("inscription.status")}}">
		</div>
			@if ($errors->has("status"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("status") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("formation_id") ? "has-error" : "" }}" > 
			<label for="formation_id">{{ trans("inscription.formation_id")}}</label>
				<input type="text" name="formation_id" class="form-control" id="formation_id" value="{{ isset($item->formation_id) ? $item->formation_id : old("formation_id") }}"  placeholder="{{ trans("inscription.formation_id")}}">
		</div>
			@if ($errors->has("formation_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("formation_id") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.inscription') }}
                </button>
            </div>
        </form>
</div>
@endsection
