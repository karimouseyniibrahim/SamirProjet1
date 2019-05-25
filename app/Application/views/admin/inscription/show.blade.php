@extends(layoutExtend())

@section('title')
    {{ trans('inscription.inscription') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('inscription.inscription') , 'model' => 'inscription' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("inscription.numero_artisan") }}</th>
					<td>{{ nl2br($item->numero_artisan) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.name") }}</th>
					<td>{{ nl2br($item->name) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.email") }}</th>
					<td>{{ nl2br($item->email) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.adresse") }}</th>
					<td>{{ nl2br($item->adresse) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.telephone") }}</th>
					<td>{{ nl2br($item->telephone) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.status") }}</th>
					<td>{{ nl2br($item->status) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.formation_id") }}</th>
					<td>{{ nl2br($item->formation_id) }}</td>
				</tr>
		</table>

        @include('admin.inscription.buttons.delete' , ['id' => $item->id])
        @include('admin.inscription.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
