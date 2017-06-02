<?php  
use App\Models\Access\language\Languages;
$languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>
@extends ('backend.layouts.app')

@section ('title', 'Activities Manager' . ' | ' . 'Create Activity')

@section('page-header')
    <!-- <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.create') }}</small>
    </h1> -->
    <h1>
        Activity Manager
        <small>Create Activity</small>
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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endsection

@section('content')
    {{ Form::open([
            'id'     => 'activity_form',
            'route'  => 'admin.activities.activity.store',
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'post',
            'files'  => true
        ]) 
    }}
        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Create Activity</h3>

            </div><!-- /.box-header -->

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
                                    {{ Form::text('title_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Title -->

                            <!-- Start: Description -->
                            <div class="form-group">
                                {{ Form::label('description_'.$language->id, 'Description', ['class' => 'col-lg-2 control-label description_input']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description_'.$language->id, null, ['class' => 'form-control description_input description', 'required' => 'required', 'placeholder' => 'Description']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Description -->

                            <!-- Start: Working Days -->
                            <div class="form-group">
                                {{ Form::label('working_days_'.$language->id, 'Working Days', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_days_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Working Days']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Days -->

                            <!-- Start: Working Times -->
                            <div class="form-group">
                                {{ Form::label('working_times_'.$language->id, 'Working Times', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_times_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Working Times']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Times -->

                            <!-- Start: How To Go -->
                            <div class="form-group">
                                {{ Form::label('how_to_go_'.$language->id, 'How To Go', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('how_to_go_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'How To Go']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: How To Go -->

                            <!-- Start: When To GO -->
                            <div class="form-group">
                                {{ Form::label('when_to_go_'.$language->id, 'When To Go', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('when_to_go_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'When To Go']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: When To GO -->

                            <!-- Start: Popularity -->
                            <div class="form-group">
                                {{ Form::label('popularity_'.$language->id, 'Popularity', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('popularity_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Popularity']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Popularity -->

                            <!-- Start: Conditions -->
                            <div class="form-group">
                                {{ Form::label('conditions_'.$language->id, 'Conditions', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('conditions_'.$language->id, null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Conditions']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Conditions -->

                        <!-- Languages Tabs: End -->
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
                    <!-- Activity Types: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Activity Type', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('types_id', $activity_types , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Activity Types: End -->
                    <!-- Countries: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Country', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('countries_id', $countries , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Countries : End -->
                    <!-- Cities: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'City', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('cities_id', $cities , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Cities : End -->
                    <!-- Safety Degree: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Safety Degree', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('safety_degree_id', $degrees , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Safety Degree: End -->
                    <div class="form-group">
                    {{ Form::label('title', 'Select Location', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <input id="pac-input" class="form-control" type="text" placeholder="Search Box">
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
                @endif
                <!-- Languages Tabs: End -->
            </div>
        </div>
        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.activities.activity.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
@endsection
