<?php  
use App\Models\Access\language\Languages;
$languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>
@extends ('backend.layouts.app')

@section ('title', 'Embassies Manager' . ' | ' . 'Create Embassies')

@section('page-header')
    <!-- <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.create') }}</small>
    </h1> -->
    <h1>
        Embassies Manager
        <small>Create Embassies</small>
    </h1>
@endsection

@section('after-styles')
    <style>
        #map {
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
            'id'     => 'embassies_form',
            'route'  => 'admin.embassies.embassies.store',
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'post',
            'files'  => true
        ]) 
    }}
        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Create Embassies</h3>

            </div><!-- /.box-header -->
            <!-- Language Error : Start -->
            <div class="row error-box">
                <div class="col-md-10">
                    <div class="required_msg">
                    </div>
                </div>
            </div>
            <!-- Language Error : End -->
            <div class="box-body">
                @if(!empty($languages))
                    <ul class="nav nav-tabs">
                    @foreach($languages as $language)
                        <li class="{{ ($languages[0]->id == $language->id)? 'active':'' }}">
                            <a data-toggle="tab" href="#{{$language->code}}">{{ $language->title }}</a>
                        </li>
                    @endforeach
                    </ul>
                @endif
                @if(!empty($languages))
                    <div class="tab-content">
                    @foreach($languages as $language)
                        <div id="{{ $language->code }}" class="tab-pane fade in {{ ($languages[0]->id == $language->id)? 'active':'' }}">
                            <br />
                            <!-- Start Title -->
                            <div class="form-group">
                                {{ Form::label('title_'.$language->id, 'Title', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('title_'.$language->id, null, ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Title -->

                            <!-- Start: Quick Facts -->
                            <div class="form-group">
                                {{ Form::label('description_'.$language->id, 'Quick Facts', ['class' => 'col-lg-2 control-label description_input']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description_'.$language->id, null, ['class' => 'form-control description_input description required', 'required' => 'required', 'placeholder' => 'Quick Facts']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Quick Facts -->

                            <!-- Start: Address -->
                            <div class="form-group">
                                {{ Form::label('address_'.$language->id, 'Address', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('address_'.$language->id, null, ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Address']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Address -->

                            <!-- Start: Phone -->
                            <div class="form-group">
                                {{ Form::label('phone_'.$language->id, 'Phone', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('phone_'.$language->id, null, ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Phone']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Phone -->

                            <!-- Start: Working Hours -->
                            <div class="form-group">
                                {{ Form::label('working_days_'.$language->id, 'Working Hours', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_days_'.$language->id, null, ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Working Hours']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Hours -->

                            <!-- Start: Best Time to Visit -->
                            <div class="form-group">
                                {{ Form::label('when_to_go_'.$language->id, 'Best Time to Visit', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('when_to_go_'.$language->id, null, ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Best Time to Visit']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Best Time to Visit -->

                            <!-- Start: Price Level -->
                            <div class="form-group">
                                {{ Form::label('price_level_'.$language->id, 'Price Level', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                     {{ Form::input('number','price_level_'.$language->id, null , ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Price Level']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Price Level -->

                            <!-- Start: Website -->
                            <div class="form-group">
                                {{ Form::label('history_'.$language->id, 'Website', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('history_'.$language->id, null, ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Website']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-
                            <!-- Languages Tabs: Start -->
                        </div>
                    @endforeach
                    </div>


                    
                    <!-- Active: Start -->
                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.languages.active'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::checkbox('active', '1', true) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Active: End -->

                    <!-- Country: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Country', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('country_id', [] , null,['class' => 'select2Class form-control','id' => 'country-dropdown-custom']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Country: End -->
                    
                     <!-- Cities: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Cities', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('cities_id', [] , null,['class' => 'select2Class form-control','id' => 'city-dropdown-custom']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Cities: End -->

                    <!-- Medias: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Medias', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('medias_id[]', $medias , null,['class' => 'select2Class form-control' , 'multiple' => 'multiple']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Medias: End -->
        
                    <div class="form-group">
                    {{ Form::label('title', 'Select Location', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <input id="pac-input" class="form-control" type="text" placeholder="Search Box" required>
                            <div id="map"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('title', 'Lat,Lng', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            
                            {{ Form::hidden('lat_lng', null, ['class' => 'form-control disabled', 'id' => 'lat-lng-input', 'required' => 'required', 'placeholder' => 'Lat,Lng']) }}

                            {{ Form::text('lat_lng_show', null, ['class' => 'form-control disabled', 'id' => 'lat-lng-input_show', 'required' => 'required', 'placeholder' => 'Lat,Lng' , 'disabled' => 'disabled']) }}
                        </div>
                    </div>

                    <!-- Images: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Images', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                        {{ Form::file('file_name',[ 'name' => 'pictures[]', 'multiple' => 'multiple' ]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Images: End -->
                @endif
                <!-- Languages Tabs: End -->
            </div>
        </div>
        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.embassies.embassies.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs submit_button']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->
    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script type="text/javascript">
        $('.select2Class').select2({
            placeHolder: 'Select Region'
        });

        $('.description').summernote({
             height: 200
        });

    </script>

    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
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
              draggable : true,
              position: place.geometry.location
            }));

            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();  
            document.getElementById('lat-lng-input').setAttribute("value", latitude + "," + longitude ); 
            document.getElementById('lat-lng-input_show').setAttribute("value", latitude + "," + longitude );         

            google.maps.event.addListener(markers[0], 'dragend', function (evt) {
                var lat =  evt.latLng.lat().toFixed(3);
                var longit = evt.latLng.lng().toFixed(3);
                document.getElementById('lat-lng-input').setAttribute("value", lat + "," + longit );
                document.getElementById('lat-lng-input_show').setAttribute("value", latitude + "," + longitude );
            });

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script type="text/javascript" src='//maps.googleapis.com/maps/api/js?key=AIzaSyAVazCatVc38xoeqY-F_9bAn6uo7NU2m9Y&libraries=places&callback=initAutocomplete'></script>

    <!-- Error Alert Script : Start -->
    <script>
        $(document).on('click' , '.submit_button' , function(){
        
            var msg = '<div id="language-alert" class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Please Fill Information In All Languages Tabs.</div>';

            $('.required').each(function(index,data){
                var flag = false;
                if($(this).val() == ''){
                    
                    flag = true;
                }

                if(flag){
                    $('.required_msg').html(msg);
                    $("#language-alert").fadeTo(5000, 500).slideUp(500, function(){
                        $("#language-alert").slideUp(500);
                    });   
                }
            });
        });
    </script>
    <!-- Error Alert Script : End -->
    <script type="text/javascript">
        $('#country-dropdown-custom').select2({
            width:'100%',
            placeholder: 'Select Country',
            ajax: {
            url: '{{ route("admin.location.country.get_active_countries") }}',
                    type: 'post',
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
        $('#city-dropdown-custom').select2({
            width:'100%',
            placeholder: 'Search City',
                    ajax: {
            url: '{{ route("admin.location.city.get_active_countries") }}',
                    dataType: 'json',
                    type: 'post',
                    delay: 250,
                     data: function (params) {
                        var country_id = '';
                        // country_id = $('#country-dropdown-custom').val();   
                        var query = {
                            q: params.term,
                            type: 'public',
                            country_id : country_id
                        };

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: function (data) {
                    return {
                    results: data
                    };
                    },
                    cache: true
            }
            });
    </script>
@endsection
