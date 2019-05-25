@extends(layoutExtend())

@section('title')
    {{ trans('bureauposte.bureauposte') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
          rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component(layoutForm() , ['title' => trans('bureauposte.bureauposte') , 'model' => 'bureauposte' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/bureauposte/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group  {{  $errors->has("name.fr")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
			<label for="name">{{ trans("bureauposte.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "bureauposte") !!}
		</div>
			@if ($errors->has("name.fr"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.fr") }}</strong>
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
		 <div class="form-group {{ $errors->has("adresse") ? "has-error" : "" }}" > 
			<label for="adresse">{{ trans("bureauposte.adresse")}}</label>
				<input type="text" name="adresse" class="form-control" id="adresse" value="{{ isset($item->adresse) ? $item->adresse : old("adresse") }}"  placeholder="{{ trans("bureauposte.adresse")}}">
		</div>
			@if ($errors->has("adresse"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("adresse") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("tel") ? "has-error" : "" }}" > 
			<label for="tel">{{ trans("bureauposte.tel")}}</label>
				<input type="text" name="tel" class="form-control" id="tel" value="{{ isset($item->tel) ? $item->tel : old("tel") }}"  placeholder="{{ trans("bureauposte.tel")}}">
		</div>
			@if ($errors->has("tel"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("tel") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group {{ $errors->has("email") ? "has-error" : "" }}" > 
			<label for="email">{{ trans("bureauposte.email")}}</label>
				<input type="text" name="email" class="form-control" id="email" value="{{ isset($item->email) ? $item->email : old("email") }}"  placeholder="{{ trans("bureauposte.email")}}">
		</div>
			@if ($errors->has("email"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("email") }}</strong>
					</span>
				</div>
			@endif
			<div class="form-group">
				<div class="form-line">
					<label for="">{{ adminTrans('site' , 'image') }}</label>
					@if(isset($item) && $item->image != '')
									<div class="row" >
                    <div class="file-preview-frame krajee-default  kv-preview-thumb"  data-fileindex="0" data-template="image">
                        <div class="kv-file-content">
                            <img class="img-responsive" style="height: 150px;" alt="" src="{{ url('/'.env('UPLOAD_PATH').'/bureau/'.$item->id.'/'.$item->image) }}" />
                        </div>							
                        <div class="clearfix"></div>
                    </div>
                    </div>
						 
						<br>
					@endif    
					{!! csrf_field() !!}
					<div class="form-group">
						<div class="file-loading">
							{!! Form::file('image', array('multiple'=>false,'accept'=>'image/*','class'=>'file','data-overwrite-initial'=>'false','data-min-file-count'=>'1','data-max-file-count'=>'1','id'=>'file-1'))  !!}                                      
						</div>
					</div>
				</div>
			</div> 
			@if ($errors->has("image"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("image") }}</strong>
					</span>
				</div>
			@endif


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('bureauposte.bureauposte') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
@section('script')
    @include(layoutPath('layout.helpers.tynic'))
    {{ Html::script('/admin/plugins/momentjs/moment.js') }}
    @include('admin.shared.script_uploads')
@endsection