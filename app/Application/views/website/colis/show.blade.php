@extends(layoutExtend('website'))

@section('title')
    {{ trans('colis.colis') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('colis') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("colis.colis_id") }}</th>
					<td>{{ nl2br($item->colis_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("colis.client_id") }}</th>
					<td>{{ nl2br($item->client_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("colis.poids") }}</th>
					<td>{{ nl2br($item->poids) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("colis.volume") }}</th>
					<td>{{ nl2br($item->volume) }}</td>
				</tr>
		</table>

        @include('website.colis.buttons.delete' , ['id' => $item->id])
        @include('website.colis.buttons.edit' , ['id' => $item->id])
</div>
@endsection
