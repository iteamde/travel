<?php
use App\Models\Access\language\Languages;
// $languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>

@extends ('backend.layouts.app')

@section ('title', 'Places Manager' . ' | ' . 'Edit Place')

@section('page-header')
    <h1>
        <!-- {{ trans('labels.backend.access.users.management') }} -->
        Places Management
        <small>Edit place</small>
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
{{dd($images)}}
    {{ Form::model($place, [
            'id'     => 'place_update_form',
            'route'  => ['admin.location.place.update', $placeid],
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'PATCH',
            'files'  => true
        ])
    }}

        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Create Place</h3>

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

                            <!-- Start: Address -->
                            <div class="form-group">
                                {{ Form::label('address_'.$language->id, 'Address', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('address_'.$language->id, $data['address_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Address']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Address -->

                            <!-- Start: Phone -->
                            <div class="form-group">
                                {{ Form::label('phone_'.$language->id, 'Phone', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('phone_'.$language->id, $data['phone_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Phone']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Phone -->

                            <!-- Start: High Lights -->
                            <div class="form-group">
                                {{ Form::label('highlights_'.$language->id, 'High Lights', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('highlights_'.$language->id, $data['highlights_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'High Lights']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: High Lights -->

                            <!-- Start: Working Days -->
                            <div class="form-group">
                                {{ Form::label('working_days_'.$language->id, 'Best time', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_days_'.$language->id, $data['working_days_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Working Days']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Days -->

                            <!-- Start: Working Times -->
                            <div class="form-group">
                                {{ Form::label('working_times_'.$language->id, 'Working Times', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_times_'.$language->id, $data['working_times_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Working Times']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Times -->

                            <!-- Start: How To Go -->
                            <div class="form-group">
                                {{ Form::label('how_to_go_'.$language->id, 'How To Go', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('how_to_go_'.$language->id, $data['how_to_go_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'How To Go']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: How To Go -->

                            <!-- Start: When To Go -->
                            <div class="form-group">
                                {{ Form::label('when_to_go_'.$language->id, 'When To Go', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('when_to_go_'.$language->id, $data['when_to_go_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'When To Go']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: When To Go -->

                            <!-- Start: Num Activities -->
                            <div class="form-group">
                                {{ Form::label('num_activities_'.$language->id, 'No. of Activities', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::input('number','num_activities_'.$language->id, $data['num_activities_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'No. of Activities']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Num Activities -->

                            <!-- Start: Popularity -->
                            <div class="form-group">
                                {{ Form::label('popularity_'.$language->id, 'Popularity', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('popularity_'.$language->id, $data['popularity_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Popularity']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Popularity -->

                            <!-- Start: Conditions -->
                            <div class="form-group">
                                {{ Form::label('conditions_'.$language->id, 'Conditions', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('conditions_'.$language->id, $data['conditions_'.$language->id], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'Conditions']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Popularity -->

                            <!-- Start: Price Level -->
                            <div class="form-group">
                                {{ Form::label('price_level_'.$language->id, 'Price Level', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::input('number','price_level_'.$language->id, $data['price_level_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Price Level']) }}

                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Price Level -->

                            <!-- Start: No. of Checkins -->
                            <div class="form-group">
                                {{ Form::label('num_checkins'.$language->id, 'No. of Checkins', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::input('number','num_checkins_'.$language->id, $data['num_checkins_'.$language->id], ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'No. of Checkins']) }}

                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: No. of Checkins -->


                            <!-- Start: History -->
                            <div class="form-group">
                                {{ Form::label('history_'.$language->id, 'History', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('history_'.$language->id, $data['history_'.$language->id ], ['class' => 'form-control required', 'maxlength' => '191', 'required' => 'required', 'placeholder' => 'History']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: History -->

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
                            {{ Form::select('countries_id', $countries , $data['countries_id'],['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Countries: End -->

                    <!-- Cities: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Cities', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('cities_id', $cities , $data['cities_id'],['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Cities: End -->


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
                    <!-- Images: Start -->
                    <input type="hidden" id="delete-images" name="delete-images" value="" />
                    <div class="form-group">
                        {{ Form::label('title', 'Images', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                        {{ Form::file('file_name',[ 'name' => 'pictures[]', 'multiple' => 'multiple' ]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Images: End -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2" style="margin-right: 0px;margin-left: 20px;text-align: right;">
                                {{ Form::label('title', 'Uploaded Images', ['class' => 'col-md-2 control-label', 'style' => 'margin-left: 55px;']) }}
                            </div>
                            <div class="col-md-8">
                                @if(empty($images))
                                    <div style="padding-left: 20px;"><p>No Images Added.</p></div>
                                @endif
                                @foreach( $images as $image)
                                    <div class="col-md-2" style="">
                                        <i class="fa fa-times delete-image" data-id="<?= $image['id'] ?>" aria-hidden="true" style="color:red;position: relative;top:20px;left:85px;" ></i>
                                        <img src="<?= $image['url'] ?>" style="width:100px;height:100px;"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Languages Tabs: End -->
            </div>
        </div>

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.location.place.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
          center: {lat: <?=$place->lat?>, lng: <?=$place->lng?>},
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
        var myLatLng = {lat: <?=$place->lat ?>, lng: <?=$place->lng?>};

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

        $(document).on('click', '.delete-image', function(){

            var id = $(this).attr('data-id');
            $(this).parent().remove();

            var value = $('#delete-images').val();

            if(value == ''){
                $('#delete-images').val(id);
            }else{
                value += ',' + id;
                $('#delete-images').val(value);
            }
            // alert($('#delete-images').val());
        });
    </script>
    <!-- Error Alert Script : End -->
@endsection
