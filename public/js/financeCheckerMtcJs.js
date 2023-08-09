
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

  function getGncById(id) {
    return $.ajax({
        url: "/getGncById/" + id,
    });
}

function getTravelById(id) {
    return $.ajax({
        url: "/getTravelById/" + id,
    });
}

function getPersonalById(id) {
    return $.ajax({
        url: "/getPersonalById/" + id,
    });
}


//CASH ADVANCE LESS MODAL
$(document).on("click", "#CAless", function () {

    $("#CAlessModal").modal("show");
});

//TRAVEL MODAL
$(document).on("click", "#SVRtravel", function() {
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
                    "<input class='form-check-input' type='checkbox' id='checkbox1' disabled checked/>",
                    rowData.start_time,
                    rowData.end_time,
                    rowData.location_start,
                    rowData.location_end,
                    rowData.desc,
                    rowData.type_transport,
                    rowData.total_km,
                    rowData.petrol,
                    rowData.toll,
                    rowData.parking,
                    "<div class='dropdown'>" +
                    "<a href='#' data-bs-toggle='dropdown' class='btn btn-primary btn-sm dropdown-toggle'></i> Actions <i class='fa fa-caret-down'></i></a>" +
                    "<div class='dropdown-menu'>" +
                    "<a href='javascript:;' id='updateButtonTravel' data-id='" + rowData.id + "' data-column='id' class='dropdown-item'>Update</a>" +
                    "<a href='javascript:;' id='saveButtonTravel' data-id='" + rowData.id + "' class='dropdown-item' style='display: none;'>Save</a>" +
                    "<div class='dropdown-divider'></div>" +
                    "<a data-bs-toggle='modal' id='deleteButtonTravel' data-id='" + rowData.id + "' class='dropdown-item'>Delete</a>" +
                    "</div>" +
                    "</div>"
                ];
                

                var tableRow = table.row.add(row).draw().node();

                // Add event listener for "Update" button click
                $(tableRow).find("#updateButtonTravel").on("click", function() {
                    var row = $(this).closest("tr");
                    var cells = row.find("td");

                    cells.each(function(index) {
                        var cell = $(this);
                        if (index >= 7 && index <= 10) { // Columns 8, 9, 10 are "Petrol," "Tolls," "Parking"
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
 
//SUBSISTENCE MODAL
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

$(document).ready(function() {
    $(document).on("change", "#listofCA", function() {
        $("input").val("");

        if ($(this).val() == "1") {
            $(".lists").show();

        } else if ($(this).val() == "2") {
            $(".lists").hide();
        }
    });
});

//OTHERS MODAL
$(document).on("click", "#SVRothers", function () {
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
            var file = firstResponse.file_upload;

            getClaimCategoryNameById(claim_category).done(function(claimData) {
                $("#claim_id_other").val(id);
                $("#general_id_other").val(general_id);
                $("#claim_category_update").val(claimData);
                $("#amount_other_update").val(amount);
                $("#desc_other_update").val(desc);
                $("#end_time_update").val(desc);
            }).fail(function() {
                console.log('Failed to fetch project name.');
            });
        } else {
            console.log('Invalid response format or empty response.');
        }
    });

    $("#othersModal").modal("show");
});

//ATTACHMENT FILE
$(document).on("click", "#btnTAttachment", function () {
    $("#travellingAttachment").modal("show");
});

$(document).on("click", "#btnSAttachment", function () {

    $("#subsAttachment").modal("show");
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
$("#subsistence").DataTable({
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

$("#others").DataTable({
    paging: true,
    filter: false,
    scrollX: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
});




///////////////////////////////////////////////////////////////////////////////////
$(document).ready(function () {
    $("#claimtable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#claimtable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        // scrollX: true,
    });
    $("#traveltable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#traveltable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        // scrollX: true,
    });

    $("#rejectButton").click(function (e) {
        var id = $(this).data("id");
        // var id = $("#rejectId").val();
        var status = "reject";
        var stage = $("#financeChecker").val();
        var desc = "Rejected by Finance. Dept";
        $("#supervisorRejectForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("supervisorRejectForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateStatusClaim/" + id + "/" + status + "/" + stage+ "/" + encodeURIComponent(desc),

                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        console.log(data);
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

    $("#amendButton").click(function (e) {
        var id = $(this).data("id");
        var status = "amend";
        var stage = $("#financeChecker").val();
        var desc = "Request to amend by Finance Dept.";

        $("#supervisorAmendForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("supervisorAmendForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateStatusClaim/" + id + "/" + status + "/" + stage+ "/" + encodeURIComponent(desc),

                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        console.log(data);
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

    // travel
    $(document).on("click", "#btn-view-claim", function () {
        var id = $(this).data("id");

        var vehicleData = getTravelById(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#travelId").val(data.id);
            $("#travel_date").val(data.travel_date);
            $("#start_time").val(data.start_time);
            $("#end_time").val(data.end_time);
            $("#total_hour").val(data.total_hour);
            $("#desc").val(data.desc);
            $("#reason").val(data.reason);
            $("#log").val(data.log_id === 0 ? null : data.log_id);
            $("#type_transport").val(data.type_transport);
            $("#location_start").val(data.location_start);
            $("#project").val(data.project_name);
            $("#address_start").val(data.address_start);
            $("#location_address").val(data.location_end);
            $("#destination_address").val(data.location_address);
            $("#millage").val("RM " + Number(data.millage).toFixed(2));
            $("#toll").val("RM " + data.toll);
            $("#petrol").val("RM " + data.petrol);
            $("#parking").val("RM " + data.parking);
            var fileNames = data.file_upload.split(",");
            var html = "";
            for (var i = 0; i < fileNames.length; i++) {
                html +=
                    "<a href='/storage/TravelFile/" +
                    fileNames[i] +
                    "' target='_blank'>" +
                    fileNames[i] +
                    "</a><br>";
            }
            $("#file_upload").html(html);
        });
        $("#modal-view-claim").modal("show");
    });

    // subs
    $(document).on("click", "#btn-view-subsistence", function () {
        var id = $(this).data("id");

        var vehicleData = getTravelById(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#subsId").val(data.id);
            $("#claim_for").val(
                data.claim_for == 2
                    ? "Without Cash Advance"
                    : "With Cash Advance"
            );
            $("#file_upload_Subs").val(data.file_upload);
            $("#date1").val(data.start_date);
            $("#time1").val(data.start_time);
            $("#date2").val(data.end_date);
            $("#time2").val(data.end_time);
            $("#project1").val(data.project_name);
            $("#desc").val(data.desc);
            $("#breakfast").val(data.breakfast + " days");
            $("#lunch").val(data.lunch + " days");
            $("#dinner").val(data.dinner + " days");
            $("#total_subs").val("RM " + data.total_subs);
            $("#hotel").val(data.hotel ? data.hotel + " days" : "0 days");
            $("#lodging").val(data.lodging ? data.lodging + " days" : "0 days");
            $("#total_acc").val("RM " + data.total_acc);
            $("#total").val("RM " + data.total);
            var fileNames = data.file_upload.split(",");
            var html = "";
            for (var i = 0; i < fileNames.length; i++) {
                html +=
                    "<a href='/storage/SubFile/" +
                    fileNames[i] +
                    "' target='_blank'>" +
                    fileNames[i] +
                    "</a><br>";
            }
            $("#file_upload1").html(html);
        });
        $("#modal-view-subsistence").modal("show");
    });

    // personal
    $(document).on("click", "#btn-view", function () {
        var id = $(this).data("id");

        var vehicleData = getPersonalById(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#personalId").val(data.id);
            $("#created_At").val(
                moment(data.applied_date).format("YYYY-MM-DD")
            );
            $("#claim_category").val(data.claim_category_name);
            $("#label").text(data.claim_category_content.label);
            $("#contents").val(data.claim_category_content.content);
            $("#amount").val("RM " + data.amount);
            $("#claim_desc").val(data.claim_desc);
            var fileNames = data.file_upload.split(",");
            var html = "";
            for (var i = 0; i < fileNames.length; i++) {
                html +=
                    "<a href='/storage/PersonalFile/" +
                    fileNames[i] +
                    "' target='_blank'>" +
                    fileNames[i] +
                    "</a><br>";
            }
            $("#file_upload2").html(html);
        });
        $("#modal-view").modal("show");
    });

    $("#checkTravel").click(function (e) {
        var id = $("#travelId").val();
        var status = "check";
        var stage = $("#financeChecker").val();

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusTravelClaim/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,
                dataType: "json",

                processData: false,
                contentType: false,
            }).then(function (data) {
                console.log(data);
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

    $("#checkSubs").click(function (e) {
        var id = $("#subsId").val();
        var status = "check";
        var stage = $("#financeChecker").val();

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusTravelClaim/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,
                    
                dataType: "json",

                processData: false,
                contentType: false,
            }).then(function (data) {
                console.log(data);
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

    $("#checkPersonal").click(function (e) {
        var id = $("#personalId").val();
        var status = "check";
        var stage = $("#financeChecker").val();

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusPersonalClaim/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,
                dataType: "json",

                processData: false,
                contentType: false,
            }).then(function (data) {
                console.log(data);
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

    function getTravelById(id) {
        return $.ajax({
            url: "/getTravelById/" + id,
        });
    }

    function getPersonalById(id) {
        return $.ajax({
            url: "/getPersonalById/" + id,
        });
    }

    $("#approveButton").on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        var status = "recommend";
        var stage = $("#financeChecker").val();
        var desc = "Finance Dept. processing";

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateStatusClaim/" + id + "/" + status + "/" + stage+ "/" + encodeURIComponent(desc),

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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });
});
