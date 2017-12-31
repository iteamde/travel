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
                            <th>Quick Facts <small>({{ $country_translation->translanguage->title }})</small></th>
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
                            <th>Cost of Living Index <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->cost_of_living?></p></td>
                        </tr>
                        <tr>
                            <th>Crime Rate Index <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->geo_stats?></p></td>
                        </tr>
                        <tr>
                            <th>Quality of Life Index <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->demographics?></p></td>
                        </tr>
                        <tr>
                            <th>Restrictions <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->economy?></p></td>
                        </tr>
                        <tr>
                            <th>Hijab Allowed? <small>({{ $country_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$country_translation->suitable_for?></p></td>
                        </tr>
                    @endforeach
                    <tr>
                         <th> <h3 style="color:#0A8F27">Common Fields</h3></th><td></td>   
                    </tr>
                    <tr>
                        <th>Country Code </th>
                        <td> <p><?=$country->code?></p> </td>
                    </tr>
                    <tr>
                        <th>Continent </th>
                        <td> <p><?=$region->title?></p> </td>
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

                    <!-- Start: Airports -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Airports</h3></th><td></td>   
                    </tr>
                    @if(empty($airports))
                      <tr>
                          <th> <p>No Airports Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($airports as $key => $airport)
                      <tr>
                          <th> <p><?=$airport?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Airports -->

                    <!-- Start: Currencies -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Currencies</h3></th><td></td>   
                    </tr>
                    @if(empty($currencies))
                      <tr>
                          <th> <p>No Currencies Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($currencies as $key => $currency)
                      <tr>
                          <th> <p><?=$currency?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Currencies -->

                    <!-- Start: Capitals -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Capital Cities</h3></th><td></td>   
                    </tr>
                    @if(empty($capitals))
                      <tr>
                          <th> <p>No Capitals Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($capitals as $key => $capital)
                      <tr>
                          <th> <p><?=$capital?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Capitals -->

                    <!-- Start: EmergencyNumbers -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Emergency Numbers</h3></th><td></td>   
                    </tr>
                    @if(empty($emergency_numbers))
                      <tr>
                          <th> <p>No Emergency Numbers Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($emergency_numbers as $key => $number)
                      <tr>
                          <th> <p><?=$number?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: EmergencyNumbers -->

                    <!-- Start: Holidays -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Holidays</h3></th><td></td>   
                    </tr>
                    @if(empty($holidays))
                      <tr>
                          <th> <p>No Holidays Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($holidays as $key => $holiday)
                      <tr>
                          <th> <p><?=$holiday?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Holidays -->

                    <!-- Start: Languages Spoken -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Languages Spoken</h3></th><td></td>   
                    </tr>
                    @if(empty($languages_spoken))
                      <tr>
                          <th> <p>No Languages Spoken Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($languages_spoken as $key => $language_spoken)
                      <tr>
                          <th> <p><?=$language_spoken?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Languages Spoken -->

                    <!-- Start: Suitable Travel Styles -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Suitable Travel Styles</h3></th><td></td>   
                    </tr>
                    @if(empty($lifestyles))
                      <tr>
                          <th> <p>No Suitable Travel Styles Added</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($lifestyles as $key => $lifestyle)
                      <tr>
                          <th> <p><?=$lifestyle?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Suitable Travel Styles -->

                    <!-- Start: Religions -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Religions</h3></th><td></td>   
                    </tr>
                    @if(empty($religions))
                      <tr>
                          <th> <p>No Religions Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($religions as $key => $religion)
                      <tr>
                          <th> <p><?=$religion?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Religions -->

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
                    <!-- End: Medias -->
                <table class="table table-striped table-hover">
                    <tr>
                         <th> <h3 style="color:#0A8F27">Location</h3></th><td></td>   
                    </tr>
                    <tr>
                        <th>Latitude , Longitude</th>
                        <td> <p><?= $country->lat ?> , <?= $country->lng ?></p> </td>
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