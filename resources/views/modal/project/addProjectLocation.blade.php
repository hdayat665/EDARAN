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
                            <input type="text" class="form-control mb-5px" name="location_name"  />
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
                            <input type="text" class="form-control mb-5px" name="address"  />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="address2" />
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
                            <input type="text" class="form-control mb-5px" name="postcode"  />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mb-5px" name="city" />
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
                                <option value= "" label="Select State ">Select State </option>
                                @foreach ($states as $key => $state)
                                <option value="{{$key}}">{{$state}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" disabled>
                                <option value="Malaysia" label="Malaysia"></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label col-form-label col-md-12">Select Location*</label>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-12">
                            <div style="position: relative;">
                                <input type="text" class="form-control mb-5px" id="location_google" name="location_google" />
                                <div id="autocomplete-dropdown"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="mapouter center"><div class="gmap_canvas"><iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=kuala%20lumpur&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">use google maps on website</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> -->
                        <div id="map"></div>    
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
      function initMap() {
        var input = document.getElementById('location_google');
        var autocomplete = new google.maps.places.Autocomplete(input);

        // Create a map object centered on the user's selected location
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: { lat: -33.8675, lng: 151.2070 }
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
                  }
                });
              });
              dropdown.appendChild(option);
            });
          });
        });
      }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initMap"
    async defer></script>