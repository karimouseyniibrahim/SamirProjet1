@extends(layoutExtend())

@section('title')
    {{ trans('colis.colis') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('colis.colis') , 'model' => 'colis' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("colis.colis_id") }}</th>
					<td>{{ nl2br($item->colis_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("colis.client_id") }}</th>
					<td>{{ nl2br($item->client_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("colis.poids") }}</th>
					<td>{{ nl2br($item->poids) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("colis.volume") }}</th>
					<td>{{ nl2br($item->volume) }}</td>
				</tr>
		</table>

        @include('admin.colis.buttons.delete' , ['id' => $item->id])
        @include('admin.colis.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
