@extends ('backend.layouts.app')

@section ('title', 'Places Manager' . ' | ' . 'Import Places')

@section('page-header')
<h1>
    <!-- {{ trans('labels.backend.access.users.management') }} -->
    Places Management
    <small>Import Places</small>
</h1>
@endsection

@section('after-styles')
<style>
    #gmap {
        height: 300px;
    }
    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    .pac-container {
        font-family: Roboto;
    }
</style>

<!-- Language Error Style: Start -->
<style>
    .required_msg{
        padding-left: 20px;
    }
</style>
<!-- Language Error Style: End -->

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endsection

@section('content')
{{ Form::open([
            'id'    => 'User_form',
            'route' => 'admin.location.place.search',
            'class' => 'form-horizontal',
            'role' => 'form',
            'method' => 'post',
            'files' => true
        ])
}}

<div class="box box-success">
    <div class="box-header with-border">
        <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
        <h3 class="box-title">Import Places</h3>

        <div class="box-tools pull-right">

        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        <!-- Countries: Start -->
        <div class="form-group">
            {{ Form::label('title', 'Country', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::select('countries_id', $countries , null,['class' => 'select2Class form-control']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->
        <!-- Countries: End -->

        <!-- Cities: Start -->
        <div class="form-group">
            {{ Form::label('title', 'Cities', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::select('cities_id', $cities , null,['class' => 'select2Class form-control']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->
        <!-- Cities: End -->
        <!-- Title: Start -->
        <div class="form-group">
            {{ Form::label('address', 'Address', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::text('address', null, ['class' => 'form-control', 'maxlength' => '255', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Enter city or location to search']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->
        <!-- Title: End -->

        <!-- Code: Start -->
        <div class="form-group">
            {{ Form::label('query', 'Query', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">
                {{ Form::text('query', null, ['class' => 'form-control', 'maxlength' => '255', 'autofocus' => 'autofocus', 'placeholder' => 'Enter query to search']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->
        <div class="form-group">
            {{ Form::label('latlng', 'Latitude, Longitude', ['class' => 'col-lg-2 control-label', 'id' => 'latlng']) }}

            <div class="col-lg-10">
                {{ Form::text('latlng', null, ['class' => 'form-control', 'maxlength' => '255', 'autofocus' => 'autofocus', 'placeholder' => 'Enter Latitude and Lonitude']) }}
            </div><!--col-lg-10-->
        </div><!--form control-->

        <div class="form-group">
            {{ Form::label('map', 'Map', ['class' => 'col-lg-2 control-label']) }}

            <div class="col-lg-10">

                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div id="gmap"></div>


            </div><!--col-lg-10-->
        </div><!--form control-->
        <!-- Code: End -->
    </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-info">
    <div class="box-body">
        <div class="pull-left">
            {{ link_to_route('admin.access.languages.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
        </div><!--pull-left-->

        <div class="pull-right">
            {{ Form::submit('Search', ['class' => 'btn btn-success btn-xs submit_button']) }}
        </div><!--pull-right-->

        <div class="clearfix"></div>
    </div><!-- /.box-body -->
</div><!--box-->

{{ Form::close() }}
@endsection

@section('after-scripts')
<script type="text/javascript">
    $('.select2Class').select2({
        placeHolder: 'Select Region'
    });
    $('.select2Class').change(function () {
        $.getJSON("{{ url('BeAdminCP/ads/jesoncities')}}",
                {countryID: $(this).val()},
                function (data) {
                    var model = $('select#cityid2');
                    model.empty();
                    model.append("<option value=''>Select City </option>");
                    $.each(data, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.title + "</option>");
                    });
                });
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCP_HV2cr3NTOficYvrI0KbW0h4gbVmTek&libraries=places&callback=initAutocomplete" async defer></script>
<script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('gmap'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
        map.addListener('click', function (event) {
            $('#latlng').val('1');
            document.getElementById('latlng').value = '1';
        //alert("Latitude: " + event.latLng.lat() + " " + ", longitude: " + event.latLng.lng());
    });
    }


</script>

@endsection