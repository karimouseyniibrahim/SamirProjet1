@extends(layoutExtend('website'))

@section('title')
    {{ trans('medias.medias') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('medias') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("medias.name") }}</th>
					<td>{{ nl2br($item->name_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("medias.description") }}</th>
					<td>{{ nl2br($item->description_lang) }}</td>
				</tr>
				<tr>
				<th width="200">{{ trans("medias.type") }}</th>
					<td>{{ nl2br($item->type) }}</td>
				</tr>
		</table>

        @include('website.medias.buttons.delete' , ['id' => $item->id])
        @include('website.medias.buttons.edit' , ['id' => $item->id])
</div>
@endsection
