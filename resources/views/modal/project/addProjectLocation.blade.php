<style>
      #map {
        height: 400px;
        width: 90%;
        margin: 0 auto;
      }
      #autocomplete-dropdown {
        position: absolute;
        z-index: 1;
        background-color: #fff;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ccc;
      }
      #map_2 {
        height: 400px;
        width: 90%;
        margin: 0 auto;
      }
      #autocomplete-dropdown-2 {
        position: absolute;
        z-index: 1;
        background-color: #fff;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ccc;
      }
      .autocomplete-option {
        padding: 5px;
        cursor: pointer;
      }
      .autocomplete-option:hover {
        background-color: #f5f5f5;
      }
    </style>
    
<div class="modal fade" id="addProjectLocationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Project Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProjectLocationForm">
                    <div class="row">
                        <label class="form-label col-form-label col-md-4">Location Name*</label>
                    </div>
                    <div class="row mb-15px">

                        <div class="col-md-12">
                            <input type="text" class="form-control mb-5px" name="location_name" placeholder="LOCATION NAME" />
                            <input type="hidden" name="customer_id" value="{{$project->customer_id ?? ''}}">
                            <input type="hidden" name="tenant_id" value="{{$project->tenant_id ?? ''}}">
                            <input type="hidden" name="project_id" value="{{$project->id ?? ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Address 1*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Address 2</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="address" placeholder="ADDRESS 1" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="address2" placeholder="ADDRESS 2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Postcode*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">City*</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="postcode" placeholder="00000" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="city" placeholder="CITY"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">State*</label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label col-form-label col-md-4">Country*</label>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-6">
                            <?php $states = state(); ?>
                            <select class="form-select" name="state">
                                <option value= "" label="PLEASE CHOOSE ">Select State </option>
                                @foreach ($states as $key => $state)
                                <option value="{{$key}}">{{$state}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                              <select class="form-select" name="country" id="">
                                <option value="MALAYSIA" label="MALAYSIA" selected ></option>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                <?php $americass = americas(); ?>
                                    @foreach ($americass as $key => $america)
                                    <option value="{{$key}}">{{$america}}</option>
                                    @endforeach
                                </optgroup>
                                <?php $asia = asias(); ?>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    @foreach ($asia as $key => $asia)
                                    <option value="{{$key}}">{{$asia}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label col-form-label col-md-12">Select Location*</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-12">
                            <div style="position: relative;">
                                <input type="text" class="form-control mb-5px" id="location_google" name="location_google" placeholder="SELECT LOCATION"/>
                                <div id="autocomplete-dropdown"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="mapouter center"><div class="gmap_canvas"><iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=kuala%20lumpur&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">use google maps on website</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> -->
                        <div id="map"></div>    
                        <input type="hidden" class="form-control mb-5px" id="latitude" name="latitude" />
                        <input type="hidden" class="form-control mb-5px" id="longitude" name="longitude"/>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveProjectLocation">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script> 
      
</script>
<script 

  src="https://maps.googleapis.com/maps/api/js?key=API_FOR_GOOGLE&libraries=places&callback=initMap"
  async defer>
</script>

<script>
    function initMap() {
      
    var input = document.getElementById('location_google');
    var autocomplete = new google.maps.places.Autocomplete(input);

    // Create a map object centered on the user's selected location
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: { lat: 3.139003, lng: 101.686855 }
    });

    // Create a marker object for the user's selected location
    var marker = new google.maps.Marker({
      map: map
    });

    // Listen for changes to the user's selected location
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (place.geometry) {
        // Update the map center and marker position
        map.setCenter(place.geometry.location);
        marker.setPosition(place.geometry.location);

        // Update the longitude and latitude input fields with the corresponding values of the selected location
        var longitudeInput = document.getElementsByName('longitude')[0];
        var latitudeInput = document.getElementsByName('latitude')[0];
        longitudeInput.value = place.geometry.location.lng();
        latitudeInput.value = place.geometry.location.lat();
      }
    });

    // Create a dropdown for the autocomplete suggestions
    var dropdown = document.getElementById('autocomplete-dropdown');
    autocomplete.addListener('place_changed', function() {
      dropdown.innerHTML = '';
    });
    input.addEventListener('input', function() {
      dropdown.innerHTML = '';
      if (input.value === '') {
        return;
      }
      var service = new google.maps.places.AutocompleteService();
      service.getPlacePredictions({ input: input.value }, function(predictions, status) {
        if (status !== google.maps.places.PlacesServiceStatus.OK) {
          return;
        }
        predictions.forEach(function(prediction) {
          var option = document.createElement('div');
          option.setAttribute('class', 'autocomplete-option');
          option.appendChild(document.createTextNode(prediction.description));
          option.addEventListener('click', function() {
            input.value = prediction.description;
            dropdown.innerHTML = '';
            // Update the map center and marker position
            var service = new google.maps.places.PlacesService(map);
            service.getDetails({ placeId: prediction.place_id }, function(place, status) {
              if (status === google.maps.places.PlacesServiceStatus.OK) {
                map.setCenter(place.geometry.location);
                marker.setPosition(place.geometry.location);

                // Update the longitude and latitude input fields with the corresponding values of the selected location
                var longitudeInput = document.getElementsByName('longitude')[0];
                var latitudeInput = document.getElementsByName('latitude')[0];
                longitudeInput.value = place.geometry.location.lng();
                latitudeInput.value = place.geometry.location.lat();
              }
            });
          });
          dropdown.appendChild(option);
        });
      });
    });
    initMap2()
    }

    function initMap2() {
     
    var input2 = document.getElementById('location_google_2');
    var autocomplete2 = new google.maps.places.Autocomplete(input2);
    
    // Create a map object centered on the user's selected location
    var map2 = new google.maps.Map(document.getElementById('map_2'), {
      zoom: 15,
      center: { lat: 3.139003, lng: 101.686855 }
    });

    // Create a marker object for the user's selected location
    var marker2 = new google.maps.Marker({
      map: map2
    });

    // Listen for changes to the user's selected location
    autocomplete2.addListener('place_changed', function() {
      var place2 = autocomplete2.getPlace();
      if (place2.geometry) {
        // Update the map center and marker position
        map2.setCenter(place2.geometry.location);
        marker2.setPosition(place2.geometry.location);

        // Update the longitude and latitude input fields with the corresponding values of the selected location
        var longitudeInput2 = document.getElementById('longitude_2');
        var latitudeInput2 = document.getElementById('latitude_2');
        longitudeInput2.value = place2.geometry.location.lng();
        latitudeInput2.value = place2.geometry.location.lat();
      }
    });

    // Create a dropdown for the autocomplete suggestions
    var dropdown2 = document.getElementById('autocomplete-dropdown-2');
    autocomplete2.addListener('place_changed', function() {
      dropdown2.innerHTML = '';
    });
    input2.addEventListener('input', function() {
      dropdown2.innerHTML = '';
      if (input2.value === '') {
        return;
      }
      var service2 = new google.maps.places.AutocompleteService();
      service2.getPlacePredictions({ input: input2.value }, function(predictions2, status2) {
        if (status2 !== google.maps.places.PlacesServiceStatus.OK) {
          return;
        }
        predictions2.forEach(function(prediction2) {
          var option2 = document.createElement('div');
          option2.setAttribute('class', 'autocomplete-option');
          option2.appendChild(document.createTextNode(prediction2.description));
          option2.addEventListener('click', function() {
            input2.value = prediction2.description;
            dropdown2.innerHTML = '';
            // Update the map center and marker position
            var service2 = new google.maps.places.PlacesService(map2);
            service2.getDetails({ placeId: prediction2.place_id }, function(place2, status2) {
              if (status2 === google.maps.places.PlacesServiceStatus.OK) {
                map2.setCenter(place2.geometry.location);
                marker2.setPosition(place2.geometry.location);

                // Update the longitude and latitude input fields with the corresponding values of the selected location
                var longitudeInput2 = document.getElementsByName('longitude_2')[0];
                var latitudeInput2 = document.getElementsByName('latitude_2')[0];
                longitudeInput2.value = place2.geometry.location.lng();
                latitudeInput2.value = place2.geometry.location.lat();
              }
            });
          });
          dropdown2.appendChild(option2);
        });
      });
    });
    }

// Call initMap to load the first map
</script>



    <!-- <script 
      $apiKey = env('GOOGLE_API_KEY');

      src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initMap"
      async defer>
  </script> -->

  
