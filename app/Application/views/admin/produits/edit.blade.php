@extends(layoutExtend())

@section('title')
    {{ trans('curd.produits') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
          rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component(layoutForm() , ['title' => trans('curd.produits') , 'model' => 'produits' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/produits/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 		 <div class="form-group  {{  $errors->has("Libeller.fr")  &&  $errors->has("Libeller.ar")  ? "has-error" : "" }}" >
			<label for="Libeller">{{ trans("curd.Libeller")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "Libeller", isset($item->Libeller) ? $item->Libeller : old("Libeller") , "text" , "produits") !!}
		</div>
			@if ($errors->has("Libeller.fr"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("Libeller.fr") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("Libeller.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("Libeller.ar") }}</strong>
					</span>
				</div>
			@endif
		 <div class="form-group  {{  $errors->has("description.fr")  &&  $errors->has("description.ar")  ? "has-error" : "" }}" >
			<label for="description">{{ trans("curd.description")}}</label>
			{!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "local", "tinymce") !!}
				
		</div>
			@if ($errors->has("description.fr"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("description.fr") }}</strong>
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
		 <div class="form-group {{ $errors->has("prix") ? "has-error" : "" }}" > 
			<label for="prix">{{ trans("curd.prix")}}</label>
				<input type="number" name="prix" class="form-control" id="prix" value="{{ isset($item->prix) ? $item->prix : old("prix") }}"  placeholder="{{ trans("curd.prix")}}">
		</div>
			@if ($errors->has("prix"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("prix") }}</strong>
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
                            <img class="img-responsive" style="height: 150px;" alt="" src="{{ url('/'.env('UPLOAD_PATH').'/produits/'.$item->id.'/'.$item->image) }}" />
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
                    {{ trans('home.save') }}  {{ trans('curd.produits') }}
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
