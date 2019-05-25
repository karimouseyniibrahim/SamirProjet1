@extends(layoutExtend())

@section('title')
    {{ trans('formation.formation') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('formation.formation') , 'model' => 'formation' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("formation.libelle") }}</th>
					<td>{{ nl2br($item->libelle_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("formation.description") }}</th>
					<td>{{ nl2br($item->description_lang) }}</td>
				</tr>
		</table>

        @include('admin.formation.buttons.delete' , ['id' => $item->id])
        @include('admin.formation.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
