var handleCalendarDemo = function () {
    // fullcalendar

    var d = new Date();
    var month = d.getMonth() + 1;
    month = month < 10 ? "0" + month : month;
    var year = d.getFullYear();
    var day = d.getDate();
    var today = moment().startOf("day");
    var calendarElm = document.getElementById("calendar");

    function getTimesheet(userId) {
        return $.ajax({
            url: "/getTimesheetByIdLeave/" + userId,
        });
    }
    var userId = $("#timesheetApprovalUserId").val();
    // console.log(userId);
    // return false;



    var timesheetData = getTimesheet(userId);

    timesheetData.then(function (data) {
        console.log(data);
        // return false;

        var leave = [];
        var leavesdate = [];
        for (let i = 0; i < data["leaves"].length; i++) {
            var leaves = data["leaves"][i];
            // console.log(leaves);


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
                start: startYear + "-" + startMonth + "-" + startDay,
                end: endYear + "-" + endMonth + "-" + endDay,

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

        const dataleave = [...new Set(leave)];
        const dataHoliday = dataleave.concat(holiday);

        console.log(dataHoliday);
        var calendar = new FullCalendar.Calendar(calendarElm, {
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
                right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
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
                        $("#office_log").text(officeLog(data.office_log));
                        var project = getProjectByidTimesheet(data.project_id);
                        project.then(function (project) {
                            $("#my_project").text(project.project_name);
                        });

                        var location = getProjectLocationById(
                            data.project_location
                        );
                        location.then(function (location) {
                            $("#location").text(location.location_name);
                        });

                        var activity = getActivityNameById(data.activity_name);
                        activity.then(function (activity) {
                            $("#activity_name").text(activity.activity_name);
                        });

                        $("#desc").val(data.desc);
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
                        var location = getProjectLocationById(data.location);
                        location.then(function (location) {
                            $("#location_event").text(
                                location.location_name
                                    ? location.location_name
                                    : "-"
                            );
                        });

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
                        $("#reminder").text("None");
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
