@extends(layoutExtend())

@section('title')
    {{ trans('request.request') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('request.request') , 'model' => 'request' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("request.artisan_id") }}</th>
					<td>{{ nl2br($item->artisan_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("request.section_id") }}</th>
					<td>{{ nl2br($item->section_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("request.local_id") }}</th>
					<td>{{ nl2br($item->local_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("request.status") }}</th>
					<td>{{ nl2br($item->status) }}</td>
				</tr>
		</table>

        @include('admin.request.buttons.delete' , ['id' => $item->id])
        @include('admin.request.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
