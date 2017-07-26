@extends ('backend.layouts.app')

@section ('title', 'Admin logs')

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
<h1>
    {{ trans('labels.backend.access.users.management') }}
    <small>Admin Logs</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Admin Logs</h3>

        <div class="box-tools pull-right">
        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="table-responsive">
            <table id="logs-table" class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.access.users.table.id') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs AS $log)
                    <tr>
                        <td>{{ $log->admin_id }}</td>
                        <th>{{ $log->admin_id }}</th>
                        <th>{{$log->total}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!-- /.box-body -->
</div><!--box-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

@endsection
