<?php
use App\Models\Access\language\Languages;
// $languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>

@extends ('backend.layouts.app')

@section ('title', 'Hotels Manager' . ' | ' . 'Edit Hotels')

@section('page-header')
    <h1>
        <!-- {{ trans('labels.backend.access.users.management') }} -->
        Hotels Management
        <small>Edit Hotels</small>
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
    {{ Form::model($hotel, [
            'id'     => 'hotels_update_form',
            'route'  => ['admin.hotels.hotels.update', $hotelid],
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'PATCH',
        ])
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Create Hotels</h3>

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
                                    {{ Form::text('title_'.$language->id, $data['title_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Title -->

                            <!-- Start: Description -->
                            <div class="form-group">
                                {{ Form::label('description_'.$language->id, 'Description', ['class' => 'col-lg-2 control-label description_input']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description_'.$language->id, $data['description_'.$language->id], ['class' => 'form-control description_input description required', 'required' => 'required', 'placeholder' => 'Description']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Description -->

                            <!-- Start: Working Days -->
                            <div class="form-group">
                                {{ Form::label('working_days_'.$language->id, 'Working Days', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_days_'.$language->id, $data['working_days_'.$language->id] , ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Working Days']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Days -->

                            <!-- Start: Working Times -->
                            <div class="form-group">
                                {{ Form::label('working_times_'.$language->id, 'Working Times', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_times_'.$language->id, $data['working_times_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Working Times']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Times -->

                            <!-- Start: How To Go -->
                            <div class="form-group">
                                {{ Form::label('how_to_go_'.$language->id, 'How To Go', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('how_to_go_'.$language->id, $data['how_to_go_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'How To Go']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: How To Go -->

                            <!-- Start: When To GO -->
                            <div class="form-group">
                                {{ Form::label('when_to_go_'.$language->id, 'When To Go', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('when_to_go_'.$language->id, $data['when_to_go_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'When To Go']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: When To GO -->

                            <!-- Start: Number Of Activities -->
                            <div class="form-group">
                                {{ Form::label('num_activities_'.$language->id, 'Number Of Activities', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('num_activities_'.$language->id, $data['num_activities_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Number Of Activities']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Number Of Activities -->

                            <!-- Start: Popularity -->
                            <div class="form-group">
                                {{ Form::label('popularity_'.$language->id, 'Popularity', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('popularity_'.$language->id, $data['popularity_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Popularity']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Popularity -->

                            <!-- Start: Conditions -->
                            <div class="form-group">
                                {{ Form::label('conditions_'.$language->id, 'Conditions', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('conditions_'.$language->id, $data['conditions_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Conditions']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Conditions -->
                            <!-- Languages Tabs: Start -->
                        </div>
                    @endforeach
                    </div>

                    <!-- Active: Start -->
                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.languages.active'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            @if($data['active'] == 1)
                                {{ Form::checkbox('active', $data['active'] , true) }}
                            @else
                                {{ Form::checkbox('active', $data['active'] , false) }}
                            @endif
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Active: End -->

                    <!-- Countries: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Country', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('country_id', $countries , $data['country_id'],['class' => 'select2Class form-control','id' => 'country-dropdown-custom']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Countries: End -->

                    <!-- Cities: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Cities', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('city_id', $cities , $data['city_id'],['class' => 'select2Class form-control','id' => 'city-dropdown-custom']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Cities: End -->

                    <!-- Place: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Places', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('place_id', $places , $data['place_id'],['class' => 'select2Class form-control','id' => 'place-dropdown-custom']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Place: End -->

                    <!-- Medias : Start -->
                    <div class="form-group">
                        {{ Form::label('medias', 'Medias', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('medias_id[]', $medias , $data['selected_medias'],['class' => 'select2Class form-control' , 'multiple' => 'multiple','id' => 'media-dropdown-custom']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Medias : End -->

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

                            {{ Form::hidden('lat_lng', $data['lat_lng'], ['class' => 'form-control disabled', 'id' => 'lat-lng-input', 'required' => 'required', 'placeholder' => 'Lat,Lng']) }}

                            {{ Form::text('lat_lng_show', $data['lat_lng'], ['class' => 'form-control disabled', 'id' => 'lat-lng-input_show', 'required' => 'required', 'placeholder' => 'Lat,Lng' , 'disabled' => 'disabled']) }}
                        </div>
                    </div>
                @endif
                <!-- Languages Tabs: End -->
            </div>
        </div>

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.hotels.hotels.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs submit_button']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endsection
@section('after-scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script type="text/javascript">
        $('.description').summernote({
             height: 200
        });
    </script>
    <script type="text/javascript">
        $('.select2Class').select2({
            placeHolder: 'Select Region'
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
          center: {lat: <?=$hotel->lat?>, lng: <?=$hotel->lng?>},
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
        var myLatLng = {lat: <?=$hotel->lat ?>, lng: <?=$hotel->lng?>};

        markers.push(new google.maps.Marker({
              map: map,
              position: myLatLng,
              draggable : true,
        }));

        google.maps.event.addListener(markers[0], 'dragend', function (evt) {
                var lat =  evt.latLng.lat().toFixed(3);
                var longit = evt.latLng.lng().toFixed(3);
                document.getElementById('lat-lng-input').setAttribute("value", lat + "," + longit );
                document.getElementById('lat-lng-input_show').setAttribute("value", lat + "," + lat );
        });

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
                document.getElementById('lat-lng-input_show').setAttribute("value", lat + "," + longit );
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
    <script defer type="text/javascript" src='//maps.googleapis.com/maps/api/js?key=AIzaSyAVazCatVc38xoeqY-F_9bAn6uo7NU2m9Y&libraries=places&callback=initAutocomplete'></script>
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
        $('#media-dropdown-custom').select2({
            width:'100%',
            placeholder: 'Select Media',
                    ajax: {
            url: '{{ route("admin.activitymedia.media.get_active_medias") }}',
                    dataType: 'json',
                    type: 'post',
                    delay: 250,
                    processResults: function (data) {
                    return {
                    results: data
                    };
                    },
                    cache: true
            }
            });
        $('#place-dropdown-custom').select2({
            width:'100%',
            placeholder: 'Select Place',
                    ajax: {
            url: '{{ route("admin.location.place.get_active_places") }}',
                    dataType: 'json',
                    type: 'post',
                    delay: 250,
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
