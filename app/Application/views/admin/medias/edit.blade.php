@extends(layoutExtend())

@section('title')
    {{ trans('medias.medias') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('style')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<style type="text/css">
.gallery
{
	display: inline-block;
	margin-top: 20px;
}
.close-icon{
	border-radius: 50%;
	position: absolute;
	right: 5px;
	top: -10px;
	padding: 5px 8px;
}
.form-image-upload{
	background: #e8e8e8 none repeat scroll 0 0;
	padding: 15px;
}
</style>

	@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('medias.medias') , 'model' => 'medias' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/medias/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}" >
			<label for="name">{{ trans("medias.name")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "medias") !!}
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

			<div class="form-group {{ $errors->has("type") ? "has-error" : "" }}" > 
				<label for="type">{{ trans("medias.type")}}</label>
				@php $typeName =  isset($item->type) ? $item->type : old("type") ;
				if(isset($item->type))
				$data['type']=Illuminate\Support\Arr::only($data['type'],[$typeName]);
				
				@endphp
				{!! Form::select('type',$data['type'],$typeName, ['class'=>'form-control'])!!}
				
			</div>
			@if ($errors->has("type"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("type") }}</strong>
					</span>
				</div>
			@endif
			<div class="form-group {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}">
				<label for="description">{{ trans("formation.description")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "medias", "tinymce") !!}
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

			<div class="form-group {{  $errors->has("files")   ? "has-error" : "" }}">
				<div class="form-line">
					<label for="">{{ adminTrans('medias' , 'files') }}</label>
					<div class="row">						
						<div class='list-group gallery'>
								@if(isset($data))
									@foreach($data['files'] as $file)
									<div class="file-preview-frame krajee-default  kv-preview-thumb" id="file{{$file->id}}" data-fileindex="0" data-template="image">
										<div class="kv-file-content">
											<img class="img-responsive" style="height: 150px;" alt="" src="{{$file->url }}" />
										</div>											
												<div class="file-actions">
													<div class="file-footer-buttons">
														<button type="button" onclick="deleteThisfile(this,{{$file->id}})"  data-link="{{ url('admin/medias/file/'.$file->id) }}"  class="btn-danger btn-secondary actionfile" ><i class="fa fa-trash"></i></button>
													</div>
												</div>

												<div class="clearfix"></div>
									</div>
									@endforeach
								@endif

							</div> <!-- list-group / end -->
						</div> <!-- row / end -->						
					{!! csrf_field() !!}
					<div class="form-group">
						<div class="file-loading">
							{!! Form::file('files[]', array('multiple'=>true,'class'=>'file','data-overwrite-initial'=>'false','data-min-file-count'=>'1','data-max-file-count'=>'500','id'=>'file-1'))  !!}                                      
						</div>
					</div>
				</div>
			</div> 
			@if ($errors->has("files"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("files") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('medias.medias') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
@section('script')
	@include(layoutPath('layout.helpers.tynic'))
	{{ Html::script('/admin/plugins/momentjs/moment.js') }}
	@include('admin.shared.script_uploads')
	@include('admin.shared.actionOnfile')
	
@endsection