@extends(layoutExtend())

@section('title')
    {{ trans('medias.medias') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('medias.medias') , 'model' => 'medias' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("medias.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("medias.description") }}</th>
					<td>{{ nl2br($item->description_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("medias.type") }}</th>
					<td>{{ nl2br($item->type) }}</td>
				</tr>
		</table>

        @include('admin.medias.buttons.delete' , ['id' => $item->id])
        @include('admin.medias.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
