@extends(layoutExtend())

@section('title')
     {{ trans('inscription.inscription') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/inscription/pluck') }}" ><i class="fa fa-trash"></i></button>
    <button class="btn btn-success" onclick="checkAll(this)"  ><i class="fa fa-check-circle-o"></i> </button>
    <button class="btn btn-warning" onclick="unCheckAll(this)"  ><i class="fa fa-check-circle"></i> </button>
@endpush

@push('search')
    <form method="get" class="form-inline">
        <div class="form-group">
            <input type="text" name="from" class="form-control datepicker2" placeholder="{{ trans('admin.from') }}" value="{{ request()->has('from') ? request()->get('from') : '' }}">
        </div>
        <div class="form-group">
            <input type="text" name="to" class="form-control datepicker2" placeholder="{{ trans('admin.to') }}" value="{{ request()->has('to') ? request()->get('to') : '' }}">
        </div>
		<div class="form-group">
			<input type="text" name="numero_artisan" class="form-control " placeholder="{{ trans("inscription.numero_artisan") }}" value="{{ request()->has("numero_artisan") ? request()->get("numero_artisan") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="name" class="form-control " placeholder="{{ trans("inscription.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="formation_id" class="form-control " placeholder="{{ trans("inscription.formation_id") }}" value="{{ request()->has("formation_id") ? request()->get("formation_id") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/inscription') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('inscription.inscription') , 'model' => 'inscription' , 'table' => $dataTable->table([] , true) ])
    @include("admin.shared.modalstatus", ["title" =>trans('request.validate'),"name_id" =>"formation_id","url" => concatenateLangToUrl('admin/inscription/validation')])
@endsection

@section('script')
    @include('admin.shared.scripts')
    @include('admin.shared.validation')
@endsection