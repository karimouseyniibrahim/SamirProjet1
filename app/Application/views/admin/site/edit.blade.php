@extends(layoutExtend())

@section('title')
    {{ trans('site.site') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('style')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('site.site') , 'model' => 'site' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/site/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
			 <label for="name">{{ trans("site.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "site") !!}
		</div> 
			@if ($errors->has("name.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("name.en") }}</strong>
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
		 
			<div class="form-group {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}">
					<label for="description">{{ trans("site.description")}}</label>
					{!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "site", "tinymce") !!}
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
				<div class="form-line">
					<label for="">{{ adminTrans('site' , 'image') }}</label>
					@if(isset($item) && $item->image != '')
						<img src="{{ url('/'.env('UPLOAD_PATH').'/Site/'.$item->id.'/'.$item->image) }}" style="height:200px" class="img-responsive thumbnail" alt="">
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
                    {{ trans('home.save') }}  {{ trans('site.site') }}
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
