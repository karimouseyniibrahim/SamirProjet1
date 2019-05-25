@extends(layoutExtend())

@section('title')
    {{ trans('inscription.inscription') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('inscription.inscription') , 'model' => 'inscription' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
        @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/inscription/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<div class="form-group {{ $errors->has("formation_id") ? "has-error" : "" }}">
				<label for="">{{ adminTrans('inscription','formation_id') }}</label> 
				@php $formationName =  isset($item->formation_id) ? $item->formation_id : old("formation_id") @endphp
				{!! Form::select('formation_id',$data['data']['formation'],$formationName, ['class'=>'form-control','id'=>'formation_id'])!!}
			</div>
			@if ($errors->has("formation_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("formation_id") }}</strong>
					</span>
				</div>
			@endif

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

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('inscription.inscription') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
