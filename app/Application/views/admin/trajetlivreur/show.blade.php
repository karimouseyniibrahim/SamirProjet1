@extends(layoutExtend())

@section('title')
    {{ trans('trajetlivreur.trajetlivreur') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('trajetlivreur.trajetlivreur') , 'model' => 'trajetlivreur' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("trajetlivreur.user_id") }}</th>
					<td>{{ nl2br($item->user_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("trajetlivreur.zoneactivite_id") }}</th>
					<td>{{ nl2br($item->zoneactivite_id) }}</td>
				</tr>
		</table>

        @include('admin.trajetlivreur.buttons.delete' , ['id' => $item->id])
        @include('admin.trajetlivreur.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
