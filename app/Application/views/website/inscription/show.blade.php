@extends(layoutExtend('website'))

@section('title')
    {{ trans('inscription.inscription') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('inscription') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("inscription.numero_artisan") }}</th>
					<td>{{ nl2br($item->numero_artisan) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.name") }}</th>
					<td>{{ nl2br($item->name) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.email") }}</th>
					<td>{{ nl2br($item->email) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.adresse") }}</th>
					<td>{{ nl2br($item->adresse) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.telephone") }}</th>
					<td>{{ nl2br($item->telephone) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.status") }}</th>
					<td>{{ nl2br($item->status) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("inscription.formation_id") }}</th>
					<td>{{ nl2br($item->formation_id) }}</td>
				</tr>
		</table>

        @include('website.inscription.buttons.delete' , ['id' => $item->id])
        @include('website.inscription.buttons.edit' , ['id' => $item->id])
</div>
@endsection
