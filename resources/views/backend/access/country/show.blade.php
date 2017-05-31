@extends ('backend.layouts.app')

@section ('title', 'Countries Management' . ' | ' . 'View Country')

@section('page-header')
    <h1>
        Countries Management
        <small>View Country</small>
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
            <h3 class="box-title">View Country</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.country-header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">
                
                <table class="table table-striped table-hover">
                    @foreach($countrytrans as $key => $country_translation)
                        <tr> <th> <h3 style="color:#0A8F27">{{ $country_translation->translanguage->title }}</h3> </th><td></td> </tr>
                        <tr>
                            <th>Title <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td>{{ $country_translation->title }}</td>
                        </tr>
                        <tr>
                            <th>Description <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->description?></p></td>
                        </tr>
                        <tr>
                            <th>Nationality <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->nationality?></p></td>
                        </tr>
                        <tr>
                            <th>Population <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->population?></p></td>
                        </tr>
                        <tr>
                            <th>Best Place <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->best_place?></p></td>
                        </tr>
                        <tr>
                            <th>Best Time <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->best_time?></p></td>
                        </tr>
                        <tr>
                            <th>Cost of living <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->cost_of_living?></p></td>
                        </tr>
                        <tr>
                            <th>Geo Stats <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->geo_stats?></p></td>
                        </tr>
                        <tr>
                            <th>Demographics <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->demographics?></p></td>
                        </tr>
                        <tr>
                            <th>Economy <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->economy?></p></td>
                        </tr>
                        <tr>
                            <th>Suitable For <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->suitable_for?></p></td>
                        </tr>
                    @endforeach
                    <tr>
                         <th> <h3 style="color:#0A8F27">Common Fields</h3></th><td></td>   
                    </tr>
                    <tr>
                        <th>Code </th>
                        <td> <p><?=$country->code?></p> </td>
                    </tr>
                    <tr>
                        <th>Region </th>
                        <td> <p><?=$region->title?></p> </td>
                    </tr>
                    <tr>
                        <th>Safety Degree </th>
                        <td> <p><?=$degree->title?></p> </td>
                    </tr>
                    <tr>
                        <th>Active </th>
                        <td>
                            @if($country->active == 1) 
                              <p><label class="label label-success">Active</label></p> 
                            @else
                              <p><label class="label label-danger">Deactive</label></p>
                            @endif
                        </td>
                    </tr>

                    <tr>
                         <th> <h3 style="color:#0A8F27">Location</h3></th><td></td>   
                    </tr>
                    <tr>
                        <th>Latitude , Longitude</th>
                        <td> <p><?=$country->lat?> , <?=$country->lng?></p> </td>
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
          center: {lat: <?=$country->lat?>, lng: <?=$country->lng?>},
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
        var myLatLng = {lat: <?=$country->lat ?>, lng: <?=$country->lng?>};

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