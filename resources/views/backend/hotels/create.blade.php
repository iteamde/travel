<?php  
use App\Models\Access\language\Languages;
$languages = DB::table('conf_languages')->where('active', Languages::LANG_ACTIVE)->get();
?>
@extends ('backend.layouts.app')

@section ('title', 'Hotels Manager' . ' | ' . 'Create Hotel')

@section('page-header')
    <!-- <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.create') }}</small>
    </h1> -->
    <h1>
        Hotels Manager
        <small>Create Hotel</small>
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
            'id'     => 'hotels_form',
            'route'  => 'admin.hotels.hotels.store',
            'class'  => 'form-horizontal',
            'role'   => 'form',
            'method' => 'post',
            'files'  => true
        ]) 
    }}
        <div class="box box-success">
            <div class="box-header with-border">
                <!-- <h3 class="box-title">{{ trans('labels.backend.access.users.create') }}</h3> -->
                <h3 class="box-title">Create Hotel</h3>

            </div>
            <!-- /.box-header -->
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

                            <!-- Start: Description -->
                            <div class="form-group">
                                {{ Form::label('description_'.$language->id, 'Description', ['class' => 'col-lg-2 control-label description_input']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description_'.$language->id, null, ['class' => 'form-control description_input description required', 'required' => 'required', 'placeholder' => 'Description']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Description -->

                            <!-- Start: Working Days -->
                            <div class="form-group">
                                {{ Form::label('working_days_'.$language->id, 'Working Days', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_days_'.$language->id, null, ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Working Days']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Days -->

                            <!-- Start: Working Times -->
                            <div class="form-group">
                                {{ Form::label('working_times_'.$language->id, 'Working Times', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('working_times_'.$language->id, null, ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Working Times']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Working Times -->

                            <!-- Start: How To Go -->
                            <div class="form-group">
                                {{ Form::label('how_to_go_'.$language->id, 'How To Go', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('how_to_go_'.$language->id, null, ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'How To Go']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: How To Go -->

                            <!-- Start: When To GO -->
                            <div class="form-group">
                                {{ Form::label('when_to_go_'.$language->id, 'When To Go', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('when_to_go_'.$language->id, null, ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'When To Go']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: When To GO -->

                            <!-- Start: Number Of Activities -->
                            <div class="form-group">
                                {{ Form::label('num_activities_'.$language->id, 'Number Of Activities', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('num_activities_'.$language->id, null, ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Number Of Activities']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Number Of Activities -->

                            <!-- Start: Popularity -->
                            <div class="form-group">
                                {{ Form::label('popularity_'.$language->id, 'Popularity', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('popularity_'.$language->id, null, ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Popularity']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            <!-- End: Popularity -->

                            <!-- Start: Conditions -->
                            <div class="form-group">
                                {{ Form::label('conditions_'.$language->id, 'Conditions', ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('conditions_'.$language->id, null, ['class' => 'form-control required', 'required' => 'required', 'placeholder' => 'Conditions']) }}
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
                            {{ Form::checkbox('active', '1', true) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Active: End -->
                    
                    <!-- Country: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Country', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('country_id', $countries , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Country: End -->
                    
                    <!-- City: Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'City', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('city_id', $cities , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- City: End -->

                    <!-- Place : Start -->
                    <div class="form-group">
                        {{ Form::label('title', 'Place', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('place_id', $places , null,['class' => 'select2Class form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Place : End -->

                    <!-- Medias : Start -->
                    <div class="form-group">
                        {{ Form::label('medias', 'Medias', ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::select('medias_id[]', $medias , null,['class' => 'select2Class form-control' , 'multiple' => 'multiple']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <!-- Medias : End -->

                    <!-- Location: Start -->
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

                    <!-- Cover photo upload field - Start -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2" style="margin-right: 0px;margin-left: 20px;text-align: right;">
                                {{ Form::label('title','Upload Cover Photo',['class' => 'col-md-2 control-label','style' => 'margin-left: 55px;']) }}
                            </div>
                            <div class="col-md-8" style="padding-top: 22px">
                                {{ Form::file('file_name',['name' => 'cover_image','class' => 'post-fileupload']) }}
                            </div>
                        </div>
                    </div>
                    <!-- Cover photo upload field - End -->
                    <!-- Cover photo Show - Start -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2" style="margin-right: 0px;margin-left: 20px;text-align: right;">
                                {{ Form::label('title','Cover Photo',['class' => 'col-md-2 control-label','style' => 'margin-left: 55px;']) }}
                            </div>
                            <div class="col-md-8">
                                <div style="padding-left: 20px;padding-top: 22px" id="cover-message"><p>No Cover Image Added.</p></div>
                                <div class="col-md-2" style="">
                                    <!-- Cover delete Icon -->
                                    <i id="delete-cover" class="zoom-effect-icon fa fa-times image-hide" data-toggle="tooltip" title="Remove Cover Image" data-id="" aria-hidden="true" style="color:red;position: relative;top:20px;left:85px;" state="1" start-check="1"></i>
                                    <img class="image-hide" id="cover-preview" src="" style="width:100px;height:100px;"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Cover photo Show - End -->
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
    <script>
        $(document).ready(function(){
            //Script for Tooltip initializations
            $('[data-toggle="tooltip"]').tooltip(); 
            
            //get default cover on page load
            var old_cover = null;
            old_cover = $('#cover-preview').clone(true);
            var old_check = $('#delete-cover').attr('start-check');

            //Script for Add Cover functionality
            $(document).on('click','.add-cover',function(){
                var url = $(this).data('url');
                var id  = $(this).data('id');

                old_cover = $('#cover-preview').clone(true);
                var check = $('#delete-cover').attr('start-check');

                if(check == '1'){

                }else{
                    $('#delete-cover').attr('state','3');
                    $('#delete-cover').attr('start-check','3');
                }
                $('#media-cover-image').val(id);
                $('#cover-preview').attr('src',url);
                $('#cover-message').hide();
                $('#cover-preview').show();
                $('#delete-cover').show();
                $('.post-fileupload').replaceWith($('.post-fileupload').val('').clone(true));
            });

            //Script for Remove Cover Functionality
            $(document).on('click','#delete-cover',function(){
                var state = $(this).attr('state');
                var check = $(this).attr('start-check');

                if(check == "1"){
                    $('#cover-message').show();
                    $('#cover-preview').hide();
                    $('#delete-cover').hide();
                    $('#media-cover-image').val('');
                    $('.post-fileupload').replaceWith($('.post-fileupload').val('').clone(true));
                }else if(check == "2"){
                    $('#cover-message').show();
                    $('#cover-preview').hide();
                    $('#remove-cover-image').val('1');
                    $('#delete-cover').hide();
                }else if(check == "3"){
                    $('#media-cover-image').val('');
                    $('#cover-preview').replaceWith(old_cover);
                    $('.post-fileupload').replaceWith($('.post-fileupload').val('').clone(true));
                    $(this).attr('start-check',old_check);
                }
            });

            //Function to get uploaded image url
            var i = 0;

            function readURL(input) {
                
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#cover-preview').attr('src',e.target.result);
                        $('#delete-cover').attr('state',2);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('.post-fileupload').change(function(){
                $('#media-cover-image').val('');
                old_cover = $('#cover-preview').clone(true);
                
                var check = $('#delete-cover').attr('start-check');
                if(check == "1"){

                }else{
                    $('#delete-cover').attr('start-check','3');
                    $('#delete-cover').attr('state','2');
                }
                
                readURL(this);
                $('#cover-preview').show();
                $('#delete-cover').show();
                $('#cover-message').hide();
            });
        });
    </script>
    <style>
        .zoom-effect-icon:hover {
            font-size: 17px;
        }
        .image-hide{
            display: none;
        }
    </style>

@endsection
