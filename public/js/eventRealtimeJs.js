function getEvents(id) {
    return $.ajax({
        url: "/getEventById/" + id
    });
}

function getAttendance(eventId) {
    return $.ajax({
        url: "/getAttendanceByEventId/" + eventId
    });
}

function getProjectByidTimesheet(id) {
    return $.ajax({
        url: "/getProjectByidTimesheet/" + id
    });
}

function getProjectLocationById(id) {
    return $.ajax({
        url: "/getProjectLocationById/" + id
    });
}

function getActivityNameById(id) {
    return $.ajax({
        url: "/getActivityNameById/" + id
    });
}

$(document).on("click", "#buttonnViewParticipant", function() {
    var id = $(this).data('id');
    var eventData = getEvents(id);
    eventData.done(function(data) {
        // console.log(data);
        // console.log(data.id)

        var attendanceEvent = getAttendance(data.id);
        attendanceEvent.done(function(dataAttendance) {
            $('#tableRowParticipant')
                .find('tr')
                .remove()
                .end();
            // console.log(dataAttendance);
            for (let i = 0; i < dataAttendance.length; i++) {
                const attendance = dataAttendance[i];
                var opt = document.createElement("tr");
                document.getElementById('tableRowParticipant').innerHTML +=
                    '<tr class="odd gradeX">' +
                    '<td>' + i + '</td>' +
                    '<td><span>' + attendance.employeeName + '</span></td>' +
                    '</tr>';

            }
        });


    });
    $('#modalparticipant').modal('show');

});


