@extends(layoutExtend())

@section('title')
    {{ trans('artisan.artisan') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('artisan.artisan') , 'model' => 'artisan' , 'action' => trans('home.view')  ])
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

        @include('admin.artisan.buttons.delete' , ['id' => $item->id])
        @include('admin.artisan.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
