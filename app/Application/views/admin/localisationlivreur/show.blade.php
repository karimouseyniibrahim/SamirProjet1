@extends(layoutExtend())

@section('title')
    {{ trans('localisationlivreur.localisationlivreur') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('localisationlivreur.localisationlivreur') , 'model' => 'localisationlivreur' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("localisationlivreur.user_id") }}</th>
					<td>{{ nl2br($item->user_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("localisationlivreur.trajetlivreur_id") }}</th>
					<td>{{ nl2br($item->trajetlivreur_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("localisationlivreur.status") }}</th>
					<td>{{ nl2br($item->status) }}</td>
				</tr>
		</table>

        @include('admin.localisationlivreur.buttons.delete' , ['id' => $item->id])
        @include('admin.localisationlivreur.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
