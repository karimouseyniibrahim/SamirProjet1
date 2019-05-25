@extends(layoutExtend())

@section('title')
    {{ trans('local.local') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
          rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('local.local') , 'model' => 'local' , 'action' => isset($item) ? trans('home.edit')  : trans('home.add')  ])
        @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/local/item') }}{{ isset($item) ? '/'.$item->id : '' }}"
              method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has("site_id") ? "has-error" : "" }}">
                <label for="site_id">{{ trans("local.site_id")}}</label>
                @php $siteName =  isset($item->site_id) ? $item->site_id : old("site_id") @endphp
                {!! Form::select('site_id',$data['sites'],$siteName, ['class'=>'form-control','id'=>'site_id'])!!}
            </div>
            @if ($errors->has("site_id"))
                <div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("site_id") }}</strong>
					</span>
                </div>
            @endif

            <div class="form-group  {{  $errors->has("name.en")  &&  $errors->has("name.ar")  ? "has-error" : "" }}">
                <label for="name">{{ trans("local.name")}}</label>
                {!! extractFiled(isset($item) ? $item : null , "name", isset($item->name) ? $item->name : old("name") , "text" , "local") !!}
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
                <label for="description">{{ trans("local.description")}}</label>
                {!! extractFiled(isset($item) ? $item : null , "description", isset($item->description) ? $item->description : old("description") , "textarea" , "local", "tinymce") !!}
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
                    <label for="">{{ adminTrans('local' , 'image') }}</label>
                    @if(isset($item) && $item->image != '')
                        <img src="{{ url('/'.env('UPLOAD_PATH').'/Local/'.$item->id.'/'.$item->image) }}"
                             style="height:200px" class="img-responsive thumbnail" alt="">
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

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-group {{ $errors->has("price") ? "has-error" : "" }}">
                        <label for="price">{{ trans("local.price")}}</label>
                        <input type="number" name="price" class="form-control" id="price"
                               value="{{ isset($item->price) ? $item->price : old("price") }}"
                               placeholder="{{ trans("local.price")}}">
                    </div>
                    @if ($errors->has("price"))
                        <div class="alert alert-danger">
							<span class='help-block'>
								<strong>{{ $errors->first("price") }}</strong>
							</span>
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group {{ $errors->has("area") ? "has-error" : "" }}">
                        <label for="area">{{ trans("local.area")}}</label>
                        <input type="number" name="area" class="form-control" id="area"
                               value="{{ isset($item->area) ? $item->area : old("area") }}"
                               placeholder="{{ trans("local.area")}}">
                    </div>
                    @if ($errors->has("area"))
                        <div class="alert alert-danger">
							<span class='help-block'>
								<strong>{{ $errors->first("area") }}</strong>
							</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default">
                    <i class="material-icons">check_circle</i>
                    {{ trans('home.save') }}  {{ trans('local.local') }}
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
