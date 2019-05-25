<div class="modal fade {{ isset($errors) ? 'show' : '' }}" id="modalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
	<div class="modal-dialog modal-notify modal-primary text-left" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header text-center">
				<h4 class="modal-title white-text w-100 font-weight-bold py-2">Subscribe</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true" class="white-text">&times;</span>
				</button>
			</div>
			@include(layoutMessage('website'))
			<form action="{{ concatenateLangToUrl('inscription') }}" method="post" enctype="multipart/form-data">
				<!--Body-->
				<div class="modal-body">
					{{ csrf_field() }}
					
					<div class="form-group {{ $errors->has("formation_id") ? "has-error" : "" }}">
						<label for="">{{ adminTrans('inscription','formation_id') }}</label> 
							@php $formationName =  isset($selected_id) ? $selected_id : old("formation_id") @endphp
							{!! Form::select('formation_id',$formations,$formationName, ['class'=>'form-control','id'=>'formation_id', 'style' => 'display: block;'])!!}
					</div>
					@if ($errors->has("formation_id"))
					<div class="alert alert-danger">
						<span class='help-block'>
						<strong>{{ $errors->first("formation_id") }}</strong>
						</span>
					</div>
					@endif
  
					<div class="form-group {{ $errors->has("numero_artisan") ? "has-error" : "" }}" > 
						<label for="numero_artisan">{{ trans("inscription.numero_artisan")}}</label>
						<input type="text" name="numero_artisan" class="form-control" id="numero_artisan" value="{{ isset($item->numero_artisan) ? $item->numero_artisan : old("numero_artisan") }}"  placeholder="{{ trans("inscription.numero_artisan")}}">
					</div>
					@if ($errors->has("numero_artisan"))
					<div class="alert alert-danger">
						<span class='help-block'>
						<strong>{{ $errors->first("numero_artisan") }}</strong>
						</span>
					</div>
					@endif
  
					<div class="form-group {{ $errors->has("name") ? "has-error" : "" }}" > 
					<label for="name">{{ trans("inscription.name")}}</label>
						<input type="text" name="name" class="form-control" required id="name" value="{{ isset($item->name) ? $item->name : old("name") }}"  placeholder="{{ trans("inscription.name")}}">
					</div>
					@if ($errors->has("name"))
					<div class="alert alert-danger">
						<span class='help-block'>
						<strong>{{ $errors->first("name") }}</strong>
						</span>
					</div>
					@endif
			
					<div class="form-group {{ $errors->has("email") ? "has-error" : "" }}" > 
						<label for="email">{{ trans("inscription.email")}}</label>
						<input type="text" name="email" class="form-control" id="email" value="{{ isset($item->email) ? $item->email : old("email") }}"  placeholder="{{ trans("inscription.email")}}">
					</div>
					@if ($errors->has("email"))
					<div class="alert alert-danger">
						<span class='help-block'>
						<strong>{{ $errors->first("email") }}</strong>
						</span>
					</div>
					@endif
			
					<div class="form-group {{ $errors->has("adresse") ? "has-error" : "" }}" > 
						<label for="adresse">{{ trans("inscription.adresse")}}</label>
						<input type="text" name="adresse" class="form-control" id="adresse" value="{{ isset($item->adresse) ? $item->adresse : old("adresse") }}"  placeholder="{{ trans("inscription.adresse")}}">
					</div>
					@if ($errors->has("adresse"))
					<div class="alert alert-danger">
						<span class='help-block'>
						<strong>{{ $errors->first("adresse") }}</strong>
						</span>
					</div>
					@endif
			
					<div class="form-group {{ $errors->has("telephone") ? "has-error" : "" }}" > 
						<label for="telephone">{{ trans("inscription.telephone")}}</label>
						<input type="text" name="telephone" class="form-control" id="telephone" required value="{{ isset($item->telephone) ? $item->telephone : old("telephone") }}"  placeholder="{{ trans("inscription.telephone")}}">
					</div>
					@if ($errors->has("telephone"))
					<div class="alert alert-danger">
						<span class='help-block'>
						<strong>{{ $errors->first("telephone") }}</strong>
						</span>
					</div>
					@endif
      			</div>

				<!--Footer-->
				<div class="modal-footer justify-content-center">
					<button type="submit" class="btn btn-outline-primary waves-effect">{{ trans('inscription.inscription') }} <i class="fas fa-paper-plane-o ml-1"></i></button>
				</div>
    		</div>
  		</form>
    <!--/.Content-->
	</div>
</div>