$(document).ready(function () {
    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });

    $("#table-leave").DataTable({
        responsive: false,
        bFilter: false,
        paging: false,
    });

    Chart.defaults.color = "rgba(" + app.color.componentColorRgb + ", .65)";
    Chart.defaults.font.family = app.font.family;
    Chart.defaults.font.weight = 500;
    Chart.defaults.scale.grid.color =
        "rgba(" + app.color.componentColorRgb + ", .15)";
    Chart.defaults.scale.ticks.backdropColor =
        "rgba(" + app.color.componentColorRgb + ", 0)";

    var ctx5 = document.getElementById("myChart").getContext("2d");

    window.myPie = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Total Entitlement", "Total Balance", "Total Token"],
            datasets: [
                {
                    data: [14, 6, 8],
                    backgroundColor: [
                        "rgba(52, 143, 226)",
                        "rgb(73, 182, 214)",
                        "rgba(255, 99, 71, 0.5)",
                    ],
                    borderColor: [
                        app.color.red,
                        app.color.orange,
                        app.color.gray500,
                        app.color.gray300,
                        app.color.gray900,
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
        },
    });

    Chart.defaults.color = "rgba(" + app.color.componentColorRgb + ", .65)";
    Chart.defaults.font.family = app.font.family;
    Chart.defaults.font.weight = 500;
    Chart.defaults.scale.grid.color =
        "rgba(" + app.color.componentColorRgb + ", .15)";
    Chart.defaults.scale.ticks.backdropColor =
        "rgba(" + app.color.componentColorRgb + ", 0)";

    var ctx5 = document.getElementById("myChart2").getContext("2d");

    window.myPie = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Total Carried foward", "Total Balance", "Total Token"],
            datasets: [
                {
                    data: [5, 1, 4],
                    backgroundColor: [
                        "rgba(52, 143, 226)",
                        "rgb(73, 182, 214)",
                        "rgba(255, 99, 71, 0.5)",
                    ],
                    borderColor: [
                        app.color.red,
                        app.color.orange,
                        app.color.gray500,
                        app.color.gray300,
                        app.color.gray900,
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
        },
    });

    $("#datepicker-applied").datepicker({
        todayHighlight: true,
        autoclose: true,
        // format: "yyyy-mm-dd",
    });

    var dt = new Date();
    document.getElementById("datepicker-applied").innerHTML = dt;

    var dt = new Date();
    document.getElementById("datepicker-filter").innerHTML = dt;

    $("#datepicker-leave").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#datepicker-filter").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#datepicker-start").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#datepicker-end").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $(document).ready(function () {
        $("#menu5").hide();
        $("#menu6").hide();
        $("#menu7").hide();
        $("#menu8").hide();
    });

    $(document).on("change", "#select3", function () {
        if ($(this).val() == "1") {
            $("#menu5").show();
        } else if ($(this).val() == "0.5") {
            $("#menu5").show();
            $("#menu6").show();
        } else {
            $("#menu5").hide();
            $("#menu6").hide();
        }
    });

    $(document).on("change", "#select3", function () {
        if ($(this).val() == "-") {
            $("#menu7").show();
            $("#menu8").show();
        } else {
            $("#menu7").hide();
            $("#menu8").hide();
        }
    });

    $(document).ready(function () {
        $("#filter").click(function () {
            $("#filterleave").toggle();
        });
    });

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                applied_date: "required",
                typeofleave: "required",
                noofday: "required",
                reason: "required",
            },

            messages: {
                applied_date: "Please Insert applied date title",
                typeofleave: "Please Insert type of leave",
                noofday: "Please Insert no of day",
                reason: "Please Insert reason",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    // console.log(document.getElementById("addForm"));
                    // return false;

                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createtmyleave",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
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

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");
        var myleaveData = myleave(id);
        console.log(myleaveData);

        myleaveData.done(function (data) {
            $("#datepicker-applied1").val(data.applied_date);
            $("#typeofleave1").val(data.lt_type_id);
            $("#dayApplied").val(data.day_applied);
            $("#totalapply").val(data.total_day_applied);
            $("#datepicker-leave").val(data.leave_date);
            $("#datepicker-start").val(data.start_date);
            $("#datepicker-end").val(data.start_date);
            $("#reason").val(data.reason);
            $("#reasonreject").val(data.reason);

            if (data.leave_session == "1") {
                $("#flexRadioDefault1").prop("checked", true);
            } else if (data.leave_session == "2") {
                $("#flexRadioDefault2").prop("checked", true);
            } else {
                $("#flexRadioDefault1").prop("checked", false);
                $("#flexRadioDefault2").prop("checked", false);
            }

            if (data.status === 1) {
                // tampilkan status "Approved"
                $("#status_display").text($("#status_1").text());
            } else if (data.status === 2) {
                // tampilkan status "Rejected"
                $("#status_display").text($("#status_2").text());
            } else {
                // tampilkan pesan kesalahan jika status tidak valid
                $("#status_display").text("Invalid status");
            }
        });
    });

    function myleave(id) {
        return $.ajax({
            url: "/getcreatemyleave/" + id,
        });
    }

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        // console.log(id);
        // return false;
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deletemyleave/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },
                    // async: false,
                    // processData: false,
                    // contentType: false,
                }).done(function (data) {
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

    $(document).on("click", "#editButton2", function () {
        var id = $(this).data("id");
        console.log(id);
        var myleavethree = myleavesv(id);
        // console.log(myleaveData2);

        myleavethree.done(function (data) {
            $("#datafullname").val(data[0].fullName);
            console.log(data[0]);
            $("#applieddate").val(data[0].applied_date);
            $("#type1").val(data[0].type);
            $("#dayapplied").val(data[0].day_applied);
            $("#startdate").val(data[0].start_date);
            $("#enddate").val(data[0].end_date);
            $("#totaldayapplied").val(data[0].total_day_applied);
            $("#reason1").val(data[0].reason);

            if (data.leave_session == "1") {
                $("#flexRadioDefault1").prop("checked", true);
            } else if (data.leave_session == "2") {
                $("#flexRadioDefault2").prop("checked", true);
            } else {
                $("#flexRadioDefault1").prop("checked", false);
                $("#flexRadioDefault2").prop("checked", false);
            }

            if (data.status === 1) {
                // tampilkan status "Approved"
                $("#status_display").text($("#status_1").text());
            } else if (data.status === 2) {
                // tampilkan status "Rejected"
                $("#status_display").text($("#status_2").text());
            } else {
                // tampilkan pesan kesalahan jika status tidak valid
                $("#status_display").text("Invalid status");
            }
        });
    });

    function myleavesv(id) {
        return $.ajax({
            url: "/getusermyleave/" + id,
        });
    }
});