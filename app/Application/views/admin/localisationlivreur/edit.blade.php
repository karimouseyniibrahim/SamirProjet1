@extends(layoutExtend())

@section('title')
    {{ trans('localisationlivreur.localisationlivreur') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('localisationlivreur.localisationlivreur') , 'model' => 'localisationlivreur' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/localisationlivreur/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group {{ $errors->has("user_id") ? "has-error" : "" }}" > 
			<label for="user_id">{{ trans("localisationlivreur.user_id")}}</label>
				<input type="text" name="user_id" class="form-control" id="user_id" value="{{ $data['user']}}">
		</div>
			@if ($errors->has("user_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("user_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("trajetlivreur_id") ? "has-error" : "" }}" > 
			<label for="trajetlivreur_id">{{ trans("localisationlivreur.trajetlivreur_id")}}</label>
			@php $zoneactiviteName =  isset($item->zoneactivite_id) ? $item->zoneactivite_id : old("zoneactivite_id") @endphp
		{!! Form::select('trajetlivreur_id',$data['trajets'],$zoneactiviteName, ['class'=>'form-control','id'=>'trajetlivreur_id'])!!}
				
		</div>
			@if ($errors->has("trajetlivreur_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("trajetlivreur_id") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("status") ? "has-error" : "" }}" > 
			<label for="status">{{ trans("localisationlivreur.status")}}</label>
			<select class="form-control" name="status" id="status" required>
				<option value="" disabled selected>{{ adminTrans('inscription','status') }}</option>
				<option value="1">{{trans('localisationlivreur.Encours')}}</option>
				<option value="2">{{trans('localisationlivreur.Arriver')}}</option>
			</select>
				
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
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('localisationlivreur.localisationlivreur') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
