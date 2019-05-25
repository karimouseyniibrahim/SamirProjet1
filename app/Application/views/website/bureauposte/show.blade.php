@extends(layoutExtend('website'))

@section('title')
    {{ trans('bureauposte.bureauposte') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('bureauposte') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("bureauposte.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("bureauposte.adresse") }}</th>
					<td>{{ nl2br($item->adresse) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("bureauposte.tel") }}</th>
					<td>{{ nl2br($item->tel) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("bureauposte.email") }}</th>
					<td>{{ nl2br($item->email) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("bureauposte.image") }}</th>
					<td>
					<img src="{{ small($item->image) }}" width="100" />
					</td>
				</tr>
		</table>

        @include('website.bureauposte.buttons.delete' , ['id' => $item->id])
        @include('website.bureauposte.buttons.edit' , ['id' => $item->id])
</div>
@endsection
