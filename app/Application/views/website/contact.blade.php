@extends(layoutExtend('website', 'blog'))
@section('content')
    <section class="contact-section">
        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">{{ trans('website.contact-us') }}</h2>
        <hr class="my-5"/>
        @include(layoutMessage('website'))
        <!-- Form with header -->
        <div class="card">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-lg-7">
                    <div class="card-body form">
                        <form action="{{ concatenateLangToUrl('contact') }}" name="contactform" method="post">
                        {{ csrf_field() }}
                        <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-md-12 {{  $errors->has("name")   ? "has-error" : "" }}">
                                    <div class="md-form mb-0">
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="{{ old('name') ?? '' }}"
                                               required>
                                        <label for="name" class="">{{ trans('website.contact.name') }}</label>
                                        @if ($errors->has("name"))
                                            <div class="alert alert-danger">
                                        <span class='help-block'>
                                            <strong>{{ $errors->first("name") }}</strong>
                                        </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Grid column -->
                            </div>
                            <!-- Grid row -->

                            <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-md-12 {{  $errors->has("email")   ? "has-error" : "" }}">
                                    <div class="md-form mb-0">
                                        <input type="text" name="email" id="email" class="form-control"
                                               required value="{{ old('email') ?? '' }}">
                                        <label for="email" class="">{{ trans('website.contact.email') }}</label>
                                        @if ($errors->has("email"))
                                            <div class="alert alert-danger">
                                        <span class='help-block'>
                                            <strong>{{ $errors->first("email") }}</strong>
                                        </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Grid column -->
                            </div>
                            <!-- Grid row -->

                            <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-md-12 {{  $errors->has("message")   ? "has-error" : "" }}">
                                    <div class="md-form mb-0">
                                <textarea class="form-control md-textarea" name="message" rows="6"
                                          required>{{ old('message') ?? '' }}</textarea>
                                        <label for="message" class="">{{ trans('website.contact.message') }}</label>
                                        @if ($errors->has("message"))
                                            <div class="alert alert-danger">
                                        <span class='help-block'>
                                            <strong>{{ $errors->first("message") }}</strong>
                                        </span>
                                            </div>
                                        @endif
                                        <button type="submit" class="btn-floating btn-lg blue">
                                            <i class="far fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Grid column -->
                            </div>
                            <!-- Grid row -->
                        </form>

                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-5">

                    <div class="card-body light-blue text-center h-100 white-text">

                        <h3 class="my-4 pb-2">{{ trans('website.contact.title') }}</h3>
                        <ul class="text-lg-left list-unstyled ml-4">
                            <li>
                                <p><i class="fas fa-map-marker-alt pr-2"></i>{{ trans('setting.adresse') }}</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone pr-2"></i>{{ trans('setting.tel') }}</p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope pr-2"></i>{{ trans('setting.email') }}</p>
                            </li>
                        </ul>
                        <hr class="hr-light my-4">
                        <ul class="list-inline text-center list-unstyled">
                            <li class="list-inline-item">
                                <a class="p-2 fa-lg">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="p-2 fa-lg">
                                    <i class="fab fa-linkedin-in"> </i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="p-2 fa-lg">
                                    <i class="fab fa-instagram"> </i>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Form with header -->

    </section>
@endsection