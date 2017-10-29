@extends ('backend.layouts.app')

@section('title', 'Places Manager')

@section('after-styles')
{{ Html::style("https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css") }}
{{ Html::style("https://cdn.datatables.net/select/1.2.3/css/select.dataTables.min.css") }}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                        <th>Country</th>
                        <th>City</th>
                        <th>Place Type</th>
                        <th>Media Done</th>
                        <th>Active</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!-- /.box-body -->
</div><!--box-->
@endsection

@section('after-scripts')
{{ Html::script("https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js") }}
{{ Html::script("https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js") }}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
var table = null;
$(function () {

table = $('#place-table').DataTable({
"lengthMenu": [ 10, 25, 50, 100, 1000 ],
        columnDefs: [ {
        orderable: false,
                className: 'select-checkbox',
                targets:   0,
        },
                // { "width": "5%" , "targets" : 1 },
                        // { "width": "10%" , "targets" : 3 },
                                // { "width": "10%" , "targets" : 2 },
                                { "width": "20%", "targets" : 4 },
                        { "width": "20%", "targets" : 5 },
                        ],
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
                                {data: 'country_title', name: '{{config('locations.place_table')}}.countries_id'},
                                {data: 'city_title', name: '{{config('locations.place_table')}}.cities_id'},
                                {data: 'place_id_title', name: '{{config('locations.place_table')}}.place_type'},
                                {data: 'media_done', name: '{{config('locations.place_table')}}.media_done'},
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
                                {data: 'action', name: 'action', searchable: false, sortable: false},
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
                                        column.search(val ? '^' + val + '$' : '', true, false)
                                                .draw();
                                        });
                                column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>')
                                });
                                });
                                var cities = [];
                                var place_types = [];
                                $('#place-table tbody tr').each(function(){
                                var temp_text = $(this).find('td:nth-child(6)').html();
                                cities[temp_text] = temp_text;
                                temp_text = $(this).find('td:nth-child(7)').html();
                                place_types[temp_text] = temp_text;
                                });
                                $('#place-table thead').append('<tr><td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>');
                                var count = 0;
                                $('#place-table thead tr:nth-child(2) td').each(function () {
                                // var title = $(this).text();
                                var title = "hello";
                                
                                if (count == 4){
                                $(this).html('<select id="country-filter" class="custom-filters form-control"><option value="">Search Country</option></select>');
                                }

                                if (count == 5){
                                $(this).html('<select id="city-filter" class="custom-filters form-control"><option value="">Search City</option></select>');
                                }

                                if (count == 6){
                                $(this).html('<select id="place-type-filter" class="custom-filters"><option value="">Search Place Type</option></select>');
                                }
                                if (count == 7){
                                $(this).html('<select id="media-done-filter" class="custom-filters"><option value="">Search Media Done</option><option value="1">Yes</option><option value="0">No</option></select>');
                                }
                                count++;
                                });
                                /*Append Cities To City Filter*/
                                // for (var key in cities) {
                                // $('#city-filter').append('<?php $city_filter_html; ?>');
                                $('#country-filter').select2({
                                    width:'100%',
                                placeholder: 'Search Country',
                                        ajax: {
                                        url: '{{ route("admin.location.place.countries") }}',
                                                dataType: 'json',
                                                delay: 250,
                                                processResults: function (data) {
                                                return {
                                                results: data
                                                };
                                                },
                                                cache: true
                                        }
                                });
                                $('#city-filter').select2({
                                    width:'100%',
                                placeholder: 'Search City',
                                        ajax: {
                                        url: '{{ route("admin.location.place.cities") }}',
                                                dataType: 'json',
                                                delay: 250,
                                                processResults: function (data) {
                                                return {
                                                results: data
                                                };
                                                },
                                                cache: true
                                        }
                                });
                                $('#place-type-filter').select2({
                                    width:'100%',
                                placeholder: 'Search Place Types',
                                        ajax: {
                                        url: '{{ route("admin.location.place.types") }}',
                                                dataType: 'json',
                                                delay: 250,
                                                processResults: function (data) {
                                                return {
                                                results: data
                                                };
                                                },
                                                cache: true
                                        }
                                });
                                $('#media-done-filter').select2({
                                    width:'100%',
                                    placeholder: 'Yes/No',
                                });
                                // }

                                /*Append Place Types To Place Type Filter*/
                                // for (var key in place_types) {
                                //     $('#place-type-filter').append('<option value="'+key+'">'+key+'</option>')
                                // }
                                }
                        });
                });</script>
<script>
            $(document).ready(function(){
            $(document).on('click', '#select-all', function(){
            // alert($('#place-table tbody tr').length);
            if ($('#place-table tbody tr').length == 1){
            if ($('#place-table tbody tr td').hasClass('dataTables_empty')){
            return false;
            }
            }
            $('#place-table tbody tr').addClass('selected');
            });
            $(document).on('click', '#deselect-all', function(){
            // alert('deselect-all');
            $('#place-table tbody tr').removeClass('selected');
            });
            $(document).on('click', '#delete-all-selected', function(){
            // alert('delete all');
            // alert($('#place-table tr.selected').length);

            if ($('#place-table tbody tr.selected').length == 0){
            alert('Please select some rows first.');
            return false;
            }

            if (!confirm('Are you sure you want to delete the selected rows?')){
            return false;
            }
            var ids = '';
            var i = 0;
            $('#place-table tbody tr.selected').each(function(){
            if (i != 0){
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
                    if (result.result == true){
                    document.location.reload();
                    }
                    }
            });
            });
            });
            $(document).ready(function(){
            
            $(document).on('change', '#country-filter', function(){
                var val = $(this).val();
                if (val != ''){
                    // table.columns(5).search()
                    if (table.columns(4).search() !== val) {
                        table.columns(4).search("^\\s*" + val + "\\s*$", true).draw();
                    }
                }
            });
            $(document).on('change', '#city-filter', function(){
            var val = $(this).val();
            if (val != ''){
            // table.columns(5).search()
            if (table.columns(5).search() !== val) {
            table.columns(5).search("^\\s*" + val + "\\s*$", true).draw();
            }
            }
            });
            });
            $(document).ready(function(){
            $(document).on('change', '#place-type-filter', function(){
            var val = $(this).val();
            if (val != ''){
            // table.columns(5).search()
            if (table.columns(6).search() !== val) {
            table.columns(6).search("^\\s*" + val + "\\s*$", true).draw();
            }
            }
            });
            $(document).on('change', '#media-done-filter', function(){
            var val = $(this).val();
            if(val == '1'){
                table.columns(7).search("1", false).draw();
            }else{
                table.columns(7).search("0", false).draw();
            }
            // if (val != ''){
            // table.columns(5).search()
            // if (table.columns(7).search() !== val) {
            // }
            // }
            });
            });
</script>
<style>
    .custom-filters{
        margin-left: 0;
    }
</style>
<style>

    #place-table tr td:nth-child(5),th:nth-child(5){
        display: none !important;  
    }

    table.dataTable tbody td.select-checkbox, table.dataTable tbody th.select-checkbox {
        width:20px !important;
    }
</style>
@endsection
