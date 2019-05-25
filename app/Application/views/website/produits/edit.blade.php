@extends(layoutExtend('website'))

@section('title')
    {{ trans('produits.produits') }} {{  isset($item) ? trans('home.edit')  : trans('home.add')  }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
         @include(layoutMessage('website'))
         <a href="{{ url('produits') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
        <form action="{{ concatenateLangToUrl('produits/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             		 <div class="form-group  {{  $errors->has("Libeller.fr")  &&  $errors->has("Libeller.ar")  ? "has-error" : "" }}" >
			<label for="Libeller">{{ trans("produits.Libeller")}}</label>
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
			<label for="description">{{ trans("produits.description")}}</label>
				<input type="text" name="description" class="form-control" id="description" value="{{ isset($item->description) ? $item->description : old("description") }}"  placeholder="{{ trans("produits.description")}}">
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
			<label for="prix">{{ trans("produits.prix")}}</label>
				<input type="text" name="prix" class="form-control" id="prix" value="{{ isset($item->prix) ? $item->prix : old("prix") }}"  placeholder="{{ trans("produits.prix")}}">
		</div>
			@if ($errors->has("prix"))
				<div class="alert alert-danger">
					<span class='help-block'>
						<strong>{{ $errors->first("prix") }}</strong>
					</span>
				</div>
			@endif

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="fa fa-save"></i>
                    {{ trans('website.Update') }}  {{ trans('website.produits') }}
                </button>
            </div>
        </form>
</div>
@endsection
