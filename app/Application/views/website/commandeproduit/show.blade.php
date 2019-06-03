@extends(layoutExtend('website'))

@section('title')
    {{ trans('commandeproduit.commandeproduit') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('commandeproduit') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
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

        @include('website.commandeproduit.buttons.delete' , ['id' => $item->id])
        @include('website.commandeproduit.buttons.edit' , ['id' => $item->id])
</div>
@endsection
