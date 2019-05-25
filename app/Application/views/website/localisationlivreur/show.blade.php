@extends(layoutExtend('website'))

@section('title')
    {{ trans('localisationlivreur.localisationlivreur') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('localisationlivreur') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("localisationlivreur.user_id") }}</th>
					<td>{{ nl2br($item->user_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("localisationlivreur.trajetlivreur_id") }}</th>
					<td>{{ nl2br($item->trajetlivreur_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("localisationlivreur.status") }}</th>
					<td>{{ nl2br($item->status) }}</td>
				</tr>
		</table>

        @include('website.localisationlivreur.buttons.delete' , ['id' => $item->id])
        @include('website.localisationlivreur.buttons.edit' , ['id' => $item->id])
</div>
@endsection
