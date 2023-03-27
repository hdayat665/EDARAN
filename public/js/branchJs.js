


$(document).ready(function() {
   
    $("#address,#address2,#postcode,#city,#state,#country").focus(function () {
        getLatLng()
    });

    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    $("option[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });
   
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });


    $("#tablebranch").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getBranch(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#unitIdE').val(data.unitId);
            $('#branchNameE').val(data.branchName);
            $('#branchCodeE').val(data.branchCode);
            //$('#branchTypeE').val(data.branchType);
            $('#branchTypeE').prop('selectedIndex', data.branchType);
            $('#postcodeE').val(data.postcode);
            $('#addressE').val(data.address);
            $('#address2E').val(data.address2);
            $('#cityE').val(data.city);
            $('#stateE').val(data.state);
            $('#countryE').prop('selectedIndex', data.branchType);
            //$('#countryE').val(data.country);
            $('#idB').val(data.id);
        })
        $('#editModal').modal('show');

    });

    $(document).on("click", "#deleteButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to delete Branch?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/deleteBranch/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },
                    // async: false,
                    // processData: false,
                    // contentType: false,
                }).done(function(data) {
                    swal({
                        title: data.title,
                        text: data.msg,
                        type: data.type,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then(function() {
                        if (data.type == 'error') {

                        } else {
                            location.reload();
                        }
                    });
                });
            });
        });
    });

    function getBranch(id) {
        return $.ajax({
            url: "/getBranchById/" + id
        });
    }

    
    function getLatLng() {
        var address1 = $("#address").val();
        var address2 = $("#address2").val();
        var postcode = $("#postcode").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var country = $("#country").val();
        var address = address1 + ", " + address2 + " " + postcode + " " + city + ", " + state + ", " + country;

        var geocodingAPI =
          "https://maps.googleapis.com/maps/api/geocode/json?address=" +
          encodeURIComponent(address) +
          "&key=API_FOR_GOOGLE";
      
        $.getJSON(geocodingAPI, function (json) {
          if (json.status === "OK") {
            var latitude = json.results[0].geometry.location.lat;
            var longitude = json.results[0].geometry.location.lng;
            $("#latitude").val(latitude);
            $("#longitude").val(longitude);
            $("#fulladdress").val(address);
          } else {
            alert("Geocode was not successful for the following reason: " + json.status);
          }
        });
      }
      
      $('#saveButton').click(function(e) {
        
        $("#addForm").validate({
          // Specify validation rules
          rules: {
            branchCode: "required",
            branchName: "required",
            branchType: "required",
            unitId: "required",
            address: "required",
            postcode: {
              required: true,
              digits: true,
              rangelength: [5, 5],
            },
            city: "required",
            state: "required",
          },
          messages: {
            branchCode: "Please Insert Branch Code ",
            branchName: "Please Insert Branch Name",
            branchType: "Please Choose Branch Type",
            unitId: "Please Choose Unit Name",
            address: "Please Insert Address 1",
            postcode: {
              required: "Please Insert Postcode",
              digits: "Please Insert Valid Postcode",
              rangelength: "Please Insert Valid Postcode",
            },
            city: "Please Insert City",
            state: "Please Choose State",
          },
          submitHandler: function (form) {
            var latitude = $("#latitude").val();
            var longitude = $("#longitude").val();
            requirejs(["sweetAlert2"], function (swal) {
              var data = new FormData(document.getElementById("addForm"));
            //   data.append('latitude', latitude);
            //   data.append('longitude', longitude);
              
              $.ajax({
                type: "POST",
                url: "/createBranch",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
              }).done(function (data) {
                swal({
                  title: data.title,
                  text: data.msg,
                  type: data.type,
                  confirmButtonColor: "#3085d6",
                  confirmButtonText: "OK",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                }).then(function () {
                  if (data.type == "error") {
                  } else {
                    location.reload();
                  }
                });
              });
            });
          },
        });
      });
      
    

    $('#updateButton').click(function(e) {

        $("#editForm").validate({
            // Specify validation rules
            rules: {

                branchCode: "required",
                branchName: "required",
                branchType: "required",
                unitId: "required",
                address: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5]
                },
                city: "required",
                state: "required",

            },

            messages: {

                branchCode: "Please Insert Branch Code ",
                branchName: "Please Insert Branch Name",
                branchType: "Please Choose Branch Type",
                unitId: "Please Choose Unit Name",
                address: "Please Insert Address 1",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode"
                },
                city: "Please Insert City",
                state: "Please Choose State"

            },
            submitHandler: function(form) {

                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editForm"));
                    var id = $('#idB').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateBranch/" + id,
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                           confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function() {
                            if (data.type == 'error') {

                            } else {
                                location.reload();
                            }


                        });
                    });

                });
            }
        });
    });

});