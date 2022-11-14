$(document).ready(function() {

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#typeOfLogsTable").DataTable({
        responsive: true,
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getData(id);

        vehicleData.done(function(data) {
            // console.log(data);
            $('#department').val(data.department);
            $('#project').val(data.project_id);
            if (data.project_id) {
                document.getElementById('addtypeoflogprojectedit').style.display = 'block';
            }
            // $("#addtypeoflogedit").prop("selectedIndex", data.type_of_log);
            $("#addtypeoflogedit").val(data.type_of_log);

            $('#idT').val(data.id);
        })
        $('#editModal').modal('show');

    });

    $(document).on("click", "#deleteEventButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteTypeOfLogs/" + id,
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
        });
    });

    function getData(id) {
        return $.ajax({
            url: "/getLogsById/" + id
        });
    }

    function getLocationByProjectId(id) {
        return $.ajax({
            url: "/getLocationByProjectId/" + id
        });
    }

    function getActivityByProjectId(id) {
        return $.ajax({
            url: "/getActivityByProjectId/" + id
        });
    }

    var $elem = $('#addneweventselectprojectedit');
    $elem.picker({ search: true });
    $elem.on('sp-change', function() {
        projectId = $(this).val();
        getDataEventByProject(projectId, 'editEvent')
    });

    $(document).on("change", "#officeLogProject", function() {
        projectId = $(this).val();
        getDataByProject(projectId, 'addLog')
    });

    $(document).on("change", "#myProject", function() {
        projectId = $(this).val();
        getDataByProject(projectId, 'addLog')
    });

    $(document).on("change", "#officeLogProjectEdit", function() {
        projectId = $(this).val();
        getDataByProject(projectId, 'editLog')
    });

    $(document).on("change", "#project_id_edit", function() {
        projectId = $(this).val();
        getDataByProject(projectId, 'editLog')
    });


    $('#locationByProjectShow').hide();
    $('#activityByProjectShow').hide();

    function getDataByProject(projectId, type) {
        if (type = 'addLog') {
            $('#locationByProjectHide').hide();
            $('#locationByProjectShow').show();
            $('#activityByProjectShow').show();
            $('#activityByProjectHide').hide();

            $('#projectLocationOffice')
                .find('option')
                .remove()
                .end();

            $('#activityOffice')
                .find('option')
                .remove()
                .end();

            var locationOffice = getLocationByProjectId(projectId);

            locationOffice.done(function(data) {
                // console.log(data);
                for (let i = 0; i < data.length; i++) {
                    const locations = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("projectLocationOffice").innerHTML +=
                        '<option value="' + locations['id'] + '">' + locations['location_name'] + "</option>";
                }
            })

            var activityOffice = getActivityByProjectId(projectId);

            activityOffice.done(function(data) {
                // console.log(data);
                for (let i = 0; i < data.length; i++) {
                    const locations = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("activityOffice").innerHTML +=
                        '<option value="' + locations['id'] + '">' + locations['activity_name'] + "</option>";
                }
            })
        }

        if (type = 'editLog') {
            $('#activityByProjectEditHide').hide();
            $('#activityByProjectEditShow').show();
            $('#locationByProjectEditShow').show();
            $('#locationByProjectEditHide').hide();

            $('#projectLocationOfficeEdit')
                .find('option')
                .remove()
                .end();

            $('#activityOfficeEdit')
                .find('option')
                .remove()
                .end();

            var locationOffice = getLocationByProjectId(projectId);

            locationOffice.done(function(data) {
                // console.log(data);
                for (let i = 0; i < data.length; i++) {
                    const locations = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("projectLocationOfficeEdit").innerHTML +=
                        '<option value="' + locations['id'] + '">' + locations['location_name'] + "</option>";
                }
            })

            var activityOffice = getActivityByProjectId(projectId);

            activityOffice.done(function(data) {
                // console.log(data);
                for (let i = 0; i < data.length; i++) {
                    const locations = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("activityOfficeEdit").innerHTML +=
                        '<option value="' + locations['id'] + '">' + locations['activity_name'] + "</option>";
                }
            })
        }
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

    $('#saveLogButton').click(function(e) {
        $("#addLogForm").validate({
            rules: {
                type_of_log: "required",
                date: "required",
                office_log: "required",
                project_id: "required",
                office_log_project: "required",
                activity_name: "required",
                activity_office: "required",
                start_time: "required",
                project_location: "required",
                project_location_office: "required",
                end_time: "required",
            },

            messages: {
                type_of_log: "Please Choose Type of Log",
                date: "",
                office_log: "Please Choose Office Log",
                project_id: "Please Choose",
                office_log_project: "Please Choose",
                activity_name: "Please Choose Activity Name",
                activity_office: "Please Choose",
                start_time: "",
                project_location: "Please Enter Location",
                project_location_office: "Please Enter Location",
                end_time: "",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("addLogForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createLog",
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
            },
        });
    });


    $('#updateLogButton').click(function(e) {
        $("#editLogForm").validate({
            rules: {
                type_of_log: "required",
                date: "required",
                office_log: "required",
                project_id: "required",
                office_log_project: "required",
                activity_name: "required",
                activity_office: "required",
                start_time: "required",
                project_location: "required",
                project_location_office: "required",
                end_time: "required",
            },

            messages: {
                type_of_log: "Please Choose Type of Log",
                date: "",
                office_log: "Please Choose Office Log",
                project_id: "Please Choose",
                office_log_project: "Please Choose",
                activity_name: "Please Choose Activity Name",
                activity_office: "Please Choose",
                start_time: "",
                project_location: "Please Enter Location",
                project_location_office: "Please Enter Location",
                end_time: "",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editLogForm"));
                    // console.log(data);
                    var id = $('#id').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateTimesheetLog/" + id,
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
            },
        });
    });

    $(document).on("click", "#deleteLogButton", function() {
        var id = $('#id').val();
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/deleteLog/" + id,
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
        });
    });

    /////////////////////////////////////// EVENT ////////////////////////////////
    $('#saveEventButton').click(function(e) {
        $("#addEventForm").validate({
            rules: {
                event_name: "required",
                start_date: "required",
                end_date: "required",
                start_time: "required",
                end_time: "required",
                duration: "required",
                recurring: "required",
                location: "required",
                location_by_project: "required",
            },

            messages: {
                event_name: "Please Insert Event Name",
                start_date: "Choose Date",
                end_date: "Choose Date",
                start_time: "Choose Date",
                end_time: "Choose Date",
                duration: "Please Choose Duration",
                recurring: "Please Select",
                location: "Please Enter Specific Location",
                location_by_project: "Please Enter Specific Location",
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
                            allowEscapeKey: false,
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

    $('#updateEventButton').click(function(e) {
        $("#editEventForm").validate({
            rules: {
                event_name: "required",
                start_date: "required",
                end_date: "required",
                start_time: "required",
                end_time: "required",
                duration: "required",
                recurring: "required",
                location: "required",
                location_by_project: "required",
            },

            messages: {
                event_name: "Please Insert Event Name",
                start_date: "Choose Date",
                end_date: "Choose Date",
                start_time: "Choose Date",
                end_time: "Choose Date",
                duration: "Please Choose Duration",
                recurring: "Please Select",
                location: "Please Enter Specific Location",
                location_by_project: "Please Enter Specific Location",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editEventForm"));
                    // console.log(data);
                    var id = $('#idEvent').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateTimesheetEvent/" + id,
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
            },
        });
    });

    $(document).on("click", "#deleteEventButton", function() {
        var id = $('#idEvent').val();
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/deleteEvent/" + id,
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
        });
    });
    ////////////////////////////  END EVENT //////////////////////////////////////

    ////////////////////////////CALENDAR JS///////////////////////////////////////
    var handleCalendarDemo = function() {
        // external events


        // fullcalendar

        var d = new Date();
        var month = d.getMonth() + 1;
        month = (month < 10) ? '0' + month : month;
        var year = d.getFullYear();
        var day = d.getDate();
        var today = moment().startOf('day');
        var calendarElm = document.getElementById('calendar');


        function getTimesheet() {
            return $.ajax({
                url: "/getTimesheet"
            });
        }


        var timesheetData = getTimesheet();

        timesheetData.done(function(data) {
            // $('#userIdForApproval').val(data['events'][0]['user_id']);
            // console.log(data['events']);
            var event = [];
            for (let i = 0; i < data['events'].length; i++) {
                var events = data['events'][i];

                var startDate = new Date(events['start_date']);
                var startMonth = startDate.getMonth() + 1;
                startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
                var startYear = startDate.getFullYear();
                var startDay = startDate.getDate();
                startDay = startDay < 10 ? "0" + startDay : startDay;

                var endDate = new Date(events['end_date']);
                var endMonth = endDate.getMonth() + 1;
                endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
                var endYear = endDate.getFullYear();
                var endDay = endDate.getDate();
                endDay = endDay < 10 ? "0" + endDay : endDay;

                event.push({
                    title: events['event_name'],
                    start: startYear + '-' + startMonth + '-' + startDay,
                    end: endYear + '-' + endMonth + '-' + endDay,
                    color: app.color.red,
                    extendedProps: {
                        type: 'event',
                        eventId: events['id']
                    }

                });
            }

            var log = [];
            for (let i = 0; i < data['logs'].length; i++) {
                var logs = data['logs'][i];

                var startDate = new Date(logs['date']);
                var startMonth = startDate.getMonth() + 1;
                startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
                var startYear = startDate.getFullYear();
                var startDay = startDate.getDate();
                startDay = startDay < 10 ? "0" + startDay : startDay;
                var startTime = logs['start_time'];
                startTime = startTime < 10 ? "0" + startTime : startTime;

                var endDate = new Date(logs['end_date']);
                var endMonth = endDate.getMonth();
                endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
                var endYear = endDate.getFullYear();
                var endDay = endDate.getDate();
                endDay = endDay < 10 ? "0" + endDay : endDay;

                function type_of_log(id) {
                    const data = {
                        '1': 'Home',
                        '2': 'Office',
                        '3': 'My Project',
                        '4': 'Others',
                    }

                    return data[id];
                }

                log.push({
                    title: type_of_log(logs['type_of_log']),
                    start: startYear + '-' + startMonth + '-' + startDay + 'T' + startTime + ':00',
                    color: app.color.primary,
                    extendedProps: {
                        type: 'log',
                        logId: logs['id']
                    }
                });
            }
            dataEvent = event.concat(log);
            // console.log(dataEvent);
            var calendar = new FullCalendar.Calendar(calendarElm, {
                headerToolbar: {
                    left: 'logButton EventButton',
                    center: 'title',
                    right: 'prev,today,next dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                customButtons: {
                    logButton: {
                        text: 'New Log',
                        click: function(event, jsEvent, view) {
                            $('#addLogModal').modal('show');
                        }
                    },
                    EventButton: {
                        text: 'New Event',
                        click: function(event, jsEvent, view) {
                            $('#neweventmodal').modal('show');
                        }
                    }
                },
                dateClick: function(info) {

                    $('#addLogModal').modal('show');

                    const formatedDate = dayjs(info.dateStr).format("DD-MM-YYYY")
                        // console.log(formatedDate);
                        // console.log(info.dateStr);

                    $("#dateaddlog").val(formatedDate);
                },
                eventClick: function(info) {

                    info.jsEvent.preventDefault();


                    function getEvents(id) {
                        return $.ajax({
                            url: "/getEventById/" + id
                        });
                    }

                    function getLogs(id) {
                        return $.ajax({
                            url: "/getLogsById/" + id
                        });
                    }

                    function getAttendance(eventId, userId) {
                        return $.ajax({
                            url: "/getAttendanceById/" + eventId + '/' + userId
                        });
                    }

                    function getEmployee(id) {
                        return $.ajax({
                            url: "/getEmployee"
                        });
                    }

                    employeeData = getEmployee();
                    employeeData.done(function(data) {
                        // console.log(data.data);
                        const employees = data.data;
                        for (let i = 0; i < employees.length; i++) {
                            const employee = employees[i];
                            $("#addneweventparticipantedit").picker('remove', employee['user_id']);
                            console.log(employee['user_id']);
                        }
                    })

                    if (info.event.extendedProps.type == "log") {
                        logId = info.event.extendedProps.logId;
                        var logData = getLogs(logId);
                        logData.done(function(data) {
                            // console.log(data);
                            if (data.type_of_log == '3') {

                                var display = $("#myprojectedit").css("display");
                                if (display == 'none') {
                                    $('#myprojectedit').css("display", 'block');
                                }
                            } else {
                                $('#myprojectedit').css("display", 'none');
                            }

                            if (data.type_of_log == '2') {

                                var display = $("#officelogedit").css("display");
                                var projectOfficeDisplay = $("#listprojectedit").css("display");
                                if (display == 'none') {
                                    $('#officelogedit').css("display", 'block');
                                }

                                if (projectOfficeDisplay == 'none') {
                                    $('#listprojectedit').css("display", 'block');
                                }
                            } else {
                                $('#officelogedit').css("display", 'none');
                                $('#listprojectedit').css("display", 'none');
                            }

                            if (data.type_of_log == 2 && data.office_log == 1) {

                            }

                            $('#locationByProjectEditShow').hide();
                            $('#activityByProjectEditShow').hide();
                            $("#typeoflogedit").val(data.type_of_log);
                            $("#officelog2edit").val(data.office_log);
                            $("#dateaddlogedit").val(data.date);
                            $("#project_id").val(data.project_id);
                            $("#officeLogProjectEdit").val(data.project_id);
                            $("#activity_name").val(data.activity_name);
                            $("#starttimeedit").val(data.start_time);
                            $('#projectlocsearchedit').picker('set', data.project_location);
                            $('#projectlocsearchedit').picker('set', data.project_location);
                            // $("#projectlocsearchedit").val(data.project_location);
                            $("#exit_project").prop('checked', data.exit_project);
                            $("#endtimeedit").val(data.end_time);
                            $("#desc").val(data.desc);
                            $("#total_hour").val(data.total_hour);
                            $("#id").val(data.id);
                        });

                        $('#editlogmodal').modal('show');
                    } else {
                        eventId = info.event.extendedProps.eventId;

                        $(document).on("click", "#attendEvent", function() {
                            var status = $(this).data('status');
                            requirejs(['sweetAlert2'], function(swal) {

                                $.ajax({
                                    type: "GET",
                                    url: "/updateAttendStatus/" + eventId + '/' + status,
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
                                        confirmButtonText: 'OK'
                                    }).then(function() {
                                        if (data.type == 'error') {

                                        } else {
                                            location.reload();
                                        }
                                    });
                                });
                            });
                        })
                        var eventData = getEvents(eventId);
                        eventData.done(function(data) {
                            // console.log(data);
                            var userId = $('#userIdForApproval').val();
                            $('#attendShow').hide();
                            $('#attendNoResponse').show();
                            $('#attendHide').show();
                            $('#attendNotAttend').hide();

                            var attendanceEvent = getAttendance(data.id, userId);
                            attendanceEvent.done(function(dataAttendance) {
                                // console.log(data);
                                if (dataAttendance) {
                                    if (dataAttendance.status == 'attend') {
                                        $('#attendHide').hide();
                                        $('#attendShow').show();
                                        $('#attendNoResponse').hide();
                                        $('#attendNotAttend').hide();

                                    }

                                    if (dataAttendance.status == 'not attend') {
                                        $('#attendNotAttend').show();
                                        $('#attendHide').hide();
                                        $('#attendShow').hide();
                                        $('#attendNoResponse').hide();

                                    }
                                }
                            });

                            $("#event_name").val(data.event_name);
                            $("#starteventdateedit").val(data.start_date);
                            $("#endeventdateedit").val(data.end_date);
                            $("#starteventtimeedit").val(data.start_time);
                            $("#endeventtimeedit").val(data.end_time);
                            $("#duration").val(data.duration);
                            $('#addneweventprojectlocsearchedit').picker('set', data.location);
                            if (data.type_recurring) {

                                if (data.type_recurring == 'allday') {
                                    $("#addeventalldayedit").prop('checked', true);
                                } else if (data.type_recurring == 'recurring') {
                                    // $("#addeventalldayedit").prop('checked', true);
                                    $("#addeventrecurringedit").prop('checked', true);

                                    var recurringDisplay = $("#addneweventrecurringedit").css("display");

                                    if (recurringDisplay == 'none') {
                                        $('#addneweventrecurringedit').css("display", 'block');
                                    } else {
                                        $('#addneweventrecurringedit').css("display", 'none');

                                    }

                                    if (data.recurring) {

                                        if (data.recurring == 1 || data.recurring == 2 || data.recurring == 3) {
                                            var setRecurringDisplay = $("#addneweventsetreccurringedit").css("display");

                                            if (setRecurringDisplay == 'none') {
                                                $('#addneweventsetreccurringedit').css("display", 'block');
                                            } else {
                                                $('#addneweventsetreccurringedit').css("display", 'none');

                                            }
                                        } else if (data.recurring == 4) {
                                            var setRecurringDisplay = $("#setrecurringmontlyedit").css("display");
                                            // alert(setRecurringDisplay);
                                            if (setRecurringDisplay == 'none') {
                                                if (data.set_reccuring_date_month) {

                                                    $("#ondaycheckedit").prop('checked', true);
                                                } else {
                                                    $("#ondaycheckedit").prop('checked', false);
                                                }

                                                if (data.set_reccuring_week_month || data.set_reccuring_day_month) {
                                                    $("#onthecheckedit").prop('checked', true);
                                                    $('#recurringselectontheedit').show();
                                                    $('#recurringselectwhatdayedit').show();

                                                } else {
                                                    $("#onthecheckedit").prop('checked', false);
                                                    $('#recurringselectontheedit').hide();
                                                    $('#recurringselectwhatdayedit').hide();

                                                }

                                                $('#setrecurringmontlyedit').css("display", 'block');

                                                $('#ondayselectedit').show();
                                                $('#setrecurringonmontlyedit').css("display", 'block');

                                            } else {
                                                $('#setrecurringmontlyedit').hide();
                                                $('#ondayselectedit').hide();
                                                $('#setrecurringonmontlyedit').hide();

                                            }
                                        } else if (data.recurring == 5) {
                                            $('#setrecurringyearlyedit').show();
                                            $('#setrecurringontheyearlyedit').show();

                                            if (data.set_reccuring_month_yearly || data.set_reccuring_date_yearly) {
                                                $('#ondayyearlycheckedit').prop('checked', true);
                                                $("#recurringmonthyearlyedit").show();
                                                $("#recurringdayyearlyedit").show();

                                            } else {
                                                $('#ondayyearlycheckedit').prop('checked', false);
                                                $("#recurringmonthyearlyedit").hide();
                                                $("#recurringdayyearlyedit").hide();

                                            }

                                            if (data.set_reccuring_week_yearly || data.set_reccuring_day_yearly || data.set_reccuring_month_yearly2) {
                                                $('#ontheyearlycheckedit').prop('checked', true);
                                                $("#recurringselectyearlyedit").show();
                                                $("#recurringonthedayyearlyedit").show();
                                                $("#recurringontheofedit").show();
                                                $("#recurringonthemonthyearlyedit").show();
                                            } else {
                                                $('#ontheyearlycheckedit').prop('checked', false);
                                                $("#recurringselectyearlyedit").hide();
                                                $("#recurringonthedayyearlyedit").hide();
                                                $("#recurringontheofedit").hide();
                                                $("#recurringonthemonthyearlyedit").hide();
                                            }
                                        }
                                    } else {
                                        $('#setrecurringmontlyedit').hide();
                                        $('#ondayselectedit').hide();
                                        $('#setrecurringonmontlyedit').hide();
                                        $('#setrecurringyearlyedit').hide();
                                        $('#setrecurringontheyearlyedit').hide();
                                    }



                                } else {
                                    $("#addeventalldayedit").prop('checked', true);
                                    $("#addeventrecurringedit").prop('checked', true);

                                    var recurringDisplay = $("#addneweventrecurringedit").css("display");

                                    if (recurringDisplay == 'none') {
                                        $('#addneweventrecurringedit').css("display", 'block');
                                    } else {
                                        $('#addneweventrecurringedit').css("display", 'none');

                                    }

                                    if (data.recurring) {

                                        if (data.recurring == 1 || data.recurring == 2 || data.recurring == 3) {
                                            var setRecurringDisplay = $("#addneweventsetreccurringedit").css("display");

                                            if (setRecurringDisplay == 'none') {
                                                $('#addneweventsetreccurringedit').css("display", 'block');
                                            } else {
                                                $('#addneweventsetreccurringedit').css("display", 'none');

                                            }
                                        } else if (data.recurring == 4) {
                                            var setRecurringDisplay = $("#setrecurringmontlyedit").css("display");
                                            // alert(setRecurringDisplay);
                                            if (setRecurringDisplay == 'none') {
                                                if (data.set_reccuring_date_month) {

                                                    $("#ondaycheckedit").prop('checked', true);
                                                } else {
                                                    $("#ondaycheckedit").prop('checked', false);
                                                }

                                                if (data.set_reccuring_week_month || data.set_reccuring_day_month) {
                                                    $("#onthecheckedit").prop('checked', true);
                                                    $('#recurringselectontheedit').show();
                                                    $('#recurringselectwhatdayedit').show();

                                                } else {
                                                    $("#onthecheckedit").prop('checked', false);
                                                    $('#recurringselectontheedit').hide();
                                                    $('#recurringselectwhatdayedit').hide();

                                                }

                                                $('#setrecurringmontlyedit').css("display", 'block');

                                                $('#ondayselectedit').show();
                                                $('#setrecurringonmontlyedit').css("display", 'block');

                                            } else {
                                                $('#setrecurringmontlyedit').hide();
                                                $('#ondayselectedit').hide();
                                                $('#setrecurringonmontlyedit').hide();

                                            }
                                        } else if (data.recurring == 5) {
                                            $('#setrecurringyearlyedit').show();
                                            $('#setrecurringontheyearlyedit').show();

                                            if (data.set_reccuring_month_yearly || data.set_reccuring_date_yearly) {
                                                $('#ondayyearlycheckedit').prop('checked', true);
                                                $("#recurringmonthyearlyedit").show();
                                                $("#recurringdayyearlyedit").show();

                                            } else {
                                                $('#ondayyearlycheckedit').prop('checked', false);
                                                $("#recurringmonthyearlyedit").hide();
                                                $("#recurringdayyearlyedit").hide();

                                            }

                                            if (data.set_reccuring_week_yearly || data.set_reccuring_day_yearly || data.set_reccuring_month_yearly2) {
                                                $('#ontheyearlycheckedit').prop('checked', true);
                                                $("#recurringselectyearlyedit").show();
                                                $("#recurringonthedayyearlyedit").show();
                                                $("#recurringontheofedit").show();
                                                $("#recurringonthemonthyearlyedit").show();
                                            } else {
                                                $('#ontheyearlycheckedit').prop('checked', false);
                                                $("#recurringselectyearlyedit").hide();
                                                $("#recurringonthedayyearlyedit").hide();
                                                $("#recurringontheofedit").hide();
                                                $("#recurringonthemonthyearlyedit").hide();
                                            }
                                        }
                                    } else {
                                        $('#setrecurringmontlyedit').hide();
                                        $('#ondayselectedit').hide();
                                        $('#setrecurringonmontlyedit').hide();
                                        $('#setrecurringyearlyedit').hide();
                                        $('#setrecurringontheyearlyedit').hide();
                                    }


                                }
                            }

                            if (data.priority == 'low') {
                                $("#inlineRadio11").prop('checked', true);
                            } else if (data.priority == 'medium') {
                                $("#inlineRadio22").prop('checked', true);
                            } else if (data.priority == 'high') {
                                $("#inlineRadio33").prop('checked', true);
                            }

                            $("#addneweventselectrecurringedit").prop('checked', data.priority);

                            $("#addneweventselectrecurringedit").val(data.recurring);

                            if (data.set_reccuring) {
                                var set_recurring = data.set_reccuring.split(',');
                                // console.log(set_recurring);

                                for (let i = 0; i < set_recurring.length; i++) {
                                    const dataSetRecurring = set_recurring[i];
                                    if (dataSetRecurring == 'sunday') {
                                        $("#sunedit").prop('checked', true);

                                    }

                                    if (dataSetRecurring == 'monday') {
                                        $("#monedit").prop('checked', true);

                                    }

                                    if (dataSetRecurring == 'sunday') {
                                        $("#sunedit").prop('checked', true);

                                    }

                                    if (dataSetRecurring == 'tuesday') {
                                        $("#tueedit").prop('checked', true);

                                    }

                                    if (dataSetRecurring == 'wednesda') {
                                        $("#wededit").prop('checked', true);

                                    }

                                    if (dataSetRecurring == 'thursday') {
                                        $("#thuedit").prop('checked', true);

                                    }

                                    if (dataSetRecurring == 'friday') {
                                        $("#friedit").prop('checked', true);

                                    }

                                    if (dataSetRecurring == 'saturday') {
                                        $("#satedit").prop('checked', true);

                                    }

                                }
                            }

                            if (data.reminder) {
                                $('#addeventreminderedit').show();
                            } else {
                                $('#addeventreminderedit').hide();
                            }

                            $("#set_reccuring_date_month").val(data.set_reccuring_date_month);
                            $("#set_reccuring_day_month").val(data.set_reccuring_day_month);

                            $("#set_reccuring_month_yearly").val(data.set_reccuring_month_yearly);

                            $("#set_reccuring_date_yearly").val(data.set_reccuring_date_yearly);
                            $("#set_reccuring_week_yearly").val(data.set_reccuring_week_yearly);
                            $("#set_reccuring_day_yearly").val(data.set_reccuring_day_yearly);
                            $("#set_reccuring_month_yearly2").val(data.set_reccuring_month_yearly2);
                            $("#set_reccuring_week_month").val(data.set_reccuring_week_month);
                            $("#addneweventprojectlocsearchedit").val(data.location);
                            $("#addneweventselectprojectedit").picker('set', data.project_id);

                            // $("#addneweventparticipantedit").picker('remove', 114);
                            // $("#addneweventparticipantedit").picker('remove', 113);
                            // $("#addneweventparticipantedit").picker('remove', 112);

                            // console.log(data.participant);
                            participants = data.participant.split(",");
                            for (let i = 0; i < participants.length; i++) {
                                const participant = participants[i];
                                $("#addneweventparticipantedit").picker('set', participant);

                            }

                            $("#descE").val(data.desc);
                            $("#addeventreminderedit").val(data.reminder);
                            if (data.file_upload) {
                                $("#fileView").html('<a href="/storage/' + data.file_upload + '" target="_blank"> click here to view file.</a>');
                            }
                            $("#idEvent").val(data.id);


                        });

                        $('#editeventmodal').modal('show');
                    }

                },
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day',
                    list: 'List'
                },
                initialView: 'dayGridMonth',
                editable: false,
                droppable: false,
                selectable: true,
                themeSystem: 'bootstrap',
                views: {
                    timeGrid: {
                        eventLimit: 6 // adjust to 6 only for timeGridWeek/timeGridDay
                    }
                },
                events: dataEvent,
            });
            calendar.render();

        });


    };

    var Calendar = function() {
        "use strict";
        return {
            //main function
            init: function() {
                handleCalendarDemo();
            }
        };
    }();

    $(document).ready(function() {
        Calendar.init();
    });

    //  FOR MODAL LOG AND EVENT
    $("#dateaddlog").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
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
    $(function() {
        $("#starttime").timepicker({
            showMeridian: false,
        });
        $("#endtime").timepicker({
            showMeridian: false,
        });
        starteventtime
        $("#starteventtime").timepicker({
            showMeridian: false,
        });
        $("#endeventtime").timepicker({
            showMeridian: false,
        });
    })

    $(document).on('change', "#typeoflog", function() {
        if ($(this).val() == "2") {
            $("#officelog").show();
        } else {
            $("#officelog").hide();
            $("#listproject").hide();

        }
    });
    $(document).on('change', "#typeoflog", function() {
        if ($(this).val() == "3") {
            $("#myproject").show();
        } else {
            $("#myproject").hide();
            $("#listproject").hide();
        }
    });
    $(document).on('change', "#officelog2", function() {
        if ($(this).val() == "1") {
            $("#listproject").show();
        } else {
            $("#listproject").hide();
        }
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
    // END MODAL LOG AND EVENT JS

    //  START EDIT MODAL LOG AND EVENT JS
    $("#dateaddlogedit").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    $("#starteventdateedit").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    $("#endeventdateedit").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    $('#projectlocsearchedit').picker({ search: true });
    $('#addneweventprojectlocsearchedit').picker({ search: true });
    $('#addneweventparticipantedit').picker({ search: true });
    $('#addneweventselectprojectedit').picker({ search: true });
    $("#starttimeedit").timepicker({
        showMeridian: false,
    });
    $("#endtimeedit").timepicker({
        showMeridian: false,
    });
    starteventtime
    $("#starteventtimeedit").timepicker({
        showMeridian: false,
    });
    $("#endeventtimeedit").timepicker({
        showMeridian: false,
    });
    $(document).on('change', "#typeoflogedit", function() {
        if ($(this).val() == "2") {
            $("#officelogedit").show();
        } else {
            $("#officelogedit").hide();
            $("#listprojectedit").hide();

        }
    });
    $(document).on('change', "#typeoflogedit", function() {
        if ($(this).val() == "3") {
            $("#myprojectedit").show();
        } else {
            $("#myprojectedit").hide();
            $("#listprojectedit").hide();
        }
    });
    $(document).on('change', "#officelog2edit", function() {
        if ($(this).val() == "1") {
            $("#listprojectedit").show();
        } else {
            $("#listprojectedit").hide();
        }
    });
    $(document).on('change', "#addneweventselectrecurringedit", function() {
        if ($(this).val() == "1") {
            $("#addneweventsetreccurringedit").show();
            $('#monedit').not(this).prop('checked', true);
            $('#tueedit').not(this).prop('checked', true);
            $('#wededit').not(this).prop('checked', true);
            $('#thuedit').not(this).prop('checked', true);
            $('#friedit').not(this).prop('checked', true);
        } else {
            $("#addneweventsetreccurringedit").hide();
            $('#monedit').not(this).prop('checked', false);
            $('#tueedit').not(this).prop('checked', false);
            $('#wededit').not(this).prop('checked', false);
            $('#thuedit').not(this).prop('checked', false);
            $('#friedit').not(this).prop('checked', false);

        }
    });
    $(document).on('change', "#addneweventselectrecurringedit", function() {
        if ($(this).val() == "1" || $(this).val() == '2' || $(this).val() == '3') {
            $("#addneweventsetreccurringedit").show();

        } else {
            $("#addneweventsetreccurringedit").hide();


        }
    });
    $(document).on('change', "#addneweventselectrecurringedit", function() {
        if ($(this).val() == "4") {
            $("#setrecurringmontlyedit").show();
            $("#setrecurringonmontlyedit").show();
        } else {
            $("#setrecurringmontlyedit").hide();
            $("#setrecurringonmontlyedit").hide();

        }
    });
    $(document).on('change', "#addneweventselectrecurringedit", function() {
        if ($(this).val() == "5") {
            $("#setrecurringyearlyedit").show();
            $("#setrecurringontheyearlyedit").show();

        } else {
            $("#setrecurringyearlyedit").hide();
            $("#setrecurringontheyearlyedit").hide();

        }
    });
    $().ready = function() {


        $("#addreminderedit").click(function() {
            $('#addeventreminderedit').toggle();
        });

    }();

    $("#addeventrecurringedit").click(function() {
        if ($(this).is(":checked")) {
            $("#addneweventrecurringedit").show();
        } else {
            $("#addneweventrecurringedit").hide();
            $("#addneweventsetreccurringedit").hide();
            $("#setrecurringyearlyedit").hide();
            $("#setrecurringontheyearlyedit").hide();
            $("#setrecurringmontlyedit").hide();
            $("#setrecurringonmontlyedit").hide();
        }
    });

    $("#ondaycheckedit").click(function() {
        if ($(this).is(":checked")) {
            $("#ondayselectedit").show();
            $('#onthecheckedit').not(this).prop('checked', false);
            $("#recurringselectwhatdayedit").hide();
            $("#recurringselectontheedit").hide();
        } else {
            $("#ondayselectedit").hide();


        }
    });
    $("#onthecheckedit").click(function() {
        if ($(this).is(":checked")) {
            $("#recurringselectwhatdayedit").show();
            $("#recurringselectontheedit").show();
            $('#ondaycheckedit').not(this).prop('checked', false);
            $("#ondayselectedit").hide();
        } else {
            $("#recurringselectwhatdayedit").hide();
            $("#recurringselectontheedit").hide();

        }
    });
    $("#ondayyearlycheckedit").click(function() {
        if ($(this).is(":checked")) {
            $("#recurringmonthyearlyedit").show();
            $("#recurringdayyearlyedit").show();
            $("#ontheyearlycheckedit").not(this).prop('checked', false);
            $("#recurringselectyearlyedit").hide();
            $("#recurringonthedayyearlyedit").hide();
            $("#recurringonthemonthyearlyedit").hide();
            $("#recurringontheofedit").hide();
            // $('#ondaycheck').not(this).prop('checked', false);
            // $("#ondayselect").hide();
        } else {
            $("#recurringmonthyearlyedit").hide();
            $("#recurringdayyearlyedit").hide();

        }
    });
    $("#ontheyearlycheckedit").click(function() {
        if ($(this).is(":checked")) {
            $("#recurringselectyearlyedit").show();
            $("#recurringonthedayyearlyedit").show();
            $("#recurringonthemonthyearlyedit").show();
            $("#recurringontheofedit").show();
            $('#ondayyearlycheckedit').not(this).prop('checked', false);
            $("#recurringmonthyearlyedit").hide();
            $("#recurringdayyearlyedit").hide();

        } else {
            $("#recurringselectyearlyedit").hide();
            $("#recurringonthedayyearlyedit").hide();
            $("#recurringonthemonthyearlyedit").hide();
            $("#recurringontheofedit").hide();
        }
    });


    ///////////////////////////////////submit for approval////////////////////////////////////
    // function getTimesheetApproval(userId) {
    //     return $.ajax({
    //         url: "/getTimesheetApproval"
    //     });
    // }
    $(document).on("click", "#submitTimesheetApproval", function() {

        userId = $('#userIdForApproval').val();
        // alert(userId);
        requirejs(['sweetAlert2'], function(swal) {
            $.ajax({
                type: "POST",
                url: "/submitForApproval/" + userId,
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
    });

});
// });// });