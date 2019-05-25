@extends(layoutExtend())

@section('title')
    {{ trans('formation.formation') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('style')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('formation.formation') , 'model' => 'formation' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/formation/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

			<div class="form-group  {{  $errors->has("libelle.en")  &&  $errors->has("libelle.ar")  ? "has-error" : "" }}" >
				<label for="libelle">{{ trans("formation.libelle")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "libelle", isset($item->libelle) ? $item->libelle : old("libelle") , "text" , "formation") !!}
			</div>
			@if ($errors->has("libelle.en"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("libelle.en") }}</strong>
					</span>
				</div>
			@endif
			@if ($errors->has("libelle.ar"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("libelle.ar") }}</strong>
					</span>
				</div>
			@endif

			<div class="form-group {{  $errors->has("description.en")  &&  $errors->has("description.ar")  ? "has-error" : "" }}">
				<label for="description">{{ trans("formation.description")}}</label>
				{!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "formation", "tinymce") !!}
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

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">{{ adminTrans('formation' , 'price') }}</label>
						<input type="number" name="price" id="price"  class="form-control" value="{{ isset($item->price) ? $item->price : old("price") }}" >
				</div>
				@if ($errors->has("price"))
					<div class="alert alert-danger">
						<span class='help-block'>
							<strong>{{ $errors->first("price") }}</strong>
						</span>
					</div>
				@endif
				<div class="form-group col-md-6">
					<label for="">{{ adminTrans('formation' , 'places') }}</label>
						<input id="places" name="places" type="number" class="form-control" value="{{ isset($item->places) ? $item->places : old("places") }}" >
				
				</div>
				@if ($errors->has("places"))
					<div class="alert alert-danger">
						<span class='help-block'>
							<strong>{{ $errors->first("places") }}</strong>
						</span>
					</div>
				@endif
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="">{{ adminTrans('formation' , 'debut_formation') }}</label>
						<input type="date" name="debut_formation" id="debut_formation"  class="form-control" value="{{ isset($item->debut_formation) ? $item->debut_formation : old("debut_formation") }}" >
				</div>
				<div class="form-group col-md-6">
					<label for="">{{ adminTrans('formation' , 'fin_formation') }}</label>
						<input id="fin_formation" name="fin_formation" type="date" class="form-control" value="{{ isset($item->fin_formation) ? $item->fin_formation : old("fin_formation") }}" >
				</div>
			</div>           

			<div class="form-group">
				<div class="form-line">
					<label for="">{{ adminTrans('formation' , 'image') }}</label>
					@if(isset($item) && $item->image != '')
						<img src="{{ url('/'.env('UPLOAD_PATH').'/Formation/'.$item->id.'/'.$item->image) }}"  style="height:200px" class="img-responsive thumbnail" alt="">
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

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('formation.formation') }}
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