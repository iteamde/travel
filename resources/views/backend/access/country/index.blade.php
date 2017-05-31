@extends ('backend.layouts.app')

@section('title', 'Country Manager')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
   <!--  <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.active') }}</small>
    </h1> -->
    <h1>
    	Countries Manager
    	<small>Active Countries</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3> -->
            <h3 class="box-title">Countries</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.country-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="countries-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <!-- <th>{{ trans('labels.backend.access.users.table.id') }}</th> -->
                        <th>id</th>
                        <th>Code</th>
                        <th>lat</th>
                        <th>lng</th>
                        <th>Active</th>
                        <!-- <th>{{ trans('labels.backend.access.users.table.name') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.confirmed') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.roles') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.created') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.last_updated') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th> -->
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
            $('#countries-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.country.get") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
                },
                columns: [
	                {data: 'id', name: '{{config('access.country_table')}}.id'},
	                {data: 'code', name: '{{config('access.country_table')}}.code'},
	                {data: 'lat', name: '{{config('access.country_table')}}.lat'},
	                {data: 'lng', name: '{{config('access.country_table')}}.lng'},
	                {
                        name: '{{config('access.countries')}}.active',
                        data: 'active',
                        sortable: false,
                        searchable: false,
                        render: function(data) {
                            if (data == 1) {
                                return '<label class="label label-success">Active</label>';
                            } else {
                                return '<label class="label label-danger">Deactive</label>';
                            }
                        }
                    },
                    {data: 'action', name: 'action', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
