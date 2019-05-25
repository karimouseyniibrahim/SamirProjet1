@extends(layoutExtend('website'))

@section('title')
    {{ trans('produits.produits') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('produits') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("produits.Libeller") }}</th>
					<td>{{ nl2br($item->Libeller_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("produits.description") }}</th>
					<td>{{ nl2br($item->description_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("produits.prix") }}</th>
					<td>{{ nl2br($item->prix) }}</td>
				</tr>
		</table>

        @include('website.produits.buttons.delete' , ['id' => $item->id])
        @include('website.produits.buttons.edit' , ['id' => $item->id])
</div>
@endsection
