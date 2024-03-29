//js dah working
$(document).ready(function () {
    var weekend1ifany;
    var weekend2ifany;
    var weekend3ifany;
    var weekend4ifany;
    var weekend5ifany;
    var weekend6ifany;
    var weekend7ifany;

    var dayone;
    var daytwo;
    var daythree;
    var dayfour;
    var dayfive;
    var daysix;
    var dayseven;

    var totalhourday1;
    var totalhourday2;
    var totalhourday3;
    var totalhourday4;
    var totalhourday5;
    var totalhourday6;
    var totalhourday7;

    function getWorkingHourWeekendbyState(stateid) {
    return $.ajax({
        url: "/getWorkingHourWeekendbyState/" + stateid,
    });
    }

    var idwork = $("#state_id").val();

    var joineddate = $("#joinneddate").val();
    // console.log(joineddate);

    getwork = getWorkingHourWeekendbyState(idwork);

    getwork.then(function(data) {
    var days = {};
    for (var i = 0; i < data.length; i++) {
        var workdata = data[i];
        var dayNumber = i + 1;
        var dayKey = 'day' + dayNumber;
        if (workdata.start_time === null) {
        days[dayKey] = workdata.day_of_week;
        }
    }

    // Store defined values in separate variables
   weekend1ifany = days.hasOwnProperty('day1') ? days.day1 : null;
   weekend2ifany = days.hasOwnProperty('day2') ? days.day2 : null;
   weekend3ifany = days.hasOwnProperty('day3') ? days.day3 : null;
   weekend4ifany = days.hasOwnProperty('day4') ? days.day4 : null;
   weekend5ifany = days.hasOwnProperty('day5') ? days.day5 : null;
   weekend6ifany = days.hasOwnProperty('day6') ? days.day6 : null;
   weekend7ifany = days.hasOwnProperty('day7') ? days.day7 : null;
  
   var startDate = getStartDate();
    $("#dateaddlog").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
        startDate: startDate,  // Set the start date dynamically
        endDate: new Date(), // Disable future dates
        beforeShowDay: function(date) {
            // Enable all weekends (Saturday and Sunday), regardless of the range
            if (date.getDay() == weekend1ifany || date.getDay() == weekend2ifany ||
            date.getDay() == weekend3ifany || date.getDay() == weekend4ifany ||
            date.getDay() == weekend5ifany || date.getDay() == weekend6ifany ||
            date.getDay() == weekend7ifany
            ) {
                return true;
            }
    
            // Enable all dates within the range
            if (date >= startDate && date <= new Date()) {
                return true;
            }
    
            // Disable all other dates
            return false;
        }
      
    });

    function getStartDate() {
        var currentDate = new Date();
        var dayOfWeek = currentDate.getDay(); // Sunday = 0, Monday = 1, ..., Saturday = 6
        var daysToSubtract = 2;

        const today = dayjs();

        var daystominus = -2;

        var currentDayOfWeek = today.day();

        var checkweekendv = [weekend1ifany, weekend2ifany, weekend3ifany, weekend4ifany, weekend5ifany, weekend6ifany, weekend7ifany];

        // Filter out null values
        var resultchw = checkweekendv.filter(function(value) {
        return value !== null;
        });

        // Sort the filtered values in ascending order
        resultchw.sort(function(a, b) {
        return a - b;
        });

            var lowestValue = parseInt(resultchw[0]);

            var secondLowestValue = parseInt(resultchw[1]);

        // Modify lowestValue and secondLowestValue based on conditions
        if (lowestValue >= 0 && lowestValue <= 7) {
        lowestValue = lowestValue + 1;
        }
        else
        lowestValue = 0;

        if (secondLowestValue >= 0 && secondLowestValue <= 5) {
        secondLowestValue = secondLowestValue + 2;
        }
        else if(secondLowestValue == 6) {
            secondLowestValue = 2;
        }
        else if(secondLowestValue == 7) {
            secondLowestValue = 3;
        }

        if (dayOfWeek === 0 || dayOfWeek === 6) {
            return currentDate; // Return the current date (enable today)
        }

        // Check if the current day is Saturday (6) or Sunday (0)
        if (currentDayOfWeek === lowestValue || currentDayOfWeek === secondLowestValue) {
            var daysToSubtract = 4;
        }

        var startDate = new Date(currentDate.getTime() - daysToSubtract * 24 * 60 * 60 * 1000);
        // return startDate;
    }

    // Set the minimum and maximum dates to restrict the date range that can be selected
    $("#dateaddlog").datepicker("setStartDate", startDate);
    $("#dateaddlog").datepicker("setEndDate", new Date());

});

