@extends ('backend.layouts.app')

@section('title', 'Embassies Manager')

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
    	Embassies Manager
    	<small>Active Embassies</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3> -->
            <h3 class="box-title">Embassies</h3>
            @include('backend.select-deselect-all-buttons')
            <div class="box-tools pull-right">
                @include('backend.embassies.partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="countries-table" class="table table-condensed table-hover">
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
                        <th>Active</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                        <th></th><!-- For Cities -->
                        <th></th><!-- For Place Types -->
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
        var table;
        $(function () {
             table = $('#countries-table').DataTable({
                columnDefs: [ {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                },
                { "width": "20%" , "targets" : 4 },
                { "width": "20%" , "targets" : 5 }
                ],
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.embassies.embassies.get") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    {data: '', name: ''},
                    {data: 'id', name: '{{config('embassies.embassies_table')}}.id'},
                    {data: 'transsingle.title', name: 'transsingle.title'},
                    {data: 'address', name: 'address'},
                    {data: 'country_title', name: '{{config('embassies.embassies_table')}}.countries_id'},
                    {data: 'city_title', name: 'city_title'},
                    {data: 'place_id_title', name: 'place_id_title'},
                    {
                        name: '{{config('embassies.embassies')}}.active',
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
                    {data: 'cities_id', name: '{{config('embassies.embassies_table')}}.cities_id'},
                    {data: 'place_type', name: 'place_type'},
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                initComplete: function () {
                    $('#countries-table thead tr th:nth-child(10)').hide();
                    $('#countries-table tbody tr td:nth-child(10)').hide();
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
                    $('#countries-table tbody tr').each(function(){
                        var temp_text = $(this).find('td:nth-child(5)').html();
                            cities[temp_text] = temp_text;
                            temp_text = $(this).find('td:nth-child(6)').html();
                            place_types[temp_text] = temp_text;
                    });

                    $('#countries-table thead').append('<tr><td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>');
                    var count = 0;
                    $('#countries-table thead tr:nth-child(2) td').each( function () {
                        // var title = $(this).text();
                        var title = "hello";
                        if (count == 3){
                            $(this).html('<input type="text" id="address-filter" class="custom-filters form-control" style="width:150px" />');
                        }

                        if (count == 4){
                                $(this).html('<select id="country-filter" class="custom-filters form-control"><option value="">Search Country</option></select>');
                        }

                        if(count == 5){
                            $(this).html( '<select id="city-filter" class="custom-filters form-control"><option value="">Search City</option></select>' );
                        }

                        if(count == 6){
                            $(this).html( '<select id="place-type-filter" class="custom-filters"><option value="">Search Place Type</option></select>' );
                        }
                        count++;
                    });

                    /*Append Cities To City Filter*/
                    // for (var key in cities) {
                        // $('#city-filter').append('<?php  $city_filter_html; ?>');
                            $('#city-filter').select2({
                                width:'100%',
                                placeholder: 'Search City',
                                ajax: {
                                    url: '{{ route("admin.embassies.embassies.cities") }}',
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

                            $('#country-filter').select2({
                                width:'100%',
                                placeholder: 'Search Country',
                                ajax: {
                                url: '{{ route("admin.embassies.embassies.countries") }}',
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
                                    url: '{{ route("admin.embassies.embassies.types") }}',
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
                    // }

                    /*Append Place Types To Place Type Filter*/
                    // for (var key in place_types) {
                    //     $('#place-type-filter').append('<option value="'+key+'">'+key+'</option>')
                    // }
                }
            });
        });
    </script>
    <script>
    $(document).ready(function(){
        $(document).on('click','#select-all',function(){
            // alert('select-all');
            if($('#countries-table tbody tr').length == 1){
                if($('#countries-table tbody tr td').hasClass('dataTables_empty')){
                    return false;
                }
            }
            $('#countries-table tbody tr').addClass('selected');
        });

        $(document).on('click','#deselect-all',function(){
            // alert('deselect-all');
            $('#countries-table tbody tr').removeClass('selected');
        });

        $(document).on('click','#delete-all-selected',function(){
            // alert('delete all');
            // alert($('#countries-table tr.selected').length);

            if($('#countries-table tbody tr.selected').length == 0){
                alert('Please select some rows first.');
                return false;
            }

            if(!confirm('Are you sure you want to delete the selected rows?')){
                return false;
            }
            var ids = '';
            var i = 0;
            $('#countries-table tbody tr.selected').each(function(){
                if(i != 0){
                    ids += ',';
                }
                ids += $(this).find('td:nth-child(2)').html();
                i++;
            });
            // alert(ids);
            $.ajax({
                url: '{{ route("admin.embassies.embassies.delete_ajax") }}',
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
<script>
    $(document).ready(function(){
        $(document).on('change','#city-filter',function(){
            var val = $(this).val();
            if(val != ''){
                // table.columns(5).search()
                // if ( table.columns(8).search() !== val ) {
                    // alert("^\\s*"+val+"\\s*$");
                    // alert("^\\s*"+val+"\\s*$");
                        table.columns(8).search("^\\s*"+val+"\\s*$", true).draw();
                        $('#countries-table thead tr th:nth-child(10)').hide();
                        $('#countries-table tbody tr td:nth-child(10)').attr('style','display:none !important;');
                  // }
            }
        });
    });
    $(document).ready(function(){

        $(document).on('change', '#address-filter', function(){
            var val = $(this).val();
            if (val != ''){
                // table.columns(5).search()
                if (table.columns(3).search() !== val) {
                    table.columns(3).search("\\s*" + val + "\\s*", true).draw();
                }
            }
        });
           
        $(document).on('change', '#country-filter', function(){
            var val = $(this).val();
            if (val != ''){
                // table.columns(5).search()
                if (table.columns(4).search() !== val) {
                    table.columns(4).search("^\\s*" + val + "\\s*$", true).draw();
                }
            }
        });
            
        $(document).on('change','#place-type-filter',function(){
            var val = $(this).val();
            if(val != ''){
                // table.columns(5).search()
                // if ( table.columns(9).search() !== val ) {
                        // alert(val);
                        // alert("^\\s*"+val+"\\s*$");
                        table.columns(9).search("^\\s*"+val+"\\s*$", true).draw();
                        $('#countries-table thead tr th:nth-child(10)').hide();
                        $('#countries-table tbody tr td:nth-child(10)').attr('style','display:none !important;');
                 }
            // }
        });
    });
</script>
<style>
    #countries-table thead tr th:nth-child(10){
        display:none !important;
    }
    #countries-table tbody tr td:nth-child(10){
        display:none !important;
    }
    
    table.dataTable tbody td.select-checkbox, table.dataTable tbody th.select-checkbox {
        width:20px !important;
    }
</style>
@endsection
