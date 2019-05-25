@extends(layoutExtend('website'))

@section('title')
    {{ trans('trajetlivreur.trajetlivreur') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('trajetlivreur') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("trajetlivreur.user_id") }}</th>
					<td>{{ nl2br($item->user_id) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("trajetlivreur.zoneactivite_id") }}</th>
					<td>{{ nl2br($item->zoneactivite_id) }}</td>
				</tr>
		</table>

        @include('website.trajetlivreur.buttons.delete' , ['id' => $item->id])
        @include('website.trajetlivreur.buttons.edit' , ['id' => $item->id])
</div>
@endsection
