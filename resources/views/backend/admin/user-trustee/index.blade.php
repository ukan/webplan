@extends('layout.backend.admin.master.master')

@section('title', 'User Trustee Management')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i></a></li>
        <li><span>User Trustee Management</span></li>
    </ol>
@endsection

@section('header')
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}

    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', 'User Trustee Management')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-header">
            <h3 class="panel-title">User Trustee Management</h3>
            <a class="btn btn-primary pull-right" href="{{ action('Backend\Assets\UserTrusteeController@create') }}" title="Add"><i class="fa fa-plus fa-fw"></i></a>
        </div>
        <div class="panel-body">
            @include('flash::message')
            <table id="trustees-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">Email</th>
                        <th class="center-align">First Name</th>
                        <th class="center-align">Last Name</th>
                        <th class="center-align">Role</th>
                        <th class="center-align">Last Login</th>
                        <th width="12%">&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}

    <script>
        $(document).ready(function() {
            $('#trustees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! action('Backend\Admin\UserTrusteeController@datatables') !!}',
                columns: [
                    {data: 'email', name: 'email'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'role', name: 'role', searchable: false},
                    {data: 'last_login', name: 'last_login', class: 'center-align', searchable: false},
                    {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
                ]
            });
        });
    </script>
    @include('backend.delete-modal-datatables')
@endsection