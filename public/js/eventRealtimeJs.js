function getEvents(id) {
    return $.ajax({
        url: "/getEventById/" + id,
    });
}

function getAttendance(eventId) {
    return $.ajax({
        url: "/getAttendanceByEventId/" + eventId,
    });
}

function getProjectByidTimesheet(id) {
    return $.ajax({
        url: "/getProjectByidTimesheet/" + id,
    });
}

function getProjectLocationById(id) {
    return $.ajax({
        url: "/getProjectLocationById/" + id,
    });
}

function getActivityNameById(id) {
    return $.ajax({
        url: "/getActivityNameById/" + id,
    });
}

function getParticipantByidTimesheet(id) {
    return $.ajax({
        url: "/getParticipantNameById/" + id,
    });
}

// $(document).on("click", "#buttonnViewParticipant", function() {
//     var id = $(this).data('id');
//     var eventData = getEvents(id);
//     eventData.then(function(data) {
//         // console.log(data);
//         // console.log(data.id)

//         var attendanceEvent = getAttendance(data.id);
//         attendanceEvent.then(function(dataAttendance) {
//             $('#tableRowParticipant')
//                 .find('tr')
//                 .remove()
//                 .end();
//             // console.log(dataAttendance);
//             // for (let i = 0; i < dataAttendance.length; i++) {
//             //     const attendance = dataAttendance[i];
//             //     var opt = document.createElement("tr");
//             //     document.getElementById('tableRowParticipant').innerHTML +=
//             //         '<tr class="odd gradeX">' +
//             //         // '<td>' + i + '</td>' +
//             //         '<td>' + (i + 1) + '</td>'
//             //         '<td><span>' + attendance.employeeName + '</span></td>' +
//             //         '</tr>';
//             // }

//             for (let i = 1; i <= dataAttendance.length; i++) {
//                 const attendance = dataAttendance[i - 1];
//                 var opt = document.createElement("tr");
//                 document.getElementById('tableRowParticipant').innerHTML +=
//                     '<tr class="odd gradeX">' +
//                     '<td>' + i + '</td>' +
//                     '<td><span>' + attendance.employeeName + '</span></td>' +
//                     '</tr>';
//               }

//         });

//     });
//     $('#modalparticipant').modal('show');

// });

$(document).on("click", "#buttonnViewParticipant", function () {
    var id = $(this).data("id");
    var eventData = getEvents(id);
    eventData.then(function (data) {
        var attendanceEvent = getAttendance(data.id);
        attendanceEvent.then(function (dataAttendance) {
            // Check if the DataTable is already initialized
            var table = $("#tableviewparticipant").DataTable();
            if (table) {
                // The DataTable is already initialized, so we can just update the data
                table.clear();
                for (let i = 0; i < dataAttendance.length; i++) {
                    const attendance = dataAttendance[i];
                    table.row.add([i + 1, attendance.employeeName]);
                }
                table.draw();
            } else {
                // The DataTable is not yet initialized, so we need to initialize it
                $("#tableviewparticipant").DataTable({
                    paging: true,
                    columns: [{ title: "No" }, { title: "Participants" }],
                });
                for (let i = 0; i < dataAttendance.length; i++) {
                    const attendance = dataAttendance[i];
                    table.row.add([i + 1, attendance.employeeName]);
                }
            }
        });
    });

    $("#modalparticipant").modal("show");
});

