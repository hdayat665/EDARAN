var handleCalendarDemo = function() {
    // fullcalendar

    var d = new Date();
    var month = d.getMonth() + 1;
    month = (month < 10) ? '0' + month : month;
    var year = d.getFullYear();
    var day = d.getDate();
    var today = moment().startOf('day');
    var calendarElm = document.getElementById('calendar');

    function getTimesheet(id, userId) {
        return $.ajax({
            url: "/getTimesheetById/" + id + '/' + userId
        });
    }
    var id = $('#timesheetApprovalId').val();
    var userId = $('#timesheetApprovalUserId').val();

    var timesheetData = getTimesheet(id, userId);

    timesheetData.done(function(data) {
        // console.log(data);
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
                // title: events['event_name'],
                title: "Event: " + events['event_name'],
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
            var time = startTime.split(":");
            startTime = time[0] < 10 ? "0" + startTime : startTime;

            var endDate = new Date(events['end_date']);
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
                // title: type_of_log(logs['type_of_log']),
                // title: type_of_log(logs['type_of_log']) + ' ' + logs['start_time'],
                title: (logs['project_name'] ? logs['project_name'] + ' ' : '') + "\n" + (logs['activitynameas'] ? logs['activitynameas'] + ' ' : '') + ' from ' + logs['start_time'] + ' to ' + logs['end_time'],
                // start: startYear + '-' + startMonth + '-' + startDay + 'T' + startTime + ':00',
                start: startYear + '-' + startMonth + '-' + startDay,
                color: app.color.primary,
                extendedProps: {
                    type: 'log',
                    logId: logs['id']
                }
            });
        }
        dataEvent = event.concat(log);
        var calendar = new FullCalendar.Calendar(calendarElm, {
            headerToolbar: {
                left: 'prev,today,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            customButtons: {
                logButton: {
                    text: 'New Log',
                    click: function(event, jsEvent, view) {
                        $('#newlogmodal').modal('show');
                    }
                },
                EventButton: {
                    text: 'New Event',
                    click: function(event, jsEvent, view) {
                        $('#neweventmodal').modal('show');
                    }
                }
            },
            eventContent: function(eventInfo) {
                if (eventInfo.event.extendedProps.type == "log" && eventInfo.event.extendedProps.allday == true) {
                    return { html: ('&nbsp;&nbsp;' + eventInfo.event.extendedProps.type + eventInfo.event.title) }
                } else if (eventInfo.event.extendedProps.type == "event" && eventInfo.event.extendedProps.allday == true) {
                    return { html: ('&nbsp;&nbsp;' + eventInfo.event.extendedProps.type + eventInfo.event.title) }
                } else if (eventInfo.event.extendedProps.type == "event" && eventInfo.event.extendedProps.allday == false) {
                    return { html: ('&nbsp;&nbsp;' + eventInfo.event.extendedProps.type + eventInfo.event.title) }
                }

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


                function typeOfLog(id) {
                    const typeOfLog = [];
                    typeOfLog[1] = 'Home',
                        typeOfLog[2] = 'Office',
                        typeOfLog[3] = 'My Project',
                        typeOfLog[4] = 'Others'

                    return typeOfLog[id];
                }

                function officeLog(id) {
                    const officeLog = [];
                    officeLog[1] = 'My Project',
                        officeLog[2] = 'Activity'

                    return officeLog[id];
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

                function getAttendance(eventId, userId) {
                    return $.ajax({
                        url: "/getAttendanceById/" + eventId + '/' + userId
                    });
                }


                // console.log(name(1));


                if (info.event.extendedProps.type == "log") {
                    logId = info.event.extendedProps.logId;
                    var logData = getLogs(logId);
                    logData.done(function(data) {
                        console.log(data);
                        $('#type_of_log').text(typeOfLog(data.type_of_log));
                        $('#date').text(data.date);
                        $('#start_time').text(data.start_time);
                        $('#end_time').text(data.end_time);
                        $('#total_hour').text(data.total_hour);
                        $('#office_log').text(officeLog(data.office_log));
                        var project = getProjectByidTimesheet(data.project_id);
                        project.done(function(project) {
                            $('#my_project').text(project.project_name);

                        })

                        var location = getProjectLocationById(data.project_location);
                        location.done(function(location) {
                            $('#location').text(location.location_name);

                        })

                        var activity = getActivityNameById(data.activity_name);
                        activity.done(function(activity) {
                            $('#activity_name').text(activity.activity_name);

                        })

                        $('#desc').val(data.desc);



                    });

                    $('#editlogmodal').modal('show');
                } else {
                    eventId = info.event.extendedProps.eventId;
                    var eventData = getEvents(eventId);
                    eventData.done(function(data) {
                        // console.log(data);

                        var userId = $('#timesheetApprovalUserId').val();

                        var attendanceEvent = getAttendance(data.id, userId);
                        attendanceEvent.done(function(dataAttendance) {
                            console.log(dataAttendance);
                            if (dataAttendance) {
                                $('#attendStatus').html('<span class="badge bg-lime rounded-pill" id="attend">' + dataAttendance.status + '</span>');
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
                            $('#location_event').text(location.location_name ? location.location_name : '-');

                        })

                        var project = getProjectByidTimesheet(data.project_id);
                        project.done(function(project) {
                            $('#project_event').text(project.project_name ? project.project_name : '-' );

                        })

                        $('#priority').text(data.priority ? data.priority : '-');
                        $('#recurring').text(data.recurring ? data.recurring : '-');

                        $('#desc_event').text(data.desc);
                        $('#reminder').text('None');
                        $('#file_upload').html('<a class="form-label" target="_blank" href="/storage/' + data.file_upload + '">' + data.file_upload + '</a>');
                        // $('#attend').text('attend');

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
            selectable: false,
            themeSystem: 'bootstrap',
            views: {
                timeGrid: {
                    eventLimit: 6 // adjust to 6 only for timeGridWeek/timeGridDay
                }
            },
            events: dataEvent,
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