getwork.then(function(data) {
    var days = {};
    for (var i = 0; i < data.length; i++) {
      var workdata = data[i];
      var dayNumber = i + 1;
      var dayKey = 'day' + dayNumber;
  
      days[dayKey] = {
        day_of_week: workdata.day_of_week,
        total_hour: workdata.total_time
      };
    }
  
    // Extract day_of_week and total_hour into separate variables
     dayone = days.hasOwnProperty('day1') ? days.day1.day_of_week : null;
     daytwo = days.hasOwnProperty('day2') ? days.day2.day_of_week : null;
     daythree = days.hasOwnProperty('day3') ? days.day3.day_of_week : null;
     dayfour = days.hasOwnProperty('day4') ? days.day4.day_of_week : null;
     dayfive = days.hasOwnProperty('day5') ? days.day5.day_of_week : null;
     daysix = days.hasOwnProperty('day6') ? days.day6.day_of_week : null;
     dayseven = days.hasOwnProperty('day7') ? days.day7.day_of_week : null;
  
     totalhourday1 = days.hasOwnProperty('day1') ? days.day1.total_hour : null;
     totalhourday2 = days.hasOwnProperty('day2') ? days.day2.total_hour : null;
     totalhourday3 = days.hasOwnProperty('day3') ? days.day3.total_hour : null;
     totalhourday4 = days.hasOwnProperty('day4') ? days.day4.total_hour : null;
     totalhourday5 = days.hasOwnProperty('day5') ? days.day5.total_hour : null;
     totalhourday6 = days.hasOwnProperty('day6') ? days.day6.total_hour : null;
     totalhourday7 = days.hasOwnProperty('day7') ? days.day7.total_hour : null;

  });
    
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


            if ($("#typeoflog").val() == "2") {
                $("#locationByProjectShow").show();
            }
            else if ($("#typeoflog").val() == "1") {
                $("#locationByProjectShow").hide();
            }
            // $("#locationByProjectShow").show();


            $("#activityByProjectShow").show();
            $("#activityByProjectHide").hide();

            $("#projectLocationOffice").find("option").remove().end();

            $("#activityOffice").find("option").remove().end();

            $("#activityLogs").find("option").remove().end();

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
            
            $("#activityByProjectEditHide1").hide();
            // $("#activityByProjectEditHide").hide();
            $("#activityByProjectEditShow").show();
            $("#locationByProjectEditShow").show();
            $("#locationByProjectEditHide").hide();

            $("#projectLocationOfficeEdit").find("option").remove().end();

            $("#activityOfficeEdit").find("option").remove().end();

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
                // activity_name: "required",
                activity_office: "required",
                start_time: "required",
                project_location: "required",
                project_location_office: "required",
                end_time: "required",
                lunch_break: "required",
                
            },

            messages: {
                type_of_log: "Please Choose Type of Log",
                date: "Please Choose  Date",
                office_log: "Please Choose Office Log",
                project_id: "Please Choose Project",
                office_log_project: "Please Choose Project",
                // activity_name: "Please Choose Activity Name",
                activity_office: "Please Choose Activity Name",
                start_time: "Please Choose Start Time",
                project_location: "Please Choose Project Location",
                project_location_office: "Please Choose Project Location",
                end_time: "Please Choose End Time",
                lunch_break: "Please Choose Lunch Break",
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
                // activity_name: "required",
                activity_office: "required",
                start_time: "required",
                project_location: "required",
                project_location_office: "required",
                end_time: "required",
                lunch_break: "required",
                
            },

            messages: {
                type_of_log: "Please Choose Type of Log",
                date: "Please Choose  Date",
                office_log: "Please Choose Office Log",
                project_id: "Please Choose",
                office_log_project: "Please Choose",
                // activity_name: "Please Choose Activity Name",
                activity_office: "Please Choose Activity Name",
                start_time: "Please  Choose Start Time",
                project_location: "Please Choose Project Location",
                project_location_office: "Please Choose Project Location",
                end_time: "Please Choose End Time",
                lunch_break: "Please Choose Lunch Break",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editLogForm")
                    );
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
            rules: {
                reason: "required" },

            messages: {
                reason: "Please Enter Reason"
            },
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

        function getApproverAppeal(id) {
            return $.ajax({
                url: "/getApproverAppeal",
            });
        }
        
        var approverUserId;

        function getApproverAppeal(id) {
            return $.ajax({
                url: "/getApproverAppeal",
            });
        }
        
        var approverUserId;
        
        getApproverAppeal().done(function (data) {
            approverUserId = data;
        });
        

        var timesheetData = getTimesheet();

        timesheetData.then(function (data) {
            // $('#userIdForApproval').val(data['events'][0]['user_id']);
            var event = [];
        for (let i = 0; i < data['events'].length; i++) {
            var events = data['events'][i];
            var startDate = new Date(events['start_date']);
            var startMonth = startDate.getMonth() + 1;
            startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
            var startYear = startDate.getFullYear();
            var startDay = startDate.getDate();
            startDay = startDay < 10 ? "0" + startDay : startDay;
            var startTime = events["start_time"];
            var time = startTime.split(":");
            startTime = time[0] < 10 ? "0" + startTime : startTime;

            var endDate = new Date(events['end_date']);
            var endMonth = endDate.getMonth() + 1;
            endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
            var endYear = endDate.getFullYear();
            var endDay = endDate.getDate();
            endDay = endDay < 10 ? "0" + endDay : endDay;
            var endTime = events['end_time'];
            time = endTime.split(":");
            endTime = time[0] < 10 ? "0" + endTime : endTime;

            event.push({
                title: "Event: " + events['event_name'] + "\n" + "from " + events['start_time'] + " to " + events['end_time'],
                start: startYear + '-' + startMonth + '-' + startDay,
                end: endYear + '-' + endMonth + '-' + endDay,
                start_time: events['start_time'],
                color: '#2AAA8A',
                extendedProps: {
                    type: 'event',
                    eventId: events['id']
                }
            });

        }    

        var eventattend = [];
        attendhour = [];
        for (let i = 0; i < data['eventsattends'].length; i++) {
            var events = data['eventsattends'][i];
            var startDate = new Date(events['start_date']);
            var startMonth = startDate.getMonth() + 1;
            startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
            var startYear = startDate.getFullYear();
            var startDay = startDate.getDate();
            startDay = startDay < 10 ? "0" + startDay : startDay;
            var startTime = events["start_time"];
            var time = startTime.split(":");
            startTime = time[0] < 10 ? "0" + startTime : startTime;

            var endDate = new Date(events['end_date']);
            var endMonth = endDate.getMonth() + 1;
            endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
            var endYear = endDate.getFullYear();
            var endDay = endDate.getDate();
            endDay = endDay < 10 ? "0" + endDay : endDay;
            var endTime = events['end_time'];
            time = endTime.split(":");
            endTime = time[0] < 10 ? "0" + endTime : endTime;

            eventattend.push({
                title: "Event: " + events['event_name'] + "\n" + "from " + events['start_time'] + " to " + events['end_time'] + " attend", 
                start: startYear + '-' + startMonth + '-' + startDay,
                end: endYear + '-' + endMonth + '-' + endDay,
                color: '#2AAA8A',
                start_time: events['start_time'],
                extendedProps: {
                    type: 'eventattend',
                    eventId: events['id']
                }
            });

            attendhour.push({
                start: new Date(startYear, startMonth - 1, startDay),
                end: new Date(endYear, endMonth - 1, endDay),
                totalHourAttend: events['duration'],
                eventid: events['id'],
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
                    title:(logs["type_of_log"] ? type_of_log(logs["type_of_log"]) + " " : "") +"\n" + (logs["project_name"] ? logs["project_name"] + " ": "") +
                    "\n" + (logs["activitynameas"] ? logs["activitynameas"] + " ": "") + "\n" + " from " + logs["start_time"] + " to " + logs["end_time"],
                    // start: startYear + '-' + startMonth + '-' + startDay + 'T' + startTime + ':00',
                    start: startYear + '-' + startMonth + '-' + startDay,
                    start_time: logs['start_time'],
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

            function resetTime(date) {
                date.setHours(0, 0, 0, 0);
                return date;
            }

            for (let i = 0; i < data["leaves"].length; i++) {
                var leaves = data["leaves"][i];
                
                var startDate = new Date(leaves["start_date"]);
                var endDate = new Date(leaves["end_date"]);
                
                // Calculate the number of days in the range
                var timeDifference = Math.abs(endDate.getTime() - startDate.getTime());
                var dayDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));
                
                for (let j = 0; j <= dayDifference; j++) { // <= to include the last day
                    var currentDay = new Date(startDate);
                    currentDay.setDate(currentDay.getDate() + j);
                    
                    var currentEndDay = new Date(currentDay);
                    currentEndDay.setDate(currentEndDay.getDate() + 1);  // Exclusive end date for each day

                    // Convert to YYYY-MM-DD format
                    var currentDayStr = currentDay.toISOString().split('T')[0];
                    var currentEndDayStr = currentEndDay.toISOString().split('T')[0];

                    leave.push({
                        title: leaves["leave_types"] + " : " + "\n" + leaves["reason"],
                        start: currentDayStr,
                        end: currentEndDayStr,
                        color: "#D9EDF7",
                        textColor: "black",
                        fontWeight: "bold",
                        extendedProps: {
                            type: "leave",
                            leaveId: leaves["id"],
                        },
                    });
                }

                leavesdate.push({
                    start: resetTime(startDate),
                    end: resetTime(endDate),
                });
            }

            var leaveHalf = [];
            var leavesdateHalf = [];
            var leavehalflist = [];

            function resetTime(date) {
                date.setHours(0, 0, 0, 0);
                return date;
            }

            for (let i = 0; i < data["leavesHalf"].length; i++) {
                var leavesHalf = data["leavesHalf"][i];
                // console.log(leavesHalf);
                
                var startDate = new Date(leavesHalf["start_date"]);
                var endDate = new Date(leavesHalf["end_date"]);
                
                // Calculate the number of days in the range
                var timeDifference = Math.abs(endDate.getTime() - startDate.getTime());
                var dayDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));
                
                for (let j = 0; j <= dayDifference; j++) { // <= to include the last day
                    var currentDay = new Date(startDate);
                    currentDay.setDate(currentDay.getDate() + j);
                    
                    var currentEndDay = new Date(currentDay);
                    currentEndDay.setDate(currentEndDay.getDate() + 1);  // Exclusive end date for each day

                    // Convert to YYYY-MM-DD format
                    var currentDayStr = currentDay.toISOString().split('T')[0];
                    var currentEndDayStr = currentEndDay.toISOString().split('T')[0];

                    leaveHalf.push({
                        title: leavesHalf["leave_types"] + " : " + "\n" + leavesHalf["reason"] +"\n" + "Half Day",
                        start: currentDayStr,
                        end: currentEndDayStr,
                        color: "#D9EDF7",
                        textColor: "black",
                        fontWeight: "bold",
                        extendedProps: {
                            type: "leave",
                            leaveId: leavesHalf["id"],
                        },
                    });
                }

                leavesdateHalf.push({
                    start: resetTime(startDate),
                    end: resetTime(endDate),
                });

                leavehalflist.push({
                    title: leavesHalf["start_date"],
                    start: currentDayStr,
                    end: currentEndDayStr,
                })
     
            }

            var holiday = [];
            var holidayDates = [];
            var rangeholiday = [];

            for (let i = 0; i < data['holidays'].length; i++) {
                var holidays = data['holidays'][i];
                var startDate = new Date(holidays['start_date']);
                var endDate = new Date(holidays["end_date"]);

                // Calculate the number of days in the holiday range
                var timeDifference = Math.abs(endDate.getTime() - startDate.getTime());
                var dayDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

                for (let j = 0; j <= dayDifference; j++) { // <= to include the last day
                    var currentDay = new Date(startDate);
                    currentDay.setDate(currentDay.getDate() + j);

                    var currentEndDay = new Date(currentDay);
                    currentEndDay.setDate(currentEndDay.getDate() + 1);  // Exclusive end date for each day

                    // Convert to YYYY-MM-DD format
                    var currentDayStr = currentDay.toISOString().split('T')[0];
                    var currentEndDayStr = currentEndDay.toISOString().split('T')[0];

                    holiday.push({
                        title: holidays["holiday_title"],
                        start: currentDayStr,
                        end: currentEndDayStr,
                        color: "#FFD480",
                        textColor: "black",
                        fontWeight: "bold",
                        extendedProps: {
                            type: "holiday",
                            holidayId: holidays["id"],
                        },
                    });
                }

                holidayDates.push({
                    title: holidays["holiday_title"],
                    start: resetTime(startDate),
                    end: resetTime(endDate),
                });

                rangeholiday.push({
                    start: resetTime(startDate),
                    end: resetTime(endDate),
                    startdateholidays: holidays['start_date'],
                    endateholidays: holidays['end_date'],
                });
            }

            function resetTime(date) {
                date.setHours(0, 0, 0, 0);
                return date;
            }


            var highestNumber = 0;
            for (let i = 0; i < data['appeals'].length; i++) {
                var appeals = data['appeals'][i];
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
              
            dataEvent = event.concat(eventattend);
            datalog = dataEvent.concat(log);
            dataleave = datalog.concat(leave);
            dataHoliday = dataleave.concat(holiday);
            dataAll = dataHoliday.concat(leaveHalf);


            dataAll.sort(function(a, b) {
                var dateA = a.start;
                var dateB = b.start;
                var timeA = a.start_time;
                var timeB = b.start_time;
              
                // Compare the dates
                if (dateA < dateB) {
                  return -1;
                }
                if (dateA > dateB) {
                  return 1;
                }
              
                // If the dates are equal, compare the start_time
                if (timeA < timeB) {
                  return -1;
                }
                if (timeA > timeB) {
                  return 1;
                }
              
                return 0; // If both date and start_time are equal
              });
              

            var calendar = new FullCalendar.Calendar(calendarElm, {
                headerToolbar: {
                    left: "logButton EventButton SumButton",
                    center: "title",
                    // right: "prev,today,next dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                    right: "prev,today,next",
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
                    
                    var currentMonth = currentDate.getMonth();
                    var currentYear = currentDate.getFullYear();
                    
                    var oneDaysBefore = new Date(currentYear, currentMonth, currentDate.getDate() - 1);
                    var twoDaysBefore = new Date(currentYear, currentMonth, currentDate.getDate() - 2);
                    
                    var datedefaultformat = dayjs(current).format('YYYY-MM-DD');
                    
                    var weekend1 = current.getDay() == weekend1ifany;
                    var weekend2 = current.getDay() == weekend2ifany;
                    var weekend3 = current.getDay() == weekend3ifany;
                    var weekend4 = current.getDay() == weekend4ifany;
                    var weekend5 = current.getDay() == weekend5ifany;
                    var weekend6 = current.getDay() == weekend6ifany;
                    var weekend7 = current.getDay() == weekend7ifany;
                    
                    var dateonedaybefore = current.getDate() === oneDaysBefore.getDate();
                    var datetwodayebefore = current.getDate() === twoDaysBefore.getDate();

                    //to compare next day after weekend
                    const today = dayjs();

                    var currentDayOfWeek = today.day();

                    var checkweekendv = [weekend1ifany, weekend2ifany, weekend3ifany, weekend4ifany, weekend5ifany, weekend6ifany, weekend7ifany];

                    // Filter out null values
                    var resultchw = checkweekendv.filter(function(value) {
                    return value !== null;
                    });

                    // Sort the filtered values in ascending order
                    resultchw.sort(function(a, b) {
                    return a - b;
                    });

                     var lowestValue = parseInt(resultchw[0]);

                     var secondLowestValue = parseInt(resultchw[1]);

                    // Modify lowestValue and secondLowestValue based on conditions
                    if (lowestValue >= 0 && lowestValue <= 7) {
                    lowestValue = lowestValue + 1;
                    }
                    else
                    lowestValue = 0;

                    if (secondLowestValue >= 0 && secondLowestValue <= 5) {
                    secondLowestValue = secondLowestValue + 2;
                    }
                    else if(secondLowestValue == 6) {
                        secondLowestValue = 2;
                    }
                    else if(secondLowestValue == 7) {
                        secondLowestValue = 3;
                    }
                    
                    var twoDaysBefore = new Date(currentYear, currentMonth, currentDate.getDate() - 2);
                    

                    // Check if the current day is Saturday (6) or Sunday (0)
                    if (currentDayOfWeek === lowestValue || currentDayOfWeek === secondLowestValue) {
                        twoDaysBefore = new Date(currentYear, currentMonth, currentDate.getDate() - 4);

                    }

                    var workingDayHour = '08:00';

                    if (current.getDay() == dayone) { // Check if it's Friday (Friday is represented by 5 in JavaScript, where Sunday is 0)
                        workingDayHour = totalhourday1;
                      }
                      else if(current.getDay() == daytwo ){
                        workingDayHour = totalhourday2;
                      }
                      else if(current.getDay() == daythree){
                        workingDayHour = totalhourday3;
                      }
                      else if(current.getDay() == dayfour){
                        workingDayHour = totalhourday4;
                      }
                      else if(current.getDay() == dayfive){
                        workingDayHour = totalhourday5;
                      }
                      else if(current.getDay() == daysix){
                        workingDayHour = totalhourday6;
                      }
                      else if(current.getDay() == dayseven){
                        workingDayHour = totalhourday7;
                      }                     

                    var appealaddb = $('<button/>', {
                                text: 'Appeal',
                                class: 'btn btn-primary btn-xs appeal-add-button',
                                click: function () {
                                    var year = info.date.getFullYear();
                                    var month = info.date.getMonth();
                                    var day = info.date.getDate();
                                    $('#yearappeal').val(year);
                                    $('#monthappeal').val(new Date(info.date).toLocaleString('en-US', { month: 'long' }));
                                    $('#dayappeal').val(day);
                                    $('#log_id').val(nextLogId);
                                    $('#appealapproverc').val(approverUserId);
                                    const clickedDate = dayjs(info.date);
                                    const formattedDate = clickedDate.format('YYYY-MM-DD');
                                    $("#applieddate").val(formattedDate);

                                    console.log(approverUserId);
                                    if (typeof approverUserId === 'object') {
                                        // Convert the object to a JSON string for display
                                        const jsonString = JSON.stringify(approverUserId, null, 2);
                                        
                                        // Show the error message using Swal (SweetAlert2)
                                        Swal.fire({
                                          title: 'Error',
                                          text: `The appeal approver is empty. Please contact your system administrator for assistance`,
                                          icon: 'error',
                                        });
                                      } else {
                                        $('#appealmodal').modal('show');
                                      }
                                }
                            });


                            var viewappealb = $('<button/>', {
                                id: 'viewappealid', 
                                text: 'View Appeal',
                                class: 'btn btn-primary btn-xs appeal-view-button',
                                mousedown: function(event) {
                                    event.stopPropagation();
                                },
                                click: function() {


                                    // Get the logid for the corresponding appliedDate
                                    var index = appliedDates.indexOf(datedefaultformat);
                                    if (index !== -1) {
                                        var logId = logsid[index];
                                        var reason = reasons[index];
                                        var status = statuss[index];
                                        var year = years[index];
                                        var month = months[index];
                                        var day = days[index];
                                        var approver = approvers[index];
                                        var file = files[index];
                                        resonreject = resonrejects[index];
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
                                        $('#approverview').val(approverUserId);
                                        $('#reason_reject').val(resonreject);
                                        if(!$('#reason_reject').val().trim()) { 
                                            $('#hidereason').hide(); 
                                            
                                          } else {
                                            $('#hidereason').show(); 
                                           
                                          }
                                        if (file) {
                                            $('#hidesupp').show(); 
                                            var fileName = file.split('/').pop(); // Extract the file name from the file path
                                            $("#filedownloadappeal").html('<a href="/storage/' + file + '" target="_blank">Download ' + fileName + '</a>');
                                        } else {
                                            $('#hidesupp').hide(); 
                                        }
                                        
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


                    var totalHoursforlog = '00:00';
                    var hasLog = false;
                    for (var i = 0; i < loghour.length; i++) {
                        if (current.getTime() === loghour[i].start.getTime()) {
                            hasLog = true;
                            var logid = loghour[i].logid;

                            // Calculate the total hours by accumulating all the 'total_hour' values for the current date
                            var totalHourlog = loghour.filter(log => current.getTime() === log.start.getTime())
                            .reduce((totallog, log) => {
                                var [hourslog, minuteslog, secondslog] = log.totalHour.split(':').map(Number);
                                totallog += hourslog * 3600 + minuteslog * 60 + secondslog;
                                return totallog;
                            }, 0);

                            // Convert the total hours back to the 'hh:mm' format
                            var hourslog = Math.floor(totalHourlog / 3600);
                            var minuteslog = Math.floor((totalHourlog % 3600) / 60);
                            totalHoursforlog = hourslog.toString().padStart(2, '0') + ':' + minuteslog.toString().padStart(2, '0');
                            var [hourslog, minuteslog] = totalHoursforlog.split(":").map(Number);
                            break;
                        }
                    }

                    
                    var totalHoursEvent = '00:00';
                    var hasEvent = false;
                    for (var i = 0; i < attendhour.length; i++) {
                      if (current.getTime() === attendhour[i].start.getTime()) {
                        hasEvent = true;
                        var eventid = attendhour[i].eventid;
                    
                        var totalHourEvent = attendhour.filter(event => current.getTime() === event.start.getTime())
                          .reduce((totalevent, event) => {
                            var [hoursevent, minutesevent, secondsevent] = event.totalHourAttend.split(':').map(Number);
                            totalevent += hoursevent * 3600 + minutesevent * 60 + secondsevent;
                            return totalevent;
                          }, 0);
                    
                        var hoursevent = Math.floor(totalHourEvent / 3600);
                        var minutesevent = Math.floor((totalHourEvent % 3600) / 60);
                        totalHoursEvent = hoursevent.toString().padStart(2, '0') + ':' + minutesevent.toString().padStart(2, '0');
                        var [hoursevent, minutesevent] = totalHoursEvent.split(":").map(Number);
                
                        break;
                      }
                    }
                    

                    // Convert totalHoursforlog and totalHoursEvent to total seconds
                    var [hourslog, minuteslog] = totalHoursforlog.split(":").map(Number);
                    var totalSecondslog = hourslog * 3600 + minuteslog * 60;

                    var [hoursevent, minutesevent] = totalHoursEvent.split(":").map(Number);
                    var totalSecondsevent = hoursevent * 3600 + minutesevent * 60;

                    // Add totalHoursforlog and totalHoursEvent in seconds
                    var totalSeconds = totalSecondslog + totalSecondsevent;

                    // Convert the total seconds back to the 'hh:mm' format
                    var hours = Math.floor(totalSeconds / 3600);
                    var minutes = Math.floor((totalSeconds % 3600) / 60);


                    var totalHoursCombined = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');

                    var forcounter = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');;

                    var appliedDates = [];
                    var reasons = [];
                    var logsid = [];
                    var statuss = [];
                    var years = [];
                    var months = [];
                    var days = [];
                    var files = [];
                    var approvers = [];
                    var resonrejects = [];
                    for (let i = 0; i < data['appeals'].length; i++) {
                        var appeals = data['appeals'][i];

                        var appliedDate = appeals['applied_date'];
                        var reason = appeals['reason'];
                        var logid = appeals['logid'];
                        var status = appeals['status'];
                        var year = appeals['year'];
                        var month = appeals['month'];
                        var day = appeals['day'];
                        var approver = appeals['approver'];
                        var file = appeals['file'];
                        var resonreject = appeals['reasonreject'];

                        appliedDates.push(appliedDate);
                        reasons.push(reason);
                        logsid.push(logid);
                        statuss.push(status);
                        years.push(year);
                        months.push(month);
                        days.push(day);
                        approvers.push(approver);
                        files.push(file);
                        resonrejects.push(resonreject);
                    }

                    var dailycounter1 = $('<button/>', {
                        text: forcounter,
                        class: 'btn btn-danger btn-xs',
                        click: function () {
                        }
                    });

                    var hasAppeal = appliedDates.includes(datedefaultformat);
                    var noappeal = !appliedDates.includes(datedefaultformat);
                   
                      if (
                        current.getTime() === currentDate.getTime() ||
                        (current.getTime() < currentDate.getTime())
                        
                    ) {

                        $(info.el).append('&nbsp;').append(dailycounter1);
                        $(dailycounter1).css({
                            position: 'relative',
                            top: '-35px',
                            'z-index': '999',
                        });

                      } 

                    const leaveHalfListDates = leavehalflist.map(item => new Date(item.title));

                    // Logging each title in the console
                    for (let i = 0; i < leavehalflist.length; i++) {
                        // console.log(leavehalflist[i].title);
                    }

                    if (leaveHalfListDates.some(date => date.getDate() === current.getDate() &&
                                                        date.getMonth() === current.getMonth() &&
                                                        date.getFullYear() === current.getFullYear())) {
                        
                        
                        // Splitting hours and minutes
                        const [hours, minutes] = workingDayHour.split(":").map(Number);

                        // Divide hours by 2
                        const newHours = Math.floor(hours / 2);

                        // Format newHours and minutes to ensure they are 2 digits
                        const formattedNewHours = newHours < 10 ? `0${newHours}` : `${newHours}`;
                        const formattedMinutes = minutes < 10 ? `0${minutes}` : `${minutes}`;

                        // Update workingDayHour
                        workingDayHour = `${formattedNewHours}:${formattedMinutes}`;

                    }

                    
                   if (
                        (current.getDate() === currentDate.getDate()) &&
                        (hasEvent || hasLog) &&
                        (totalHoursCombined < workingDayHour)
                        ) {
                        $(info.el).css('background-color', '#FF8080');
                        }
                     else if (
                        (current.getDate() === currentDate.getDate()) &&
                        (hasEvent || hasLog) &&
                        (totalHoursCombined >= workingDayHour)
                      ) {
                        $(info.el).css('background-color', '#80ff80');
                      }
                    //for date after weekend, not exclude in 48hour
                      if(currentDayOfWeek === lowestValue || currentDayOfWeek === secondLowestValue) {
                        if ((current < currentDate) && current.getDate() !== currentDate.getDate()
                            && ((hasLog || hasEvent || !hasEvent || !hasLog) && totalHoursCombined < workingDayHour )) {
                            $(info.el).css('background-color', '#FF8080');
                        }

                        else if ((current < currentDate) && current.getDate() !== currentDate.getDate()
                        && ((hasLog || hasEvent || !hasEvent || !hasLog) && totalHoursCombined >= workingDayHour )) {
                            $(info.el).css('background-color', '#80ff80');
                        }
                       
                      }
                   
                      if (
                        (dateonedaybefore || datetwodayebefore) &&
                        !(weekend1 || weekend2 || weekend3 || weekend4 || weekend5 || weekend6 || weekend7) &&
                        !hasLog &&
                        !hasEvent &&
                        current.getMonth() === currentDate.getMonth() &&
                        current.getFullYear() === currentDate.getFullYear() &&
                        current.getDate() <= currentDate.getDate() // Check that the current date is on or after the processed date
                      ) {
                        $(info.el).css('background-color', '#FF8080');
                      }
                       
                     else if(
                         
                        (dateonedaybefore || datetwodayebefore) &&
                        !(weekend1 || weekend2 || weekend3 || weekend4 || weekend5 || weekend6 || weekend7)  &&
                         ( (hasLog || hasEvent) && totalHoursCombined < workingDayHour)
                      ) {
                        $(info.el).css('background-color', '#FF8080');
                      }
                      else if(
                         
                        (dateonedaybefore || datetwodayebefore) &&
                        !(weekend1 || weekend2 || weekend3 || weekend4 || weekend5 || weekend6 || weekend7)  
                        && ( (hasLog || hasEvent) && totalHoursCombined >= workingDayHour)
                      ) {
                        $(info.el).css('background-color', '#80ff80');
                      }

                      //xde log appeal, log kecik dari 9,exclude weekend
                       else if((current < twoDaysBefore) && noappeal && totalHoursCombined < workingDayHour && 
                       !(weekend1 || weekend2 || weekend3 || weekend4 || weekend5 || weekend6 || weekend7)) {
                        $(info.el).css('background-color', '#FF8080');

                        var joinneddate = new Date(joineddate);
                        if (current.getTime() >= joinneddate.getTime()) {
                          $(info.el).append('&nbsp;').append(appealaddb);
                          $(appealaddb).css({
                            position: 'relative',
                            top: '-35px',
                            'z-index': '999',
                          });
                        }
                      

                        }else if (
                            (current < twoDaysBefore) &&
                            hasAppeal &&
                            (
                              ((hasLog || hasEvent) && totalHoursCombined < workingDayHour) ||
                              (!hasLog && !hasEvent && 
                                !(weekend1 || weekend2 || weekend3 || weekend4 || weekend5 || weekend6 || weekend7))
                            )
                          ) {

                            $(info.el).css('background-color', '#FF8080');
                            $(info.el).append('&nbsp;').append(viewappealb);
                            $(viewappealb).css({
                                position: 'relative',
                                top: '-35px',
                                'z-index': '999',   
                                });

                         } else if((current < twoDaysBefore) && (hasLog || hasEvent) && totalHoursCombined >= workingDayHour) {
                            $(info.el).css('background-color', '#80ff80');
                         } else if((current < twoDaysBefore) && hasAppeal && totalHoursCombined >= workingDayHour) {
                            $(info.el).css('background-color', '#80ff80');
                            $(info.el).append('&nbsp;').append(viewappealb);
                            $(viewappealb).css({
                                position: 'relative',
                                top: '-35px',
                                'z-index': '999',   
                                });
                         }
                         else if((current < twoDaysBefore) && hasAppeal && totalHoursCombined < workingDayHour) {
                            $(info.el).css('background-color', '#FF8080');
                            $(info.el).append('&nbsp;').append(viewappealb);
                            $(viewappealb).css({
                                position: 'relative',
                                top: '-35px',
                                'z-index': '999',   
                                });
                         }
                         else if ((info.date.getDay() == weekend1ifany || info.date.getDay() == weekend2ifany || 
                                    info.date.getDay() == weekend3ifany || info.date.getDay() == weekend4ifany || 
                                    info.date.getDay() == weekend5ifany || info.date.getDay() == weekend6ifany ||info.date.getDay() == weekend7ifany  ) 
                         && !isSameDate) {
                            $(info.el).css('background-color', '#B3CCFF');
                          }
                          
                    
                 else {
                        // $(info.el).css('background-color', 'white');
                      }
                    },


                    dateClick: function(info) {
                        
                        
                        const clickedDate = dayjs(info.date);
                        const today = dayjs();

                        var daystominus = -2;
                
                        var currentDayOfWeek = today.day();
                
                        var checkweekendv = [weekend1ifany, weekend2ifany, weekend3ifany, weekend4ifany, weekend5ifany, weekend6ifany, weekend7ifany];
                
                        // Filter out null values
                        var resultchw = checkweekendv.filter(function(value) {
                        return value !== null;
                        });
                
                        // Sort the filtered values in ascending order
                        resultchw.sort(function(a, b) {
                        return a - b;
                        });
                
                         var lowestValue = parseInt(resultchw[0]);
                
                         var secondLowestValue = parseInt(resultchw[1]);

                         var weekn1 = parseInt(resultchw[0]);;
                         var weekn2 = parseInt(resultchw[1]);

                
                        // Modify lowestValue and secondLowestValue based on conditions
                        if (lowestValue >= 0 && lowestValue <= 7) {
                        lowestValue = lowestValue + 1;
                        }
                        else
                        lowestValue = 0;
                
                        if (secondLowestValue >= 0 && secondLowestValue <= 5) {
                        secondLowestValue = secondLowestValue + 2;
                        }
                        else if(secondLowestValue == 6) {
                            secondLowestValue = 2;
                        }
                        else if(secondLowestValue == 7) {
                            secondLowestValue = 3;
                        }
                
                        // Check if the current day is Saturday (6) or Sunday (0)
                        if (currentDayOfWeek === lowestValue || currentDayOfWeek === secondLowestValue) {
                            daystominus = -4;
                        }

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
                        
                           
                            $('#addLogModal').modal('show');
                            const formattedDate = clickedDate.format('YYYY-MM-DD');
                            $("#dateaddlog").val(formattedDate);
                            return;
                            
                        }

                        // check if the clicked date is within the last 2 days before the current date
                        // and if the cell already has an appeal button
                        let isLeaveDay = false;
                            for (let i = 0; i < leavesdate.length; i++) {
                                if (clickedDate >= leavesdate[i].start && clickedDate <= leavesdate[i].end) {
                                isLeaveDay = true;
                                break;
                                }
                            }

                        if (
                            ((clickedDate.diff(today, 'day') < daystominus || clickedDate.isAfter(today, 'day')) &&
                            ($(info.dayEl).find('.appeal-add-button, .appeal-view-button').length == 0)) &&
                            !(clickedDate.day() == weekn1 && clickedDate.isBefore(today, 'day')) &&
                            !(clickedDate.day() == weekn2 && clickedDate.isBefore(today, 'day')) &&
                            !isLeaveDay
                        )  {
                            Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'You can only add logs for the current and past 2 days!',
                            });
                            return;
                          }
                          
                        if ((clickedDate.diff(today, 'day') < daystominus || clickedDate.isAfter(today, 'day')) &&
                            ($(info.dayEl).find('.appeal-add-button, .appeal-view-button').length !== 0)) {

                          return;
                        }

                        // show the add log modal
                        $('#addLogModal').modal('show');
                        $("#dateaddlog").val(formattedDate);
                      },

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

                    if (
                        info.event.extendedProps.type == "leave" ||
                        info.event.extendedProps.type == "holiday" ||
                        info.event.extendedProps.type == "leaveHalf"
                    ) {
                    } else if (info.event.extendedProps.type == "log") {
                        logId = info.event.extendedProps.logId;
                        var logData = getLogs(logId);
                        logData.then(function (data) {

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
                                $("#activityByProjectEditShow").css(
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
                                // $("#activityByProjectEditHide1").css(
                                //     "display",
                                //     "none"
                                // );
                                $("#myprojectedit").css("display", "none");
                            } else if (data.type_of_log == "2") {
                                $("#officelogedit").css("display", "block");
                                // var display11 = $("#activityByProjectEditHide").css("display");
                                // $("#activityByProjectEditHide1").css(
                                //     "display",
                                //     "block"
                                // );
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
                                    // $("#activityByProjectEditHide1").css(
                                    //     "display",
                                    //     "none"
                                    // );
                                }
                            } else {
                                $("#myprojectedit").css("display", "none");
                                $("#activityByProjectEditHide").css(
                                    "display",
                                    "none"
                                );
                                $("#activityByProjectEditHide1").css(
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
                            
                            $("#activityByProjectEditShow").hide();
                            $("#locationByProjectEditShow").hide();
                            // $("#activityByProjectEditShow").hide();
                            $("#typeoflogedit").val(data.type_of_log);
                            $("#officelog2edit").val(data.office_log);

                           
                            $("#project_id_edit").val(data.project_id);
                            $("#officeLogProjectEdit").val(data.project_id);

                            $("#projectlocsearchedit").val(
                                data.project_location
                            );
                            // projectlocsearchedit
                            $("#activity_name_edit2").val(data.activity_name);   
                           
                            $("#exit_project").prop(
                                "checked",
                                data.exit_project
                            );
                            
                            $("#desc").val(data.desc);
                            $("#total_hour_edit").val(data.total_hour);
                            $("#id").val(data.id);
                            $("#lunchBreakedit").val(data.lunch_break);
                            
                            $("#starttimeedit").val(data.start_time);

                            $("#starttimeedit").mdtimepicker({
                                showMeridian: true,
                                timeFormat: 'hh:mm:ss.000',
                                is24hour: true,
                                defaultTime: data.start_time
                                });

                            $("#endtimeedit").val(data.end_time);

                                $("#endtimeedit").mdtimepicker({
                                    showMeridian: false,
                                    showMeridian: true,
                                    timeFormat: 'hh:mm:ss.000',
                                    is24hour: true,
                                    defaultTime: data.end_time
                                });

                                $("#dateaddlogedit").val(data.date);

                                $("#statusappeal").val(data.appealstatus);

                                var currentDate = new Date();
                                var twoDaysBefore = new Date();
                                twoDaysBefore.setDate(currentDate.getDate() - 3);
                                
                                
                                var initialDate = $("#dateaddlogedit").val();

                                // Flag to track if datepicker was closed due to outside click
                                var outsideClick = false;

                                $("#dateaddlogedit").on("focusout", function() {
                                if (outsideClick && $(this).val() === "") {
                                    $(this).val(initialDate);
                                }
                                // Reset the flag
                                outsideClick = false;
                                });

                                // Set the flag when clicking outside the datepicker
                                $(document).on("mousedown", function(event) {
                                var target = $(event.target);
                                if (!target.closest(".datepicker").length && !target.is("#dateaddlogedit")) {
                                    outsideClick = true;
                                }
                                });

                                // Your other function
                                $("#statusappeal").on("change", function() {
                                var selectedDate = new Date($("#dateaddlogedit").val());
                                var twoDaysBefore = new Date();
                                twoDaysBefore.setDate(twoDaysBefore.getDate() - 2);

                                if ($("#statusappeal").val() === "1" || selectedDate < twoDaysBefore) {
                                    $("#dateaddlogedit").prop("readonly", true).css("pointer-events", "none");
                                    // Disable the focusout functionality when read-only
                                    outsideClick = false;
                                } else {
                                    $("#dateaddlogedit").prop("readonly", false).css("pointer-events", "auto");
                                    // Enable the focusout functionality when editable
                                    outsideClick = true;
                                }
                                });

                                // Initial setup based on the initial statusappeal value
                                $("#statusappeal").trigger("change");

                                //hide/show activity name
                                $("#activity_name_edit1").val(data.activity_name);
                                var activityNamehide1 = $("#activity_name_edit1").val();

                                if (!activityNamehide1) {
                                // Hide the div if the activityName is empty or null
                                $("#activityByProjectEditHide").hide();
                                
                                } else {
                                    $("#activityByProjectEditHide").show();
                                }

                                var activityNamehide = $("#activity_name_edit2").val();

                                if (!activityNamehide) {
                                // Hide the div if the activityName is empty or null
                                $("#activityByProjectEditHide1").hide();
                                
                                } else {
                                    $("#activityByProjectEditHide1").show();
                                }

                                //hide project if no data
                                var projectLhide = $("#projectlocsearchedit").val();

                                if (!projectLhide) {
                                // Hide the div if the activityName is empty or null
                                $("#locationByProjectEditHide").hide();
                                }

                                //hide officlog if no data
                                var officeloghideshow = $("#officelog2edit").val();

                                if (!officeloghideshow) {
                                    // Hide the div if the activityName is empty or null
                                    $("#officelogedit").hide();
                                    
                                    } else {
                                        $("#officelogedit").show();
                                    }
                                
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

                            async function loadEventData(eventId) {
                                var eventData = await getEvents(eventId);
                                var participants = eventData.participants;
                                var attendanceStatus = eventData.attendanceStatus;
                            
                                // Destroy the old DataTable instance and clear the body
                                var table = $('#tableviewparticipant').DataTable();
                                table.clear().destroy();
                            
                                var tableBody = $("#tableRowParticipant");
                                tableBody.empty();
                            
                                for (var i = 0; i < participants.length; i++) {
                                    var participant = participants[i];
                                    var status = attendanceStatus[i].status;
                                
                                    var row = $("<tr></tr>");
                                    row.append($("<td></td>").text(i + 1));
                                    row.append($("<td></td>").text(participant.name));
                                
                                    var statusBadge = $("<div></div>").attr("id", "awaitingapproval");
                                    var badgeSpan = $("<span></span>");
                                
                                    if (status === "no response") {
                                        badgeSpan.addClass("badge bg-warning rounded-pill").text("no response");
                                    } else if (status === "not attend") {
                                        badgeSpan.addClass("badge bg-danger rounded-pill").text("not attend");
                                    } else if (status === "attend") {
                                        badgeSpan.addClass("badge bg-lime rounded-pill").text("Attend");
                                    }
                                
                                    statusBadge.append(badgeSpan);
                                    row.append($("<td></td>").append(statusBadge));
                                
                                    // Adding the Delete Button
                                    var deletedUserIds = []; // Array to store deleted user IDs

                                    var deleteButton = $("<button></button>")
                                        .addClass("btn btn-danger")
                                        .attr("data-user-id", participant.user_id)  // Using participant.user_id here
                                        .text("Delete")
                                        .click(function(event) {
                                            event.preventDefault();
                                            var userId = $(this).attr("data-user-id");
                                            
                                            // Add userId to deletedUserIds array
                                            deletedUserIds.push(userId);

                                            // Add your delete logic here
                                            var userdelete = deletedUserIds.join(',');
                                            // console.log(userdelete);
                                            $("#deletepart").val(userdelete);
                                            

                                            // Remove the corresponding row from the table
                                            $(this).closest("tr").remove();
                                        });
                                
                                    row.append($("<td></td>").append(deleteButton));
                                
                                    tableBody.append(row);
                                }
                                
                            
                                // Re-initialize the DataTable
                                $('#tableviewparticipant').DataTable({
                                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                                });
                            }
                            
                            // usage:
                            loadEventData(eventId);
                            
                            var eventData = getEvents(eventId);
                            eventData.then(function(data) {
                                var nonParticipants = data.nonParticipants; // Assuming data.nonParticipants is an array of objects with user_id and name properties

                                var dropdown = $("#addneweventparticipantedit");
                                dropdown.empty(); // Clear any existing options in the dropdown

                                for (var i = 0; i < nonParticipants.length; i++) {
                                    var nonParticipant = nonParticipants[i];

                                    // Create an option element for each non-participant
                                    var option = $("<option></option>")
                                        .val(nonParticipant.user_id)
                                        .text(nonParticipant.name);

                                    dropdown.append(option);
                                }

                                // Initialize Select2 after populating the dropdown
                                // dropdown.select2({
                                //     placeholder: "Please Choose"
                                // });
                            });

                            $("#participantlist").val(data.participantNames);
                            $("#event_name").val(data.event_name);
                            $("#editvenue").val(data.venue);
                            $("#starteventdateedit").val(data.start_date);
                            $("#endeventdateedit").val(data.end_date);
                            $("#starteventtimeedit").val(data.start_time);
                            $("#starteventtimeedit").mdtimepicker({
                                showMeridian: true,
                                timeFormat: 'hh:mm:ss.000',
                                is24hour: true,
                                defaultTime: data.start_time
                            });

                            $("#endeventtimeedit").val(data.end_time);

                            //sini1
                            $("#endeventtimeedit").mdtimepicker({
                                showMeridian: true,
                                timeFormat: 'hh:mm:ss.000',
                                is24hour: true,
                                defaultTime: data.end_time
                            });

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
                                var form = document.getElementById("editEventForm");
                                form.addEventListener("click", function (event) {
                                // event.stopPropagation();
                                // event.preventDefault();
                                });
                                form.style.pointerEvents = "none"; // Disable pointer events

                                var allowedElements = document.querySelectorAll("#closebuttonmodal,#attendHide,#attendEvent,#descE");

                                for (var i = 0; i < allowedElements.length; i++) {
                                    allowedElements[i].style.pointerEvents = "auto";
                                }

                                // Disable editing but enable scrolling
                                var descE = document.getElementById("descE");
                                descE.setAttribute("readonly", "readonly")
                                descE.style.overflowY = "auto";
                                descE.style.resize = "vertical";;
                                descE.style.backgroundColor = "white";
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

                                    if (dataSetRecurring == "wednesday") {
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
                            $("#eventcreator").val(data.employeeName);
                            
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

                events: dataAll,
                eventOrder: 'start',
               
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


    var startDate = new Date(); // Initialize startDate with the current date

    $("#starteventdate")
        .datepicker({
            format: "yyyy/mm/dd",
            todayHighlight: true,
            autoclose: true,
        })
        .datepicker("setDate", startDate);

        function updateEndEventDate() {
            var formattedDate = startDate.getFullYear() + '/' + (startDate.getMonth() + 1).toString().padStart(2, '0') + '/' + startDate.getDate().toString().padStart(2, '0');
            $("#endeventdate").val(formattedDate);
        }

    $("#endeventdate")
        .datepicker({
            format: "yyyy/mm/dd",
            todayHighlight: true,
            autoclose: true,
        })
        .datepicker("setDate", new Date());

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
    $("#addneweventprojectlocsearch").picker({ search: true });
    $("#addneweventparticipant").picker({ search: true });
    $("#addneweventselectproject").picker({ search: true });

    //for addlogmodal
    //starttime,endtime function,validation for endtime cannot be lower than starttime
    $(function () {
        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
    
        var currentTime = hours + ":" + minutes;
    
        $("#starttime").val(currentTime); // Set the value of the input field directly
    
        $("#starttime").mdtimepicker({
            showMeridian: true,
            timeFormat: 'hh:mm:ss.000',
            is24hour: true
        });
    
        // Calculate end time
        var start = new Date();
        start.setHours(parseInt(hours));
        start.setMinutes(parseInt(minutes));
        start.setMinutes(start.getMinutes() + 60); // Add 60 minutes (1 hour)
        var endHours = start.getHours().toString().padStart(2, '0');
        var endMinutes = start.getMinutes().toString().padStart(2, '0');
        var endTime = endHours + ":" + endMinutes;
    
        $("#endtime").val(endTime); // Set the value of the end time input field directly
    
        $("#endtime").mdtimepicker({
            showMeridian: true,
            timeFormat: 'hh:mm:ss.000',
            is24hour: true
        });
    
    
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
    

        $("#starttime").change(function () {
            // Reset the end time value to an empty string
            $("#endtime").val("");
        });
    
        $("#endtime").change(function () {
            var startTime = moment($("#starttime").val(), "hh:mm A").format("HH:mm");
            var endTime = moment($("#endtime").val(), "hh:mm A").format("HH:mm");
        
            if (endTime < startTime) {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "The End Time cannot be before the Start Time.",
                }).then(() => {
                    $("#endtime").val("");
                    $("#logduration").val("");
                    $("#endtime").attr("placeholder", "End Time");
                    $("#endtime").mdtimepicker("toggle");
                });
            }
        });
    });

    //addlog total hour cal
    //lunch break func
    $("#logduration,#daystart,#dayend,#starttime,#endtime,#lunchBreak").change(function () {
        var startdt = new Date($("#daystart").val() + " " + $("#starttime").val());
        var enddt = new Date($("#dayend").val() + " " + $("#endtime").val());
        var diff = enddt - startdt;
        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        diff -= days * (1000 * 60 * 60 * 24);
        var hours = Math.floor(diff / (1000 * 60 * 60));
        diff -= hours * (1000 * 60 * 60);
        var mins = Math.floor(diff / (1000 * 60));
        diff -= mins * (1000 * 60);
    
        // $("#logduration").val(
        //     days + " days : " + hours + " hours : " + mins + " minutes "
        // );
    
    
        if ($("#lunchBreak").val() === "1") {
            hours -= 1;
            // hours = hours - 1
        }
    
        $("#logduration").val(
            // days + " days : " + hours + " hours : " + mins + " minutes "
            // days +  hours + mins 
            hours + ":" + mins + ":" + "0"
        );
    
        // Disable lunch break if total hours are less than 1
        if (hours < 1 && mins < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Input Time Error',
                text: 'Between Start Time and End Time must be more than 1 hour if Lunch Break is selected',
            });
            
            // $("#starttime").val("");
            // $("#endtime").val("");
            $("#lunchBreak").val("");

            

        } else {
            // $("#lunchBreak").prop("disabled", false);
        }
        
    });

    //addeventmodal
    $(function () {
        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
    
        var currentTime = hours + ":" + minutes;
    
        $("#starteventtime").val(currentTime); // Set the value of the input field directly
    
        $("#starteventtime").mdtimepicker({
            showMeridian: true,
            timeFormat: 'hh:mm:ss.000',
            is24hour: true
        });
    
        // Calculate end time
        var start = new Date();
        start.setHours(parseInt(hours));
        start.setMinutes(parseInt(minutes));
        start.setMinutes(start.getMinutes() + 60); // Add 60 minutes (1 hour)
        var endHours = start.getHours().toString().padStart(2, '0');
        var endMinutes = start.getMinutes().toString().padStart(2, '0');
        var endTime = endHours + ":" + endMinutes;
    
        $("#endeventtime").val(endTime); // Set the value of the end time input field directly
    
        $("#endeventtime").mdtimepicker({
            showMeridian: true,
            timeFormat: 'hh:mm:ss.000',
            is24hour: true
        });
    
    
        $("#starteventdate,#endeventdate")
            .datepicker({
                format: "yyyy/mm/dd",
            })
            .datepicker("setDate", "now");
    
       
        $("#starteventtime").change(function () {
            // Reset the end time value to an empty string
            $("#endeventtime").val("");
        });
    
        $("#endeventtime").change(function () {
            var startTime = moment($("#starteventtime").val(), "hh:mm A");
            var endTime = moment($("#endeventtime").val(), "hh:mm A");
    
            if (endTime.isBefore(startTime)) {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "The End Time Could Not Be Before The Start Time.",
                }).then(() => {
                    $("#endeventtime").val("");
                    $("#duration").val("");
                    $("#endeventtime").attr("placeholder", "End Time"); // Set the placeholder for the end time field
                    $("#endeventtime").mdtimepicker("toggle"); // Close the time picker
                });
            }
        });
    });

    //addeventmodal
    $(
        "#duration,#starteventdate,#starteventtime,#endeventdate,#endeventtime"
    ).change(function () {
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
            // days + " days : " + hours + " hours : " + mins + " minutes "
            hours + ":" + mins + ":0"
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

        $("#durationeditevent").val(
            hours + ":" + mins + ":0"
        );
    });

    $(document).on('change', "#typeoflog", function() {
        var selectedValueOfTypeLog = $(this).val();
        $("#myProject,#officelog2,#officeLogProject,#activity_names,#activityOffice,#projectlocsearch,#projectLocationOffice").val("");
        $("#activityByProjectHide").hide();  
        if (selectedValueOfTypeLog == "1") {
            $("#activityByProjectHide").show(); 
            $("#officelog").show();
            $("#myproject,#activityByProjectShow,#locationByProjectHide,#locationByProjectShow,#listproject").hide();
            $("#myProject,#officelog2,#officeLogProject,#activity_names,#activityOffice,#projectlocsearch,#projectLocationOffice").val("");
            
        } else if (selectedValueOfTypeLog == "2") {
            $("#officelog").show();
        } else if (selectedValueOfTypeLog == "3") { 
            $("#listproject").show();
            $("#locationByProjectHide, #activityByProjectHide").hide();
        } else if (selectedValueOfTypeLog == "4"){
            $("#activityByProjectHide").show(); 
            $("#officelog,#myproject,#activityByProjectShow,#locationByProjectHide,#locationByProjectShow,#listproject").hide();
            $("#myProject,#officelog2,#officeLogProject,#activity_names,#activityOffice,#projectlocsearch,#projectLocationOffice").val("");
        }
    });
    
    $(document).on("change", "#officelog2", function () {
        var selectedValue = $(this).val();
       
        // Hide all relevant elements
        $("#listproject, #activityByProjectHide, #activityByProjectShow, #locationByProjectShow").hide();
    
        if ($("#typeoflog").val() == "2" && selectedValue == "1") {
            // Your code here
            $("#myProject,#officeLogProject,#activity_names,#projectlocsearch").val("");
            $("#listproject, #activityByProjectShow, #locationByProjectShow").show();
        }else if ($("#typeoflog").val() == "1" && selectedValue == "1") {
            // Your code here
            $("#myProject,#officeLogProject,#activity_names,#projectlocsearch").val("");
            $("#listproject, #activityByProjectShow").show();
            $("#locationByProjectShow").hide();
        
        } else if (selectedValue == "2") {
            $("#activityByProjectHide").show();
            $("#myProject,#officeLogProject,#activity_names,#projectlocsearch").val("");
            $("#activityByProjectHide").show();
            $("#myproject,#listproject,#activityByProjectShow,#locationByProjectShow").hide();

        }
    
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
            $("#endeventdate").prop("readonly", false);
            $("#addneweventrecurring").show();    
            updateEndEventDate();
            
        } else {
            $("#addneweventrecurring").hide();
            $("#addneweventsetreccurring").hide();
            $("#setrecurringyearly").hide();
            $("#setrecurringontheyearly").hide();
            $("#setrecurringmontly").hide();
            $("#setrecurringonmontly").hide();
            $("#endeventdate").prop("readonly", true);
            $("#sat").prop("checked", false);
            $("#sun").prop("checked", false);
            $("#mon").prop("checked", false);
            $("#tue").prop("checked", false);
            $("#wed").prop("checked", false);
            $("#thu").prop("checked", false);
            $("#fri").prop("checked", false);
            $("#addneweventselectrecurring").val("");
            updateEndEventDate();
            
        }
    });

    $("#starteventdate").change(function () {
    startDate = $(this).datepicker("getDate");
    updateEndEventDate(); // Update #endeventdate
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
        endDate: new Date(),
    });
    $("#starteventdateedit").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    }).on("changeDate", function (e) {
        // Set the end datepicker's date to the selected start date
        $("#endeventdateedit").datepicker("update", e.date);

        // Set the minimum date for the end datepicker to the selected start date
        $("#endeventdateedit").datepicker("setStartDate", e.date);
    });
    $("#endeventdateedit").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    // $('#projectlocsearchedit').picker({ search: true });
    $("#addneweventprojectlocsearchedit").picker({ search: true });
    // $("#addneweventparticipantedit").picker({ search: true });
    $("#addneweventselectprojectedit").picker({ search: true });

    $('#addneweventparticipantedit').select2({
        dropdownParent: $('#editeventmodal'),
        multiple: true
    });

    $(document).on("change", "#typeoflogedit", function () {
        var selectedValue = $(this).val();
    
        // Handle case when value is "2"
        if (selectedValue == "2") {
            $("#officelogedit").show();
        } else {
            $("#officelogedit").hide();
            $("#listprojectedit").hide();
        }
    
        // Handle case when value is "3"
        if (selectedValue == "3") {
            $("#myprojectedit").show();
            $("#activityByProjectEditHide1, #locationByProjectEditHide, #locationByProjectEditShow, #activityByProjectEditShow").show();
        } else {
            $("#myprojectedit").hide();
            $("#listprojectedit, #activityByProjectEditHide1, #locationByProjectEditHide, #locationByProjectEditShow, #activityByProjectEditShow").hide();
        }
    });
    
    $(document).on("change", "#officelog2edit", function () {
        if ($(this).val() == "1") {
            if ($("#typeoflogedit").val() == "2" && selectedValue == "1") {
                // Your code here
                $("#myprojectedit,#officeLogProjectEdit,#activity_names,#projectlocsearchedit").val("");
                $("#listprojectedit, #activityByProjectShow, #locationByProjectShow").show();
            }else if ($("#typeoflogedit").val() == "1" && selectedValue == "1") {
                // Your code here
                $("#myprojectedit,#officeLogProjectEdit,#activity_names,#projectlocsearchedit").val("");
                $("#listprojectedit, #activityByProjectShow").show();
                $("#locationByProjectShow").hide();
            // $("#myprojectedit").show();
            // $("#activityByProjectEditHide").hide();

        
        } else if ($(this).val() == "2") {
            $("#activityByProjectEditHide").show();
            $("#myprojectedit").hide();
            // $("#myprojectedit").hide();
            // $("#locationByProjectEditHide").hide();
        }
        

        }
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

    $("#lunchBreakedit, #daystartedit, #dayendedit, #starttimeedit, #endtimeedit").focus(function() {
        var startdt = new Date($("#daystartedit").val() + " " + $("#starttimeedit").val());
        var enddt = new Date($("#dayendedit").val() + " " + $("#endtimeedit").val());
        var diff = enddt - startdt;
        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        diff -= days * (1000 * 60 * 60 * 24);
        var hours = Math.floor(diff / (1000 * 60 * 60));
        diff -= hours * (1000 * 60 * 60);
        var mins = Math.floor(diff / (1000 * 60));
        diff -= mins * (1000 * 60);
    
        // Subtract 1 hour if lunch break is selected (value is "1" and not null) and total hours are greater than 1
        if ($("#lunchBreakedit").val() === "1") {
            hours -= 1;
        }
    
        $("#total_hour_edit").val(hours + ":" + mins + ":" + "0");
    
        // Disable lunch break if total hours are less than 1
        if (hours < 1 && mins < 1) {
            $("#starttimeedit").val("");
            $("#endtimeedit").val("");
            $("#total_hour_edit").val("");
    
            // Show the error only if it hasn't been shown before
            if (!errorShown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Input Time Error',
                    text: 'Between Start Time and End Time must be more than 1 hour if Lunch Break is selected',
                });
                errorShown = true; // Set the flag to indicate that the error has been shown
            }
        } else {
            errorShown = false; // Reset the flag if the condition is no longer true
        }
    });

    $("#addeventalldayedit").change(function () {
        if (this.checked) {
            $("#hideshowstarttimee, #hideshowendtimee").hide();
            $("#starteventtimeedit").val("00:00 AM");
            $("#endeventtimeedit").val("11:59 PM");
        } else {
            $("#hideshowstarttimee, #hideshowendtimee").show();
        }
    });
    $('#my-select').multiselect({
        includeSelectAllOption: true, // Add an "Select All" option
        enableFiltering: true, // Enable search/filtering
        maxHeight: 200 // Set a maximum height for the dropdown
      });

      $('#tableviewparticipant').DataTable({
        
    });
});

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