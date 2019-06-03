@extends(layoutExtend())

@section('title')
     {{ trans('commandeproduit.commandeproduit') }} {{ trans('home.control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@push('header')
    <button class="btn btn-danger" onclick="deleteThemAll(this)" data-link="{{ url('admin/commandeproduit/pluck') }}" ><i class="fa fa-trash"></i></button>
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
			<input type="text" name="modeEnvoi" class="form-control " placeholder="{{ trans("commandeproduit.modeEnvoi") }}" value="{{ request()->has("modeEnvoi") ? request()->get("modeEnvoi") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="devis" class="form-control " placeholder="{{ trans("commandeproduit.devis") }}" value="{{ request()->has("devis") ? request()->get("devis") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="typecommande" class="form-control " placeholder="{{ trans("commandeproduit.typecommande") }}" value="{{ request()->has("typecommande") ? request()->get("typecommande") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="fraistransport" class="form-control " placeholder="{{ trans("commandeproduit.fraistransport") }}" value="{{ request()->has("fraistransport") ? request()->get("fraistransport") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="paye" class="form-control " placeholder="{{ trans("commandeproduit.paye") }}" value="{{ request()->has("paye") ? request()->get("paye") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="dateacheminer" class="form-control " placeholder="{{ trans("commandeproduit.dateacheminer") }}" value="{{ request()->has("dateacheminer") ? request()->get("dateacheminer") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="delaislivraison" class="form-control " placeholder="{{ trans("commandeproduit.delaislivraison") }}" value="{{ request()->has("delaislivraison") ? request()->get("delaislivraison") : "" }}">
		</div>
		<div class="form-group">
			<input type="text" name="datedebutacheminement" class="form-control " placeholder="{{ trans("commandeproduit.datedebutacheminement") }}" value="{{ request()->has("datedebutacheminement") ? request()->get("datedebutacheminement") : "" }}">
		</div>

        <button class="btn btn-success" type="submit" ><i class="fa fa-search"></i></button>
        <a href="{{ url('admin/commandeproduit') }}" class="btn btn-danger" ><i class="fa fa-close"></i></a>
    </form>
@endpush

@section('content')
    @include(layoutTable() , ['title' => trans('commandeproduit.commandeproduit') , 'model' => 'commandeproduit' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection