@extends(layoutExtend())

@section('title')
     {{ trans('localisationlivreur.localisationlivreur') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/localisationlivreur/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="user_id" class="form-control " placeholder="{{ trans("localisationlivreur.user_id") }}" value="{{ request()->has("user_id") ? request()->get("user_id") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="trajetlivreur_id" class="form-control " placeholder="{{ trans("localisationlivreur.trajetlivreur_id") }}" value="{{ request()->has("trajetlivreur_id") ? request()->get("trajetlivreur_id") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="status" class="form-control " placeholder="{{ trans("localisationlivreur.status") }}" value="{{ request()->has("status") ? request()->get("status") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/localisationlivreur') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('localisationlivreur.localisationlivreur') , 'model' => 'localisationlivreur' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection