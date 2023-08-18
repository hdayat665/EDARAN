$("document").ready(function () {
  
      function getTravelDataByGeneralId(id, date) {
        return $.ajax({
          url: "/getTravelDataByGeneralId/" + id + "/" + date
        });
      }
      function getSubsDataByGeneralId(id) {
        return $.ajax({
          url: "/getSubsDataByGeneralId/" + id
        });
      }
      function getProjectNameById(id) {
        return $.ajax({
          url: "/getProjectNameById/" + id
        });
      }
      function getOthersDataByGeneralId(id) {
        return $.ajax({
          url: "/getOthersDataByGeneralId/" + id 
        });
      }
      function getClaimCategoryNameById(id) {
        return $.ajax({
          url: "/getClaimCategoryNameById/" + id
        });
      }
      
      
    
    $("#hnTotal").on("input", function () {
        var a = parseInt($("#hotelcv").val()) || 0;
        var b = parseInt($("#hn").val()) || 0;
    
        var hotel_max = a * b;
    
        if ($(this).val() > hotel_max) {
            $(this).val(hotel_max); // Set hnTotal value to hotel_max if it's greater
        }
    });
    $("#hnTotalca").on("input", function () {
        var a = parseInt($("#hotelcvca").val()) || 0;
        var b = parseInt($("#hnca").val()) || 0;
    
        var hotel_max = a * b;
    
        if ($(this).val() > hotel_max) {
            $(this).val(hotel_max); // Set hnTotal value to hotel_max if it's greater
        }
    });
    $("#lnTotal").on("input", function () {
        var a = parseInt($("#lodgingcv").val()) || 0;
        var b = parseInt($("#ln").val()) || 0;
    
        var lodging_max = a * b;
    
        if ($(this).val() > lodging_max) {
            $(this).val(lodging_max); // Set hnTotal value to hotel_max if it's greater
        }
    });
    $("#lnTotalca").on("input", function () {
        var a = parseInt($("#lodgingcvca").val()) || 0;
        var b = parseInt($("#lnca").val()) || 0;
    
        var lodging_max = a * b;
    
        if ($(this).val() > lodging_max) {
            $(this).val(lodging_max); // Set hnTotal value to hotel_max if it's greater
        }
    });
    
    
    
      

    $(document).on("click", "#travelBtn", function() {
    var date = $(this).data("date");
    var id = $(this).data("id");
    var travellingData = getTravelDataByGeneralId(id, date);
    console.log(id);
    console.log(date);
    $("#date").val(date);
    travellingData.then(function(response) {
        var data = response.original;

        // Check if the DataTable is already initialized
        var table = $("#tableTravelling").DataTable();
        if (table) {
            // The DataTable is already initialized, so we can just update the data
            table.clear();
            for (var i = 0; i < data.length; i++) {
                var rowData = data[i];
                var row = [
                    "<div class='dropdown'>" +
                    "<a href='#' data-bs-toggle='dropdown' class='btn btn-primary btn-sm dropdown-toggle'></i> Actions <i class='fa fa-caret-down'></i></a>" +
                    "<div class='dropdown-menu'>" +
                    "<a href='javascript:;' id='updateButtonTravel' data-id='" + rowData.id + "' data-column='id' class='dropdown-item'>Update</a>" +
                    "<a href='javascript:;' id='saveButtonTravel' data-id='" + rowData.id + "' class='dropdown-item' style='display: none;'>Save</a>" +
                    "<div class='dropdown-divider'></div>" +
                    "<a data-bs-toggle='modal' id='deleteButtonTravel' data-id='" + rowData.id + "' class='dropdown-item'>Delete</a>" +
                    "</div>" +
                    "</div>", // Action
                    rowData.start_time,
                    rowData.end_time,
                    rowData.location_start,
                    rowData.location_end,
                    rowData.desc,
                    rowData.type_transport,
                    rowData.total_km,
                    rowData.petrol,
                    rowData.toll,
                    rowData.parking
                ];

                var tableRow = table.row.add(row).draw().node();

                // Add event listener for "Update" button click
                $(tableRow).find("#updateButtonTravel").on("click", function() {
                    var row = $(this).closest("tr");
                    var cells = row.find("td");

                    cells.each(function(index) {
                        var cell = $(this);
                        if (index >= 8 && index <= 10) { // Columns 8, 9, 10 are "Petrol," "Tolls," "Parking"
                            var value = cell.text().trim();
                            var input = $("<input>").val(value).addClass("form-control").attr("type", "number");

                            // Add attributes based on column index
                            if (index === 8) {
                                input.attr("id", "petrol").attr("name", "petrol");
                            } else if (index === 9) {
                                input.attr("id", "tolls").attr("name", "tolls");
                            } else if (index === 10) {
                                input.attr("id", "parking").attr("name", "parking");
                            }

                            cell.html(input);
                        }
                    });

                    // Hide the updateButtonTravel button
                    $(this).hide();

                    // Show the saveButtonTravel button
                    $(this).siblings("#saveButtonTravel").show();
                });
            }
        } else {
            // The DataTable is not yet initialized, so we need to initialize it
            $("#tableTravelling").DataTable({
                paging: true,
                scrollX: true,
                columns: [
                    { title: "Action", data: "id", "data-column": "id" },
                    { title: "Start Time" },
                    { title: "End Time" },
                    { title: "Start Location" },
                    { title: "Destination" },
                    { title: "Description" },
                    { title: "Type Of Transport" },
                    { title: "Mileage (KM)" },
                    { title: "Petrol/fares", data: "petrol" },
                    { title: "Tolls", data: "toll" },
                    { title: "Parking", data: "parking" }
                ]
            });

            table = $("#tableTravelling").DataTable();
            for (var i = 0; i < data.length; i++) {
                var rowData = data[i];
                var row = [
                    "<div class='dropdown'>" +
                    "<a href='#' data-bs-toggle='dropdown' class='btn btn-primary btn-sm dropdown-toggle'></i> Actions <i class='fa fa-caret-down'></i></a>" +
                    "<div class='dropdown-menu'>" +
                    "<a href='javascript:;' id='updateButtonTravel' data-id='" + rowData.id + "' class='dropdown-item'>Update</a>" +
                    "<a href='javascript:;' id='saveButtonTravel' data-id='" + rowData.id + "' class='dropdown-item' style='display: none;'>Save</a>" +
                    "<div class='dropdown-divider'></div>" +
                    "<a data-bs-toggle='modal' id='deleteButtonTravel' data-id='" + rowData.id + "' class='dropdown-item'>Delete</a>" +
                    "</div>" +
                    "</div>", // Action
                    rowData.start_time,
                    rowData.end_time,
                    rowData.location_start,
                    rowData.location_end,
                    rowData.desc,
                    rowData.type_transport,
                    rowData.total_km,
                    rowData.petrol,
                    rowData.toll,
                    rowData.parking
                ];

                var tableRow = table.row.add(row).draw().node();

                // Add event listener for "Update" button click
                $(tableRow).find("#updateButtonTravel").on("click", function() {
                    var row = $(this).closest("tr");
                    var cells = row.find("td");

                    cells.each(function(index) {
                        var cell = $(this);
                        if (index >= 8 && index <= 10) { // Columns 8, 9, 10 are "Petrol," "Tolls," "Parking"
                            var value = cell.text().trim();
                            var input = $("<input>").val(value).addClass("form-control").attr("type", "number");

                            // Add attributes based on column index
                            if (index === 8) {
                                input.attr("id", "petrol").attr("name", "petrol");
                            } else if (index === 9) {
                                input.attr("id", "tolls").attr("name", "tolls");
                            } else if (index === 10) {
                                input.attr("id", "parking").attr("name", "parking");
                            }

                            cell.html(input);
                        }
                    });

                    // Hide the updateButtonTravel button
                    $(this).hide();

                    // Show the saveButtonTravel button
                    $(this).siblings("#saveButtonTravel").show();
                });
            }
        }

        $("#travelModal").modal("show");
    });
});

// Add event listener for "Save" button click
$(document).on("click", "#saveButtonTravel", function() {
    var row = $(this).closest("tr");
    var cells = row.find("td");
    var rowData = {};
    var id = row.find("#updateButtonTravel").data("id"); // Get the id from data attribute

    var petrol, tolls, parking;

    cells.each(function(index) {
    var cell = $(this);
    var columnName = cell.data("column");

    if (index === 8) {
        var input = cell.find("input.form-control");
        petrol = input.val();
        cell.html(petrol);
        rowData[columnName] = petrol;
        console.log("Petrol value:", petrol);
    } else if (index === 9) {
        var input = cell.find("input.form-control");
        tolls = input.val();
        cell.html(tolls);
        rowData[columnName] = tolls;
        console.log("Tolls value:", tolls);
    } else if (index === 10) {
        var input = cell.find("input.form-control");
        parking = input.val();
        cell.html(parking);
        rowData[columnName] = parking;
        console.log("Parking value:", parking);
    } else {
        var value = cell.text().trim();
        rowData[columnName] = value;
    }
    });
        
    // Show the updateButtonTravel button
    row.find("#updateButtonTravel").show();

    // Hide the saveButtonTravel button
    $(this).hide();

    // Call the updateTravelData function with the id and rowData
    updateTravelData(id,petrol,tolls, parking);
});

function updateTravelData(id, petrol,tolls, parking) {
    requirejs(["sweetAlert2"], function(swal) {
      var formData = new FormData();
      
      // Append the values to the FormData object
      formData.append("petrol", petrol);
      formData.append("toll", tolls);
      formData.append("parking", parking);
  
      formData.append("id", id); // Append the id to the formData
  
      $.ajax({
        type: "POST",
        url: "/updateTravelMtc/" + id,
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
      }).then(function(response) {
        swal({
          title: response.title,
          text: response.msg,
          type: response.type,
          confirmButtonColor: "#3085d6",
          confirmButtonText: "OK",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then(function() {
          if (response.type !== "error") {
            location.reload();
          }
        });
      });
    });
  }
  

  $("#tableTravelling").DataTable({
    paging: true,
    filter: false,
    scrollX: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
});
$("#travelingUpdate").DataTable({
    paging: true,
    filter: false,
    scrollX: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    dom: "<'row'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'fB>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12'p>>",
    buttons: [
        {
            text: 'Supporting Documents',
            attr: {
                id: 'btnAttachment',
                class: 'btn btn-primary',
                type: 'button'
            },
            action: function () {
                // Custom button action
                // Add your logic here
            }
        }
    ]
});





$("#subsTableUpdate").DataTable({
    paging: false,
    filter: false,
    scrollX: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    dom: "<'row'<'col-sm-6'l><'col-sm-6 d-flex justify-content-end'fB>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12'p>>",
    buttons: [
        {
            text: 'Supporting Documents',
            attr: {
                id: 'btnAttachmentSubs',
                class: 'btn btn-primary',
                type: 'button'
            },
            action: function () {
                // Custom button action
                // Add your logic here
            }
        }
    ],

});$("#otherTableUpdate").DataTable({
    paging: false,
    filter: false,
    scrollX: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
}); 
    $(document).on("click", "#viewCaBtn", function () {


        $("#viewCa").modal("show");
    });
    $(document).on("click", "#btnAttachment", function () {


        $("#travellingAttachment").modal("show");
    });
    $(document).on("click", "#btnAttachmentSubs", function () {


        $("#subsAttachment").modal("show");
    });

    $(document).on("click", "#othersBtn", function () {
        var id = $(this).data("id");
        var othersData = getOthersDataByGeneralId(id);
    
        othersData.done(function(response) {
            if (Array.isArray(response) && response.length > 0) {
                var firstResponse = response[0];
                var id = firstResponse.id;
                var claim_category = firstResponse.claim_category;
                var amount = firstResponse.amount;
                var desc = firstResponse.claim_desc;
                var general_id = firstResponse.general_id;
                var file_upload = firstResponse.file_upload;
                
                if (!file_upload) {
                    file_upload = "No Attachment";
                } else {
                    var fileLinks = file_upload.split(",");
                    file_upload = "";
                    for (var i = 0; i < fileLinks.length; i++) {
                        var fileLink = fileLinks[i].trim();
                        file_upload += `<a href="/storage/PersonalFile/${fileLink}" target="_blank">${fileLink}</a>`;
                        if (i < fileLinks.length - 1) {
                            file_upload += "<br>";
                        }
                    }
                }
                

                getClaimCategoryNameById(claim_category).done(function(claimData) {
                    $("#claim_id_other").val(id);
                    $("#general_id_other").val(general_id);
                    $("#claim_category_update").val(claimData);
                    $("#amount_other_update").val(amount);
                    $("#desc_other_update").val(desc);
                    $("#end_time_update").val(desc);
                    $("#file_other_update").html(file_upload);
                }).fail(function() {
                    console.log('Failed to fetch project name.');
                });
            } else {
                console.log('Invalid response format or empty response.');
            }
        });
    
        $("#othersModal").modal("show");
    });
    

    $(document).on("click", "#subsBtn", function () {
        var id = $(this).data("id");
        var subsData = getSubsDataByGeneralId(id);
        
        subsData.done(function(response) {
            if (Array.isArray(response) && response.length > 0) {
                var firstResponse = response[0];
                var id = firstResponse.id;
                var general_id = firstResponse.general_id;
                var startDate = firstResponse.start_date;
                var startTime = firstResponse.start_time;
                var endDate = firstResponse.end_date;
                var endTime = firstResponse.end_time;
                var laundry_amount = firstResponse.laundry_amount;
                
                var laundry_desc = firstResponse.laundry_desc;
                var file_laundry = firstResponse.file_laundry;
                var formattedStartDate = startDate.substr(0, 10);
                var formattedEndDate = endDate.substr(0, 10);
                var travelDuration = firstResponse.travel_duration;
                var desc = firstResponse.desc;
                var file_upload = firstResponse.file_upload;
                var project = firstResponse.project_id;
                var hotel = !isNaN(parseFloat(firstResponse.hotel_value)) ? parseFloat(firstResponse.hotel_value) : parseFloat(0);
                var lodging = !isNaN(parseFloat(firstResponse.lodging_value)) ? parseFloat(firstResponse.lodging_value) : parseFloat(0);

                var startDateFood = formattedStartDate;
                var endDateFood = formattedEndDate;
                var startTimeFood = startTime;
                var endTimeFood = endTime;
                var dayHotel = firstResponse.hotel;
                var dayLodging = firstResponse.lodging;
                var startDateTime = new Date(startDateFood + ' ' + startTimeFood);
                var endDateTime = new Date(endDateFood + ' ' + endTimeFood);
                var durationInMs = endDateTime - startDateTime;
                var days = Math.floor(durationInMs / (1000 * 60 * 60 * 24));
                var hours = Math.floor((durationInMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((durationInMs % (1000 * 60 * 60)) / (1000 * 60));
                

                if (!laundry_amount) {
                    laundry_amount = null;
                    document.getElementById('laundrydivUpdate').style.display = 'none';
                  } else {
                    document.getElementById('laundrydivUpdate').style.display = 'block'; // or any other appropriate display value
                  }
                    
                if (!laundry_desc) {
                    laundry_desc = null;
                }
                
                if (!file_upload) {
                    file_upload = "No Attachment";
                } else {
                    var fileLinks = file_upload.split(",");
                    file_upload = "";
                    for (var i = 0; i < fileLinks.length; i++) {
                        var fileLink = fileLinks[i].trim();
                        file_upload += `<a href="/storage/TravelFile/${fileLink}" target="_blank">${fileLink}</a>`;
                        if (i < fileLinks.length - 1) {
                            file_upload += "<br>";
                        }
                    }
                }
                if (!file_laundry) {
                    file_laundry = "No Attachment";
                } else {
                    var fileLinks = file_laundry.split(",");
                    file_laundry = "";
                    for (var i = 0; i < fileLinks.length; i++) {
                        var fileLink = fileLinks[i].trim();
                        file_laundry += `<a href="/storage/TravelFile/${fileLink}" target="_blank">${fileLink}</a>`;
                        if (i < fileLinks.length - 1) {
                            file_laundry += "<br>";
                        }
                    }
                }
                // Calculate the number of breakfast, lunch, and dinner days
                var breakfastDaysUpdate = 0;
                var lunchDaysUpdate = 0;
                var dinnerDaysUpdate = 0;
            
                // Check if the startDateTime and endDateTime are on the same day
                if (startDateTime.toDateString() === endDateTime.toDateString()) {
                    // Check if the startDateTime has breakfast
                    if (startDateTime.getHours() < 8 || (startDateTime.getHours() === 8 && startDateTime.getMinutes() < 30)) {
                        breakfastDaysUpdate++;
                    }
                    
                    // Check if the startDateTime has lunch
                    if (startDateTime.getHours() < 13 && endDateTime.getHours() >= 12) {
                        lunchDaysUpdate++;
                    }
                    
                    // Check if the startDateTime has dinner
                    if (startDateTime.getHours() >= 19 || endDateTime.getHours() >= 19) {
                        dinnerDaysUpdate++;
                    }
                } else {
                    // Start and end dates are different days
                    // Check if the startDateTime has breakfast
                    if (startDateTime.getHours() === 8 && startDateTime.getMinutes() < 30) {
                        breakfastDaysUpdate++;
                    }
                    
                    // Check if the startDateTime has lunch
                    if (startDateTime.getHours() < 13) {
                        lunchDaysUpdate++;
                    }
                    
                    // Check if the startDateTime has dinner
                    if (startDateTime.getHours() < 20) {
                        dinnerDaysUpdate++;
                    }
            
                    // Check for the intermediate days
                    for (var i = 1; i < days; i++) {
                        breakfastDaysUpdate++;
                        lunchDaysUpdate++;
                        dinnerDaysUpdate++;
                    }
                    
                    // Check if the endDateTime has breakfast
                    if (endDateTime.getHours() >= 7) {
                        breakfastDaysUpdate++;
                    }
                    
                    // Check if the endDateTime has lunch
                    if (endDateTime.getHours() >= 12) {
                        lunchDaysUpdate++;
                    }
                    
                    // Check if the endDateTime has dinner
                    if (endDateTime.getHours() >= 19) {
                        dinnerDaysUpdate++;
                    }
                }
                console.log(breakfastDaysUpdate);
                console.log(lunchDaysUpdate);
                console.log(dinnerDaysUpdate);

                $("#DBFUpdate").val(breakfastDaysUpdate);
                $("#DLHUpdate").val(lunchDaysUpdate);
                $("#DDNUpdate").val(dinnerDaysUpdate);

                var a = parseFloat($("#BFUpdate").val()); //float
                var b = breakfastDaysUpdate;
                var c = parseFloat($("#LHUpdate").val()); //float
                var d = lunchDaysUpdate;
                var e = parseFloat($("#DNUpdate").val()); //float
                var f = dinnerDaysUpdate;
                var amount = firstResponse.amount ?? (hotel+lodging+(a * b + c * d + e * f));
                $("#TSUpdate").val((a * b + c * d + e * f).toFixed(2));
                
            
                $("#totalbfUpdate").val((a * b).toFixed(2));
                $("#totallhUpdate").val((c * d).toFixed(2));
                $("#totaldnUpdate").val((e * f).toFixed(2));
                
                $("#hnUpdate").val(dayHotel);
                $("#lnUpdate").val(dayLodging);
                
                $("#hnTotalUpdate").val(hotel);
                $("#lnTotalUpdate").val(lodging);
                $("#TAVUpdate").val(hotel+lodging);
                
                $("#total2Update").val(amount);

                var hotelUpdate = parseInt($("#hotelCvModal").val()) || 0;
                var lodgingUpdate = parseInt($("#lodgingcvUpdate").val()) || 0;
                $("#hotelcvUpdate").on("input", function () {
                    var a = dayHotel || 0;
                    var b = hotelUpdate || 0;
                    var laundry = parseFloat($("#laundry_amount_update").val());
                    var laundry = parseFloat($("#laundry_amount_update").val());
                    if (isNaN(laundry)) {
                        laundry = 0;
                    }
                    var hotel_max = a * b;
                    
                    if (parseFloat($(this).val()) > hotel_max) {
                        $(this).val(hotel_max);
                    }

                    var hotel = parseFloat($("#hotelcvUpdate").val()); //float
                    var lodging = parseFloat($("#lnTotalUpdate").val());
                    var total = parseFloat(hotel + lodging).toFixed(2);
                    $("#TAVUpdate").val(total);

                    var ts = parseFloat($("#TSUpdate").val());
                    var tav = parseFloat($("#TAVUpdate").val());
                    var total2 = parseFloat(ts + tav+laundry).toFixed(2);
                    $("#total2Update").val(total2);
                });
                $("#lnTotalUpdate").on("input", function () {
                    var a = dayLodging || 0;
                    var b = lodgingUpdate || 0;
                    var laundry = parseFloat($("#laundry_amount_update").val());
                    if (isNaN(laundry)) {
                        laundry = 0;
                    }
                    var lodging_max = a * b;
                    
                    if (parseFloat($(this).val()) > lodging_max) {
                        $(this).val(lodging_max);
                    }
                    var hotel = parseFloat($("#hotelcvUpdate").val()); //float
                    var lodging = parseFloat($("#lnTotalUpdate").val());
                    var total = parseFloat(hotel + lodging).toFixed(2);
                    $("#TAVUpdate").val(total);

                    var ts = parseFloat($("#TSUpdate").val());
                    var tav = parseFloat($("#TAVUpdate").val());
                    var total2 = parseFloat(ts + tav+laundry).toFixed(2);
                    $("#total2Update").val(total2);
                });

                $("#laundry_amount_update").on("input", function () {
                    var laundry = parseFloat($("#laundry_amount_update").val());
                    if (isNaN(laundry)) {
                        laundry = 0;
                    }
                    var hotel = parseFloat($("#hotelcvUpdate").val()); //float
                    var lodging = parseFloat($("#lnTotalUpdate").val());
                    var total = parseFloat(hotel + lodging).toFixed(2);
                    $("#TAVUpdate").val(total);

                    var ts = parseFloat($("#TSUpdate").val());
                    var tav = parseFloat($("#TAVUpdate").val());
                    var total2 = parseFloat(ts + tav+laundry).toFixed(2);
                    $("#total2Update").val(total2);
                });
                // Fetch the project name asynchronously
                getProjectNameById(project).done(function(projectData) {
                    var projectName = projectData && projectData.project_name ? projectData.project_name : 'N/A';
                    console.log(projectName);
                    $("#claim_id").val(id);
                    $("#general_id_subs").val(general_id);
                    $("#start_date_update").val(formattedStartDate);
                    $("#start_time_update").val(startTime);
                    $("#end_date_update").val(formattedEndDate);
                    $("#end_time_update").val(endTime);
                    $("#travel_duration_update").val(travelDuration);
                    $("#desc_update").val(desc);
                    $("#project_update").val(projectName);
                    $("#hotelcvUpdate").val(hotel);
                    $("#file_upload").html(file_upload);
                    $("#laundry_amount_update").val(laundry_amount);
                    $("#laundry_desc_update").val(laundry_desc);
                    $("#file_laundry_update").html(file_laundry);

                }).fail(function() {
                    console.log('Failed to fetch project name.');
                });
            } else {
                console.log('Invalid response format or empty response.');
            }
        });
        
        $("#subsModal").modal("show");

        

       
    });
    
    
    
    
    $("#type_transport").change(function () {
        var selectedOption = $("#type_transport").val();
        if (selectedOption == "Personal Car") {
            $("#first_km").val($("#first_km").data("firstkmcar"));
            $("#first_price").val($("#first_price").data("firstpricecar"));
            $("#second_km").val($("#second_km").data("secondkmcar"));
            $("#second_price").val($("#second_price").data("secondpricecar"));
            $("#third_km").val($("#third_km").data("thirdkmcar"));
            $("#third_price").val($("#third_price").data("thirdpricecar"));
        } else if (selectedOption == "Personal Motocycle") {
            $("#first_km").val($("#first_km").data("firstkmmotor"));
            $("#first_price").val($("#first_price").data("firstpricemotor"));
            $("#second_km").val($("#second_km").data("secondkmmotor"));
            $("#second_price").val($("#second_price").data("secondpricemotor"));
            $("#third_km").val($("#third_km").data("thirdkmmotor"));
            $("#third_price").val($("#third_price").data("thirdpricemotor"));
        } else {
            $("#first_km").val("");
            $("#first_price").val("");
            $("#second_km").val("");
            $("#second_price").val("");
            $("#third_km").val("");
            $("#third_price").val("");
        }
    });

    $("#claimtable1").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        // scrollX: true,
        initComplete: function (settings, json) {
            $("#claimtable1").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#claimtable").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        initComplete: function (settings, json) {
            $("#claimtable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        // scrollX: true,
    });
 
    $("#traveltable").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        initComplete: function (settings, json) {
            $("#traveltable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        // scrollX: true,
    });

    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd/mm/yyyy",
    });

    $(document).on("change", "#ca", function () {
        if ($(this).val() == "1") {
            $(".WC").show();
            $(".WOC").hide();
        } else if ($(this).val() == "2") {
            $(".WC").hide();
            $(".WOC").show();
        } else {
            $(".WC").hide();
            $(".WOC").hide();
        }
    });

    $(document).ready(function() {
        $("#calculateButton").click(function() {
            $("#confirmBtnDiv").show();
        });

        $("#confirmBtn").click(function() {
            // var total = parseInt(resultInput.value);

            // // call the calculate function with the input value
            // var result = calculate(total);
        
            // // round up the result and remove decimal places
            // var roundedResult = Math.ceil(result);
        
            // // display the rounded result in the millage input field
            // $("#millage").val(roundedResult);
            
            $("#confirmBtnDiv").hide();
        });
    });
    
    //
    $(document).on("change", "#ls", function () {
        if ($(this).val() == "My Project") {
            $("#project").show();
            $("#autocomplete").val('');
            $("#Location2").val("My Project");
            $("#startaddress2").val('');
        } else if ($(this).val() == "Office") {
            var officeValue = $("#office").val() || "-";
            var permanentValue = $("#permanentAddress").val() || "-";
            $("#autocomplete").val(officeValue);
            $("#project").hide();
            $("#startaddress2").val(permanentValue);
            $("#Location2").val("Home");
        } else if ($(this).val() == "Home") {
            var officeValue = $("#office").val() || "-";
            var permanentValue = $("#permanentAddress").val() || "-";
            $("#project").hide();
            $("#autocomplete").val(permanentValue);
            $("#startaddress2").val(officeValue);
            $("#Location2").val("Office");
        } else {
            $("#project").hide();
            $("#autocomplete").val('');
            $("#Location2").val("Others");
            $("#startaddress2").val('');
        }
    });

    
    $(document).on("change", "#dest", function () {
        if ($(this).val() == "My Project") {
            $("#projectdest").show();
            $("#logname").hide();
            $("#autocomplete2").val('');
            $("#dest2").val("My Project");
            $("#destaddress2").val('');
        } else if ($(this).val() == "Others") {
            $("#projectdest").hide();
            $("#logname").hide();
            $("#autocomplete2").val('');
            $("#dest2").val("Others");
            $("#destaddress2").val('');
        } else if ($(this).val() == "Office") {
            var officeValue = $("#office").val() || "-";
            var permanentValue = $("#permanentAddress").val() || "-";
            $("#autocomplete2").val(officeValue);
            $("#projectdest").hide();
            $("#destaddress2").val(permanentValue);
            $("#dest2").val("Home");
        } else if ($(this).val() == "Home") {
            var permanentValue = $("#permanentAddress").val() || "-";
            var officeValue = $("#office").val() || "-";
            $("#autocomplete2").val(permanentValue);
            $("#projectdest").hide();
            $("#destaddress2").val(officeValue);
            $("#dest2").val("Office");
        } else {
            $("#projectdest").hide();
            $("#logname").hide();
            $("#autocomplete2").val('');
        }
    });

    $("#datepickerpc")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
        })
        .datepicker("setDate", "now");

    var selectedMonth = $("#monthInput").val();

    // Convert the selected month to the first and last day of that monthsadasd
    var firstDay = new Date(selectedMonth + " 1, 2023");
    var lastDay = new Date(firstDay.getFullYear(), firstDay.getMonth() + 1, 0);
      
        // Initialize the datepicker with the selected month range
        $("#datepickertc")
          .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
            startDate: firstDay,
            endDate: lastDay
          })
          .datepicker("setDate", firstDay);

    // $(function () {
    //     var selectedMonth = $("#monthInputSub").val();

    //     // Convert the selected month to the first and last day of that monthsadasd
    //     var firstDay = new Date(selectedMonth + " 1, 2023");
    //     var lastDay = new Date(firstDay.getFullYear(), firstDay.getMonth() + 1, 0);
        
    //         // Initialize the datepicker with the selected month range
    //         $("#date1, #date2")
    //         .datepicker({
    //             todayHighlight: true,
    //             autoclose: true,
    //             format: "yyyy-mm-dd",
    //             startDate: firstDay,
    //             endDate: lastDay
    //         })
    //         .datepicker("setDate", firstDay);
        
    //     $("#time1,#time2").mdtimepicker({});

    //     $("#timestart,#timeend").mdtimepicker({});
    //     $("#daystart,#dayend")
    //         .datepicker({
    //             format: "yyyy-mm-dd",
    //         })
    //         .datepicker("setDate", "now");
    // });

    // $(document).ready(function () {
    //     $("#time1,#time2").mdtimepicker({});
    //     //calculate date range in subsistence allowance
    //     $("#result1, #date1, #time1, #date2, #time2").focus(function () {
    //         // Retrieve selected values from start and end date select elements
    //         var startDate = document.getElementById('date1').value;
    //         var endDate = document.getElementById('date2').value;

    //         // Retrieve input values from start and end time pickers
    //         var startTime = document.getElementById('time1').value;
    //         var endTime = document.getElementById('time2').value;

    //         // Calculate travel duration
    //         var startDateTime = new Date(startDate + ' ' + startTime);
    //         var endDateTime = new Date(endDate + ' ' + endTime);
    //         var durationInMs = endDateTime - startDateTime;
    //         var days = Math.floor(durationInMs / (1000 * 60 * 60 * 24));
    //         var hours = Math.floor((durationInMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //         var minutes = Math.floor((durationInMs % (1000 * 60 * 60)) / (1000 * 60));

    //         // Display travel duration in the specified element
    //         $("#result1").val(days + " nights : " + hours + " hours : " + minutes + " minutes");


    //         $("#DBF").val(days);
    //         $("#DLH").val(days);
    //         $("#DDN").val(days);
    //         $("#hn").val(days);
    //         $("#ln").val(days);
    
    //         var a = parseFloat($("#BF").val()); //float
    //         var b = parseInt($("#DBF").val());
    //         var c = parseFloat($("#LH").val()); //float
    //         var d = parseInt($("#DLH").val());
    //         var e = parseFloat($("#DN").val()); //float
    //         var f = parseInt($("#DDN").val());
    //         $("#TS").val(a * b + c * d + e * f);
    //     });
    // });
    
    $(document).ready(function () {
        $("#timestart,#timeend").mdtimepicker({
            showMeridian: true,
            timeFormat: 'hh:mm:ss.000',
            is24hour: true
        });
        $("#daystart,#dayend")
            .datepicker({
                format: "yyyy-mm-dd",
            })
            .datepicker("setDate", "now");
        //$("#time2").mdtimepicker({});
        
        // Calculate and display travel duration
        $("#result1, #date1, #time1, #date2, #time2").change(function () {
            var startDate = document.getElementById('date1').value;
            var endDate = document.getElementById('date2').value;
            var startTime = document.getElementById('time1').value;
            var endTime = document.getElementById('time2').value;
            var laundryDays = document.getElementById('laundryDay').value;
            var startDateTime = new Date(startDate + ' ' + startTime);
            var endDateTime = new Date(endDate + ' ' + endTime);
            var durationInMs = endDateTime - startDateTime;
            var days = Math.floor(durationInMs / (1000 * 60 * 60 * 24));
            var hours = Math.floor((durationInMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((durationInMs % (1000 * 60 * 60)) / (1000 * 60));
            
            // Calculate the number of breakfast, lunch, and dinner days
            var breakfastDays = 0;
            var lunchDays = 0;
            var dinnerDays = 0;
        
            // Check if the startDateTime and endDateTime are on the same day
            if (startDateTime.toDateString() === endDateTime.toDateString()) {
                // Check if the startDateTime has breakfast
                if (startDateTime.getHours() < 8 || (startDateTime.getHours() === 8 && startDateTime.getMinutes() < 30)) {
                    breakfastDays++;
                }
                
                // Check if the startDateTime has lunch
                if (startDateTime.getHours() < 13 && endDateTime.getHours() >= 12) {
                    lunchDays++;
                }
                
                // Check if the startDateTime has dinner
                if (startDateTime.getHours() >= 19 || endDateTime.getHours() >= 19) {
                    dinnerDays++;
                }

            } else {
                // Start and end dates are different days
                // Check if the startDateTime has breakfast
                if (startDateTime.getHours() === 8 && startDateTime.getMinutes() < 30) {
                    breakfastDays++;
                }
                
                // Check if the startDateTime has lunch
                if (startDateTime.getHours() < 13) {
                    lunchDays++;
                }
                
                // Check if the startDateTime has dinner
                if (startDateTime.getHours() < 20) {
                    dinnerDays++;
                }
        
                // Check for the intermediate days
                for (var i = 1; i < days; i++) {
                    breakfastDays++;
                    lunchDays++;
                    dinnerDays++;
                }
                
                // Check if the endDateTime has breakfast
                if (endDateTime.getHours() >= 7) {
                    breakfastDays++;
                }
                
                // Check if the endDateTime has lunch
                if (endDateTime.getHours() >= 12) {
                    lunchDays++;
                }
                
                // Check if the endDateTime has dinner
                if (endDateTime.getHours() >= 19) {
                    dinnerDays++;
                }
            }
        
            $("#result1").val(days + " nights : " + hours + " hours : " + minutes + " minutes");
            $("#DBF").val(breakfastDays);
            $("#DLH").val(lunchDays);
            $("#DDN").val(dinnerDays);
            $("#hn").val(days);
            $("#ln").val(days);
            
            var a = parseFloat($("#BF").val()); //float
            var b = parseInt($("#DBF").val());
            var c = parseFloat($("#LH").val()); //float
            var d = parseInt($("#DLH").val());
            var e = parseFloat($("#DN").val()); //float
            var f = parseInt($("#DDN").val());
            $("#TS").val(a * b + c * d + e * f);
            

        
            $("#totalbf").val((a * b).toFixed(2));
            $("#totallh").val((c * d).toFixed(2));
            $("#totaldn").val((e * f).toFixed(2));
            var laundry = parseFloat($("#laundry_amount").val());
            if (isNaN(laundry)) {
                laundry = 0;
            }
            var a = parseInt($("#hotelcv").val())|| 0;
            var b = parseInt($("#hn").val())|| 0;
            var c = parseInt($("#ln").val())|| 0;
            var d = parseInt($("#lodgingcv").val())|| 0;
            var e = parseInt($("#TS").val())|| 0;
            var f = parseFloat((a*b)+(c*d)).toFixed(2);
            var g = parseFloat((a*b)+(c*d)+e +laundry).toFixed(2);
            $("#hnTotal").val(a*b);
            $("#lnTotal").val(c*d);
            
            
            $("#total2").val(g);

            if (days > laundryDays ) {

                $("#laundrydiv").show();
            } else {
                $("#laundrydiv").hide();
            }
        });
        
        $("#result1ca, #date1ca, #time1ca, #date2ca, #time2ca").change(function () {
            var startDate = document.getElementById('date1ca').value;
            var endDate = document.getElementById('date2ca').value;
            var startTime = document.getElementById('time1ca').value;
            var endTime = document.getElementById('time2ca').value;
            var laundryDays = document.getElementById('laundryDayca').value;
            var startDateTime = new Date(startDate + ' ' + startTime);
            var endDateTime = new Date(endDate + ' ' + endTime);
            var durationInMs = endDateTime - startDateTime;
            var days = Math.floor(durationInMs / (1000 * 60 * 60 * 24));
            var hours = Math.floor((durationInMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((durationInMs % (1000 * 60 * 60)) / (1000 * 60));
            
            // Calculate the number of breakfast, lunch, and dinner days
            var breakfastDays = 0;
            var lunchDays = 0;
            var dinnerDays = 0;
        
            // Check if the startDateTime and endDateTime are on the same day
            if (startDateTime.toDateString() === endDateTime.toDateString()) {
                // Check if the startDateTime has breakfast
                if (startDateTime.getHours() < 8 || (startDateTime.getHours() === 8 && startDateTime.getMinutes() < 30)) {
                    breakfastDays++;
                }
                
                // Check if the startDateTime has lunch
                if (startDateTime.getHours() < 13 && endDateTime.getHours() >= 12) {
                    lunchDays++;
                }
                
                // Check if the startDateTime has dinner
                if (startDateTime.getHours() >= 19 || endDateTime.getHours() >= 19) {
                    dinnerDays++;
                }

            } else {
                // Start and end dates are different days
                // Check if the startDateTime has breakfast
                if (startDateTime.getHours() === 8 && startDateTime.getMinutes() < 30) {
                    breakfastDays++;
                }
                
                // Check if the startDateTime has lunch
                if (startDateTime.getHours() < 13) {
                    lunchDays++;
                }
                
                // Check if the startDateTime has dinner
                if (startDateTime.getHours() < 20) {
                    dinnerDays++;
                }
        
                // Check for the intermediate days
                for (var i = 1; i < days; i++) {
                    breakfastDays++;
                    lunchDays++;
                    dinnerDays++;
                }
                
                // Check if the endDateTime has breakfast
                if (endDateTime.getHours() >= 7) {
                    breakfastDays++;
                }
                
                // Check if the endDateTime has lunch
                if (endDateTime.getHours() >= 12) {
                    lunchDays++;
                }
                
                // Check if the endDateTime has dinner
                if (endDateTime.getHours() >= 19) {
                    dinnerDays++;
                }
            }
        
            $("#result1ca").val(days + " nights : " + hours + " hours : " + minutes + " minutes");
            $("#DBFca").val(breakfastDays);
            $("#DLHca").val(lunchDays);
            $("#DDNca").val(dinnerDays);
            $("#hnca").val(days);
            $("#lnca").val(days);
            
            var a = parseFloat($("#BFca").val()); //float
            var b = parseInt($("#DBFca").val());
            var c = parseFloat($("#LHca").val()); //float
            var d = parseInt($("#DLHca").val());
            var e = parseFloat($("#DNca").val()); //float
            var f = parseInt($("#DDNca").val());
            $("#TSca").val(a * b + c * d + e * f);
            

        
            $("#totalbfca").val((a * b).toFixed(2));
            $("#totallhca").val((c * d).toFixed(2));
            $("#totaldnca").val((e * f).toFixed(2));

           

            if (days > laundryDays ) {

                $("#laundrydivca").show();
            } else {
                $("#laundrydivca").hide();
            }
        });
        
        
        
        
    });
    //  calculate time duration un travelling
    $("#totalduration,#daystart,#timestart,#dayend,#timeend").focus(
        function () {
            var startdt = new Date(
                $("#daystart").val() + " " + $("#timestart").val()
            );

            var enddt = new Date(
                $("#dayend").val() + " " + $("#timeend").val()
            );

            var diff = enddt - startdt;

            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            diff -= days * (1000 * 60 * 60 * 24);

            var hours = Math.floor(diff / (1000 * 60 * 60));
            diff -= hours * (1000 * 60 * 60);

            var mins = Math.floor(diff / (1000 * 60));
            diff -= mins * (1000 * 60);

            $("#totalduration").val(hours + " hours : " + mins + " minutes ");
        }
    );
    
    var TCar = parseFloat(document.getElementById("totalCar").value); 
    var TMotor = parseFloat(document.getElementById("totalMotor").value);
    TotalTcarTmotor = TCar + TMotor;
    $("#TotalMileageCarMotor").val("RM " + TotalTcarTmotor.toFixed(2));
    document.getElementById("totalMileage").textContent = "RM " + TotalTcarTmotor.toFixed(2);



    function calculate(total) {
        var result = 0;
        var firstKm = document.getElementById("first_km").value;
        var firstPrice = document.getElementById("first_price").value;
        var secondKm = document.getElementById("second_km").value;
        var secondPrice = document.getElementById("second_price").value;
        var thirdPrice = document.getElementById("third_price").value;

        if (total > firstKm) {
            result += firstKm * firstPrice;
            total -= firstKm;

            if (total > secondKm) {
                result += secondKm * secondPrice;
                total -= secondKm;

                result += total * thirdPrice;
            } else {
                result += total * secondPrice;
            }
        } else {
            result = total * firstPrice;
        }

        return result;
    }
    $("#autocomplete").focus(function() {
        // Get the value from the source input
        var inputValue = $(this).val();

        // Paste the value to the destination input
        $("#startaddress2").val(inputValue);
    });
    var resultInput = document.getElementById("result");
    $("#result,#toll,#parking,#petrol,#autocomplete2,#calculateButton").focus(function () {
    var total = parseInt(resultInput.value);

    // call the calculate function with the input value
    var result = calculate(total);

    // round up the result and remove decimal places
    var roundedResult = Math.ceil(result);
    
    

    // display the rounded result in the millage input field
    $("#millage").val(roundedResult);
    });


    $("#hotelc").change(function () {
        var s = $("#hotelc input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        if (s.length > 0) {
            var ss = "100"; // this is the value to check against

            if ($("#htv").val() == ss) {
                $("#hotelcv").prop("readonly", true);
            } else {
                $("#hotelcv").prop("readonly", true);
            }

            $("#hotelcv").val(s);
            $("#hotelcv1").val(s);
            $("#hn").prop("readonly", true);
            $("#hnTotal").prop("readonly", false);
        } else {
            $("#hotelcv").val("");
            $("#hotelcv").prop("readonly", true);
            $("#hotelcv1").val("0");
            $("#hn").prop("readonly", true);
            $("#hnTotal").prop("readonly", true);
            $("#hnTotal").val(0);
            $("#hotelcv").val(0);
        }
    });
    
    $("#hotelcca").change(function () {
        var s = $("#hotelcca input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        if (s.length > 0) {
            var ss = "100"; // this is the value to check against

            if ($("#htvca").val() == ss) {
                $("#hotelcvca").prop("readonly", true);
            } else {
                $("#hotelcvca").prop("readonly", true);
            }

            $("#hotelcvca").val(s);
            $("#hotelcv1ca").val(s);
            $("#hnca").prop("readonly", true);
        } else {
            $("#hotelcvca").val("");
            $("#hotelcvca").prop("readonly", true);
            $("#hotelcv1ca").val("0");
            $("#hnca").prop("readonly", true);
        }
    });
    $("#lodgingc").change(function () {
        var s = $("#lodgingc input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        if (s.length > 0) {
            var ss = "100"; // this is the value to check against

            if ($("#ldgv").val() == ss) {
                $("#lodgingcv").prop("readonly", true);
            } else {
                $("#lodgingcv").prop("readonly", true);
            }
            $("#lnTotal").prop("readonly", false);
            $("#lodgingcv").val(s);
            $("#lodgingcv1").val(s);
            $("#ln").prop("readonly", true);
        } else {
            $("#lodgingcv").val("");
            $("#lodgingcv").prop("readonly", true);
            $("#lodgingcv1").val("0");
            $("#ln").prop("readonly", true);
            $("#lnTotal").prop("readonly", true);
            $("#lodgingcv").val(0);
        }
    });
    $("#lodgingcca").change(function () {
        var s = $("#lodgingcca input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        if (s.length > 0) {
            var ss = "100"; // this is the value to check against

            if ($("#ldgvca").val() == ss) {
                $("#lodgingcvca").prop("readonly", true);
            } else {
                $("#lodgingcvca").prop("readonly", true);
            }

            $("#lodgingcvca").val(s);
            $("#lodgingcv1ca").val(s);
            $("#lnca").prop("readonly", true);
            
        } else {
            $("#lodgingcvca").val("");
            $("#lodgingcvca").prop("readonly", true);
            $("#lodgingcv1ca").val("0");
            $("#lnca").prop("readonly", true);
        }
    });
    // calculate total subsistence & accomadation
    $("#BF,#DBF,#LH,#DLH,#DN,#DDN,#TS").focus(function () {
        var a = parseFloat($("#BF").val()); //float
        var b = parseInt($("#DBF").val());
        var c = parseFloat($("#LH").val()); //float
        var d = parseInt($("#DLH").val());
        var e = parseFloat($("#DN").val()); //float
        var f = parseInt($("#DDN").val());
        
        $("#totalbf").val((a * b).toFixed(2));
        $("#totallh").val((c * d).toFixed(2));
        $("#totaldn").val((e * f).toFixed(2));
        $("#TS").val((a * b + c * d + e * f).toFixed(2));
        
    });
    $("#BFca,#DBFca,#LHca,#DLHca,#DNca,#DDNca,#TSca").focus(function () {
        var a = parseFloat($("#BFca").val()); //float
        var b = parseInt($("#DBFca").val());
        var c = parseFloat($("#LHca").val()); //float
        var d = parseInt($("#DLHca").val());
        var e = parseFloat($("#DNca").val()); //float
        var f = parseInt($("#DDNca").val());
        
        $("#totalbfca").val((a * b).toFixed(2));
        $("#totallhca").val((c * d).toFixed(2));
        $("#totaldnca").val((e * f).toFixed(2));
        $("#TSca").val((a * b + c * d + e * f).toFixed(2));
        
    });

    $("#hnTotal,#lnTotal,#laundry_amount").on("input", function () {
        var a = parseFloat($("#hnTotal").val()); //float
        var b = parseFloat($("#lnTotal").val());
    
        var e = parseFloat(a + b).toFixed(2);
        $("#TAV").val(e);
        var laundry = parseFloat($("#laundry_amount").val());
        if (isNaN(laundry)) {
            laundry = 0;
        }
        var ts = parseFloat($("#TS").val());
        var tav = parseFloat($("#TAV").val());
        var total = parseFloat(ts + tav+laundry).toFixed(2);
        $("#total2").val(total);
    });
    
    $("#hnTotalca,#lnTotalca,#laundry_amountca").on("input", function () {
        var a = parseFloat($("#hnTotalca").val()); //float
        var b = parseFloat($("#lnTotalca").val());
    
        var e = parseFloat(a + b).toFixed(2);
        $("#TAVca").val(e);
        var laundry = parseFloat($("#laundry_amountca").val());
        if (isNaN(laundry)) {
            laundry = 0;
        }

        var ts = parseFloat($("#TSca").val());
        var tav = parseFloat($("#TAVca").val());
        var total = parseFloat(ts + tav+laundry).toFixed(2);
        $("#total2ca").val(total);
    });
    
    
    $(
        "#hotelcv,#hotelcv1,#hn,#lodgingcv,#hotelcv1,#ln,#htv,#ldgv,#TS,#TAV,#DBF,#DLH,#DDN"
    ).focus(function () {
        var a = parseFloat($("#TS").val());
        var b = parseFloat($("#TAV").val());
        var c = parseFloat(a + b).toFixed(2);
        $("#total2").val(c);
    });
    
    $("#htv").click(function () {
        if (this.checked) {
            $("#hn").prop("readonly", false); // If checked enable item
        } else {
            $("#hn").prop("readonly", true); // If checked disable item
        }
    });
    $("#htvca").click(function () {
        if (this.checked) {
            $("#hnca").prop("readonly", false); // If checked enable item
        } else {
            $("#hnca").prop("readonly", true); // If checked disable item
            
        }
    });
    $("#ldgv").click(function () {
        if (this.checked) {
            $("#ln").prop("readonly", false); // If checked enable item
        } else {
            $("#ln").prop("readonly", true); // If checked disable item
            
        }
    });
    $("#ldgvca").click(function () {
        if (this.checked) {
            $("#lnca").prop("disabled", false); // If checked enable item
        } else {
            $("#lnca").prop("disabled", true); // If checked disable item
            $("#lnca").val(0);
        }
    });
    

    $(document).on("change", "#claimcategory", function () { 
        
        $("#labelCategory").hide();
        id = $(this).val();
        const inputs = ["contentLabel"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove() 
                .end()
                .append(
                    '<option label="PLEASE CHOOSE" selected="selected"> </option>'
                )
                .val("");

            function getClaimCategoryContent(id) {
                return $.ajax({
                    url: "/getClaimCategoryContent/" + id,
                });
            }
            function getClaimCategoryDetails(id) {
                return $.ajax({
                    url: "/getClaimCategoryDetails/" + id,
                });
            }

            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getClaimCategoryContent(id);

        var user2 = getClaimCategoryDetails(id);

        user2.then(function (data) {
            console.log("Claim Category Details:", data);
    
            // Rest of your code...
            $("#mandatory").val(data[0].attachstatus);
            if (data[0].addattach == 1) {
                $("#fileAttachment").show(); // Show the element
                } else {
                    $("#fileAttachment").hide(); // Hide the element
                }
            if (data[0].addproject == 1) {
                $("#projectCategory").show(); // Show the element
                } else {
                    $("#projectCategory").hide(); // Hide the element
                }

        });
        user.then(function (data) {
            
            $("#label").text(data[0].label);
    
            // Check if data is available
            if (data.length > 0) {
                // Show the labelcategory div if data is available
                $("#labelCategory").show();
                for (let i = 0; i < data.length; i++) {
                    const user = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("contentLabel").innerHTML +=
                        '<option value="' +
                        user["id"] +
                        '">' +
                        user["content"] +
                        "</option>";
                }
            }
        });
    });

    $(document).on("change", "#date1", function () { 
        
        id = $(this).val();
        const inputs = ["time1"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove() 
                .end()
                .append(
                    '<option label="PLEASE CHOOSE" selected="selected"> </option>'
                )
                .val("");

            function getStartTimeDrop(id) {
                return $.ajax({
                    url: "/getStartTimeDrop/" + id,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getStartTimeDrop(id);

        user.then(function (data) {
            
            // Check if data is available
            if (data.length > 0) {
                // Show the labelcategory div if data is available
                
                for (let i = 0; i < data.length; i++) {
                    const user = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("time1").innerHTML +=
                        '<option value="' +
                        user["start_time"] +
                        '">' +
                        user["start_time"] +
                        "</option>";
                }
            }
        });

    });
    $(document).on("change", "#date1ca", function () { 
        
        id = $(this).val();
        const inputs = ["time1ca"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove() 
                .end()
                .append(
                    '<option label="PLEASE CHOOSE" selected="selected"> </option>'
                )
                .val("");

            function getStartTimeDrop(id) {
                return $.ajax({
                    url: "/getStartTimeDrop/" + id,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getStartTimeDrop(id);

        user.then(function (data) {
            
            // Check if data is available
            if (data.length > 0) {
                // Show the labelcategory div if data is available
                
                for (let i = 0; i < data.length; i++) {
                    const user = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("time1ca").innerHTML +=
                        '<option value="' +
                        user["start_time"] +
                        '">' +
                        user["start_time"] +
                        "</option>";
                }
            }
        });

    });
    $(document).on("change", "#date2", function () { 
        
        id = $(this).val();
        const inputs = ["time2"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove() 
                .end()
                .append(
                    '<option label="PLEASE CHOOSE" selected="selected"> </option>'
                )
                .val("");

            function getEndTimeDrop(id) {
                return $.ajax({
                    url: "/getEndTimeDrop/" + id,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getEndTimeDrop(id);

        user.then(function (data) {
            
            // Check if data is available
            if (data.length > 0) {
                // Show the labelcategory div if data is available
                
                for (let i = 0; i < data.length; i++) {
                    const user = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("time2").innerHTML +=
                        '<option value="' +
                        user["end_time"] +
                        '">' +
                        user["end_time"] +
                        "</option>";
                }
            }
        });

    });
    $(document).on("change", "#date2ca", function () { 
        
        id = $(this).val();
        const inputs = ["time2ca"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove() 
                .end()
                .append(
                    '<option label="PLEASE CHOOSE" selected="selected"> </option>'
                )
                .val("");

            function getEndTimeDrop(id) {
                return $.ajax({
                    url: "/getEndTimeDrop/" + id,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getEndTimeDrop(id);

        user.then(function (data) {
            
            // Check if data is available
            if (data.length > 0) {
                // Show the labelcategory div if data is available
                
                for (let i = 0; i < data.length; i++) {
                    const user = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("time2ca").innerHTML +=
                        '<option value="' +
                        user["end_time"] +
                        '">' +
                        user["end_time"] +
                        "</option>";
                }
            }
        });

    });
    $("#personalSaveButton").click(function (e) {
        $("#personalForm").validate({
            // Specify validation rules
            rules: {
                claim_category: "required",
                claim_category_detail: {
                    required: function () {
                        // Check if labelcategory div is visible
                        return $("#labelCategory").is(":visible");
                    }
                },
                amount: "required",
                "file_upload[]": {
                    required: function () {
                        // Check if labelcategory div is visible
                        return $("#mandatory").val() === "1";
                    }
                },
                // "file_upload[]": "required",
            },

            messages: {
                claim_category: "Please Select Claim Category",
                claim_category_detail: "Please Select Claim Category",
                amount: "Please Fill Out Amount",
                "file_upload[]": "Please Upload Attachment",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("personalForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitPersonalClaim",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });
    $(document).ready(function () {
        $("#amount").on("input", function () {
            var value = $(this).val();
            var decimalCount = (value.split(".")[1] || []).length;
            if (decimalCount > 2) {
                $(this).val(parseFloat(value).toFixed(2));
            }
        });

        $("#amount").blur(function () {
            var value = $(this).val();
            var decimalCount = (value.split(".")[1] || []).length;
            if (decimalCount == 0) {
                $(this).val(value + ".00");
            }
        });
    });

    $("#travelSaveButton").click(function (e) {
        $("#travelForm").validate({
            // Specify validation rules
            rules: {
                general_id: "required",
                start_time: "required",
                end_time: "required",
                desc: "required",
                
                type_transport: "required",
                location_start: "required",
                project_id: "required",
                address_start: "required",
                location_end: "required",
                location_address: "required",
                // "file_upload[]": "required",
            },

            messages: {
                general_id: "Please Select Travel Date",
                start_time: "Please Select Start Time",
                end_time: "Please Select End Time",
                desc: "Please Insert Description",
                type_transport: "Please Select Type of Transport",
                location_start: "Please Select Start Location",
                project_id: "Please Select Project",
                address_start: "Please Select Start Address",
                location_end: "Please Select Destination",
                location_address: "Please Select Destination Address",
                // "file_upload[]": "Please Upload Attachment",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("travelForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitTravelClaim",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });
 
    $("#caButton").click(function (e) {
        $("#subsFormca").validate({
            // Specify validation rules
            rules: {
                // "file_upload[]": "required",
                cashAdvanceId :"required",
                start_date: "required",
                end_date: "required",
                start_time: "required",
                end_time: "required",
                project_id: "required",
                desc: "required",
            },

            messages: {
                // "file_upload[]": "Please Upload Attachment",
                cashAdvanceId : "Please Select Cash Advance",
                start_date: "Please Select Start Date",
                end_date: "Please Select End Date",
                start_time: "Please Select Start Time",
                end_time: "Please Select End Time",
                project_id: "Please Select Project",
                desc: "Please Insert Description",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("subsFormca")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitCaClaim",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#caSave").click(function (e) {
        $("#viewCaForm").validate({
            // Specify validation rules
            rules: {
                 "file_upload[]": "required",
                 desc: "required",
            },

            messages: {
                 "file_upload[]": "Please Upload Attachment",
                 desc: "Please Insert Description",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("viewCaForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateCashMtc",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#btnuploadAttachment").click(function (e) {
        $("#updateTravellingAttachment").validate({
            // Specify validation rules
            rules: {
                 "file_upload[]": "required",
                 desc: "required",
            },

            messages: {
                 "file_upload[]": "Please Upload Attachment",
                 desc: "Please Insert Description",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateTravellingAttachment")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/saveTravellingAttachment",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });
    $("#btnuploadAttachmentSubs").click(function (e) {
        $("#updateSubsAttachment").validate({
            // Specify validation rules
            rules: {
                 "file_upload[]": "required",
                 desc: "required",
            },

            messages: {
                 "file_upload[]": "Please Upload Attachment",
                 desc: "Please Insert Description",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateSubsAttachment")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/saveSubsAttachment",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });
    $("#subsSaveButton").click(function (e) {
        $("#subsForm").validate({
            // Specify validation rules
            rules: {
                // "file_upload[]": "required",
                start_date: "required",
                end_date: "required",
                start_time: "required",
                end_time: "required",
                project_id: "required",
                desc: "required",
            },

            messages: {
                // "file_upload[]": "Please Upload Attachment",
                start_date: "Please Select Start Date",
                end_date: "Please Select End Date",
                start_time: "Please Select Start Time",
                end_time: "Please Select End Time",
                project_id: "Please Select Project",
                desc: "Please Insert Description",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("subsForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitSubsClaim",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#editSubmitButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            id = $("#generalId").val();
            desc= 'Waiting for recommendation';
            var data = new FormData(document.getElementById("balance"));
            console.log(data); // Add this line to log the data to the console
    
            $.ajax({
                type: "POST",
                url: "/submitMonthlyClaim/" + id + "/" + encodeURIComponent(desc),
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
            }).then(function (data) {
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
                        // Handle error if needed
                    } else {
                        window.location.href = "/myClaimView";
                        // location.reload();
                    }
                });
            });
        });
    });
    
});

$(document).on("click", "#deleteButtonPersonal", function () {
    id = $(this).data("id");
    //console.log(id);
    requirejs(["sweetAlert2"], function (swal) {
        swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then(function () {
            $.ajax({
                type: "POST",
                url: "/deletePersonalDetail/" + id,
                // dataType: "json",
                data: { _method: "DELETE" },

                // processData: false,
                // contentType: false,
            }).then(function (data) {
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
    });
});
$(document).on("click", "#deleteButtonTravelAttachment", function () {
    id = $(this).data("id");
    //console.log(id);
    requirejs(["sweetAlert2"], function (swal) {
        swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then(function () {
            $.ajax({
                type: "POST",
                url: "/deleteTravelAttachment/" + id,
                // dataType: "json",
                data: { _method: "DELETE" },

                // processData: false,
                // contentType: false,
            }).then(function (data) {
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
    });
});
$(document).on("click", "#deleteButtonSubsAttachment", function () {
    id = $(this).data("id");
    //console.log(id);
    requirejs(["sweetAlert2"], function (swal) {
        swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then(function () {
            $.ajax({
                type: "POST",
                url: "/deleteSubsAttachment/" + id,
                // dataType: "json",
                data: { _method: "DELETE" },

                // processData: false,
                // contentType: false,
            }).then(function (data) {
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
    });
});
$("#updateOtherMtcBtn").click(function (e) {
    
    $("#updateOtherMtc").validate({
        // Specify validation rules
        rules: {
            
        },

        messages: {
            
        },

        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(
                    document.getElementById("updateOtherMtc")
                );

                $.ajax({
                    type: "POST",
                    url: "/updateOtherMtc",
                    data: data,
                    dataType: "json",

                    processData: false,
                    contentType: false,
                }).then(function (data) {
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
document.getElementById("resetButtonOthers").addEventListener("click", function() {
    // Reset the select element to the first option
    document.getElementById("claimcategory").selectedIndex = 0;

    document.getElementById("labelCategory").style.display = "none";
    // Reset the number input to an empty value
    document.getElementById("amount").value = "";

    // Reset the textarea to an empty value
    document.getElementById("claim_desc").value = "";

    // Clear the file input by creating a new one and replacing the old input element
    document.getElementById("supportdocument").value = "";
});

$("#updateSubsMtcBtn").click(function (e) {
    
    $("#updateSubsMtc").validate({
        // Specify validation rules
        rules: {
            
        },

        messages: {
            
        },

        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(
                    document.getElementById("updateSubsMtc")
                );
                console.log(data);   
                $.ajax({
                    type: "POST",
                    url: "/updateSubsMtc",
                    data: data,
                    dataType: "json",

                    processData: false,
                    contentType: false,
                }).then(function (data) {
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
$(document).on("click", "#deleteButtonTravel", function () {
    id = $(this).data("id");
    //console.log(id);
    requirejs(["sweetAlert2"], function (swal) {
        swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then(function () {
            $.ajax({
                type: "POST",
                url: "/deleteTravelDetail/" + id,
                // dataType: "json",
                data: { _method: "DELETE" },

                // processData: false,
                // contentType: false,
            }).then(function (data) {
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
    });
});
document.getElementById("reset_travel").addEventListener("click", function() {
    // Clear the input fields
    document.getElementById("datepickertc").value = "";
    document.getElementById("timestart").value = "";
    document.getElementById("timeend").value = "";
    document.getElementById("totalduration").value = "";
    document.getElementById("desc").value = "";
    document.getElementById("type_transport").selectedIndex = 0;
    document.getElementById("ls").selectedIndex = 0;
    document.getElementById("dest").selectedIndex = 0;
    document.getElementById("projectid").selectedIndex = 0;
    document.getElementById("projectId2").selectedIndex = 0;
    document.getElementById("autocomplete").value = "";
    document.getElementById("autocomplete2").value = "";
    document.getElementById("result").value = "";
    document.getElementById("petrol").value = "";
    document.getElementById("toll").value = "";
    document.getElementById("parking").value = "";
  });

  document.getElementById("reset_sub").addEventListener("click", function() {
    // Clear the input fields
    document.getElementById("date1").selectedIndex = 0;
    document.getElementById("time1").selectedIndex = 0;
    document.getElementById("date2").selectedIndex = 0;
    document.getElementById("time2").selectedIndex = 0;
    document.getElementById("result1").value = "";
    document.getElementById("project_subs").selectedIndex = 0;
    document.getElementById("desc_subs").value = "";
    document.getElementById("DBF").value = "";
    document.getElementById("totalbf").value = "";
    document.getElementById("DLH").value = "";
    document.getElementById("totallh").value = "";
    document.getElementById("DDN").value = "";
    document.getElementById("totaldn").value = "";
    document.getElementById("TS").value = "";
    document.getElementById("hotelcv").value = "";
    document.getElementById("hn").value = "";
    document.getElementById("hnTotal").value = "";
    document.getElementById("lodgingcv").value = "";
    document.getElementById("ln").value = "";
    document.getElementById("lnTotal").value = "";
    document.getElementById("TAV").value = "";
    document.getElementById("total2").value = "";
    document.getElementById("laundry_amount").value = "";
    document.getElementById("laundry_desc").value = "";
    document.getElementById("ldgv").checked = false;
    document.getElementById("htv").checked = false;

  });