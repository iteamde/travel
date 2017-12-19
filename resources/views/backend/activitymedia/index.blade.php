@extends ('backend.layouts.app')

@section('title', 'Media Manager')

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css") }}
{{ Html::style("https://cdn.datatables.net/select/1.2.3/css/select.dataTables.min.css") }}
@endsection

@section('page-header')
   <!--  <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.active') }}</small>
    </h1> -->
    <h1>
    	Media Manager
    	<small>Active Media</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3> -->
            <h3 class="box-title">Media</h3>
            @include('backend.select-deselect-all-buttons')
            <div class="box-tools pull-right">
                @include('backend.activitymedia.partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="activitymedia-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <!-- <th>{{ trans('labels.backend.access.users.table.id') }}</th> -->
                        <th></th>
                        <th>id</th>
                        <th>Title</th>
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
{{ Html::script("https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js") }}
{{ Html::script("https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js") }}

    <script>
        $(function () {
            $('#activitymedia-table').DataTable({
                columnDefs: [ {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                } ],
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.activitymedia.activitymedia.get") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
                },
                columns: [
	                {data: '', name: ''},
                    {data: 'id', name: '{{config('activitymedia.media_table')}}.id'},
                    {data: 'transsingle.title', name: 'transsingle.title'},
                    {data: 'action', name: 'action', searchable: false, sortable: false}
                ],
                order: [[1, "asc"]],
                searchDelay: 500
            });
        });
    </script>
    <script>
    $(document).ready(function(){
        $(document).on('click','#select-all',function(){
            // alert('select-all');
            if($('#activitymedia-table tbody tr').length == 1){
                if($('#activitymedia-table tbody tr td').hasClass('dataTables_empty')){
                    return false;
                }
            }
            $('#activitymedia-table tbody tr').addClass('selected');
        });

        $(document).on('click','#deselect-all',function(){
            // alert('deselect-all');
            $('#activitymedia-table tbody tr').removeClass('selected');
        });
        
        $(document).on('click','#delete-all-selected',function(){
            // alert('delete all');
            // alert($('#activitymedia-table tr.selected').length);
            
            if($('#activitymedia-table tbody tr.selected').length == 0){
                alert('Please select some rows first.');
                return false;
            }

            if(!confirm('Are you sure you want to delete the selected rows?')){
                return false;
            }
            var ids = '';
            var i = 0;
            $('#activitymedia-table tbody tr.selected').each(function(){
                if(i != 0){
                    ids += ',';
                }
                ids += $(this).find('td:nth-child(2)').html();
                i++;
            });
            // alert(ids);
            $.ajax({
                url: '{{ route("admin.location.place.delete_ajax") }}',
                type: 'post',
                data: {
                    ids: ids
                },
                success: function(data){
                    var result = JSON.parse(data);
                    // alert(result.result);
                    if(result.result == true){
                        document.location.reload(); 
                    }
                }
            });
        });
    });
</script>
@endsection
