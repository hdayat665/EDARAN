$(document).ready(function () {


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
