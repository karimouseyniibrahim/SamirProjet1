@extends(layoutExtend())

@section('title')
    {{ trans('zoneactivite.zoneactivite') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('zoneactivite.zoneactivite') , 'model' => 'zoneactivite' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("zoneactivite.nameZone") }}</th>
					<td>{{ nl2br($item->nameZone) }}</td>
				</tr>
		</table>

        @include('admin.zoneactivite.buttons.delete' , ['id' => $item->id])
        @include('admin.zoneactivite.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
