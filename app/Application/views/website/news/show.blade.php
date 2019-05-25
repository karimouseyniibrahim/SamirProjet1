@extends(layoutExtend('website', 'blog'))

@section('title')
    {{ trans('news.news') }} {{ trans('home.view') }}
@endsection

@section('content')
	<section class="extra-margins pb-5  text-lg-left">
		<!--Grid row-->
		<div class="row mb-4">
			<!--Grid column-->
			<div class="col-md-12">
				<!--Card-->
				<div class="card">
					<!--Card image-->
					<div class="view view-cascade overlay z-depth-1-half mb-4">
						<img src="{{ url('/'.env('UPLOAD_PATH').'/news/'.$item->id.'/'.$item->image) }}" class="card-img-top img-fluid" alt="{{ $item->title_lang }}" style="height:300px">
						<a>
							<div class="mask rgba-white-slight waves-effect waves-light"></div>
						</a>
					</div>
					<!--/.Card image-->

					<!--Card content-->
					<div class="card-body">
						<!--Title-->
						<h4 class="card-title">
							<strong>{{ nl2br($item->title_lang) }}</strong>
						</h4>
						<hr>
						<!--Text-->
						{!! nl2br($item->description_lang) !!}

					</div>
					<!--/.Card content-->
				</div>
				<!--/.Card-->
			</div>
			<!--Grid column-->
		</div>
		<!--/Grid row-->
	</section>

	<a href="{{ url('news') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> {{ trans('website.Back') }}  </a>
@endsection
