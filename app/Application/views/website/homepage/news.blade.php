@php
	$news = \App\Application\Model\News::latest()
                    ->limit(5)
                    ->get();
@endphp
<!--Latest News-->
<section class="text-center mb-3">
	<h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.latest-news') }}</h2>
	<hr class="my-3">
	<!-- Carousel Wrapper -->
	<div id="news-caroussel" class="carousel slide carousel-multi-item" data-ride="carousel">
		<!--Controls-->
		<a class="carousel-control-prev left carousel-control" href="#news-caroussel" role="button"
		   data-slide="prev">
			<span class="icon-prev" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next right carousel-control" href="#news-caroussel" role="button"
		   data-slide="next">
			<span class="icon-next" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!--Controls-->
		<!-- Indicators -->
		<ol class="carousel-indicators">
			@foreach($news as $i => $v)
				<li class="primary-color {{ $i == 0 ? 'active' : ''}}" data-target="#news-caroussel"
					data-slide-to="{{ $i }}"></li>
			@endforeach
		</ol>
		<!-- Indicators -->
		<!-- Slides -->
		<div class="carousel-inner" role="listbox">
		@foreach($news as $i => $new)
			<!-- First slide -->
				<div class="carousel-item {{ $i == 0 ? 'active' : ''}}">
					<!-- Site: Blog v.1 -->
					<div class="jumbotron text-center hoverable p-4">
						<!-- Grid row -->
						<div class="row">
							<!-- Grid column -->
							<div class="col-md-4 offset-md-1 mx-3">
								<!-- Featured image -->
								<div class="view overlay">
									<img src="{{ url('/'.env('UPLOAD_PATH').'/news/'.$new->id.'/'.$new->image) }}"
										 class="img-fluid" alt="{{ $new->title_lang }}">
									<a>
										<div class="mask rgba-white-slight"></div>
									</a>
								</div>
							</div>
							<!-- Grid column -->
							<!-- Grid column -->
							<div class="col-md-7 text-md-left ml-3 mt-3">
								<!-- Excerpt -->
								<!-- <a href="#!" class="green-text">
                                    <h6 class="h6 pb-1"><i class="fas fa-desktop pr-1"></i> Work</h6>
                                </a> -->

								<h4 class="h4 mb-4">{{ $new->title_lang }}</h4>

								<p class="font-weight-normal">
									{!! str_limit($new->description_lang, 200) !!}
								</p>
								<p class="font-weight-normal">{{ $new->created_at }}</p>

								<a class="btn btn-indigo btn-md"
								   href="{{ url($new->url) }}">{{ trans('website.read-more') }}</a>
							</div>
							<!-- Grid column -->
						</div>
						<!-- Grid row -->
					</div>
				</div>
				<!-- First slide -->
			@endforeach
		</div>
		<!-- Slides -->
	</div>
	<!-- Carousel Wrapper -->
</section>
<!--/.Latest News-->