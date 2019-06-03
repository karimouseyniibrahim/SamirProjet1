@extends(layoutExtend())

@section('title')
    {{ trans('commandeproduit.commandeproduit') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('commandeproduit.commandeproduit') , 'model' => 'commandeproduit' , 'action' => trans('home.view')  ])
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("commandeproduit.modeEnvoi") }}</th>
					<td>{{ nl2br($item->modeEnvoi) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("commandeproduit.devis") }}</th>
					<td>{{ nl2br($item->devis) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("commandeproduit.typecommande") }}</th>
					<td>{{ nl2br($item->typecommande) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("commandeproduit.fraistransport") }}</th>
					<td>{{ nl2br($item->fraistransport) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("commandeproduit.paye") }}</th>
					<td>{{ nl2br($item->paye) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("commandeproduit.dateacheminer") }}</th>
					<td>{{ nl2br($item->dateacheminer) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("commandeproduit.delaislivraison") }}</th>
					<td>{{ nl2br($item->delaislivraison) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("commandeproduit.datedebutacheminement") }}</th>
					<td>{{ nl2br($item->datedebutacheminement) }}</td>
				</tr>
		</table>

        @include('admin.commandeproduit.buttons.delete' , ['id' => $item->id])
        @include('admin.commandeproduit.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
