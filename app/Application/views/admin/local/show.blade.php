@extends(layoutExtend())

@section('title')
    {{ trans('local.local') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('local.local') , 'model' => 'local' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("local.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("local.description") }}</th>
					<td>{!! nl2br($item->description_lang) !!}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("local.image") }}</th>
					<td>
					<img src="{{ small($item->image) }}" width="100" />
					</td>
				</tr>
				<tr>
				<th width="200">{{ trans("local.price") }}</th>
					<td>{{ nl2br($item->price) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("local.area") }}</th>
					<td>{{ nl2br($item->area) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("local.site_id") }}</th>
					<td>{{ nl2br($item->site_id) }}</td>
				</tr>
		</table>

        @include('admin.local.buttons.delete' , ['id' => $item->id])
        @include('admin.local.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
