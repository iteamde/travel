@extends ('backend.layouts.app')

@section ('title', 'Safety Degrees Manager')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
   <!--  <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.active') }}</small>
    </h1> -->
    <h1>
    	Safety Degrees Manager
    	<small>All Safety Degrees</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3> -->
            <h3 class="box-title">Safety Degrees</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.safety-degrees-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="safety-degrees-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <!-- <th>{{ trans('labels.backend.access.users.table.id') }}</th> -->
                        <th>id</th>
                        <th>title</th>
                        <!-- <th>{{ trans('labels.general.actions') }}</th> -->
                        <!-- <th>{{ trans('labels.backend.access.users.table.name') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.confirmed') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.roles') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.created') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.last_updated') }}</th> -->
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}

    <script>
        $(function () {
            $('#safety-degrees-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.safety-degrees.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: '{{config('access.safety_degree')}}.id'},
                    {data: 'transsingle.title', name: '{{config('access.safety_degree_lang')}}.title'},
                    {data: 'action', name: 'action', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
