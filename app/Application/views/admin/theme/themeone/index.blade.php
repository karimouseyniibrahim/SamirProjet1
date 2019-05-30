@extends(layoutExtend())

@section('title')
    home Control
@endsection


@section('content')
@php
    $p = permissionArray();
@endphp
    <div class="row clearfix">
    @if(array_intersect(['0'=>'App\Application\Controllers\Admin\UserController'] ,$p))
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="card card-block">
                <div class="header">
                    <h5>{{ trans('home.last_register_user') }}</h5>
                </div>
                <div class="body">
                    <div class="">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('home.username') }}</th>
                                <th>{{ trans('home.created_at') }}</th>
                                <th>{{ trans('curd.edit') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data['lastRegisterUser'] as $last)
                                <tr>
                                    <td>{{ $last->id }}</td>
                                    <td>{{ $last->name }}</td>
                                    <td>{{ $last->created_at}}</td>
                                    <td>
                                        <a href="{{ url('admin/user/item/'.$last->id) }}">{{ trans('home.edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(array_intersect(['0'=>'App\Application\Controllers\Admin\LogController'] ,$p))
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="card card-block">
                <div class="">
                    <div class="m-b--35 font-bold"><h5>{{ trans('home.admin_panel_log') }}</h5></div>
                    <ul class="list-unstyled m-x-n m-b-0">
                        @foreach($data['log'] as $Log)
                            <li class="b-t p-a-1">
                                <a href="{{ url('admin/log/'.$Log->id.'/view') }}" class="col-white">
                                    @if($Log->user)
                                        #{{ $Log->user->name }}
                                    @else
                                        {{ trans('admin.Visitor') }}
                                    @endif
                                    <span class="pull-right align-left">
                                         <b>{{ $Log->model }}</b> : {{ $Log->action }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection



