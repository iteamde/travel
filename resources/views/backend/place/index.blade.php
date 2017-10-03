@extends ('backend.layouts.app')

@section('title', 'Places Manager')

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
    Places Manager
    <small>Active Places</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
    <div class="box-header with-border">
        <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3> -->
        <h3 class="box-title">Places</h3>

        @include('backend.select-deselect-all-buttons')
        <div class="box-tools pull-right">
            @include('backend.place.partials.header-buttons')
        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="table-responsive">
            <table id="place-table" class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <!-- <th>{{ trans('labels.backend.access.users.table.id') }}</th> -->
                        <th></th>
                        <th>id</th>
                        <th>Title</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Place Type</th>
                        <th>Active</th>
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
    $('#place-table').DataTable({
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        // order: [[ 1, 'asc' ]]
        processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.location.place.get") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
            },
            columns: [
            {data: '', name: ''},
            {data: 'id', name: '{{config('locations.place_table')}}.id'},
            {data: 'transsingle.title', name: 'transsingle.title'},
            {data: 'transsingle.address', name: 'transsingle.address'},
            {data: 'city_title', name: 'city_title'},
            {data: 'place_id_title', name: '{{config('locations.place_table')}}.place_id_title'},
            {
            name: '{{config('locations.countries')}}.active',
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
            order: [[1, "asc"]],
            searchDelay: 500,
            initComplete: function () {
            this.api().columns().every(function () {
            var column = this;
            var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );
                    column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });
            column.data().unique().sort().each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>')
            });
            });
            }
    });
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','#select-all',function(){
            // alert($('#place-table tbody tr').length);
            if($('#place-table tbody tr').length == 1){
                if($('#place-table tbody tr td').hasClass('dataTables_empty')){
                    return false;
                }
            }
            $('#place-table tbody tr').addClass('selected');
        });

        $(document).on('click','#deselect-all',function(){
            // alert('deselect-all');
            $('#place-table tbody tr').removeClass('selected');
        });
        
        $(document).on('click','#delete-all-selected',function(){
            // alert('delete all');
            // alert($('#place-table tr.selected').length);
            
            if($('#place-table tbody tr.selected').length == 0){
                alert('Please select some rows first.');
                return false;
            }

            if(!confirm('Are you sure you want to delete the selected rows?')){
                return false;
            }
            var ids = '';
            var i = 0;
            $('#place-table tbody tr.selected').each(function(){
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
