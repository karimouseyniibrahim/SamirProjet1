@extends(layoutExtend())

@section('title')
    {{ trans('user.user') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('style')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('user.profile') , 'model' => 'user' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/user/profile/') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group {{  $errors->has("name")   ? "has-error" : "" }}">
                <div class="form-line">
                    <input type="text" name="name" id="name" placeholder="{{ trans('user.name') }}" class="form-control" value="{{ isset($item) ? $item->name : old('name') }}"/>
                    @if ($errors->has("name"))
                        <div class="alert alert-danger">
                        <span class='help-block'>
                            <strong>{{ $errors->first("name") }}</strong>
                        </span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group {{  $errors->has("email")   ? "has-error" : "" }}">
                <div class="form-line">
                     <input type="email" name="email" id="email" {{ isset($item) ? '' : 'required' }} placeholder="{{ trans('user.email') }}"  class="form-control" value="{{ isset($item) ? $item->email : old('email')  }}"/>
                    @if ($errors->has("email"))
                        <div class="alert alert-danger">
                        <span class='help-block'>
                            <strong>{{ $errors->first("email") }}</strong>
                        </span>
                        </div>
                    @endif
                 </div>
            </div>
            <div class="form-group {{  $errors->has("password")   ? "has-error" : "" }}">
                <div class="form-line">
                    <input type="password" name="password" id="password" placeholder="{{ trans('user.password') }}"    class="form-control"/>
                    @if ($errors->has("password"))
                        <div class="alert alert-danger">
                        <span class='help-block'>
                            <strong>{{ $errors->first("password") }}</strong>
                        </span>
                        </div>
                    @endif
                </div>
            </div>

			<div class="form-group">
				<div class="form-line">
					<label for="">{{ adminTrans('site' , 'image') }}</label>
					@if(isset($item) && $item->image != '')
									<div class="row" >
                    <div class="file-preview-frame krajee-default  kv-preview-thumb"  data-fileindex="0" data-template="image">
                        <div class="kv-file-content">
                            <img class="img-responsive" style="height: 150px;" alt="" src="{{ url('/'.env('UPLOAD_PATH').'/users/'.$item->id.'/'.$item->image) }}" />
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
                    {{ trans('home.save') }}  {{ trans('user.user') }}
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
