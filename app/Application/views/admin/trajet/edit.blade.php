@extends(layoutExtend())

@section('title')
    {{ trans('trajet.trajet') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('trajet.trajet') , 'model' => 'trajet' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/trajet/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

		<div class="form-group {{ $errors->has("zoneactivite_id") ? "has-error" : "" }}">
		<label for="site_id">{{ trans("trajet.zoneactivite_id")}}</label>
		@php $zoneactiviteName =  isset($item->zoneactivite_id) ? $item->zoneactivite_id : old("zoneactivite_id") @endphp
		{!! Form::select('zoneactivite_id',$data['zoneactivites'],$zoneactiviteName, ['class'=>'form-control','id'=>'zoneactivite_id'])!!}
        </div>
 		 <div class="form-group  {{  $errors->has("trajetname.fr")  &&  $errors->has("trajetname.ar")  ? "has-error" : "" }}" >
			<label for="trajetname">{{ trans("trajet.trajetname")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "trajetname", isset($item->trajetname) ? $item->trajetname : old("trajetname") , "text" , "trajet") !!}
		</div>
			@if ($errors->has("trajetname.fr"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("trajetname.fr") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("trajetname.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("trajetname.ar") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('trajet.trajet') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
