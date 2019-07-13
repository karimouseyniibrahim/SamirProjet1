@extends(layoutExtend())

@section('title')
     {{ trans('colis.colis') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/colis/pluck') }}" ><i class="fa fa-trash"></i></button>
    <button class="btn btn-success" onclick="checkAll(this)"  ><i class="fa fa-check-circle-o"></i> </button>
    <button class="btn btn-warning" onclick="unCheckAll(this)"  ><i class="fa fa-check-circle"></i> </button>
@endpush

@push('search')
    <form method="get" class="form-inline">
		<div class="form-group">
			<input type="text" name="colis_id" class="form-control " placeholder="{{ trans("colis.colis_id") }}" value="{{ request()->has("colis_id") ? request()->get("colis_id") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="poids" class="form-control " placeholder="{{ trans("colis.poids") }}" value="{{ request()->has("poids") ? request()->get("poids") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="volume" class="form-control " placeholder="{{ trans("colis.volume") }}" value="{{ request()->has("volume") ? request()->get("volume") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/colis') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('colis.colis') , 'model' => 'colis' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection