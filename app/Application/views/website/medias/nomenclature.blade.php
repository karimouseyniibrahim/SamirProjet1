@extends(layoutExtend('website', 'blog'))

@section('title')
    {{ trans('medias.medias') }} {{ trans('home.control') }}
@endsection

@section('content')
    <!-- Section: Nomenclature -->
    <section class="section extra-margins pb-3 text-center text-lg-left">
        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center">{{ trans('medias.nomenclature') }}</h2>
        <hr class="my-5"/>

        <!--Table-->
        <table class="table table-hover mb-0">
            <!--Table head-->
            <thead>
            <tr>
                <th class="th-lg col-md-8">
                    {{trans("medias.name")}}
                </th>

                <th class="th-lg col-md-4">
                    {{trans("medias.action")}}
                </th>
            </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>

            @if (count($items) > 0)
                @foreach ($items as $d)
                    @php $count =  1 @endphp
                    @foreach ($d->filesmedia as $f)

                        <tr>
                            <td class="col-md-8"><strong class="font-weight-bold"> {{$d->name_lang}}
                                    : {{trans('medias.element') }} {{$count}}</strong> {!!str_limit($d->description_lang,70)!!}
                            </td>
                            <td class="col-md-4 form-group">
                                <button type="button" class="btn btn-outline-primary btn-rounded btn-sm px-3"
                                        onclick="openmodal('{{$d->description_lang}}')">
                                    <i class="fas fa-eye ml-1"></i>
                                </button>

                                <a href="{{$f->url}}" target="_blank"
                                   class="btn btn-outline-primary btn-sm m-0 waves-effect btn-rounded px-3"
                                   download>
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                        @php $count = $count+ 1 @endphp
                    @endforeach
                @endforeach
            @else
                <tr>
                    <td class="text-center">
                        <h2 class="card-header-title mb-3 font-weight-bold">{{ trans('medias.empty-nomenclature') }}</h2>
                    </td>
                </tr>
            @endif
            </tbody>
            <!--Table body-->
        </table>
        <!--Table-->
        @include(layoutPaginate() , ["items" => $items])
    </section>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
    <script type="text/javascript">
        function openmodal(description) {
            swal({
                title: "{{trans("medias.description")}}",
                html: description
            });
        }
    </script>
@endsection