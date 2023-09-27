$(document).ready(function () {

    $(document).ready(function() {

        var originalGetComputedStyle = window.getComputedStyle;

        window.getComputedStyle = function(el, pseudo) {
            try {
                return originalGetComputedStyle(el, pseudo);
            } catch (err) {
                console.warn('getComputedStyle override: prevented error.', err);
                return {
                    getPropertyValue: function() { return ""; } // metode palsu
                };
            }
        };
        $(".tableAction").hide();
        $(document).on("click", ".dropdown-toggle", function(e) {
            e.stopPropagation(); // mencegah event dari bubbling ke atas

            var dropdownMenu = $(this).closest(".btn-group").find(".tableAction");

            $(".tableAction").not(dropdownMenu).hide();
            dropdownMenu.toggle();
        });

        $(document).on("click", function(e) {
            if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
                $(".tableAction").hide();
            }
        });
    });


    $("#tableweekend").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#tableweekend").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#clear_monday").on("click", function() {
        $("#duration_monday").val("");
        $("#start_time_monday").val("");
        $("#end_time_monday").val("");
      });
    $("#clear_tuesday").on("click", function() {
        $("#start_time_tuesday").val("");
        $("#end_time_tuesday").val("");
        $("#duration_tuesday").val("");
      });
    $("#clear_wednesday").on("click", function() {
        $("#start_time_wednesday").val("");
        $("#end_time_wednesday").val("");
        $("#duration_wednesday").val("");
      });
    $("#clear_thursday").on("click", function() {
        $("#start_time_thursday").val("");
        $("#end_time_thursday").val("");
        $("#duration_thursday").val("");
      });
    $("#clear_friday").on("click", function() {
        $("#start_time_friday").val("");
        $("#end_time_friday").val("");
        $("#duration_friday").val("");
      });
    $("#clear_saturday").on("click", function() {
        $("#start_time_saturday").val("");
        $("#end_time_saturday").val("");
        $("#duration_saturday").val("");
      });
    $("#clear_sunday").on("click", function() {
        $("#start_time_sunday").val("");
        $("#end_time_sunday").val("");
        $("#duration_sunday").val("");
      });

    $("#duration_monday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,

     });

    $("#start_time_monday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#end_time_monday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#start_time_tuesday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#end_time_tuesday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#duration_tuesday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#start_time_wednesday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#end_time_wednesday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#duration_wednesday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#start_time_thursday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#end_time_thursday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#duration_thursday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#start_time_friday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#end_time_friday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#duration_friday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#start_time_saturday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#end_time_saturday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#duration_saturday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#start_time_sunday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#end_time_sunday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

    $("#duration_sunday").mdtimepicker({
        showMeridian: true,
        timeFormat: 'hh:mm:ss.000',
        is24hour: true,
     });

     $(document).on("click", "#editButton", function () {
        var id = $(this).data("state_id");
        var getData = weekend(id);

        getData.then(function (data) {

            $("#state").text(`STATE -  ${data[0].state_name.toUpperCase()}`);

            console.log(data);

            $("#id_monday").val(data[0].id);
            $("#start_time_monday").val(data[0].start_time);
            $("#end_time_monday").val(data[0].end_time);
            $("#duration_monday").val(data[0].total_time);
            $("#id_tuesday").val(data[1].id);
            $("#start_time_tuesday").val(data[1].start_time);
            $("#end_time_tuesday").val(data[1].end_time);
            $("#duration_tuesday").val(data[1].total_time);
            $("#id_wednesday").val(data[2].id);
            $("#start_time_wednesday").val(data[2].start_time);
            $("#end_time_wednesday").val(data[2].end_time);
            $("#duration_wednesday").val(data[2].total_time);
            $("#id_thursday").val(data[3].id);
            $("#start_time_thursday").val(data[3].start_time);
            $("#end_time_thursday").val(data[3].end_time);
            $("#duration_thursday").val(data[3].total_time);
            $("#id_friday").val(data[4].id);
            $("#start_time_friday").val(data[4].start_time);
            $("#end_time_friday").val(data[4].end_time);
            $("#duration_friday").val(data[4].total_time);
            $("#id_saturday").val(data[5].id);
            $("#start_time_saturday").val(data[5].start_time);
            $("#end_time_saturday").val(data[5].end_time);
            $("#duration_saturday").val(data[5].total_time);
            $("#id_sunday").val(data[6].id);
            $("#start_time_sunday").val(data[6].start_time);
            $("#end_time_sunday").val(data[6].end_time);
            $("#duration_sunday").val(data[6].total_time);
        });
    });

    function weekend(id) {
        return $.ajax({
            url: "/getweekend/" + id,
        });
    }

    $.validator.addMethod("endAfterStart", function(value, element, params) {
        var startTime = $(params[0]).val();
        var endTime = $(params[1]).val();

        if (!startTime || !endTime) return true;

        return Date.parse('01/01/1970 ' + endTime) > Date.parse('01/01/1970 ' + startTime);
    }, "Enable to enter backdated");

    $.validator.addMethod("checkStartTime", function(value, element, params) {
        var startTime = $(params[0]).val();
        var endTime = $(params[1]).val();
        var duration = $(params[2]).val();

        if (!startTime && (endTime || duration)) {
            return false;
        }

        return true;
    }, "Please Insert Start Time");

    $.validator.addMethod("checkEndTime", function(value, element, params) {
        var startTime = $(params[0]).val();
        var endTime = $(params[1]).val();
        var duration = $(params[2]).val();

        if (!endTime && (startTime || duration)) {
            return false;
        }

        return true;
    }, "Please Insert End Time");

    $("#updateweekendmodal").click(function(e) {
        // Use validate method
        $("#updateweekendmodal").validate({
            rules: {

                start_time_monday: {
                    checkStartTime: ['#start_time_monday', '#end_time_monday', '#duration_monday'],
                },
                end_time_monday: {
                    checkEndTime: ['#start_time_monday', '#end_time_monday', '#duration_monday'],
                    endAfterStart: ['#start_time_monday', '#end_time_monday']
                },
                duration_monday: {
                    required: function(element) {
                        return $('#start_time_monday').val() !== "" || $('#end_time_monday').val() !== "";
                    }
                },
                start_time_tuesday: {
                    checkStartTime: ['#start_time_tuesday', '#end_time_tuesday', '#duration_tuesday'],
                },
                end_time_tuesday: {
                    checkEndTime: ['#start_time_tuesday', '#end_time_tuesday', '#duration_tuesday'],
                    endAfterStart: ['#start_time_tuesday', '#end_time_tuesday']
                },
                duration_tuesday: {
                    required: function(element) {
                        return $('#start_time_tuesday').val() !== "" || $('#end_time_tuesday').val() !== "";
                    }
                },
                start_time_wednesday: {
                    checkStartTime: ['#start_time_wednesday', '#end_time_wednesday', '#duration_wednesday'],
                },
                end_time_wednesday: {
                    checkEndTime: ['#start_time_wednesday', '#end_time_wednesday', '#duration_wednesday'],
                    endAfterStart: ['#start_time_wednesday', '#end_time_wednesday']
                },
                duration_wednesday: {
                    required: function(element) {
                        return $('#start_time_wednesday').val() !== "" || $('#end_time_wednesday').val() !== "";
                    }
                },
                start_time_thursday: {
                    checkStartTime: ['#start_time_thursday', '#end_time_thursday', '#duration_thursday'],
                },
                end_time_thursday: {
                    checkEndTime: ['#start_time_thursday', '#end_time_thursday', '#duration_thursday'],
                    endAfterStart: ['#start_time_thursday', '#end_time_thursday']
                },
                duration_thursday: {
                    required: function(element) {
                        return $('#start_time_thursday').val() !== "" || $('#end_time_thursday').val() !== "";
                    }
                },
                start_time_friday: {
                    checkStartTime: ['#start_time_friday', '#end_time_friday', '#duration_friday'],
                },
                end_time_friday: {
                    checkEndTime: ['#start_time_friday', '#end_time_friday', '#duration_friday'],
                    endAfterStart: ['#start_time_friday', '#end_time_friday']
                },
                duration_friday: {
                    required: function(element) {
                        return $('#start_time_friday').val() !== "" || $('#end_time_friday').val() !== "";
                    }
                },
                start_time_saturday: {
                    checkStartTime: ['#start_time_saturday', '#end_time_saturday', '#duration_saturday'],
                },
                end_time_saturday: {
                    checkEndTime: ['#start_time_saturday', '#end_time_saturday', '#duration_saturday'],
                    endAfterStart: ['#start_time_saturday', '#end_time_saturday']
                },
                duration_saturday: {
                    required: function(element) {
                        return $('#start_time_saturday').val() !== "" || $('#end_time_saturday').val() !== "";
                    }
                },
                start_time_sunday: {
                    checkStartTime: ['#start_time_sunday', '#end_time_sunday', '#duration_sunday'],
                },
                end_time_sunday: {
                    checkEndTime: ['#start_time_sunday', '#end_time_sunday', '#duration_sunday'],
                    endAfterStart: ['#start_time_sunday', '#end_time_sunday']
                },
                duration_sunday: {
                    required: function(element) {
                        return $('#start_time_sunday').val() !== "" || $('#end_time_sunday').val() !== "";
                    }
                },
            },
            messages: {
                duration_monday: {
                    required: "Please Insert Duration"
                },
                duration_tuesday: {
                    required: "Please Insert Duration"
                },
                duration_wednesday: {
                    required: "Please Insert Duration"
                },
                duration_thursday: {
                    required: "Please Insert Duration"
                },
                duration_friday: {
                    required: "Please Insert Duration"
                },
                duration_saturday: {
                    required: "Please Insert Duration"
                },
                duration_sunday: {
                    required: "Please Insert Duration"
                }
            },
            submitHandler: function(form) {
                requirejs(["sweetAlert2"], function(swal) {
                    var data = new FormData(document.getElementById("updateweekendmodal"));
                    console.log('test');
                    $.ajax({
                        type: "POST",
                        url: "/updateweekend",
                        data: data,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                    }).then(function(data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function() {
                            if (data.type == "error") {} else {
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });



    $("#updateweekendmodal").click(function (e) {

        $("#updateweekendmodal").validate({
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateweekendmodal")
                    );

                    console.log('test');

                    $.ajax({
                        type: "POST",
                        url: "/updateweekend",
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
                                // location.hash = "default-tab-1";
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#savestatemodal").click(function (e) {
        $("#formstate").validate({
            // Specify validation rules
            rules: {
                state_id: "required",
            },

            messages: {
                state_id: "Please Select State",

            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "state_id") {
                    error.insertAfter(element.closest(".input-group"));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("formstate"));
                    // data.forEach(function(value, key) {
                    //     console.log(key + ": " + value);
                    //   });

                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createleaveweekend",
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



});
