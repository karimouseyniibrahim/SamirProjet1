@extends(layoutExtend())

@section('title')
    {{ trans('colis.colis') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('colis.colis') , 'model' => 'colis' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/colis/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group {{ $errors->has("colis_id") ? "has-error" : "" }}" > 
			<label for="colis_id">{{ trans("colis.colis_id")}}</label>
				<input type="text" name="colis_id" class="form-control" id="colis_id" value="{{ isset($item->colis_id) ? $item->colis_id : old("colis_id") }}"  placeholder="{{ trans("colis.colis_id")}}">
		</div>
			@if ($errors->has("colis_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("colis_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("client_id") ? "has-error" : "" }}" > 
			<label for="client_id">{{ trans("colis.client_id")}}</label>
			@php $clientName =  isset($item->client_id) ? $item->client_id : old("client_id") @endphp
			{!! Form::select('client_id',$data['clients'],$clientName, ['class'=>'form-control','id'=>'client_id'])!!}
		</div>
			@if ($errors->has("client_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("client_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("poids") ? "has-error" : "" }}" > 
			<label for="poids">{{ trans("colis.poids")}}</label>
				<input type="text" name="poids" class="form-control" id="poids" value="{{ isset($item->poids) ? $item->poids : old("poids") }}"  placeholder="{{ trans("colis.poids")}}">
		</div>
			@if ($errors->has("poids"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("poids") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("volume") ? "has-error" : "" }}" > 
			<label for="volume">{{ trans("colis.volume")}}</label>
				<input type="text" name="volume" class="form-control" id="volume" value="{{ isset($item->volume) ? $item->volume : old("volume") }}"  placeholder="{{ trans("colis.volume")}}">
		</div>
			@if ($errors->has("volume"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("volume") }}</strong>
					</span>
				</div>
			@endif
			<div class="form-group {{ $errors->has("adresse_liv") ? "has-error" : "" }}" > 
			<label for="adresse_liv">{{ trans("colis.adresse_liv")}}</label>
				<textarea name="adresse_liv" class="form-control" id="adresse_liv" placeholder="{{ trans("colis.adresse_liv")}}">
					{{ isset($item->adresse_liv) ? $item->adresse_liv : old("adresse_liv") }}
				</textarea>
		</div>
			@if ($errors->has("adresse_liv"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("adresse_liv") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('colis.colis') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