$(document).on("click", "#buttonViewEvent", function() {
    var id = $(this).data('id');
    var eventData = getEvents(id);
    eventData.done(function(data) {
        // console.log(data);

        // var userId = $('#timesheetApprovalUserId').val();

        var attendanceEvent = getAttendance(data.id);
        attendanceEvent.done(function(dataAttendance) {
            $('#tableRow')
                .find('tr')
                .remove()
                .end();
            // console.log(dataAttendance);
            for (let i = 0; i < dataAttendance.length; i++) {
                const attendance = dataAttendance[i];
                // alert(attendance['employeeName'])
                var opt = document.createElement("tr");
                document.getElementById('tableRow').innerHTML +=
                    '<tr class="odd gradeX">' +
                    '<td>' + attendance.employeeName + '</td>' +
                    '<td><span class="badge bg-lime rounded-pill">' + attendance.status + '</span></td>' +
                    '</tr>';

            }
        });

        $('#event_name').text(data.event_name);
        $('#start_date').text(data.start_date);
        $('#end_date').text(data.end_date);
        $('#start_time_event').text(data.start_time);
        $('#end_time_event').text(data.end_time);
        // duration = +data.end_time - +data.start_time;
        // alert(duration);
        $('#duration').text(data.duration);
        var location = getProjectLocationById(data.location);
        location.done(function(location) {
            $('#location_event').text(location.location_name);

        })

        var project = getProjectByidTimesheet(data.project_id);
        project.done(function(project) {
            $('#project_event').text(project.project_name);

        })

        $('#priority').text(data.priority);
        $('#recurring').text(data.recurring);
        $('#desc_event').text(data.desc);
        $('#reminder').text('None');
        $('#file_upload').html('<a class="form-label" target="_blank" href="/storage/' + data.file_upload + '">' + data.file_upload + '</a>');
        // $('#attend').text('attend');

    });
    $('#modalviewevent').modal('show');

});
$('#saveEventButton').click(function(e) {
    $("#addEventForm").validate({
        rules: {
            // bank_guarantee_amount: "required",
        },

        messages: {
            // department: "",
        },
        submitHandler: function(form) {
            requirejs(['sweetAlert2'], function(swal) {

                var data = new FormData(document.getElementById("addEventForm"));
                // var data = $('#tree').jstree("get_selected");

                $.ajax({
                    type: "POST",
                    url: "/createEvent",
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
                        allowEscapeKey: false
                    }).then(function() {
                        if (data.type == 'error') {

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
        url: "/getLocationByProjectId/" + id
    });
}

var $elem = $('#addneweventselectproject');
$elem.picker({ search: true });
$elem.on('sp-change', function() {
    projectId = $(this).val();
    getDataEventByProject(projectId, 'addEvent')
});

$('#locationByProjectEditEventShow').hide();
$('#locationByProjectAddEventShow').hide();

function getDataEventByProject(projectId, type) {

    if (type == 'addEvent') {
        $('#locationByProjectAddEventHide').hide();
        $('#locationByProjectAddEventShow').show();

        $('#location_by_project_add')
            .find('option')
            .remove()
            .end();

        var locationOffice = getLocationByProjectId(projectId);

        locationOffice.done(function(data) {
            // alert('ss');
            for (let i = 0; i < data.length; i++) {
                const locations = data[i];
                var opt = document.createElement("option");
                document.getElementById("location_by_project_add").innerHTML +=
                    '<option value="' + locations['id'] + '">' + locations['location_name'] + "</option>";
            }
        })
    }

    if (type == 'editEvent') {
        $('#locationByProjectEditEventHide').hide();
        $('#locationByProjectEditEventShow').show();

        $('#location_by_project')
            .find('option')
            .remove()
            .end();

        var locationOffice = getLocationByProjectId(projectId);

        locationOffice.done(function(data) {
            // alert(data);
            for (let i = 0; i < data.length; i++) {
                const locations = data[i];
                var opt = document.createElement("option");
                document.getElementById("location_by_project").innerHTML +=
                    '<option value="' + locations['id'] + '">' + locations['location_name'] + "</option>";
            }
        })
    }

}

$("#daterange").daterangepicker({
    opens: "right",
    format: "MM/DD/YYYY",
    separator: " to ",
    startDate: moment().subtract("days", 29),
    endDate: moment(),

}, function(start, end) {
    $("#default-daterange input").val(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
});

$('#timesheetapproval').DataTable({
    "searching": false,
    "lengthChange": true,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    responsive: false,

    dom: '<"row"<"col-sm-11"B><"col-sm-1"l>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [
        { extend: 'excel', className: 'btn-blue' },
        { extend: 'pdf', className: 'btn-blue' },
        { extend: 'print', className: 'btn-blue' }
    ],
});

$('#tableviewparticipant').DataTable({
    responsive: false,
    "searching": false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    "lengthChange": false,
});



$().ready = function() {


    $("#filter").click(function() {
        $('#filterform').toggle();
    });

}();
$("#starteventdate").datepicker({
    todayHighlight: true,
    autoclose: true
});
$("#endeventdate").datepicker({
    todayHighlight: true,
    autoclose: true
});
$('#projectlocsearch').picker({ search: true });
$('#addneweventprojectlocsearch').picker({ search: true });
$('#addneweventparticipant').picker({ search: true });
$('#addneweventselectproject').picker({ search: true });

$("#starteventtime").timepicker({
    showMeridian: false,
});
$("#endeventtime").timepicker({
    showMeridian: false,
});

$(document).on('change', "#addneweventselectrecurring", function() {
    if ($(this).val() == "1") {
        $("#addneweventsetreccurring").show();
        $('#mon').not(this).prop('checked', true);
        $('#tue').not(this).prop('checked', true);
        $('#wed').not(this).prop('checked', true);
        $('#thu').not(this).prop('checked', true);
        $('#fri').not(this).prop('checked', true);
    } else {
        $("#addneweventsetreccurring").hide();
        $('#mon').not(this).prop('checked', false);
        $('#tue').not(this).prop('checked', false);
        $('#wed').not(this).prop('checked', false);
        $('#thu').not(this).prop('checked', false);
        $('#fri').not(this).prop('checked', false);

    }
});
$(document).on('change', "#addneweventselectrecurring", function() {
    if ($(this).val() == "1" || $(this).val() == '2' || $(this).val() == '3') {
        $("#addneweventsetreccurring").show();

    } else {
        $("#addneweventsetreccurring").hide();


    }
});
$(document).on('change', "#addneweventselectrecurring", function() {
    if ($(this).val() == "4") {
        $("#setrecurringmontly").show();
        $("#setrecurringonmontly").show();
    } else {
        $("#setrecurringmontly").hide();
        $("#setrecurringonmontly").hide();

    }
});
$(document).on('change', "#addneweventselectrecurring", function() {
    if ($(this).val() == "5") {
        $("#setrecurringyearly").show();
        $("#setrecurringontheyearly").show();

    } else {
        $("#setrecurringyearly").hide();
        $("#setrecurringontheyearly").hide();

    }
});
$().ready = function() {


    $("#addreminder").click(function() {
        $('#addeventreminder').toggle();
    });

}();
$("#addeventrecurring").click(function() {
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
$("#addeventallday").click(function() {
    if ($(this).is(":checked")) {
        $("#startendtime").hide();
        $("#starteventtime").val() == "00:00";
        $("#endeventtime").val() == "23:59";
    } else {
        $("#startendtime").show();

    }
});
$("#ondaycheck").click(function() {
    if ($(this).is(":checked")) {
        $("#ondayselect").show();
        $('#onthecheck').not(this).prop('checked', false);
        $("#recurringselectwhatday").hide();
        $("#recurringselectonthe").hide();
    } else {
        $("#ondayselect").hide();


    }
});
$("#onthecheck").click(function() {
    if ($(this).is(":checked")) {
        $("#recurringselectwhatday").show();
        $("#recurringselectonthe").show();
        $('#ondaycheck').not(this).prop('checked', false);
        $("#ondayselect").hide();
    } else {
        $("#recurringselectwhatday").hide();
        $("#recurringselectonthe").hide();

    }
});
$("#ondayyearlycheck").click(function() {
    if ($(this).is(":checked")) {
        $("#recurringmonthyearly").show();
        $("#recurringdayyearly").show();
        $('#ontheyearlycheck').not(this).prop('checked', false);
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
$("#ontheyearlycheck").click(function() {
    if ($(this).is(":checked")) {
        $("#recurringselectyearly").show();
        $("#recurringonthedayyearly").show();
        $("#recurringonthemonthyearly").show();
        $("#recurringontheof").show();
        $('#ondayyearlycheck').not(this).prop('checked', false);
        $("#recurringmonthyearly").hide();
        $("#recurringdayyearly").hide();

    } else {
        $("#recurringselectyearly").hide();
        $("#recurringonthedayyearly").hide();
        $("#recurringonthemonthyearly").hide();
        $("#recurringontheof").hide();
    }
});