$(document).on("click", "#buttonViewEvent", function () {
    var id = $(this).data("id");
    var eventData = getEvents(id);
    eventData.then(function (data) {
        // console.log(data);

        // var userId = $('#timesheetApprovalUserId').val();

        // var attendanceEvent = getAttendance(data.id);
        // attendanceEvent.then(function(dataAttendance) {
        //     $('#tableRow')
        //         .find('tr')
        //         .remove()
        //         .end();
        //     // console.log(dataAttendance);
        //     for (let i = 0; i < dataAttendance.length; i++) {
        //         const attendance = dataAttendance[i];
        //         // alert(attendance['employeeName'])
        //         var opt = document.createElement("tr");
        //         document.getElementById('tableRow').innerHTML +=
        //             '<tr class="odd gradeX">' +
        //             '<td>' + attendance.employeeName + '</td>' +
        //             '<td><span class="badge bg-lime rounded-pill">' + attendance.status + '</span></td>' +
        //             '</tr>';

        //     }
        // });
        var attendanceEvent = getAttendance(data.id);
        attendanceEvent.then(function (dataAttendance) {
            $("#statusparticipant").dataTable().fnClearTable(); // Clear existing data in the table
            for (let i = 0; i < dataAttendance.length; i++) {
                const attendance = dataAttendance[i];
                let badgeColor;
                switch (attendance.status) {
                    case "no response":
                        badgeColor = "bg-yellow";
                        break;
                    case "not attend":
                        badgeColor = "bg-red";
                        break;
                    default:
                        badgeColor = "bg-lime";
                        break;
                }
                $("#statusparticipant")
                    .dataTable()
                    .fnAddData([
                        attendance.employeeName,
                        '<span class="badge ' +
                            badgeColor +
                            ' rounded-pill">' +
                            attendance.status +
                            "</span>",
                    ]);
            }
        });

        $("#event_name").text(data.event_name || "-");
        $("#start_date").text(data.start_date);
        $("#end_date").text(data.end_date);
        $("#start_time_event").text(data.start_time);
        $("#end_time_event").text(data.end_time);
        // duration = +data.end_time - +data.start_time;
        // alert(duration);
        $("#duration").text(data.duration);
        // var location = getProjectLocationById(data.location);
        // location.then(function(location) {
        //     $('#location_event').text(location.location_name || '-');

        // })
        $("#location_event").text(data.venue || "-");
        var project = getProjectByidTimesheet(data.project_id);
        project.then(function (project) {
            $("#project_event").text(project.project_name || "-");
        });

        $("#recurring").text(data.set_reccuring || "-");
        $("#priority").text(data.priority || "-");

        // $('#recurring').text(data.recurring || '-');
        $("#desc_event").text(data.desc || "-");
        // $('#nameparticipant').text(data.participant);
        const testLibrary = {
            1: "5 Minute Before",
            2: "10 Minute Before",
            3: "15 Minute Before",
            4: "20 Minute Before",
            5: "25 Minute Before",
            6: "30 Minute Before",
            7: "1 Hour Before",
            // add more mappings here if needed
        };
        $("#reminder").text(testLibrary[data.reminder] || "-");
        $("#priority").text(data.priority || "-");

        $("#file_upload").html(
            '<a class="form-label" target="_blank" href="/storage/' +
                data.file_upload +
                '">' +
                data.file_upload +
                "</a>"
        );
        // $('#attend').text('attend');
    });
    $("#modalviewevent").modal("show");
});
$("#saveEventButton").click(function (e) {
    $("#addEventForm").validate({
        rules: {
            event_name: "required",
            start_date: "required",
            end_date: "required",
            start_time: "required",
            end_time: "required",
        },

        messages: {
            event_name: "Please insert event name",
            start_date: "Please choose start date",
            end_date: "Please choose end date",
            start_time: "Please choose start time",
            end_time: "Please choose end time",
        },
        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(
                    document.getElementById("addEventForm")
                );
                // var data = $('#tree').jstree("get_selected");

                $.ajax({
                    type: "POST",
                    url: "/createEvent",
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
function getLocationByProjectId(id) {
    return $.ajax({
        url: "/getLocationByProjectId/" + id,
    });
}

var $elem = $("#addneweventselectproject");
$elem.picker({ search: true });
$elem.on("sp-change", function () {
    projectId = $(this).val();
    getDataEventByProject(projectId, "addEvent");
});

$("#locationByProjectEditEventShow").hide();
$("#locationByProjectAddEventShow").hide();

function getDataEventByProject(projectId, type) {
    if (type == "addEvent") {
        $("#locationByProjectAddEventHide").hide();
        $("#locationByProjectAddEventShow").show();

        $("#location_by_project_add").find("option").remove().end();

        var locationOffice = getLocationByProjectId(projectId);

        locationOffice.then(function (data) {
            // alert('ss');
            for (let i = 0; i < data.length; i++) {
                const locations = data[i];
                var opt = document.createElement("option");
                document.getElementById("location_by_project_add").innerHTML +=
                    '<option value="' +
                    locations["id"] +
                    '">' +
                    locations["location_name"] +
                    "</option>";
            }
        });
    }

    if (type == "editEvent") {
        $("#locationByProjectEditEventHide").hide();
        $("#locationByProjectEditEventShow").show();

        $("#location_by_project").find("option").remove().end();

        var locationOffice = getLocationByProjectId(projectId);

        locationOffice.then(function (data) {
            // alert(data);
            for (let i = 0; i < data.length; i++) {
                const locations = data[i];
                var opt = document.createElement("option");
                document.getElementById("location_by_project").innerHTML +=
                    '<option value="' +
                    locations["id"] +
                    '">' +
                    locations["location_name"] +
                    "</option>";
            }
        });
    }
}

$("#daterange").daterangepicker(
    {
        opens: "right",
        format: "MM/DD/YYYY",
        separator: " to ",
        startDate: moment().subtract("days", 29),
        endDate: moment(),
    },
    function (start, end) {
        $("#default-daterange input").val(
            start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
        );
    }
);

$("#timesheetapproval").DataTable({
    searching: true,
    lengthChange: true,
    paging: true,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    responsive: true,
    // scrollX: true,
    initComplete: function (settings, json) {
        $("#timesheetapproval").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
    dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
    buttons: [
        {
            extend: "excel",
            className: "btn-blue",
            exportOptions: {
                columns: [2, 3, 4, 5, 6],
            },
        },
        {
            extend: "pdf",
            className: "btn-blue",
            exportOptions: {
                columns: [2, 3, 4, 5, 6],
            },
        },
        {
            extend: "print",
            className: "btn-blue",
            exportOptions: {
                columns: [2, 3, 4, 5, 6],
            },
        },
    ],
});

$("#tableviewparticipant").DataTable({
    responsive: false,
    searching: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    initComplete: function (settings, json) {
        $("#tableviewparticipant").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
    // lengthChange: false,
});

$("#statusparticipant").DataTable({
    responsive: false,
    searching: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    initComplete: function (settings, json) {
        $("#statusparticipant").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
});

$().ready = (function () {
    if ($("#employeesearch").val() || $("#eventsearch").val()) {
        $("#filterform").show();
    }

    $("#filter").click(function () {
        $("#filterform").toggle();
    });
})();
$("#starteventdate").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "yyyy/mm/dd",
});
$("#endeventdate").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "yyyy/mm/dd",
});
$("#projectlocsearch").picker({ search: true });
$("#addneweventprojectlocsearch").picker({ search: true });
$("#addneweventparticipant").picker({ search: true });
$("#addneweventselectproject").picker({ search: true });

$("#starteventtime").mdtimepicker({
    showMeridian: false,
});
$("#endeventtime").mdtimepicker({
    showMeridian: false,
});

$(document).on("change", "#addneweventselectrecurring", function () {
    if ($(this).val() == "1") {
        $("#addneweventsetreccurring").show();
        $("#mon").not(this).prop("checked", true);
        $("#tue").not(this).prop("checked", true);
        $("#wed").not(this).prop("checked", true);
        $("#thu").not(this).prop("checked", true);
        $("#fri").not(this).prop("checked", true);
    } else {
        $("#addneweventsetreccurring").hide();
        $("#mon").not(this).prop("checked", false);
        $("#tue").not(this).prop("checked", false);
        $("#wed").not(this).prop("checked", false);
        $("#thu").not(this).prop("checked", false);
        $("#fri").not(this).prop("checked", false);
    }
});
$(document).on("change", "#addneweventselectrecurring", function () {
    if ($(this).val() == "1" || $(this).val() == "2" || $(this).val() == "3") {
        $("#addneweventsetreccurring").show();
    } else {
        $("#addneweventsetreccurring").hide();
    }
});
$(document).on("change", "#addneweventselectrecurring", function () {
    if ($(this).val() == "4") {
        $("#setrecurringmontly").show();
        $("#setrecurringonmontly").show();
    } else {
        $("#setrecurringmontly").hide();
        $("#setrecurringonmontly").hide();
    }
});
$(document).on("change", "#addneweventselectrecurring", function () {
    if ($(this).val() == "5") {
        $("#setrecurringyearly").show();
        $("#setrecurringontheyearly").show();
    } else {
        $("#setrecurringyearly").hide();
        $("#setrecurringontheyearly").hide();
    }
});
$().ready = (function () {
    $("#addreminder").click(function () {
        $("#addeventreminder").toggle();
    });
})();
$("#addeventrecurring").click(function () {
    if ($(this).is(":checked")) {
        $("#addneweventrecurring").show();
    } else {
        $("#addneweventrecurring").hide();
        $("#addneweventsetreccurring").hide();
        $("#setrecurringyearly").hide();
        $("#setrecurringontheyearly").hide();
        $("#setrecurringmontly").hide();
        $("#setrecurringonmontly").hide();
    }
});
$("#addeventallday").click(function () {
    if ($(this).is(":checked")) {
        $("#startendtime").hide();
        $("#starteventtime").val() == "00:00";
        $("#endeventtime").val() == "23:59";
    } else {
        $("#startendtime").show();
    }
});
$("#ondaycheck").click(function () {
    if ($(this).is(":checked")) {
        $("#ondayselect").show();
        $("#onthecheck").not(this).prop("checked", false);
        $("#recurringselectwhatday").hide();
        $("#recurringselectonthe").hide();
    } else {
        $("#ondayselect").hide();
    }
});
$("#onthecheck").click(function () {
    if ($(this).is(":checked")) {
        $("#recurringselectwhatday").show();
        $("#recurringselectonthe").show();
        $("#ondaycheck").not(this).prop("checked", false);
        $("#ondayselect").hide();
    } else {
        $("#recurringselectwhatday").hide();
        $("#recurringselectonthe").hide();
    }
});
$("#ondayyearlycheck").click(function () {
    if ($(this).is(":checked")) {
        $("#recurringmonthyearly").show();
        $("#recurringdayyearly").show();
        $("#ontheyearlycheck").not(this).prop("checked", false);
        $("#recurringselectyearly").hide();
        $("#recurringonthedayyearly").hide();
        $("#recurringonthemonthyearly").hide();
        $("#recurringontheof").hide();
        // $('#ondaycheck').not(this).prop('checked', false);
        // $("#ondayselect").hide();
    } else {
        $("#recurringmonthyearly").hide();
        $("#recurringdayyearly").hide();
    }
});
$("#ontheyearlycheck").click(function () {
    if ($(this).is(":checked")) {
        $("#recurringselectyearly").show();
        $("#recurringonthedayyearly").show();
        $("#recurringonthemonthyearly").show();
        $("#recurringontheof").show();
        $("#ondayyearlycheck").not(this).prop("checked", false);
        $("#recurringmonthyearly").hide();
        $("#recurringdayyearly").hide();
    } else {
        $("#recurringselectyearly").hide();
        $("#recurringonthedayyearly").hide();
        $("#recurringonthemonthyearly").hide();
        $("#recurringontheof").hide();
    }
});

$(
    "#durationrt,#starteventdate,#endeventdate,#starteventtime,#endeventtime"
).focus(function () {
    var startdt = new Date(
        $("#starteventdate").val() + " " + $("#starteventtime").val()
    );

    var enddt = new Date(
        $("#endeventdate").val() + " " + $("#endeventtime").val()
    );

    var diff = enddt - startdt;

    var days = Math.floor(diff / (1000 * 60 * 60 * 24));
    diff -= days * (1000 * 60 * 60 * 24);

    var hours = Math.floor(diff / (1000 * 60 * 60));
    diff -= hours * (1000 * 60 * 60);

    var mins = Math.floor(diff / (1000 * 60));
    diff -= mins * (1000 * 60);

    $("#durationrt").val(
        days + " days : " + hours + " hours : " + mins + " minutes "
    );
});

$("#reset").on("click", function () {
    $("#employeesearch").val($("#employeesearch").data("default-value"));
    $("#employeesearch").picker("destroy");
    $("#eventsearch").val($("#eventsearch").data("default-value"));
    $("#eventsearch").picker("destroy");
});

$("#employeesearch").picker({ search: true });
$("#eventsearch").picker({ search: true });
