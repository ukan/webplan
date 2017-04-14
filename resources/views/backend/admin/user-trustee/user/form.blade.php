@extends('layout.backend.admin.master.master')

@section('title', 'User Management - '.$title)

@section('page-header', 'User Management <small>'.$title.'</small>')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i></a></li>
        <li><a href="{!! action('Backend\Admin\UserTrustee\UserController@index') !!}">User Management</a></li>
        <li><span>{{ $title }}</span></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $title }}</h3>
                </div>
                {!! Form::modelHorizontal($user, $form) !!}
                    <div class="panel-body">
                        @if (! empty($user['avatar']) && file_exists(avatar_path($user['avatar'])))
                            <div class="form-group">
                                <div class="col-sm-12" align="center">
                                    <img src="{{ link_to_avatar($user['avatar']) }}" style="width: 55px; height: 55px" class="img-circle img-responsive"/>
                                </div>
                            </div>
                        @endif
                        <div class="form-group{{ Form::hasError('avatar') }}">
                            {!! Form::label('avatar', 'Avatar', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::file('avatar') !!}
                                {!! Form::errorMsg('avatar') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('username') }}">
                            {!! Form::label('username', 'Username', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('username') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('email') }}">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('email') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('first_name') }}">
                            {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('first_name') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('last_name') }}">
                            {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('last_name') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('role', 'Role', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::select('role', $dropdown, null, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('role') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('phone') }}">
                            {!! Form::label('phone', 'Phone', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('phone') !!}
                            </div>
                        </div>
                        <div class="form-group{{ Form::hasError('address') }}">
                            {!! Form::label('address', 'Address', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
                                {!! Form::errorMsg('address') !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {!! link_to_action('Backend\Admin\UserTrustee\UserController@index', 'Back', [], ['class' => 'btn btn-default']).' '.Form::submit('Save', ['class' => 'btn btn-primary pull-right', 'title' => 'Save']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection