<div class="modal fade {{ isset($errors) ? 'show' : '' }}" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
	<div class="modal-dialog modal-notify modal-primary text-left" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header text-center">
				<h4 class="modal-title white-text w-100 font-weight-bold py-2">{{ trans('site.request') }}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true" class="white-text">&times;</span>
				</button>
			</div>
			@include(layoutMessage('website'))
			<form action="{{ concatenateLangToUrl('request/item') }}" method="post" enctype="multipart/form-data">
				<!--Body-->
				<div class="modal-body">
					{{ csrf_field() }}
					
					<div class="form-group {{ $errors->has('site_id') ? 'has-error' : '' }}">
						<label for="">{{ trans('local.site_id') }}</label>
							@php $sectionName =  isset($site_id) ? $site_id : old("site_id") @endphp
							{!! Form::select('site_id',$data['data']['sites'],$sectionName, ['class'=>'form-control','id'=>'site_id', 'required' => true])!!}
					</div>
					@if ($errors->has("site_id"))
					<div class="alert alert-danger">
						<span class='help-block'>
						<strong>{{ $errors->first("site_id") }}</strong>
						</span>
					</div>
					@endif

					<div class="form-group {{ $errors->has('local_id') ? 'has-error' : '' }}">
							<label for="">{{ trans('local.local_id') }}</label> 
								@php $localName =  isset($local_id) ? $local_id : old("local_id") @endphp
								{!! Form::select('local_id',$data['data']['locaux'],$localName, ['class'=>'form-control','id'=>'local_id', 'style' => 'display: block;','required' => true])!!}
						</div>
						@if ($errors->has("local_id"))
						<div class="alert alert-danger">
							<span class='help-block'>
							<strong>{{ $errors->first("local_id") }}</strong>
							</span>
						</div>
						@endif

					<div class="form-group {{ $errors->has('artisan_id') ? 'has-error' : '' }}" > 
						<label for="artisan_id">{{ trans("local.artisan_id")}}</label>
						<input type="text" name="artisan_id" required class="form-control" id="artisan_id" value="{{ isset($item->artisan_id) ? $item->artisan_id : old("artisan_id") }}"  placeholder="{{ trans("local.artisan_id")}}">
					</div>
					@if ($errors->has("artisan_id"))
					<div class="alert alert-danger">
						<span class='help-block'>
						<strong>{{ $errors->first("artisan_id") }}</strong>
						</span>
					</div>
					@endif
   			</div>

				<!--Footer-->
				<div class="modal-footer justify-content-center">
					<button type="submit" class="btn btn-outline-primary waves-effect">{{ trans('site.send_request') }} <i class="fas fa-paper-plane-o ml-1"></i></button>
				</div>
    		</div>
  		</form>
    <!--/.Content-->
	</div>
</div>

 

 
