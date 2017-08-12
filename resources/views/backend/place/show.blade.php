@extends ('backend.layouts.app')

@section ('title', 'Places Management' . ' | ' . 'View Place')

@section('page-header')
    <h1>
        Places Management
        <small>View Place</small>
    </h1>
@endsection

@section('after-styles')
    <style type="text/css">
        td.description {
            word-break: break-all;
        }
        #map {
            height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">View Place</h3>

            <div class="box-tools pull-right">
                @include('backend.place.partials.header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">

                <table class="table table-striped table-hover">

                    @foreach($placetrans as $key => $place_translation)
                        <tr> <th> <h3 style="color:#0A8F27">{{ $place_translation->translanguage->title }}</h3> </th><td></td> </tr>
                        <tr>
                            <th>Title <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td>{{ $place_translation->title }}</td>
                        </tr>
                        <tr>
                            <th>Description <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->description?></p></td>
                        </tr>
                        <tr>
                            <th>Address <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->address ?></p></td>
                        </tr>
                        <tr>
                            <th>Phone <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->phone?></p></td>
                        </tr>
                        <tr>
                            <th>Highlights <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->highlights?></p></td>
                        </tr>
                        <tr>
                            <th>Working Days <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->working_days?></p></td>
                        </tr>
                        <tr>
                            <th>Working Times <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->working_times?></p></td>
                        </tr>
                        <tr>
                            <th>How To Go <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->how_to_go?></p></td>
                        </tr>
                        <tr>
                            <th>When To Go <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->when_to_go?></p></td>
                        </tr>
                        <tr>
                            <th>No. of Activities <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->num_activities ?></p></td>
                        </tr>
                        <tr>
                            <th>Popularity <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->popularity?></p></td>
                        </tr>
                        <tr>
                            <th>Conditions <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->conditions ?></p></td>
                        </tr>
                        <tr>
                            <th>Price Level <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->price_level ?></p></td>
                        </tr>
                        <tr>
                            <th>No. of Checkins <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->num_checkins ?></p></td>
                        </tr>
                        <tr>
                            <th>History <small>({{ $place_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$place_translation->history ?></p></td>
                        </tr>
                    @endforeach
                    <tr>
                         <th> <h3 style="color:#0A8F27">Common Fields</h3></th><td></td>
                    </tr>
                    <tr>
                        <th>Country </th>
                        <td> <p><?=$country->title?></p> </td>
                    </tr>
                    <tr>
                        <th>Cities </th>
                        <td> <p><?=$city->title?></p> </td>
                    </tr>
                    <tr>
                        <th>Active </th>
                        <td>
                            @if($place->active == 1)
                              <p><label class="label label-success">Active</label></p>
                            @else
                              <p><label class="label label-danger">Deactive</label></p>
                            @endif
                        </td>
                    </tr>

                    <!-- Start: Medias -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Medias</h3></th><td></td>
                    </tr>
                    @if(empty($medias))
                      <tr>
                          <th> <p>No Medias Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($medias as $key => $media)
                      <tr>
                          <th> <p><?=$media?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Medias -->
                    <!-- Start: Images -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Images</h3></th><td></td>   
                    </tr>
                </table>
                <div class="row">
                    @if(empty($images))
                        <div style="padding-left: 20px;"><p>No Images Added.</p></div>
                    @endif
                    @foreach($images as $key => $image)
                        <div class="col-md-2" style="margin-right: 20px;margin-top:10px;">  
                            <a href="<?=$image?>"><img src="<?=$image?>" style="width:170px;height:150px;"/>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- End: Images -->
                <table class="table table-striped table-hover">
                    <tr>
                         <th> <h3 style="color:#0A8F27">Location</h3></th><td></td>
                    </tr>
                    <tr>
                        <th>Latitude , Longitude</th>
                        <td> <p><?=$place->lat?> , <?=$place->lng?></p> </td>
                    </tr>

                </table>
                <!-- Map will be created in the "map" div -->
                <div id="map"></div>
                <!-- Map div end -->

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script type="text/javascript">
        $('.description_input').summernote({
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
@endsection