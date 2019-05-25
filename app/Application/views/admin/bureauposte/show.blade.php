@extends(layoutExtend())

@section('title')
    {{ trans('bureauposte.bureauposte') }} {{ trans('home.view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => trans('bureauposte.bureauposte') , 'model' => 'bureauposte' , 'action' => trans('home.view')  ])
	<div class="col-md-12 mb-2 clearfix d-none d-md-block">
		<!-- Card -->
		<div class="card card-cascade narrower card-ecommerce">
			<!-- Card image -->
			<div class="view view-cascade overlay">
				<img src="{{ url('/'.env('UPLOAD_PATH').'/bureau/'.$item->id.'/'.$item->image) }}"
						class="card-img-top col-md-12">
				<a>
					<div class="mask rgba-white-slight"></div>
				</a>
			</div>
			<!-- Card image -->
			<!-- Card content -->
			<div class="card-body card-body-cascade">
				<!-- Title -->
				<h5 class="card-title text-center">
					<strong>
						{{ $item->name_lang }}
					</strong>
				</h5>
				<p class="text-justify dark-grey-text">
					{!! str_limit(nl2br($item->description_lang), 200) !!}
				</p>
				<!-- Card footer -->
				<div class="card-footer px-1">
					<p><i class="fa fa-dollar-sign mr-3"></i> {{ nl2br($item->adresse) }} </p>
					<p><i class="fa fa-dollar-sign mr-3"></i> {{ nl2br($item->email) }} </p>
					<p><i class="fa fa-dollar-sign mr-3"></i> {{ nl2br($item->tel) }} </p>
						<span class="float-right">
				<a class=""   data-toggle="tooltip" data-placement="top"
					title="" data-original-title="Quick Look">
				</a>
			</span>
				</div>
			</div>
			<!-- Card content -->
		</div>
		<!-- Card -->
	</div>

	@include('admin.bureauposte.buttons.delete' , ['id' => $item->id])
	@include('admin.bureauposte.buttons.edit' , ['id' => $item->id])
    @endcomponent
@endsection
