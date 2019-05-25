@extends(layoutExtend('website'))

@section('title')
    {{ trans('artisan.artisan') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('artisan') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("artisan.numero_artisan") }}</th>
					<td>{{ nl2br($item->numero_artisan) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("artisan.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("artisan.email") }}</th>
					<td>{{ nl2br($item->email) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("artisan.telephone") }}</th>
					<td>{{ nl2br($item->telephone) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("artisan.address") }}</th>
					<td>{{ nl2br($item->address) }}</td>
				</tr>
		</table>

        @include('website.artisan.buttons.delete' , ['id' => $item->id])
        @include('website.artisan.buttons.edit' , ['id' => $item->id])
</div>
@endsection
