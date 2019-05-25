@extends(layoutExtend('website'))

@section('title')
    {{ trans('zoneactivite.zoneactivite') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('zoneactivite') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("zoneactivite.nameZone") }}</th>
					<td>{{ nl2br($item->nameZone) }}</td>
				</tr>
		</table>

        @include('website.zoneactivite.buttons.delete' , ['id' => $item->id])
        @include('website.zoneactivite.buttons.edit' , ['id' => $item->id])
</div>
@endsection
