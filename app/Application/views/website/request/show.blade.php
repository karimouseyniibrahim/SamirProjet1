@extends(layoutExtend('website'))

@section('title')
    {{ trans('request.request') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('request') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
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

        @include('website.request.buttons.delete' , ['id' => $item->id])
        @include('website.request.buttons.edit' , ['id' => $item->id])
</div>
@endsection
