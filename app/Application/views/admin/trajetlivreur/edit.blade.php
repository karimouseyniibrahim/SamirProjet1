@extends(layoutExtend())

@section('title')
    {{ trans('trajetlivreur.trajetlivreur') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('trajetlivreur.trajetlivreur') , 'model' => 'trajetlivreur' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/trajetlivreur/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group {{ $errors->has("user_id") ? "has-error" : "" }}" > 
			<label for="user_id">{{ trans("trajetlivreur.user_id")}}</label>
			@php $usereName =  isset($item->user_id) ? $item->user_id : old("user_id") @endphp
		{!! Form::select('user_id',$data['users'],$usereName, ['class'=>'form-control','id'=>'user_id'])!!}
		</div>
			@if ($errors->has("user_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("user_id") }}</strong>
					</span>
				</div>
			@endif

		<div class="form-group {{ $errors->has("zoneactivite_id") ? "has-error" : "" }}">
			<label for="site_id">{{ trans("trajet.zoneactivite_id")}}</label>
			@php $zoneactiviteName =  isset($item->zoneactivite_id) ? $item->zoneactivite_id : old("zoneactivite_id") @endphp
			{!! Form::select('zoneactivite_id',$data['zoneactivites'],$zoneactiviteName, ['class'=>'form-control','id'=>'zoneactivite_id'])!!}
		</div>
			@if ($errors->has("zoneactivite_id"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("zoneactivite_id") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('trajetlivreur.trajetlivreur') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
