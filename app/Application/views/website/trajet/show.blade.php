@extends(layoutExtend('website'))

@section('title')
    {{ trans('trajet.trajet') }} {{ trans('home.view') }}
@endsection

@section('content')
<div class="pull-{{ getDirection() }} col-lg-9">
        <a href="{{ url('trajet') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
		 <table class="table table-bordered  table-striped" > 
				<tr>
				<th width="200">{{ trans("trajet.trajetname") }}</th>
					<td>{{ nl2br($item->trajetname_lang) }}</td>
				</tr>
		</table>

        @include('website.trajet.buttons.delete' , ['id' => $item->id])
        @include('website.trajet.buttons.edit' , ['id' => $item->id])
</div>
@endsection
