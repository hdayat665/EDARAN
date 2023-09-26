var handleCalendarDemo = function () {
    // fullcalendar

    var d = new Date();
    var month = d.getMonth() + 1;
    month = month < 10 ? "0" + month : month;
    var year = d.getFullYear();
    var day = d.getDate();
    var today = moment().startOf("day");
    var calendarElm = document.getElementById("calendar");

    function getTimesheet(id, userId) {
        return $.ajax({
            url: "/getTimesheetById/" + id + "/" + userId,
        });
    }
    var id = $("#timesheetApprovalId").val();
    var userId = $("#timesheetApprovalUserId").val();

    var timesheetData = getTimesheet(id, userId);

    timesheetData.then(function (data) {
        // console.log(data);
        var event = [];
        for (let i = 0; i < data["events"].length; i++) {
            var events = data["events"][i];

            var startDate = new Date(events["start_date"]);
            var startMonth = startDate.getMonth() + 1;
            startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
            var startYear = startDate.getFullYear();
            var startDay = startDate.getDate();
            startDay = startDay < 10 ? "0" + startDay : startDay;

            var endDate = new Date(events["end_date"]);
            endDate.setDate(endDate.getDate() + 1); // add one day to end date
            var endMonth = endDate.getMonth() + 1;
            endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
            var endYear = endDate.getFullYear();
            var endDay = endDate.getDate();
            endDay = endDay < 10 ? "0" + endDay : endDay;

            event.push({
                title:
                    "Event: " +
                    events["event_name"] +
                    "\n" +
                    "from " +
                    events["start_time"] +
                    " to " +
                    events["end_time"],
                start: startYear + "-" + startMonth + "-" + startDay,
                end: endYear + "-" + endMonth + "-" + endDay,
                color: "#2AAA8A",
                extendedProps: {
                    type: "event",
                    eventId: events["id"],
                },
            });
        }

        var log = [];
        var loghour = [];
        for (let i = 0; i < data["logs"].length; i++) {
            var logs = data["logs"][i];

            var startDate = new Date(logs["date"]);
            var startMonth = startDate.getMonth() + 1;
            startMonth = startMonth < 10 ? "0" + startMonth : startMonth;
            var startYear = startDate.getFullYear();
            var startDay = startDate.getDate();
            startDay = startDay < 10 ? "0" + startDay : startDay;
            var startTime = logs["start_time"];
            var time = startTime.split(":");
            startTime = time[0] < 10 ? "0" + startTime : startTime;

            var endDate = new Date(logs["end_date"]);
            var endMonth = endDate.getMonth();
            endMonth = endMonth < 10 ? "0" + endMonth : endMonth;
            var endYear = endDate.getFullYear();
            var endDay = endDate.getDate();
            endDay = endDay < 10 ? "0" + endDay : endDay;
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
                    (logs["project_name"] ? logs["project_name"] + " " : "") +
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
                start: startYear + "-" + startMonth + "-" + startDay,
                color: app.color.primary,
                extendedProps: {
                    type: "log",
                    logId: logs["id"],
                },
            });

            loghour.push({
                start: new Date(startYear, startMonth - 1, startDay),
                end: new Date(endYear, endMonth - 1, endDay),
                totalHour: logs["total_hour"],
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
                title: leaves["leave_types"] + " : " + "\n" + leaves["reason"],
                // title: "Event: " + events['event_name'] + "\n" + "from " + events['start_time'] + " to " + events['end_time'],
                start: startYear + "-" + startMonth + "-" + startDay,
                end: endYear + "-" + endMonth + "-" + endDay,
                // color: app.color.green,
                color: "#E0E0E0",
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
        for (let i = 0; i < data["holidays"].length; i++) {
            var holidays = data["holidays"][i];

            var startDate = new Date(holidays["start_date"]);
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
                color: "#FFD580",
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

        dataEvent = event.concat(log);
        dataleave = dataEvent.concat(leave);
        dataHoliday = dataleave.concat(holiday);
        // console.log(dataHoliday);

        var monthValue = $('#month').val();
        var yearValue = $('#year').val();
        var initialDateValue = yearValue + '-' + monthValue + '-01';

        var calendar = new FullCalendar.Calendar(calendarElm, {
            initialDate: initialDateValue,
            datesSet: function (info) {
                // Disable previous and next buttons
                var prevButton = calendar.getPrevButton();
                var nextButton = calendar.getNextButton();
                prevButton.disabled = true;
                nextButton.disabled = true;
            },

            headerToolbar: {
                left: "prev,next",
                center: "title",
                right: "", // Display only the "month" view in the header
            },
            navLinks: false,
            customButtons: {
                logButton: {
                    text: "New Log",
                    click: function (event, jsEvent, view) {
                        $("#newlogmodal").modal("show");
                    },
                },
                EventButton: {
                    text: "New Event",
                    click: function (event, jsEvent, view) {
                        $("#neweventmodal").modal("show");
                    },
                },
            },
            eventContent: function (eventInfo) {
                if (
                    eventInfo.event.extendedProps.type == "log" &&
                    eventInfo.event.extendedProps.allday == true
                ) {
                    return {
                        html:
                            "&nbsp;&nbsp;" +
                            eventInfo.event.extendedProps.type +
                            eventInfo.event.title,
                    };
                } else if (
                    eventInfo.event.extendedProps.type == "event" &&
                    eventInfo.event.extendedProps.allday == true
                ) {
                    return {
                        html:
                            "&nbsp;&nbsp;" +
                            eventInfo.event.extendedProps.type +
                            eventInfo.event.title,
                    };
                } else if (
                    eventInfo.event.extendedProps.type == "event" &&
                    eventInfo.event.extendedProps.allday == false
                ) {
                    return {
                        html:
                            "&nbsp;&nbsp;" +
                            eventInfo.event.extendedProps.type +
                            eventInfo.event.title,
                    };
                }
            },

            dayCellDidMount: function (info) {
                var current = new Date(info.date);
                var hasLog = false;

                for (let i = 0; i < holidayDates.length; i++) {
                    if (
                        current >= holidayDates[i].start &&
                        current <= holidayDates[i].end
                    ) {
                        $(info.el).css("background-color", "#FFD580");
                        return;
                    }
                }

                for (let i = 0; i < leavesdate.length; i++) {
                    if (
                        current >= leavesdate[i].start &&
                        current <= leavesdate[i].end
                    ) {
                        $(info.el).css("background-color", "#E0E0E0");
                        return;
                    }
                }

                if (info.date.getDay() === 0) {
                    // Sunday
                    $(info.el).css("background-color", "#87CEEB");
                } else if (info.date.getDay() === 6) {
                    // Saturday
                    $(info.el).css("background-color", "#87CEEB");
                } else {
                    $(info.el).css("background-color", "white");
                }
            },

            eventClick: function (info) {
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

                function typeOfLog(id) {
                    const typeOfLog = [];
                    (typeOfLog[1] = "Home"),
                        (typeOfLog[2] = "Office"),
                        (typeOfLog[3] = "My Project"),
                        (typeOfLog[4] = "Others");

                    return typeOfLog[id];
                }

                function officeLog(id) {
                    const officeLog = [];
                    (officeLog[1] = "My Project"), (officeLog[2] = "Activity");

                    return officeLog[id];
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

                function getAttendance(eventId, userId) {
                    return $.ajax({
                        url: "/getAttendanceById/" + eventId + "/" + userId,
                    });
                }

                // console.log(name(1));

                if (info.event.extendedProps.type == "leave") {
                } else if (info.event.extendedProps.type == "log") {
                    logId = info.event.extendedProps.logId;
                    var logData = getLogs(logId);
                    logData.then(function (data) {
                        console.log(data);
                        $("#type_of_log").text(typeOfLog(data.type_of_log));
                        $("#date").text(data.date);
                        $("#start_time").text(data.start_time);
                        $("#end_time").text(data.end_time);
                        $("#total_hour").text(data.total_hour);
                        
                        var project = getProjectByidTimesheet(data.project_id);
                        project.then(function (project) {
                            $("#my_project").text(project.project_name);
                        });

                        // var location = getProjectLocationById(
                        //     data.project_location
                        // );
                        // location.then(function (location) {
                        //     $("#location").text(location.location_name);
                        // });


                        // $("#location").text(data.project_location);

                       
                        if (data.project_location === "OFFICE") {
                            $("#location").text("OFFICE");
                        } else if (data.project_location === "OTHERS") {
                            $("#location").text("OTHERS");
                        } else if (!data.project_location) {
                            $("#location").text("-");
                        } else {
                            $("#location").text(data.location_name);
                        }
                        
                        
                        
                        $("#office_log").text(data.office_log ? officeLog(data.office_log) : "-");


                        var activity = getActivityNameById(data.activity_name);
                        activity.then(function (activity) {
                            $("#activity_name").text(activity.activity_name);
                        });

                        $("#desc").text(data.desc);
                       
                        
                        

                        $("#datelog").text(data.date);
                    });

                    

                    $("#editlogmodal").modal("show");
                } else {
                    eventId = info.event.extendedProps.eventId;
                    var eventData = getEvents(eventId);
                    eventData.then(function (data) {
                        // console.log(data);

                        var userId = $("#timesheetApprovalUserId").val();

                        var attendanceEvent = getAttendance(data.id, userId);
                        attendanceEvent.then(function (dataAttendance) {
                            console.log(dataAttendance);
                            if (dataAttendance) {
                                $("#attendStatus").html(
                                    '<span class="badge bg-lime rounded-pill" id="attend">' +
                                        dataAttendance.status +
                                        "</span>"
                                );
                            }
                        });

                        $("#event_name").text(data.event_name);
                        $("#start_date").text(data.start_date);
                        $("#end_date").text(data.end_date);
                        $("#start_time_event").text(data.start_time);
                        $("#end_time_event").text(data.end_time);
                        // duration = +data.end_time - +data.start_time;
                        // alert(duration);
                        $("#duration").text(data.duration);
                        $("#location_event").text(data.venue);
                        // var location = getProjectLocationById(data.location);
                        // location.then(function (location) {
                        //     $("#location_event").text(
                        //         location.location_name
                        //             ? location.location_name
                        //             : "-"
                        //     );
                        // });

                        var project = getProjectByidTimesheet(data.project_id);
                        project.then(function (project) {
                            $("#project_event").text(
                                project.project_name
                                    ? project.project_name
                                    : "-"
                            );
                        });

                        $("#priority").text(
                            data.priority ? data.priority : "-"
                        );
                        $("#recurring").text(
                            data.recurring ? data.recurring : "-"
                        );

                        $("#desc_event").text(data.desc);
                        
                        $("#reminder").text(data.reminder);

                        if ($("#reminder").text() === "1") {
                            $("#reminder").text("5 Minute Before");
                        }
                        else if($("#reminder").text() === "2") {
                            $("#reminder").text("10 Minute Before");
                        }
                        else if($("#reminder").text() === "3") {
                            $("#reminder").text("15 Minute Before");
                        }
                        else if($("#reminder").text() === "4") {
                            $("#reminder").text("20 Minute Before");
                        }
                        else if($("#reminder").text() === "5") {
                            $("#reminder").text("30 Minute Before");
                        }
                        else if($("#reminder").text() === "6") {
                            $("#reminder").text("1 Hour Before");
                        }

                        $('#dateevent').text(data.start_date +' To ' + data.end_date);
                      

                        $("#file_upload").html(
                            '<a class="form-label" target="_blank" href="/storage/' +
                                data.file_upload +
                                '">' +
                                data.file_upload +
                                "</a>"
                        );
                        // $('#attend').text('attend');
                    });

                    $("#editeventmodal").modal("show");
                }
            },
            // buttonText: {
            //     today: "Today",
            //     month: "Month",
            //     week: "Week",
            //     day: "Day",
            //     list: "List",
            // },
            initialView: "dayGridMonth",
            editable: false,
            droppable: false,
            selectable: false,
            themeSystem: "bootstrap",
            views: {
                timeGrid: {
                    eventLimit: 6, // adjust to 6 only for timeGridWeek/timeGridDay
                },
            },
            events: dataHoliday,
            // [{
            //     title: 'EXAMPLE Log',
            //     start: year + '-' + month + '-02T06:00:00',
            //     color: app.color.primary,
            //     extendedProps: {
            //         type: 'log',

            //     }

            // }, {
            //     title: 'EXAMPLE LOG 2',
            //     start: year + '-' + month + '-02T07:00:00',
            //     color: app.color.primary,
            //     extendedProps: {
            //         type: 'log',

            //     },
            // }, {

            //     title: 'EXAMPLE EVENT',
            //     start: year + '-' + month + '-10',
            //     end: year + '-' + month + '-12',
            //     color: app.color.red,
            //     extendedProps: {
            //         type: 'event',
            //         allday: true
            //     },
            // }, {
            //     title: 'EXAMPLE event 2',
            //     start: year + '-' + month + '-10T01:00:00',
            //     color: app.color.red,
            //     extendedProps: {
            //         type: 'event'

            //     },
            // }],
        });

        calendar.render();
    });
};

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
