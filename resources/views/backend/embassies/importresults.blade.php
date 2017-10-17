@extends ('backend.layouts.app')

@section('title', 'Embassies Manager')

@section('page-header')
<!--  <h1>
     {{ trans('labels.backend.access.users.management') }}
     <small>{{ trans('labels.backend.access.users.active') }}</small>
 </h1> -->
<h1>
    Embassies Manager
    <small>Import Embassies</small>
</h1>
@endsection

@section('content')
<div class="box box-success">
    {{ Form::open([
            'id'    => 'User_form',
            'route' => 'admin.embassies.embassies.savesearch',
            'class' => 'form-horizontal',
            'role' => 'form',
            'method' => 'post',
            'files' => true
        ])
    }}
    <div class="box-header with-border">
        <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3> -->
        <h3 class="box-title">Search results</h3>

        <div class="box-tools pull-right">
            <input type='checkbox' id='select_all' /> Select all
        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="table-responsive">
            <table id="place-table" class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <!-- <th>{{ trans('labels.backend.access.users.table.id') }}</th> -->
                        <th>Name</th>
                        <th>Address</th>
                        <th>Location</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach($results AS $r)
                    <tr @if(in_array($r->place_id, $provider_ids)) style="background-color:red" @endif>
                        <th>{{$r->name}}</th>
                        <th>{{$r->formatted_address}}</th>
                        <th>{{$r->geometry->location->lat}} {{$r->geometry->location->lng}}</th>
                        <th>
                            @if(!in_array($r->place_id, $provider_ids))
                            <input type="hidden" name="place[{{$i}}][provider_id]" value='{{$r->place_id}}' />
                            <input type="hidden" name="place[{{$i}}][types]" value='{{@join(',', $r->types)}}' />
                            <input type="hidden" name="place[{{$i}}][name]" value='{{$r->name}}' />
                            <input type="hidden" name="place[{{$i}}][address]" value='{{$r->formatted_address}}' />
                            <input type="hidden" name="place[{{$i}}][lat]" value='{{$r->geometry->location->lat}}' />
                            <input type="hidden" name="place[{{$i}}][lng]" value='{{$r->geometry->location->lng}}' />
                            <input type="hidden" name="place[{{$i}}][phone]" value='{{@$r->international_phone_number}}' />
                            <input type="hidden" name="place[{{$i}}][rating]" value='{{@$r->rating}}' />
                            <input type="hidden" name="place[{{$i}}][working_days]" value='{{@$r->working_days}}' />
                            <input type="hidden" name="place[{{$i}}][website]" value='{{@$r->website}}' />
                            <input type="checkbox" class='checkbox' name='save[{{$i}}]' />
                            @endif
                        </th>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!-- /.box-body -->
    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.embassies.embassies.import', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                <input type="hidden" name="countries_id" value='{{$countries_id}}' />
                <input type="hidden" name="cities_id" value='{{$cities_id}}' />
                @if(isset($admin_logs_id))
                <input type="hidden" name="admin_logs_id" value='{{$admin_logs_id}}' />
                <input type="hidden" name="latlng" value='{{$latlng}}' />
                @endif

                {{ Form::submit('Save Embassies', ['class' => 'btn btn-success btn-xs submit_button']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
</div><!--box-->
@endsection

@section('after-scripts')
<script>
//select all checkboxes
    $("#select_all").change(function () {  //"select all" change
        $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
    });

//".checkbox" change
    $('.checkbox').change(function () {
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if (false == $(this).prop("checked")) { //if this item is unchecked
            $("#select_all").prop('checked', false); //change "select all" checked status to false
        }
        //check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $("#select_all").prop('checked', true);
        }
    });
</script>
@endsection