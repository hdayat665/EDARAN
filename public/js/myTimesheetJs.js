$(document).ready(function () {
    // $("#addeventalldayedit").change(function() {
    //     if ($(this).is(":checked")) {
    //       $(this).val("allday");
    //     } else {
    //       $(this).val("test");
    //     }
    //   });

    document.getElementById("yearsub").value = new Date().getFullYear();

    var monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    var d = new Date();
    document.getElementById("monthsub").value = monthNames[d.getMonth()];

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#typeOfLogsTable").DataTable({
        responsive: true,
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");
        var vehicleData = getData(id);

        vehicleData.then(function (data) {
            // console.log(data);
            $("#department").val(data.department);
            $("#project").val(data.project_id);
            if (data.project_id) {
                document.getElementById(
                    "addtypeoflogprojectedit"
                ).style.display = "block";
            }
            // $("#addtypeoflogedit").prop("selectedIndex", data.type_of_log);
            $("#addtypeoflogedit").val(data.type_of_log);

            $("#idT").val(data.id);
        });
        $("#editModal").modal("show");
    });

    $(document).on("click", "#deleteEventButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Event?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteTypeOfLogs/" + id,
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
        });
    });

    function getData(id) {
        return $.ajax({
            url: "/getLogsById/" + id,
        });
    }

    function getLocationByProjectId(id) {
        return $.ajax({
            url: "/getLocationByProjectId/" + id,
        });
    }

    function getActivityByProjectId(id) {
        return $.ajax({
            url: "/getActivityByProjectId/" + id,
        });
    }

    function getActivityNamebyLogsId(id) {
        return $.ajax({
            url: "/getActivityNamebyLogsId/" + id,
        });
    }

    function getAppealidList() {
        return $.ajax({
            url: "/getAppealidList/"
        });
    }

    var $elem = $('#addneweventselectprojectedit');
    $elem.picker({ search: true });
    $elem.on("sp-change", function () {
        projectId = $(this).val();
        getDataEventByProject(projectId, "editEvent");
    });

    $(document).on("change", "#officeLogProject", function () {
        projectId = $(this).val();
        getDataByProject(projectId, "addLog");
    });

    $(document).on("change", "#myProject", function () {
        projectId = $(this).val();
        getDataByProject(projectId, "addLog");
    });

    $(document).on("change", "#officeLogProjectEdit", function () {
        projectId = $(this).val();
        getDataByProject(projectId, "editLog");
    });

    $(document).on("change", "#project_id_edit", function () {
        projectId = $(this).val();
        getDataByProject(projectId, "editLog");
    });

    $("#locationByProjectShow").hide();
    $("#activityByProjectShow").hide();

    function getDataByProject(projectId, type) {
        if ((type = "addLog")) {
            $("#locationByProjectHide").hide();
            $("#locationByProjectShow").show();
            $("#activityByProjectShow").show();
            $("#activityByProjectHide").hide();

            $("#projectLocationOffice").find("option").remove().end();

            $("#activityOffice").find("option").remove().end();

            $("#activityLogs").find("option").remove().end();

            // var locationOffice = getLocationByProjectId(projectId);

            // locationOffice.then(function(data) {
            //     // console.log(data);
            //     for (let i = 0; i < data.length; i++) {
            //         const locations = data[i];
            //         var opt = document.createElement("option");
            //         document.getElementById("projectLocationOffice").innerHTML +=
            //             '<option value="' + locations['id'] + '">' + locations['location_name'] + "</option>";
            //     }
            // })

            var locationOffice = getLocationByProjectId(projectId);

            locationOffice.then(function (data) {
                var select = document.getElementById("projectLocationOffice");
                select.innerHTML = '<option value="">PLEASE CHOOSE</option>';
                var officeOption = document.createElement("option");
                officeOption.value = "OFFICE";
                officeOption.text = "OFFICE";
                select.appendChild(officeOption);
                // add other options
                for (let i = 0; i < data.length; i++) {
                    const location = data[i];
                    var opt = document.createElement("option");
                    opt.value = location["id"];
                    opt.text = location["location_name"];
                    select.appendChild(opt);
                }

                var warehouseOption = document.createElement("option");
                warehouseOption.value = "OTHERS";
                warehouseOption.text = "OTHERS";
                select.appendChild(warehouseOption);
                // $('#projectLocationOffice').picker({ search: true });
            });

            // var activityOffice = getActivityByProjectId(projectId);

            // activityOffice.then(function(data) {
            //     // console.log(data);
            //     for (let i = 0; i < data.length; i++) {
            //         const locations = data[i];
            //         var opt = document.createElement("option");
            //         document.getElementById("activityOffice").innerHTML +=
            //             '<option value="' + locations['id'] + '">' + locations['activity_name'] + "</option>";
            //     }
            // })

            var activityOffice = getActivityByProjectId(projectId);

            activityOffice.then(function (data) {
                var select = document.getElementById("activityOffice");
                select.innerHTML = '<option value="">PLEASE CHOOSE</option>';
                for (let i = 0; i < data.length; i++) {
                    const activity = data[i];
                    var opt = document.createElement("option");
                    opt.value = activity["id"];
                    opt.text = activity["activity_name"];
                    select.appendChild(opt);
                }
                // $('#activityOffice').picker({ search: true });
            });

            var activityLogs = getActivityNamebyLogsId(projectId);

            activityLogs.then(function (data) {
                var select = document.getElementById("activityLogs");
                select.innerHTML = '<option value="">Please Choose</option>';
                for (let i = 0; i < data.length; i++) {
                    const activity = data[i];
                    var opt = document.createElement("option");
                    opt.value = activity["id"];
                    opt.text = activity["activity_name"];
                    select.appendChild(opt);
                }
                // $('#activityLogs').picker({ search: true });
            });
        }

        if ((type = "editLog")) {
            $("#activityByProjectEditHide").hide();
            $("#activityByProjectEditShow").show();
            $("#locationByProjectEditShow").show();
            $("#locationByProjectEditHide").hide();

            $("#projectLocationOfficeEdit").find("option").remove().end();

            $("#activityOfficeEdit").find("option").remove().end();

            // var locationOffice = getLocationByProjectId(projectId);

            // locationOffice.then(function(data) {
            //     // console.log(data);
            //     for (let i = 0; i < data.length; i++) {
            //         const locations = data[i];
            //         var opt = document.createElement("option");
            //         document.getElementById("projectLocationOfficeEdit").innerHTML +=
            //             '<option value="' + locations['id'] + '">' + locations['location_name'] + "</option>";
            //     }
            // })

            var locationOffice = getLocationByProjectId(projectId);

            locationOffice.then(function (data) {
                var select = document.getElementById(
                    "projectLocationOfficeEdit"
                );
                select.innerHTML = '<option value="">Please Choose</option>';
                for (let i = 0; i < data.length; i++) {
                    const location = data[i];
                    var opt = document.createElement("option");
                    opt.value = location["id"];
                    opt.text = location["location_name"];
                    select.appendChild(opt);
                }
                // $('#projectLocationOfficeEdit').picker({ search: true });
            });

            var locationOffice = getLocationByProjectId(projectId);

            locationOffice.then(function (data) {
                var select = document.getElementById("projectlocsearchedit");
                select.innerHTML = '<option value="">Please Choose</option>';
                for (let i = 0; i < data.length; i++) {
                    const location = data[i];
                    var opt = document.createElement("option");
                    opt.value = location["id"];
                    opt.text = location["location_name"];
                    select.appendChild(opt);
                }
                // $('#projectlocsearchedit').picker({ search: true });
            });

            // var activityOffice = getActivityByProjectId(projectId);

            // activityOffice.then(function(data) {
            //     // console.log(data);
            //     for (let i = 0; i < data.length; i++) {
            //         const locations = data[i];
            //         var opt = document.createElement("option");
            //         document.getElementById("activityOfficeEdit").innerHTML +=
            //             '<option value="' + locations['id'] + '">' + locations['activity_name'] + "</option>";
            //     }
            // })

            var activityOffice = getActivityByProjectId(projectId);

            activityOffice.then(function (data) {
                var select = document.getElementById("activityOfficeEdit");
                select.innerHTML = '<option value="">Please Choose</option>';
                for (let i = 0; i < data.length; i++) {
                    const activity = data[i];
                    var opt = document.createElement("option");
                    opt.value = activity["id"];
                    opt.text = activity["activity_name"];
                    select.appendChild(opt);
                }
                // $('#activityOfficeEdit').picker({ search: true });
            });
        }
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
                    document.getElementById(
                        "location_by_project_add"
                    ).innerHTML +=
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

    $("#saveLogButton").click(function (e) {
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
                date: "Please Choose  Date",
                office_log: "Please Choose Office Log",
                project_id: "Please Choose Project",
                office_log_project: "Please Choose Project",
                activity_name: "Please Choose Activity Name",
                activity_office: "Please Choose Activity Name",
                start_time: "Please Choose Start Time",
                project_location: "Please Choose Project Location",
                project_location_office: "Please Choose Project Location",
                end_time: "Please Choose End Time",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addLogForm")
                    );
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createLog",
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

    $("#updateLogButton").click(function (e) {
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
                date: "Please Choose  Date",
                office_log: "Please Choose Office Log",
                project_id: "Please Choose",
                office_log_project: "Please Choose",
                activity_name: "Please Choose Activity Name",
                activity_office: "Please Choose Activity Name",
                start_time: "Please  Choose Start Time",
                project_location: "Please Choose Project Location",
                project_location_office: "Please Choose Project Location",
                end_time: "Please Choose End Time",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editLogForm")
                    );
                    // console.log(data);
                    var id = $("#id").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateTimesheetLog/" + id,
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

    $(document).on("click", "#deleteLogButton", function () {
        var id = $("#id").val();
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Log?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteLog/" + id,
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
        });
    });

    $("#addappealb").click(function (e) {
        $("#addappeal").validate({
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addappeal")
                    );
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createAppeal",
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

    /////////////////////////////////////// EVENT ////////////////////////////////
    $("#saveEventButton").click(function (e) {
        $("#addEventForm").validate({
            rules: {
                event_name: "required",
                start_date: "required",
                end_date: "required",
                start_time: "required",
                end_time: "required",
                // duration: "required",
                recurring: "required",
                location: "required",
                location_by_project: "required",
                participant: "required",
            },

            messages: {
                event_name: "Please Insert Event Name",
                start_date: "Please Choose Start Date",
                end_date: "Please Choose End Date",
                start_time: "Please Choose Start Time",
                end_time: "Please Choose End Time",
                // duration: "Please Choose Duration",
                recurring: "Please Select",
                location: "Please Insert Location",
                location_by_project: "Please Enter Specific Location",
                participant: "required",
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

    $("#updateEventButton").click(function (e) {
        $("#editEventForm").validate({
            rules: {
                event_name: "required",
                start_date: "required",
                end_date: "required",
                start_time: "required",
                end_time: "required",
                // duration: "required",
                recurring: "required",
                location: "required",
                location_by_project: "required",
            },

            messages: {
                event_name: "Please Insert Event Name",
                start_date: "Please Choose Start Date",
                end_date: "Please Choose End Date",
                start_time: "Please Choose Start Time",
                end_time: "Please Choose End Time",
                // duration: "Please Choose Duration",
                recurring: "Please Select",
                location: "Please Enter  Location",
                location_by_project: "Please Enter  Location",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editEventForm")
                    );
                    // console.log(data);
                    var id = $("#idEvent").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateTimesheetEvent/" + id,
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

    $(document).on("click", "#deleteEventButton", function () {
        var id = $("#idEvent").val();
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Event?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteEvent/" + id,
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
        });
    });
    ////////////////////////////  END EVENT //////////////////////////////////////

    ////////////////////////////CALENDAR JS///////////////////////////////////////
    var handleCalendarDemo = function () {
        // external events

        // fullcalendar

        var d = new Date();
        var month = d.getMonth() + 1;
        month = month < 10 ? "0" + month : month;
        var year = d.getFullYear();
        var day = d.getDate();
        var today = moment().startOf("day");
        var calendarElm = document.getElementById("calendar");

        function getTimesheet() {
            return $.ajax({
                url: "/getTimesheet",
            });
        }

        var timesheetData = getTimesheet();

        timesheetData.then(function (data) {
            // $('#userIdForApproval').val(data['events'][0]['user_id']);
            // console.log(data['events']);
            var event = [];
        for (let i = 0; i < data['events'].length; i++) {
            var events = data['events'][i];
            // console.log(events);
            var startDate = new Date(events['start_date']);
            var startMonth = startDate.getMonth() + 1;
            startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
            var startYear = startDate.getFullYear();
            var startDay = startDate.getDate();
            startDay = startDay < 10 ? "0" + startDay : startDay;

            var endDate = new Date(events['end_date']);
            endDate.setDate(endDate.getDate() + 1); // add one day to end date
            var endMonth = endDate.getMonth() + 1;
            endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
            var endYear = endDate.getFullYear();
            var endDay = endDate.getDate();
            endDay = endDay < 10 ? "0" + endDay : endDay;

            event.push({
                title: "Event: " + events['event_name'] + "\n" + "from " + events['start_time'] + " to " + events['end_time'],
                start: startYear + '-' + startMonth + '-' + startDay,
                end: endYear + '-' + endMonth + '-' + endDay,
                color: '#2AAA8A',
                extendedProps: {
                    type: 'event',
                    eventId: events['id']
                }
            });

        }

            var log = [];
            var loghour = [];
            for (let i = 0; i < data['logs'].length; i++) {
                var logs = data['logs'][i];

                var startDate = new Date(logs['date']);
                var startMonth = startDate.getMonth() + 1;
                startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
                var startYear = startDate.getFullYear();
                var startDay = startDate.getDate();
                startDay = startDay < 10 ? "0" + startDay : startDay;
                var startTime = logs["start_time"];
                var time = startTime.split(":");
                startTime = time[0] < 10 ? "0" + startTime : startTime;

                var endDate = new Date(logs['date']);
                var endMonth = endDate.getMonth() + 1;
                endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
                var endYear = endDate.getFullYear();
                var endDay = endDate.getDate();
                endDay = endDay < 10 ? "0" + endDay : endDay;
                var endTime = logs['end_time'];
                time = endTime.split(":");
                endTime = time[0] < 10 ? "0" + endTime : endTime;
                // console.log(logs['total_hour']);

                function type_of_log(id) {
                    const data = {
                        1: "Home",
                        2: "Office",
                        3: "My Project",
                        4: "Others",
                    };

                    return data[id];
                }

                log.push({
                    title:
                        (logs["type_of_log"]
                            ? type_of_log(logs["type_of_log"]) + " "
                            : "") +
                        "\n" +
                        (logs["project_name"]
                            ? logs["project_name"] + " "
                            : "") +
                        "\n" +
                        (logs["activitynameas"]
                            ? logs["activitynameas"] + " "
                            : "") +
                        "\n" +
                        " from " +
                        logs["start_time"] +
                        " to " +
                        logs["end_time"],
                    // start: startYear + '-' + startMonth + '-' + startDay + 'T' + startTime + ':00',
                    start: startYear + '-' + startMonth + '-' + startDay,
                    // color: app.color.primary,
                    color: "#348FE2",
                    extendedProps: {
                        type: "log",
                        logId: logs["id"],
                    },
                });

                loghour.push({
                    start: new Date(startYear, startMonth - 1, startDay),
                    end: new Date(endYear, endMonth - 1, endDay),
                    totalHour: logs['total_hour'],
                    logid: logs['id'],
                });


            }

            var leave = [];
            var leavesdate = [];
            for (let i = 0; i < data["leaves"].length; i++) {
                var leaves = data["leaves"][i];

                var startDate = new Date(leaves["start_date"]);
                var startMonth = startDate.getMonth() + 1;
                startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
                var startYear = startDate.getFullYear();
                var startDay = startDate.getDate();
                startDay = startDay < 10 ? "0" + startDay : startDay;

                var endDate = new Date(leaves["end_date"]);
                var endMonth = endDate.getMonth() + 1;
                endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
                var endYear = endDate.getFullYear();
                var endDay = endDate.getDate();
                endDay = endDay < 10 ? "0" + endDay : endDay;

                // console.log(leaves['reason'])
                leave.push({
                    title:
                        leaves["leave_types"] + " : " + "\n" + leaves["reason"],
                    // title: "Event: " + events['event_name'] + "\n" + "from " + events['start_time'] + " to " + events['end_time'],
                    start: startYear + "-" + startMonth + "-" + startDay,
                    end: endYear + "-" + endMonth + "-" + endDay,
                    // color: app.color.green,
                    color: "#D9EDF7",
                    textColor: "black",
                    fontWeight: "bold",
                    extendedProps: {
                        type: "leave",
                        leaveId: leaves["id"],
                    },
                });

                leavesdate.push({
                    start: new Date(startYear, startMonth - 1, startDay),
                    end: new Date(endYear, endMonth - 1, endDay),
                });
            }

            var holiday = [];
            var holidayDates = [];
            for (let i = 0; i < data['holidays'].length; i++) {
                var holidays = data['holidays'][i];
                // console.log(holidays);
                var startDate = new Date(holidays['start_date']);
                var startMonth = startDate.getMonth() + 1;
                startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
                var startYear = startDate.getFullYear();
                var startDay = startDate.getDate();
                startDay = startDay < 10 ? "0" + startDay : startDay;

                var endDate = new Date(holidays["end_date"]);
                var endMonth = endDate.getMonth() + 1;
                endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
                var endYear = endDate.getFullYear();
                var endDay = endDate.getDate();
                endDay = endDay < 10 ? "0" + endDay : endDay;

                holiday.push({
                    title: holidays["holiday_title"],
                    start: startYear + "-" + startMonth + "-" + startDay,
                    end: endYear + "-" + endMonth + "-" + endDay,
                    // color: app.color.yellow,
                    color: "#FFD480",
                    textColor: "black",
                    fontWeight: "bold",
                    extendedProps: {
                        type: "holiday",
                        holidayId: holidays["id"],
                    },
                });

                holidayDates.push({
                    title: holidays["holiday_title"],
                    start: new Date(startYear, startMonth - 1, startDay),
                    end: new Date(endYear, endMonth - 1, endDay),
                });
            }

            var highestNumber = 0;
            for (let i = 0; i < data['appeals'].length; i++) {
                var appeals = data['appeals'][i];
                // console.log(appeals['applied_date']);
                var match = appeals['logid'].match(/LA-(\d+)/);
                if (match) {
                    var number = parseInt(match[1]);
                    if (number > highestNumber) {
                        highestNumber = number;
                    }
                }
            }
            var nextNumber = highestNumber + 1;
            var nextLogId = 'LA-' + nextNumber.toString().padStart(4, '0');
            // console.log(nextLogId);


            dataEvent = event.concat(log);
            dataleave = dataEvent.concat(leave);
            dataHoliday = dataleave.concat(holiday);

            // console.log(holiday);
            var calendar = new FullCalendar.Calendar(calendarElm, {
                headerToolbar: {
                    left: "logButton EventButton SumButton",
                    center: "title",
                    right: "prev,today,next dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                },
                customButtons: {
                    logButton: {
                        text: "New Log",
                        click: function (event, jsEvent, view) {
                            $("#addLogModal").modal("show");
                        },
                    },
                    EventButton: {
                        text: "New Event",
                        click: function (event, jsEvent, view) {
                            $("#neweventmodal").modal("show");
                        },
                    },
                    SumButton: {
                        text: 'Summary',
                        click: function() {
                            window.location.href = 'summarytimesheet';
                        }
                    }
                },





                dayCellDidMount: function(info) {
                    var current = new Date(info.date);
                    var currentDate = new Date();

                    var currentdate = new Date();
                    currentdate.setDate(currentdate.getDate());

                    var oneDayBefore = new Date();
                    oneDayBefore.setDate(currentDate.getDate() - 1);

                    var satuhari = oneDayBefore.setDate(currentDate.getDate() - 1);

                    var twoDayBefore = new Date();
                    twoDayBefore.setDate(currentDate.getDate() - 2);

                    var duahari = twoDayBefore.setDate(currentDate.getDate() - 2);


                    var datedefaultformat = dayjs(current).format('YYYY-MM-DD');

                    var appealaddb = $('<button/>', {
                                text: 'Appeal',
                                class: 'btn btn-primary btn-xs appeal-add-button',
                                click: function () {
                                    var year = info.date.getFullYear();
                                    var month = info.date.getMonth();
                                    var day = info.date.getDate();
                                    console.log(year);
                                    $('#yearappeal').val(year);
                                    $('#monthappeal').val(new Date(info.date).toLocaleString('en-US', { month: 'long' }));
                                    $('#dayappeal').val(day);
                                    $('#log_id').val(nextLogId);

                                    const clickedDate = dayjs(info.date);
                                    const formattedDate = clickedDate.format('YYYY-MM-DD');
                                    $("#applieddate").val(formattedDate);

                                    $('#appealmodal').modal('show');
                                }
                            });


                            var viewappealb = $('<button/>', {
                                text: 'View Appeal',
                                class: 'btn btn-primary btn-xs appeal-view-button',
                                click: function () {


                                    // Get the logid for the corresponding appliedDate
                                    var index = appliedDates.indexOf(datedefaultformat);
                                    if (index !== -1) {
                                        var logId = logsid[index];
                                        var reason = reasons[index];
                                        var status = statuss[index];
                                        var year = years[index];
                                        var month = months[index];
                                        var day = days[index];
                                        var file = files[index];
                                        console.log(year);
                                        $('#log_idv').val(logId);
                                        $('#reasonappealv').val(reason);
                                        if (status === "Locked") {
                                            status = "Pending";
                                            $('#Statusv').val(status);
                                        } else {
                                            $('#Statusv').val(status);
                                        }
                                        $('#yearappealv').val(year);
                                        $('#monthappealv').val(month);
                                        $('#dayappealv').val(day);

                                        if (file) {
                                            var fileName = file.split('/').pop(); // Extract the file name from the file path
                                            $("#filedownloadappeal").html('<a href="/storage/' + file + '">Download ' + fileName + '</a>');
                                          }

                                        // console.log(file)
                                        $('#appealmodalview').modal('show');


                                    }
                                    return false;
                                }
                                });


                    if (dayjs(info.date).isSame(dayjs(), 'date')) {
                        $(info.el).css('background-color', '#FFFADF');

                      }

                      var isSameDate = dayjs(info.date).isSame(dayjs(), 'date');


                    for (let i = 0; i < holidayDates.length; i++) {
                        if (current >= holidayDates[i].start && current <= holidayDates[i].end) {
                            $(info.el).css('background-color', '#FFD480');
                            return;
                        }
                    }

                    for (let i = 0; i < leavesdate.length; i++) {
                        if (current >= leavesdate[i].start && current <= leavesdate[i].end) {
                            $(info.el).css('background-color', '#D9EDF7');
                            return;
                        }
                    }

                    var totalHours = 0;
                    var hasLog = false;
                    for (var i = 0; i < loghour.length; i++) {
                        if (current >= loghour[i].start && current <= loghour[i].end) {
                            hasLog = true;
                            console.log(totalHours);
                            totalHours += parseInt(loghour[i].totalHour.split(":")[0]);
                            var logid = loghour[i].logid;
                        }
                    }

                    var totalHours1 = '00:00';
                    var hasLog = false;
                    for (var i = 0; i < loghour.length; i++) {
                        if (current.getTime() === loghour[i].start.getTime()) {
                            hasLog = true;
                            var logid = loghour[i].logid;

                            // Calculate the total hours by accumulating all the 'total_hour' values for the current date
                            // Calculate the total hours by accumulating all the 'total_hour' values for the current date
                            var totalHour = loghour.filter(log => current.getTime() === log.start.getTime())
                            .reduce((total, log) => {
                                var [hours, minutes, seconds] = log.totalHour.split(':').map(Number);
                                total += hours * 3600 + minutes * 60 + seconds;
                                return total;
                            }, 0);

                            // Convert the total hours back to the 'hh:mm' format
                            var hours = Math.floor(totalHour / 3600);
                            var minutes = Math.floor((totalHour % 3600) / 60);
                            totalHours1 = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
                            var [hours1, minutes] = totalHours1.split(":").map(Number);

                            // console.log(hours1)
                            // Exit the loop once the total hours for the current date are calculated
                            break;
                        }
                    }



                    var appliedDates = [];
                    var reasons = [];
                    var logsid = [];
                    var statuss = [];
                    var years = [];
                    var months = [];
                    var days = [];
                    var files = [];
                    for (let i = 0; i < data['appeals'].length; i++) {
                        var appeals = data['appeals'][i];

                        var appliedDate = appeals['applied_date'];
                        var reason = appeals['reason'];
                        var logid = appeals['logid'];
                        var status = appeals['status'];
                        var year = appeals['year'];
                        var month = appeals['month'];
                        var day = appeals['day'];
                        var file = appeals['file'];



                        appliedDates.push(appliedDate);
                        reasons.push(reason);
                        logsid.push(logid);
                        statuss.push(status);
                        years.push(year);
                        months.push(month);
                        days.push(day);
                        files.push(file);
                    }
                    
                    var dailycounter = $('<button/>', {
                        text: totalHours1,
                        class: 'btn btn-danger btn-xs',
                        click: function () {
                        }
                    });
                    
                   
                      if (
                        current.getTime() === currentDate.getTime() ||
                        (current.getTime() < currentDate.getTime() && current.getDay() !== 6 && current.getDay() !== 0)
                        
                    ) {
                        $(info.el).append('&nbsp;').append(dailycounter);
                        $(dailycounter).css({
                            position: 'relative',
                            top: '-35px',
                            'z-index': '999',
                        });

                      } 
                      if(
                         
                        (current.getDate() === oneDayBefore.getDate() || current.getDate() === twoDayBefore.getDate()) &&
                        !(current.getDay() === 6 || current.getDay() === 0) && !hasLog )
                       {
                        $(info.el).css('background-color', '#FF8080');
                      }

                      else if(
                         
                        (current.getDate() === currentdate.getDate()) &&
                        !(current.getDay() === 6 || current.getDay() === 0)  && (hasLog && hours1 < 9)
                      ) {
                        $(info.el).css('background-color', '#FF8080');
                      }


                      else if(
                         
                        (current.getDate() === currentdate.getDate()) &&
                        !(current.getDay() === 6 || current.getDay() === 0)  && ( hasLog && hours1 >= 9)
                      ) {
                        $(info.el).css('background-color', '#80ff80');
                      }

                     else if(
                         
                        (current.getDate() === oneDayBefore.getDate() || current.getDate() === twoDayBefore.getDate()) &&
                        !(current.getDay() === 6 || current.getDay() === 0)  && ( hasLog && hours1 >= 9)
                      ) {
                        $(info.el).css('background-color', '#80ff80');
                      }
                      else if(
                         
                        (current.getDate() === oneDayBefore.getDate() || current.getDate() === twoDayBefore.getDate()) &&
                        !(current.getDay() === 6 || current.getDay() === 0)  && ( hasLog && hours1 < 9)
                      ) {
                        $(info.el).css('background-color', '#FF8080');
                      }
                      //xde log appeal, log kecik dari 9,exclude weekend
                       else if((current < duahari) && !appliedDates.includes(datedefaultformat) && (hasLog && hours1 < 9 || !hasLog)   && !(current.getDay() === 6 || current.getDay() === 0)) {
                        $(info.el).css('background-color', '#FF8080');
                        $(info.el).append('&nbsp;').append(appealaddb);
                        $(appealaddb).css({
                            position: 'relative',
                            top: '-35px',
                            'z-index': '999',   
                            });

                        }else if((current < duahari) && appliedDates.includes(datedefaultformat) && (hasLog && hours1 < 9 || !hasLog)   && !(current.getDay() === 6 || current.getDay() === 0)) {

                            $(info.el).css('background-color', '#FF8080');
                            $(info.el).append('&nbsp;').append(viewappealb);
                            $(viewappealb).css({
                                position: 'relative',
                                top: '-35px',
                                'z-index': '999',   
                                });
                        
                        
                         } else if((current < duahari) && hasLog && hours1 >= 9) {
                            $(info.el).css('background-color', '#80ff80');
                         } else if((current < duahari) && appliedDates.includes(datedefaultformat) && hours1 >= 9) {
                            $(info.el).css('background-color', '#80ff80');
                            $(info.el).append('&nbsp;').append(viewappealb);
                            $(viewappealb).css({
                                position: 'relative',
                                top: '-35px',
                                'z-index': '999',   
                                });
                         }
                         else if((current < duahari) && appliedDates.includes(datedefaultformat) && hours1 < 9) {
                            $(info.el).css('background-color', '#FF8080');
                            $(info.el).append('&nbsp;').append(viewappealb);
                            $(viewappealb).css({
                                position: 'relative',
                                top: '-35px',
                                'z-index': '999',   
                                });
                         }
                         else if (info.date.getDay() === 0 &&  !isSameDate) {
                        $(info.el).css('background-color', '#B3CCFF');
                    } else if (info.date.getDay() === 6 && !isSameDate) {
                        $(info.el).css('background-color', '#B3CCFF');
                    }
                 else {
                        // $(info.el).css('background-color', 'white');
                      }
                    },



                    dateClick: function(info) {

                        const today = dayjs();
                        const clickedDate = dayjs(info.date);

                        // check if the clicked date's status is "approve"
                        var appliedDates = [];
                        var statuses = [];



                        for (let i = 0; i < data['appeals'].length; i++) {
                          var appeals = data['appeals'][i];
                          var appliedDate = appeals['applied_date'];
                          var status = appeals['status'];
                          appliedDates.push(appliedDate);
                          statuses.push(status);
                        }
                        const formattedDate = clickedDate.format('YYYY-MM-DD');
                        if (appliedDates.includes(formattedDate) && statuses[appliedDates.indexOf(formattedDate)] === 'Approved') {
                            // show the view appeal modal
                            $('#addLogModal').modal('show');
                            const formattedDate = clickedDate.format('DD-MM-YYYY');
                            $("#dateaddlog").val(formattedDate);

                            return;
                        }


                        // check if the clicked date is within the last 2 days before the current date
                        // and if the cell already has an appeal button
                        if ((clickedDate.diff(today, 'day') < -2 || clickedDate.isAfter(today, 'day')) &&
                        ($(info.dayEl).find('.appeal-add-button, .appeal-view-button').length == 0)) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'You can only add logs for the current and past 2 days!',
                            });
                        return;
                        }
                        if ((clickedDate.diff(today, 'day') < -2 || clickedDate.isAfter(today, 'day')) &&
                            ($(info.dayEl).find('.appeal-add-button, .appeal-view-button').length !== 0)) {

                          return;
                        }

                        // show the add log modal
                        $('#addLogModal').modal('show');
                        $("#dateaddlog").val(formattedDate);
                      },







                // original code
                // dateClick: function(info) {

                //     $('#addLogModal').modal('show');


                // dateClick: function(info) {
                //     const today = dayjs();
                //     const clickedDate = dayjs(info.date);

                    // check if the clicked date is within the last 2 days before the current date
                    // if (clickedDate.diff(today, 'day') < -2 || clickedDate.isAfter(today, 'day')) {
                    //   Swal.fire({
                    //     icon: 'error',
                    //     title: 'Error',
                    //     text: 'You can only select the current date and 2 days before.'
                    //   });
                    //   return;
                    // }

                    // show the modal and set the date
                //     $('#addLogModal').modal('show');
                //     const formattedDate = clickedDate.format('DD-MM-YYYY');
                //     $("#dateaddlog").val(formattedDate);
                //   },
                // retrieve the value of the hidden input field containing the user id





                eventClick: function(info) {

                    info.jsEvent.preventDefault();

                    function getEvents(id) {
                        return $.ajax({
                            url: "/getEventById/" + id,
                        });
                    }

                    function getLogs(id) {
                        return $.ajax({
                            url: "/getLogsById/" + id,
                        });
                    }

                    function getAttendance(eventId, userId) {
                        return $.ajax({
                            url: "/getAttendanceById/" + eventId + "/" + userId,
                        });
                    }

                    function getEmployee(id) {
                        return $.ajax({
                            url: "/getEmployee",
                        });
                    }

                    function getAttendance1(eventId) {
                        return $.ajax({
                            url: "/getAttendanceByEventId/" + eventId,
                        });
                    }

                    function getEvents1(id) {
                        return $.ajax({
                            url: "/getEventById/" + id,
                        });
                    }

                    employeeData = getEmployee();
                    employeeData.then(function (data) {
                        // console.log(data.data);
                        const employees = data.data;
                        for (let i = 0; i < employees.length; i++) {
                            const employee = employees[i];
                            $("#addneweventparticipantedit").picker(
                                "remove",
                                employee["user_id"]
                            );
                            // console.log(employee['user_id']);
                        }
                    });

                    if (
                        info.event.extendedProps.type == "leave" ||
                        info.event.extendedProps.type == "holiday"
                    ) {
                    } else if (info.event.extendedProps.type == "log") {
                        logId = info.event.extendedProps.logId;
                        var logData = getLogs(logId);
                        logData.then(function (data) {
                            // console.log(data);

                            if (data.type_of_log == "3") {
                                $("#officelogedit").css("display", "none");
                                $("#myprojectedit").css("display", "block");
                                $("#activityByProjectEditHide1").css(
                                    "display",
                                    "block"
                                );
                                $("#activityByProjectEditHide").css(
                                    "display",
                                    "none"
                                );
                                $("#projectLocationOfficeEdit").css(
                                    "display",
                                    "block"
                                );
                                $("#locationByProjectEditShow").css(
                                    "display",
                                    "block"
                                );
                                $("#locationByProjectEditHide").css(
                                    "display",
                                    "block"
                                );
                                $("#locationByProjectEditShow").css(
                                    "display",
                                    "block"
                                );
                            } else if (
                                data.type_of_log == "1" ||
                                data.type_of_log == "4"
                            ) {
                                $("#officelogedit").css("display", "none");
                                $("#activityByProjectEditHide").css(
                                    "display",
                                    "block"
                                );
                                $("#activityByProjectEditHide1").css(
                                    "display",
                                    "none"
                                );
                                $("#myprojectedit").css("display", "none");
                            } else if (data.type_of_log == "2") {
                                $("#officelogedit").css("display", "block");
                                // var display11 = $("#activityByProjectEditHide").css("display");
                                $("#activityByProjectEditHide1").css(
                                    "display",
                                    "block"
                                );
                                $("#projectLocationOfficeEdit").css(
                                    "display",
                                    "block"
                                );

                                // Add another condition
                                if (data.office_log == "1") {
                                    $("#myprojectedit").css("display", "block");
                                    $("#activityByProjectEditHide1").css(
                                        "display",
                                        "block"
                                    );
                                    $("#locationByProjectEditHide").css(
                                        "display",
                                        "block"
                                    );
                                    $("#officelogedit").css("display", "block");
                                    $("#activityByProjectEditHide").css(
                                        "display",
                                        "none"
                                    );
                                }

                                if (data.office_log == "2") {
                                    $("#activityByProjectEditHide").css(
                                        "display",
                                        "block"
                                    );
                                    $("#officelogedit").css("display", "block");
                                    $("#myprojectedit").css("display", "none");
                                    $("#activityByProjectEditHide1").css(
                                        "display",
                                        "none"
                                    );
                                }
                            } else {
                                $("#myprojectedit").css("display", "none");
                                $("#activityByProjectEditHide").css(
                                    "display",
                                    "none"
                                );
                                $("#locationByProjectEditHide").css(
                                    "display",
                                    "none"
                                );
                                // $('#officelogedit').css("display", 'none');
                                $("#locationByProjectEditHide1").css(
                                    "display",
                                    "none"
                                );
                            }

                            // if (data.type_of_log == 2 && data.office_log == 1) {

                            // }

                            $("#locationByProjectEditShow").hide();
                            $("#activityByProjectEditShow").hide();
                            $("#typeoflogedit").val(data.type_of_log);
                            $("#officelog2edit").val(data.office_log);
                            $("#dateaddlogedit").val(data.date);
                            $("#project_id_edit").val(data.project_id);
                            $("#officeLogProjectEdit").val(data.project_id);

                            $("#projectlocsearchedit").val(
                                data.project_location
                            );
                            // projectlocsearchedit
                            $("#activity_name_edit2").val(data.activity_name);
                            $("#activity_name_edit1").val(data.activity_name);
                            $("#starttimeedit").val(data.start_time);

                            $("#projectLocationOfficeEdit").picker(
                                "set",
                                data.project_location
                            );
                            // $('#projectlocsearchedit').picker('set', data.project_location);
                            // $('#projectlocsearchedit').picker('set', data.project_location);
                            // $("#projectlocsearchedit").val(data.project_location);
                            $("#exit_project").prop(
                                "checked",
                                data.exit_project
                            );
                            $("#endtimeedit").val(data.end_time);
                            $("#desc").val(data.desc);
                            $("#total_hour").val(data.total_hour);
                            $("#id").val(data.id);
                        });

                        $("#editlogmodal").modal("show");
                    } else {
                        eventId = info.event.extendedProps.eventId;

                        $(document).on("click", "#attendEvent", function () {
                            var status = $(this).data("status");
                            requirejs(["sweetAlert2"], function (swal) {
                                $.ajax({
                                    type: "GET",
                                    url:
                                        "/updateAttendStatus/" +
                                        eventId +
                                        "/" +
                                        status,
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
                                    }).then(function () {
                                        if (data.type == "error") {
                                        } else {
                                            location.reload();
                                        }
                                    });
                                });
                            });
                        });
                        var eventData = getEvents(eventId);
                        eventData.then(function (data) {
                            // console.log(data);
                            var userId = $("#userIdForApproval").val();
                            $("#attendShow").hide();
                            $("#attendNoResponse").show();
                            $("#attendHide").show();
                            $("#attendNotAttend").hide();

                            var attendanceEvent = getAttendance(
                                data.id,
                                userId
                            );
                            attendanceEvent.then(function (dataAttendance) {
                                // console.log(data);
                                if (dataAttendance) {
                                    if (dataAttendance.status == "attend") {
                                        $("#attendHide").hide();
                                        $("#attendShow").show();
                                        $("#attendNoResponse").hide();
                                        $("#attendNotAttend").hide();
                                    }

                                    if (dataAttendance.status == "not attend") {
                                        $("#attendNotAttend").show();
                                        $("#attendHide").hide();
                                        $("#attendShow").hide();
                                        $("#attendNoResponse").hide();
                                    }
                                }
                            });

                            var eventData = getEvents(eventId);
                            eventData.then(function (data) {
                                var participants = data.participant.split(",");
                                var participantNames =
                                    data.participantNames.split(",");

                                var tableBody = $("#tableRowParticipant");
                                tableBody.empty(); // clear any existing rows in the table

                                for (var i = 0; i < participants.length; i++) {
                                    var participantId = participants[i];
                                    var participantName = participantNames[i];

                                    var row = $("<tr></tr>");
                                    row.append($("<td></td>").text(i + 1));
                                    row.append(
                                        $("<td></td>").text(participantName)
                                    );

                                    tableBody.append(row);
                                }
                            });

                            $("#participantlist").val(data.participantNames);
                            $("#event_name").val(data.event_name);
                            $("#editvenue").val(data.venue);
                            $("#starteventdateedit").val(data.start_date);
                            $("#endeventdateedit").val(data.end_date);
                            $("#starteventtimeedit").val(data.start_time);
                            $("#endeventtimeedit").val(data.end_time);
                            $("#duration").val(data.duration);
                            $("#addneweventprojectlocsearchedit").picker(
                                "set",
                                data.location
                            );
                            $("#hideshowstarttimee").show();
                            $("#hideshowendtimee").show();
                            $("#addeventalldayedit").prop("checked", false);
                            if (data.type_recurring) {
                                if (data.type_recurring == "allday") {
                                    $("#addeventalldayedit").prop(
                                        "checked",
                                        true
                                    );
                                    $("#hideshowstarttimee").css(
                                        "display",
                                        "none"
                                    );
                                    $("#hideshowendtimee").css(
                                        "display",
                                        "none"
                                    );
                                    $("#addeventalldayedit").val("allday");
                                } else if (data.type_recurring == "") {
                                    $("#addeventalldayedit").prop(
                                        "checked",
                                        false
                                    );
                                    $("#hideshowstarttimee").css(
                                        "display",
                                        "block"
                                    );
                                    $("#hideshowendtimee").css(
                                        "display",
                                        "block"
                                    );
                                    $("#addeventalldayedit").val("");
                                } else if (data.type_recurring == "recurring") {
                                    $("#addeventalldayedit").prop(
                                        "checked",
                                        false
                                    );
                                    // $("#addeventalldayedit").prop('checked', true);
                                    $("#addeventrecurringedit").prop(
                                        "checked",
                                        true
                                    );
                                    $("#hideshowstarttimee").css("display");
                                    $("#hideshowendtimee").css("display");

                                    var recurringDisplay = $(
                                        "#addneweventrecurringedit"
                                    ).css("display");

                                    if (recurringDisplay == "none") {
                                        $("#addneweventrecurringedit").css(
                                            "display",
                                            "block"
                                        );
                                    } else {
                                        $("#addneweventrecurringedit").css(
                                            "display",
                                            "none"
                                        );
                                    }

                                    if (data.recurring) {
                                        if (
                                            data.recurring == 1 ||
                                            data.recurring == 2 ||
                                            data.recurring == 3
                                        ) {
                                            var setRecurringDisplay = $(
                                                "#addneweventsetreccurringedit"
                                            ).css("display");

                                            if (setRecurringDisplay == "none") {
                                                $(
                                                    "#addneweventsetreccurringedit"
                                                ).css("display", "block");
                                            } else {
                                                $(
                                                    "#addneweventsetreccurringedit"
                                                ).css("display", "none");
                                            }
                                        } else if (data.recurring == 4) {
                                            var setRecurringDisplay = $(
                                                "#setrecurringmontlyedit"
                                            ).css("display");
                                            // alert(setRecurringDisplay);
                                            if (setRecurringDisplay == "none") {
                                                if (
                                                    data.set_reccuring_date_month
                                                ) {
                                                    $("#ondaycheckedit").prop(
                                                        "checked",
                                                        true
                                                    );
                                                } else {
                                                    $("#ondaycheckedit").prop(
                                                        "checked",
                                                        false
                                                    );
                                                }

                                                if (
                                                    data.set_reccuring_week_month ||
                                                    data.set_reccuring_day_month
                                                ) {
                                                    $("#onthecheckedit").prop(
                                                        "checked",
                                                        true
                                                    );
                                                    $(
                                                        "#recurringselectontheedit"
                                                    ).show();
                                                    $(
                                                        "#recurringselectwhatdayedit"
                                                    ).show();
                                                } else {
                                                    $("#onthecheckedit").prop(
                                                        "checked",
                                                        false
                                                    );
                                                    $(
                                                        "#recurringselectontheedit"
                                                    ).hide();
                                                    $(
                                                        "#recurringselectwhatdayedit"
                                                    ).hide();
                                                }

                                                $(
                                                    "#setrecurringmontlyedit"
                                                ).css("display", "block");

                                                $("#ondayselectedit").show();
                                                $(
                                                    "#setrecurringonmontlyedit"
                                                ).css("display", "block");
                                            } else {
                                                $(
                                                    "#setrecurringmontlyedit"
                                                ).hide();
                                                $("#ondayselectedit").hide();
                                                $(
                                                    "#setrecurringonmontlyedit"
                                                ).hide();
                                            }
                                        } else if (data.recurring == 5) {
                                            $("#setrecurringyearlyedit").show();
                                            $(
                                                "#setrecurringontheyearlyedit"
                                            ).show();

                                            if (
                                                data.set_reccuring_month_yearly ||
                                                data.set_reccuring_date_yearly
                                            ) {
                                                $("#ondayyearlycheckedit").prop(
                                                    "checked",
                                                    true
                                                );
                                                $(
                                                    "#recurringmonthyearlyedit"
                                                ).show();
                                                $(
                                                    "#recurringdayyearlyedit"
                                                ).show();
                                            } else {
                                                $("#ondayyearlycheckedit").prop(
                                                    "checked",
                                                    false
                                                );
                                                $(
                                                    "#recurringmonthyearlyedit"
                                                ).hide();
                                                $(
                                                    "#recurringdayyearlyedit"
                                                ).hide();
                                            }

                                            if (
                                                data.set_reccuring_week_yearly ||
                                                data.set_reccuring_day_yearly ||
                                                data.set_reccuring_month_yearly2
                                            ) {
                                                $("#ontheyearlycheckedit").prop(
                                                    "checked",
                                                    true
                                                );
                                                $(
                                                    "#recurringselectyearlyedit"
                                                ).show();
                                                $(
                                                    "#recurringonthedayyearlyedit"
                                                ).show();
                                                $(
                                                    "#recurringontheofedit"
                                                ).show();
                                                $(
                                                    "#recurringonthemonthyearlyedit"
                                                ).show();
                                            } else {
                                                $("#ontheyearlycheckedit").prop(
                                                    "checked",
                                                    false
                                                );
                                                $(
                                                    "#recurringselectyearlyedit"
                                                ).hide();
                                                $(
                                                    "#recurringonthedayyearlyedit"
                                                ).hide();
                                                $(
                                                    "#recurringontheofedit"
                                                ).hide();
                                                $(
                                                    "#recurringonthemonthyearlyedit"
                                                ).hide();
                                            }
                                        }
                                    } else {
                                        $("#setrecurringmontlyedit").hide();
                                        $("#ondayselectedit").hide();
                                        $("#setrecurringonmontlyedit").hide();
                                        $("#setrecurringyearlyedit").hide();
                                        $(
                                            "#setrecurringontheyearlyedit"
                                        ).hide();
                                    }
                                } else {
                                    $("#addeventalldayedit").prop(
                                        "checked",
                                        true
                                    );
                                    $("#addeventrecurringedit").prop(
                                        "checked",
                                        true
                                    );

                                    var recurringDisplay = $(
                                        "#addneweventrecurringedit"
                                    ).css("display");

                                    if (recurringDisplay == "none") {
                                        $("#addneweventrecurringedit").css(
                                            "display",
                                            "block"
                                        );
                                    } else {
                                        $("#addneweventrecurringedit").css(
                                            "display",
                                            "none"
                                        );
                                    }

                                    if (data.recurring) {
                                        if (
                                            data.recurring == 1 ||
                                            data.recurring == 2 ||
                                            data.recurring == 3
                                        ) {
                                            var setRecurringDisplay = $(
                                                "#addneweventsetreccurringedit"
                                            ).css("display");

                                            if (setRecurringDisplay == "none") {
                                                $(
                                                    "#addneweventsetreccurringedit"
                                                ).css("display", "block");
                                            } else {
                                                $(
                                                    "#addneweventsetreccurringedit"
                                                ).css("display", "none");
                                            }
                                        } else if (data.recurring == 4) {
                                            var setRecurringDisplay = $(
                                                "#setrecurringmontlyedit"
                                            ).css("display");
                                            // alert(setRecurringDisplay);
                                            if (setRecurringDisplay == "none") {
                                                if (
                                                    data.set_reccuring_date_month
                                                ) {
                                                    $("#ondaycheckedit").prop(
                                                        "checked",
                                                        true
                                                    );
                                                } else {
                                                    $("#ondaycheckedit").prop(
                                                        "checked",
                                                        false
                                                    );
                                                }

                                                if (
                                                    data.set_reccuring_week_month ||
                                                    data.set_reccuring_day_month
                                                ) {
                                                    $("#onthecheckedit").prop(
                                                        "checked",
                                                        true
                                                    );
                                                    $(
                                                        "#recurringselectontheedit"
                                                    ).show();
                                                    $(
                                                        "#recurringselectwhatdayedit"
                                                    ).show();
                                                } else {
                                                    $("#onthecheckedit").prop(
                                                        "checked",
                                                        false
                                                    );
                                                    $(
                                                        "#recurringselectontheedit"
                                                    ).hide();
                                                    $(
                                                        "#recurringselectwhatdayedit"
                                                    ).hide();
                                                }

                                                $(
                                                    "#setrecurringmontlyedit"
                                                ).css("display", "block");

                                                $("#ondayselectedit").show();
                                                $(
                                                    "#setrecurringonmontlyedit"
                                                ).css("display", "block");
                                            } else {
                                                $(
                                                    "#setrecurringmontlyedit"
                                                ).hide();
                                                $("#ondayselectedit").hide();
                                                $(
                                                    "#setrecurringonmontlyedit"
                                                ).hide();
                                            }
                                        } else if (data.recurring == 5) {
                                            $("#setrecurringyearlyedit").show();
                                            $(
                                                "#setrecurringontheyearlyedit"
                                            ).show();

                                            if (
                                                data.set_reccuring_month_yearly ||
                                                data.set_reccuring_date_yearly
                                            ) {
                                                $("#ondayyearlycheckedit").prop(
                                                    "checked",
                                                    true
                                                );
                                                $(
                                                    "#recurringmonthyearlyedit"
                                                ).show();
                                                $(
                                                    "#recurringdayyearlyedit"
                                                ).show();
                                            } else {
                                                $("#ondayyearlycheckedit").prop(
                                                    "checked",
                                                    false
                                                );
                                                $(
                                                    "#recurringmonthyearlyedit"
                                                ).hide();
                                                $(
                                                    "#recurringdayyearlyedit"
                                                ).hide();
                                            }

                                            if (
                                                data.set_reccuring_week_yearly ||
                                                data.set_reccuring_day_yearly ||
                                                data.set_reccuring_month_yearly2
                                            ) {
                                                $("#ontheyearlycheckedit").prop(
                                                    "checked",
                                                    true
                                                );
                                                $(
                                                    "#recurringselectyearlyedit"
                                                ).show();
                                                $(
                                                    "#recurringonthedayyearlyedit"
                                                ).show();
                                                $(
                                                    "#recurringontheofedit"
                                                ).show();
                                                $(
                                                    "#recurringonthemonthyearlyedit"
                                                ).show();
                                            } else {
                                                $("#ontheyearlycheckedit").prop(
                                                    "checked",
                                                    false
                                                );
                                                $(
                                                    "#recurringselectyearlyedit"
                                                ).hide();
                                                $(
                                                    "#recurringonthedayyearlyedit"
                                                ).hide();
                                                $(
                                                    "#recurringontheofedit"
                                                ).hide();
                                                $(
                                                    "#recurringonthemonthyearlyedit"
                                                ).hide();
                                            }
                                        }
                                    } else {
                                        $("#setrecurringmontlyedit").hide();
                                        $("#ondayselectedit").hide();
                                        $("#setrecurringonmontlyedit").hide();
                                        $("#setrecurringyearlyedit").hide();
                                        $(
                                            "#setrecurringontheyearlyedit"
                                        ).hide();
                                    }
                                }
                            }
                            console.log(
                                120 != parseInt($("#user_id_event").val())
                            );
                            if (
                                data.user_id !=
                                parseInt($("#user_id_event").val())
                            ) {
                                document.getElementById(
                                    "deleteEventButton"
                                ).disabled = true;
                                document.getElementById(
                                    "updateEventButton"
                                ).disabled = true;
                            } else {
                                document.getElementById(
                                    "deleteEventButton"
                                ).disabled = false;
                                document.getElementById(
                                    "updateEventButton"
                                ).disabled = false;
                            }

                            if (data.priority == "low") {
                                $("#inlineRadio11").prop("checked", true);
                            } else if (data.priority == "medium") {
                                $("#inlineRadio22").prop("checked", true);
                            } else if (data.priority == "high") {
                                $("#inlineRadio33").prop("checked", true);
                            }

                            $("#addneweventselectrecurringedit").prop(
                                "checked",
                                data.priority
                            );

                            $("#addneweventselectrecurringedit").val(
                                data.recurring
                            );

                            if (data.set_reccuring) {
                                var set_recurring =
                                    data.set_reccuring.split(",");
                                // console.log(set_recurring);

                                for (let i = 0; i < set_recurring.length; i++) {
                                    const dataSetRecurring = set_recurring[i];
                                    if (dataSetRecurring == "sunday") {
                                        $("#sunedit").prop("checked", true);
                                    }

                                    if (dataSetRecurring == "monday") {
                                        $("#monedit").prop("checked", true);
                                    }

                                    if (dataSetRecurring == "sunday") {
                                        $("#sunedit").prop("checked", true);
                                    }

                                    if (dataSetRecurring == "tuesday") {
                                        $("#tueedit").prop("checked", true);
                                    }

                                    if (dataSetRecurring == "wednesda") {
                                        $("#wededit").prop("checked", true);
                                    }

                                    if (dataSetRecurring == "thursday") {
                                        $("#thuedit").prop("checked", true);
                                    }

                                    if (dataSetRecurring == "friday") {
                                        $("#friedit").prop("checked", true);
                                    }

                                    if (dataSetRecurring == "saturday") {
                                        $("#satedit").prop("checked", true);
                                    }
                                }
                            }

                            if (data.reminder) {
                                $("#addeventreminderedit").show();
                            } else {
                                $("#addeventreminderedit").hide();
                            }

                            $("#set_reccuring_date_month").val(
                                data.set_reccuring_date_month
                            );
                            $("#set_reccuring_day_month").val(
                                data.set_reccuring_day_month
                            );

                            $("#set_reccuring_month_yearly").val(
                                data.set_reccuring_month_yearly
                            );

                            $("#set_reccuring_date_yearly").val(
                                data.set_reccuring_date_yearly
                            );
                            $("#set_reccuring_week_yearly").val(
                                data.set_reccuring_week_yearly
                            );
                            $("#set_reccuring_day_yearly").val(
                                data.set_reccuring_day_yearly
                            );
                            $("#set_reccuring_month_yearly2").val(
                                data.set_reccuring_month_yearly2
                            );
                            $("#set_reccuring_week_month").val(
                                data.set_reccuring_week_month
                            );
                            $("#addneweventprojectlocsearchedit").val(
                                data.location
                            );
                            $("#addneweventselectprojectedit").picker(
                                "set",
                                data.project_id
                            );

                            $("#durationeditevent").val(data.duration);

                            // $("#addneweventparticipantedit").picker('remove', 114);
                            // $("#addneweventparticipantedit").picker('remove', 113);
                            // $("#addneweventparticipantedit").picker('remove', 112);

                            // console.log(data.participant);

                            // participants = data.participant.split(",");
                            // for (let i = 0; i < participants.length; i++) {
                            //     const participant = participants[i];
                            //     $("#addneweventparticipantedit").picker('set', participant);

                            // }

                            $("#descE").val(data.desc);
                            $("#addeventreminderedit").val(data.reminder);
                            if (data.file_upload) {
                                $("#fileView").html(
                                    '<a href="/storage/' +
                                        data.file_upload +
                                        '" target="_blank"> click here to view file.</a>'
                                );
                            }
                            $("#idEvent").val(data.id);
                        });

                        $("#editeventmodal").modal("show");
                    }
                },
                buttonText: {
                    today: "Today",
                    month: "Month",
                    week: "Week",
                    day: "Day",
                    list: "List",
                },
                initialView: "dayGridMonth",
                editable: false,
                droppable: false,
                selectable: true,
                themeSystem: "bootstrap",
                views: {
                    timeGrid: {
                        eventLimit: 6, // adjust to 6 only for timeGridWeek/timeGridDay
                    },
                },

                events: dataHoliday,
            });

            calendar.render();
        });
    };

    // declare the CSS style for appealaddb
    var appealAddButtonStyle = {
        position: 'absolute',
        left: 'auto',
        right: 'auto',
        top: '0',
        'z-index': '999',
        'background-color': 'white',
        'color': 'red'
    };

    // create the button
    var appealaddb = $('<button/>', {
        text: 'Appeal',
        class: 'btn btn-primary appeal-add-button',
        click: function () {
            // some code
        }
    });

    var Calendar = (function () {
        "use strict";
        return {
            //main function
            init: function () {
                handleCalendarDemo();
            },
        };
    })();

    $(document).ready(function () {
        Calendar.init();
    });

    //  FOR MODAL LOG AND EVENT
    // $("#dateaddlog").datepicker({
    //     todayHighlight: true,
    //     autoclose: true,
    //     format: 'yyyy-mm-dd'
    // });



    $(function() {
        // Initialize Datepicker
        $("#dateaddlog").datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
            startDate: new Date(new Date().getTime() - 2 * 24 * 60 * 60 * 1000), // two days ago
            endDate: new Date(), // Disable future dates
        });

        // Set the minimum and maximum dates to restrict the date range that can be selected
        $("#dateaddlog").datepicker(
            "setStartDate",
            new Date(new Date().getTime() - 2 * 24 * 60 * 60 * 1000)
        );
        $("#dateaddlog").datepicker("setEndDate", new Date());
    });

    // $("#starteventdate")
    //     .datepicker({
    //         format: "yyyy/mm/dd",
    //         todayHighlight: true,
    //         autoclose: true,
    //     })
    //     .datepicker("setDate", new Date());

    // $("#endeventdate")
    //     .datepicker({
    //         format: "yyyy/mm/dd",
    //         todayHighlight: true,
    //         autoclose: true,
    //     })
    //     .datepicker("setDate", new Date());

    $("#starteventdate")
    .datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    })
    .on("changeDate", function (e) {
        // Set the end datepicker's date to the selected start date
        $("#endeventdate").datepicker("update", e.date);

        // Set the minimum date for the end datepicker to the selected start date
        $("#endeventdate").datepicker("setStartDate", e.date);
    });

$("#endeventdate").datepicker({
    format: "yyyy/mm/dd", // Sets the date format to 'day/month/year'
    autoclose: true, // Closes the datepicker on selection
});

    // $('#projectLocationOffice').picker({ search: true });
    // $('#activityOffice').picker({ search: true });
    // $('#activity_name_edit').picker({ search: true });
    // $('#projectlocsearch').picker({ search: true });
    // $('#activity_names').picker({ search: true });
    $("#addneweventprojectlocsearch").picker({ search: true });
    $("#addneweventparticipant").picker({ search: true });
    // $('#addneweventparticipant').selectpicker();
    // $('#addneweventparticipant').chosen({
    //     placeholder_text_multiple: 'Select participants'
    // });
    $("#addneweventselectproject").picker({ search: true });
    $(function () {
        $("#starttime").mdtimepicker({
            showMeridian: true,
        });
    
        var now = new Date();
        var hours = now.getHours();
        var meridian = hours >= 12 ? "PM" : "AM";
        hours = hours % 12;
        hours = hours ? hours : 12; // convert 0 to 12
        var minutes = now.getMinutes();
    
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
    
        $("#starttime").val(hours + ":" + minutes + " " + meridian);
    
        $("#endtime").mdtimepicker({
            showMeridian: true,
        });
    
        var startMoment = moment($("#starttime").val(), "hh:mm A");
        var endMoment = startMoment.clone().add(1, 'hour');
    
        var hours = endMoment.hours();
        var meridian = hours >= 12 ? "PM" : "AM";
        hours = hours % 12;
        hours = hours ? hours : 12; // convert 0 to 12
        var minutes = endMoment.minutes();
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        $("#endtime").val(hours + ":" + minutes + " " + meridian);
    
        $("#daystart,#dayend")
            .datepicker({
                format: "yyyy/mm/dd",
            })
            .datepicker("setDate", "now");
    
        $("#daystartedit,#dayendedit")
            .datepicker({
                format: "yyyy/mm/dd",
            })
            .datepicker("setDate", "now");
    
        $("#starteventtime,#endeventtime").mdtimepicker({});
    
        $("#starttime").change(function () {
            var startMoment = moment($("#starttime").val(), "hh:mm A");
            var endMoment = startMoment.clone().add(1, 'hour');
    
            var hours = endMoment.hours();
            var meridian = hours >= 12 ? "PM" : "AM";
            hours = hours % 12;
            hours = hours ? hours : 12; // convert 0 to 12
            var minutes = endMoment.minutes();
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            $("#endtime").val(hours + ":" + minutes + " " + meridian);
        });
    
        $("#endtime").change(function () {
            var startTime = moment($("#starttime").val(), "hh:mm A");
            var endTime = moment($("#endtime").val(), "hh:mm A");
        
            if (endTime.isBefore(startTime)) {
                Swal.fire({
                    icon: "error",
                    title: "Invalid Time Range",
                    text: "End time cannot be before the start time.",
                }).then(() => {
                    $("#endtime").val("");
                    $("#logduration").val("");
                    $("#endtime").attr("placeholder", "End Time"); // Set the placeholder for the end time field
                    $("#endtime").mdtimepicker("toggle");
                     // Close the time picker
                });
            }
        });
        
    });
    

    // $(document).on('change', "#typeoflog", function() {
    //     if ($(this).val() == "1") {
    //         $("#activityByProjectHide").show();
    //         $("#officelog").hide();
    //         $("#myproject").hide();
    //         $("#locationByProjectHide").hide();

    //     } else if ($(this).val() == "2") {
    //         $("#officelog").show();
    //         $("#activityByProjectHide").hide();
    //         $("#myproject").hide();

    //     } else if ($(this).val() == "3") {
    //         $("#myproject").show();
    //         $("#activityByProjectHide").show();
    //         $("#locationByProjectHide").show();

    //     } else if ($(this).val() == "4") {
    //         $("#activityByProjectHide").show();
    //         $("#officelog").hide();
    //         $("#myproject").hide();
    //         $("#locationByProjectHide").hide();
    //     // } else {
    //     //     $("#activityByProjectHide").hide();
    //     //     $("#officelog").hide();

    //     }
    // });

    $(document).on("change", "#typeoflog", function () {
        if ($(this).val() == "2") {
            $("#officelog").show();
            $("#activity_names").val("");
            $("#activityOffice").val("");
            $("#projectlocsearch").val("");
            $("#projectLocationOffice").val("");
        } else {
            $("#officelog").hide();
            $("#listproject").hide();
            $("#activity_names").val("");
            $("#activityOffice").val("");
            $("#projectlocsearch").val("");
            $("#projectLocationOffice").val("");
        }
    });
    $(document).on("change", "#typeoflog", function () {
        if ($(this).val() == "3") {
            $("#myproject").show();
            $("#activityByProjectHide").show();
            $("#locationByProjectHide").show();
            $("#locationByProjectHide").show();
            $("#activity_names").val("");
            $("#activityOffice").val("");
            $("#projectlocsearch").val("");
            $("#projectLocationOffice").val("");

            // $("#activity_locationadd").show();
        } else {
            $("#activityByProjectEditHide1").show();
            $("#myproject").hide();
            $("#listproject").hide();
            // $("#activity_locationadd").hide();
            $("#activityByProjectHide").show();
            $("#locationByProjectHide").hide();
            // $("#activityLogs").show();
            $("#activityByProjectShow").hide();
            $("#locationByProjectShow").hide();
            $("#activity_names").val("");
            $("#activityOffice").val("");
            $("#projectlocsearch").val("");
            $("#projectLocationOffice").val("");
        }
    });

    // $(document).on('change', "#typeoflog", function() {
    //     if ($(this).val() == "1" || $(this).val() == "4") {

    //         $("#activity_locationadd").show();
    //     } else {
    //         $("#activity_locationadd").show();

    //     }
    // });

    $(document).on("change", "#officelog2", function () {
        if ($(this).val() == "1") {
            $("#listproject").show();
            $("#activityByProjectHide").hide();
            $("#activityByProjectShow").show();
            $("#locationByProjectShow").show();
            $("#activity_names").val("");
            $("#activityOffice").val("");
            $("#projectlocsearch").val("");
            $("#projectLocationOffice").val("");
        } else if ($(this).val() == "2") {
            $("#activityByProjectHide").show();
            $("#listproject").hide();
            $("#activityByProjectShow").hide();
            $("#locationByProjectShow").hide();
            $("#activity_names").val("");
            $("#activityOffice").val("");
            $("#projectlocsearch").val("");
            $("#projectLocationOffice").val("");
        }
        // else {
        //     $("#listproject").hide();
        //     $("#activityByProjectHide").show();
        //     $("#locationByProjectHide").hide();

        // }
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
        if (
            $(this).val() == "1" ||
            $(this).val() == "2" ||
            $(this).val() == "3"
        ) {
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
    // END MODAL LOG AND EVENT JS

    //  START EDIT MODAL LOG AND EVENT JS
    $("#dateaddlogedit").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
        startDate: new Date(new Date().getTime() - 2 * 24 * 60 * 60 * 1000), // one days ago
        endDate: null, // No end date
    });
    $("#starteventdateedit").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
    $("#endeventdateedit").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
    // $('#projectlocsearchedit').picker({ search: true });
    $("#addneweventprojectlocsearchedit").picker({ search: true });
    $("#addneweventparticipantedit").picker({ search: true });
    $("#addneweventselectprojectedit").picker({ search: true });

    $("#starttimeedit").mdtimepicker({
        showMeridian: false,
    });
    $("#endtimeedit").mdtimepicker({
        showMeridian: false,
    });

    $("#starteventtimeedit").mdtimepicker({
        showMeridian: false,
    });
    $("#endeventtimeedit").mdtimepicker({
        showMeridian: false,
    });

    $(document).on("change", "#typeoflogedit", function () {
        if ($(this).val() == "2") {
            $("#officelogedit").show();
            // $("#project_id_edit").hide();
            // $("#locationByProjectEditHide").show();
        } else {
            $("#officelogedit").hide();
            $("#listprojectedit").hide();
            // $("#locationByProjectEditHide").hide();
        }
    });
    $(document).on("change", "#typeoflogedit", function () {
        if ($(this).val() == "3") {
            $("#myprojectedit").show();
            // $("#typeoflogedit").show();
            // $("#activity_location_edit").show();
            // $("#activityByProjectEditHide").hide();
            $("#activityByProjectEditHide").show();
            $("#locationByProjectEditHide").show();
            $("#activityByProjectEditHide1").show();
            $("#locationByProjectEditShow").show();
        } else {
            $("#myprojectedit").hide();
            $("#listprojectedit").hide();
            // $("#typeoflogedit").hide();
            // $("#activity_location_edit").hide();
            $("#activityByProjectEditHide").show();
            $("#locationByProjectEditHide").hide();
        }
    });
    $(document).on("change", "#officelog2edit", function () {
        if ($(this).val() == "1") {
            $("#myprojectedit").show();
            $("#activityByProjectEditHide").hide();

            // $("#activityByProjectEditShow").show();
            // $("#locationByProjectEditHide").show();
        } else if ($(this).val() == "2") {
            $("#activityByProjectEditHide").show();
            $("#myprojectedit").hide();
            // $("#myprojectedit").hide();
            // $("#locationByProjectEditHide").hide();
        }
        // } else {
        //     $("#myprojectedit").hide();
        //     $("#activityByProjectEditHide").hide();
        //     $("#locationByProjectEditHide").hide();

        // }
    });

    $(document).on("change", "#addneweventselectrecurringedit", function () {
        if ($(this).val() == "1") {
            $("#addneweventsetreccurringedit").show();
            $("#monedit").not(this).prop("checked", true);
            $("#tueedit").not(this).prop("checked", true);
            $("#wededit").not(this).prop("checked", true);
            $("#thuedit").not(this).prop("checked", true);
            $("#friedit").not(this).prop("checked", true);
        } else {
            $("#addneweventsetreccurringedit").hide();
            $("#monedit").not(this).prop("checked", false);
            $("#tueedit").not(this).prop("checked", false);
            $("#wededit").not(this).prop("checked", false);
            $("#thuedit").not(this).prop("checked", false);
            $("#friedit").not(this).prop("checked", false);
        }
    });
    $(document).on("change", "#addneweventselectrecurringedit", function () {
        if (
            $(this).val() == "1" ||
            $(this).val() == "2" ||
            $(this).val() == "3"
        ) {
            $("#addneweventsetreccurringedit").show();
        } else {
            $("#addneweventsetreccurringedit").hide();
        }
    });
    $(document).on("change", "#addneweventselectrecurringedit", function () {
        if ($(this).val() == "4") {
            $("#setrecurringmontlyedit").show();
            $("#setrecurringonmontlyedit").show();
        } else {
            $("#setrecurringmontlyedit").hide();
            $("#setrecurringonmontlyedit").hide();
        }
    });
    $(document).on("change", "#addneweventselectrecurringedit", function () {
        if ($(this).val() == "5") {
            $("#setrecurringyearlyedit").show();
            $("#setrecurringontheyearlyedit").show();
        } else {
            $("#setrecurringyearlyedit").hide();
            $("#setrecurringontheyearlyedit").hide();
        }
    });
    $().ready = (function () {
        $("#addreminderedit").click(function () {
            $("#addeventreminderedit").toggle();
        });
    })();

    $("#addeventrecurringedit").click(function () {
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

    $("#ondaycheckedit").click(function () {
        if ($(this).is(":checked")) {
            $("#ondayselectedit").show();
            $("#onthecheckedit").not(this).prop("checked", false);
            $("#recurringselectwhatdayedit").hide();
            $("#recurringselectontheedit").hide();
        } else {
            $("#ondayselectedit").hide();
        }
    });
    $("#onthecheckedit").click(function () {
        if ($(this).is(":checked")) {
            $("#recurringselectwhatdayedit").show();
            $("#recurringselectontheedit").show();
            $("#ondaycheckedit").not(this).prop("checked", false);
            $("#ondayselectedit").hide();
        } else {
            $("#recurringselectwhatdayedit").hide();
            $("#recurringselectontheedit").hide();
        }
    });
    $("#ondayyearlycheckedit").click(function () {
        if ($(this).is(":checked")) {
            $("#recurringmonthyearlyedit").show();
            $("#recurringdayyearlyedit").show();
            $("#ontheyearlycheckedit").not(this).prop("checked", false);
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
    $("#ontheyearlycheckedit").click(function () {
        if ($(this).is(":checked")) {
            $("#recurringselectyearlyedit").show();
            $("#recurringonthedayyearlyedit").show();
            $("#recurringonthemonthyearlyedit").show();
            $("#recurringontheofedit").show();
            $("#ondayyearlycheckedit").not(this).prop("checked", false);
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
    $(document).on("click", "#submitTimesheetApproval", function () {
        userId = $("#userIdForApproval").val();
        // alert(userId);
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/submitForApproval/" + userId,
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
    });

    $("#logduration,#daystart,#dayend,#starttime,#endtime").change(function () {
        var startdt = new Date(
            $("#daystart").val() + " " + $("#starttime").val()
        );
        var enddt = new Date($("#dayend").val() + " " + $("#endtime").val());
        var diff = enddt - startdt;
        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        diff -= days * (1000 * 60 * 60 * 24);
        var hours = Math.floor(diff / (1000 * 60 * 60));
        diff -= hours * (1000 * 60 * 60);
        var mins = Math.floor(diff / (1000 * 60));
        diff -= mins * (1000 * 60);
        $("#logduration").val(
            days + " days : " + hours + " hours : " + mins + " minutes "
        );
    });

    // Trigger the change event on page load to update the duration initially
    $(document).ready(function () {
        $("#logduration").trigger("change");
    });

    calculateDuration();

    // $('#hidestart, #hideend').hide();

    // $('#alldayc').change(function() {
    //     if (this.checked) {
    //         $('#hidestart, #hideend').hide();
    //         $('#starteventtime').val("00:00 AM");
    //         $('#endeventtime').val("11:59 PM");
    //     } else {
    //         $('#hidestart, #hideend').show();
    //         $('#starteventtime').val("00:00 AM");
    //         $('#endeventtime').val("11:59 PM");
    //     }
    // });

    $("#addeventalldayedit").change(function () {
        if (this.checked) {
            $("#hideshowstarttimee, #hideshowendtimee").hide();
            $("#starteventtimeedit").val("00:00 AM");
            $("#endeventtimeedit").val("11:59 PM");
        } else {
            $("#hideshowstarttimee, #hideshowendtimee").show();
            // $('#starteventtimeedit').val("00:00 AM");
            // $('#endeventtimeedit').val("11:59 PM");
        }
    });
});

$(
    "#duration,#starteventdate,#starteventtime,#endeventdate,#endeventtime"
).focus(function () {
    calculateDuration();
});

//update total duration
function calculateDuration() {
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

    $("#duration").val(
        days + " days : " + hours + " hours : " + mins + " minutes "
    );
}

//edit event modal mytimesheet
$(
    "#durationeditevent,#starteventdateedit,#endeventdateedit,#starteventtimeedit,#endeventtimeedit"
).change(function () {
    var startdt = new Date(
        $("#starteventdateedit").val() + " " + $("#starteventtimeedit").val()
    );

    var enddt = new Date(
        $("#endeventdateedit").val() + " " + $("#endeventtimeedit").val()
    );

    var diff = enddt - startdt;

    var days = Math.floor(diff / (1000 * 60 * 60 * 24));
    diff -= days * (1000 * 60 * 60 * 24);

    var hours = Math.floor(diff / (1000 * 60 * 60));
    diff -= hours * (1000 * 60 * 60);

    var mins = Math.floor(diff / (1000 * 60));
    diff -= mins * (1000 * 60);

    console.log(days + ":" + hours);
    $("#durationeditevent").val(
        days + " days : " + hours + " hours : " + mins + " minutes "
    );
});
// });// });

$(document).on("click", "#confirmsubmitb", function () {
    var id = $(this).data("id");
    var vehicleData = getConfirmSubmit(id);

    vehicleData.then(function (data) {
        var year = data.date.substr(0, 4);
        var month = data.date.substr(5, 2);
    });
    $("#confirmsubmit").modal("show");
});


function getConfirmSubmit(id) {
    return $.ajax({
        url: "/getConfirmSubmitById/" + id,
    });
}

function toggleVenueLocation() {
    var venue = document.getElementById("venueaddpehal");
    var location = document.getElementById("locationaddevent1");
    if (venue.style.display === "block") {
        location.style.display = "none";
    } else {
        location.style.display = "block";
    }
}

// call toggleVenueLocation on page load to initialize the visibility of the elements
toggleVenueLocation();

// call toggleVenueLocation whenever #venueaddpehal's display property changes
var venue = document.getElementById("venueaddpehal");
var observer = new MutationObserver(toggleVenueLocation);
observer.observe(venue, { attributes: true, attributeFilter: ["style"] });
