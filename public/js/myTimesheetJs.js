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
            console.log(data);
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

    $(document).on("click", "#deleteButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
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
                        confirmButtonText: 'OK'
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

    $('#saveLogButton').click(function(e) {
        $("#addLogForm").validate({
            rules: {
                // department: "required",
                // type_of_log: "required",
                // activity_name: "required",
                // financial_year: "required",
                // LOA_date: "required",
                // contract_start_date: "required",
                // contract_end_date: "required",
                // acc_manager: "required",
                // bank_guarantee_amount: "required",
            },

            messages: {
                // department: "",
                // type_of_log: "",
                // activity_name: "",
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
                            confirmButtonText: 'OK'
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


    $('#updateButton').click(function(e) {
        $("#editForm").validate({
            rules: {
                department: "required",
                type_of_log: "required",
                activity_name: "required",
            },

            messages: {
                department: "",
                type_of_log: "",
                activity_name: "",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editForm"));
                    // console.log(data);
                    var id = $('#idT').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateTypeOfLogs/" + id,
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
                            confirmButtonText: 'OK'
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

    /////////////////////////////////////// EVENT ////////////////////////////////
    $('#saveEventButton').click(function(e) {
        $("#addEventForm").validate({
            rules: {
                // department: "required",
                // type_of_log: "required",
                // activity_name: "required",
                // financial_year: "required",
                // LOA_date: "required",
                // contract_start_date: "required",
                // contract_end_date: "required",
                // acc_manager: "required",
                // bank_guarantee_amount: "required",
            },

            messages: {
                // department: "",
                // type_of_log: "",
                // activity_name: "",
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
                            confirmButtonText: 'OK'
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
            eventClick: function(info) {
                info.jsEvent.preventDefault();



                if (info.event.extendedProps.type == "log") {
                    $('#editlogmodal').modal('show');
                } else {
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
            events: [{
                title: 'EXAMPLE LOG',
                start: year + '-' + month + '01',
                end: year + '-' + month + '05',
                color: app.color.success,
                extendedProps: {
                    type: 'log'
                }


            }, {
                title: 'EXAMPLE LOG 2',
                start: year + '-' + month + '-03T14:00:00',
                color: app.color.success,
                extendedProps: {
                    type: 'log'
                },
            }, {
                title: 'EXAMPLE EVENT',
                start: year + '-' + month + '-10',
                end: year + '-' + month + '-12',
                display: 'background',
                extendedProps: {
                    type: 'event'
                },
            }],

        });

        calendar.render();
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
        autoclose: true
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
            timeFormat: 'HH:mm',
        });
        $("#endtime").timepicker({
            timeFormat: 'HH:mm',
        });
        starteventtime
        $("#starteventtime").timepicker();
        $("#endeventtime").timepicker();
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
        timeFormat: 'HH:mm',
    });
    $("#endtimeedit").timepicker({
        timeFormat: 'HH:mm',
    });
    starteventtime
    $("#starteventtimeedit").timepicker({
        timeFormat: 'HH:mm',
    });
    $("#endeventtimeedit").timepicker({
        timeFormat: 'HH:mm',
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

});
