@extends(layoutExtend())

@section('title')
    {{ trans('trajet.trajet') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('trajet.trajet') , 'model' => 'trajet' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("trajet.trajetname") }}</th>
					<td>{{ nl2br($item->trajetname_lang) }}</td>
				</tr>
		</table>

        @include('admin.trajet.buttons.delete' , ['id' => $item->id])
        @include('admin.trajet.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
