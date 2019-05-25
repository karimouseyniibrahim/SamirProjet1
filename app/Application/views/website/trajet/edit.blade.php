@extends(layoutExtend('website'))

@section('title')
    {{ trans('trajet.trajet') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('trajet') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('trajet/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
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
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.trajet') }}
                </button>
            </div>
        </form>
</div>
@endsection
