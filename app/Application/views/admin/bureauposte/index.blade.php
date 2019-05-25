@extends(layoutExtend())

@section('title')
     {{ trans('bureauposte.bureauposte') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/bureauposte/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="name" class="form-control " placeholder="{{ trans("bureauposte.name") }}" value="{{ request()->has("name") ? request()->get("name") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="adresse" class="form-control " placeholder="{{ trans("bureauposte.adresse") }}" value="{{ request()->has("adresse") ? request()->get("adresse") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="tel" class="form-control " placeholder="{{ trans("bureauposte.tel") }}" value="{{ request()->has("tel") ? request()->get("tel") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="email" class="form-control " placeholder="{{ trans("bureauposte.email") }}" value="{{ request()->has("email") ? request()->get("email") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/bureauposte') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('bureauposte.bureauposte') , 'model' => 'bureauposte' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection