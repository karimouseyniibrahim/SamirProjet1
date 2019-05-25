@extends(layoutExtend())

@section('title')
    {{ trans('zoneactivite.zoneactivite') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('zoneactivite.zoneactivite') , 'model' => 'zoneactivite' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/zoneactivite/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

        <div class="form-group {{ $errors->has("bureauposte_id") ? "has-error" : "" }}">
            <label for="site_id">{{ trans("zoneactivite.bureauposte_id")}}</label>
            @php $bureauposteName =  isset($item->bureauposte_id) ? $item->bureauposte_id : old("bureauposte_id") @endphp
            {!! Form::select('bureauposte_id',$data['bureaupostes'],$bureauposteName, ['class'=>'form-control','id'=>'bureauposte_id'])!!}
        </div>
 		 <div class="form-group {{ $errors->has("nameZone") ? "has-error" : "" }}" > 
			<label for="nameZone">{{ trans("zoneactivite.nameZone")}}</label>
				<input type="text" name="nameZone" class="form-control" id="nameZone" value="{{ isset($item->nameZone) ? $item->nameZone : old("nameZone") }}"  placeholder="{{ trans("zoneactivite.nameZone")}}">
		</div>
			@if ($errors->has("nameZone"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("nameZone") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('zoneactivite.zoneactivite') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
