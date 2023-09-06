
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
    var TCar = parseFloat(document.getElementById("totalCar").value); 
    var TMotor = parseFloat(document.getElementById("totalMotor").value);
    var TotalTcarTmotor = TCar + TMotor;
    $("#TotalMileageCarMotor").val("RM " + TotalTcarTmotor.toFixed(2));
    document.getElementById("totalMileage").textContent = "RM " + TotalTcarTmotor.toFixed(2);

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
                }
            } else {
                // The DataTable is not yet initialized, so we need to initialize it
                $("#tableTravelling").DataTable({
                    paging: true,
                    scrollX: true,
                    columns: [
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
                }
            }
    
            $("#travelModal").modal("show");
        });
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
                var hotel = parseFloat(firstResponse.hotel_value);
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
                    if (startDateTime.getHours() < 8 || (startDateTime.getHours() === 8 && startDateTime.getMinutes() < 30)) {
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
                $("#TSUpdate").val((a * b + c * d + e * f).toFixed(2));
                
            
                $("#totalbfUpdate").val((a * b).toFixed(2));
                $("#totallhUpdate").val((c * d).toFixed(2));
                $("#totaldnUpdate").val((e * f).toFixed(2));
                
                $("#hnUpdate").val(dayHotel);
                $("#lnUpdate").val(dayLodging);
                var lodgingValue = parseFloat($("#lodgingcvUpdate").val());
                var totalHotel = dayHotel*hotel;
                var totalLodging = dayLodging*lodgingValue;
                $("#hnTotalUpdate").val(totalHotel);
                
                $("#lnTotalUpdate").val(totalLodging);
                $("#TAVUpdate").val(totalHotel+totalLodging);
                
                $("#total2Update").val(totalHotel+totalLodging+(a * b + c * d + e * f));
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


});

$("#cancelButton").click(function (e) {
    var id = $(this).data("id");
    //console.log(id);
    requirejs(["sweetAlert2"], function (swal) {
        $.ajax({
            type: "POST",
            url: "/cancelGNC/" + id,

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
                    window.location.href = "/myClaimView";
                }
            });
        });
    });
});
 
//OTHERS MODAL
$(document).on("click", "#mcvOthers", function () {

    $("#othersModal").modal("show");
});

//ATTACHMENT FILE
$(document).on("click", "#btnTAttachment", function () {

    $("#travellingAttachment").modal("show");
});

$(document).on("click", "#btnSAttachment", function () {

    $("#subsistenceAttachment").modal("show");
});
$(document).on("click", "#viewCaBtn", function () {

    $("#viewCa").modal("show");
});
$("#travelling").DataTable({
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
                id: 'btnTAttachment',
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
                id: 'btnSAttachment',
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
