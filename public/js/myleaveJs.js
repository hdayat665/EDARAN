$(document).ready(function () {
    const fileInput = document.getElementById("fileupload");
    fileInput.addEventListener("change", validateFile);

    function validateFile() {
        const fileSize = fileInput.files[0].size / 1024 / 1024; // ukuran file dalam MB
        if (fileSize > 5) {
            alert("File size exceeds the maximum limit of 5 M");
            fileInput.value = ""; // reset input file
        }
    }
    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });

    $("#table-leave").DataTable({
        responsive: false,
        bFilter: true,
        paging: false,
    });

    var mypie1 = mypie1();

    function mypie1() {
        return $.ajax({
            url: "/getpieleave/",
        });
    }

    mypie1.done(function (datapie) {
        Chart.defaults.color = "rgba(" + app.color.componentColorRgb + ", .65)";
        Chart.defaults.font.family = app.font.family;
        Chart.defaults.font.weight = 500;
        Chart.defaults.scale.grid.color =
            "rgba(" + app.color.componentColorRgb + ", .15)";
        Chart.defaults.scale.ticks.backdropColor =
            "rgba(" + app.color.componentColorRgb + ", 0)";

        var ctx5 = document.getElementById("myChart").getContext("2d");

        var total_balance =
            datapie.current_entitlement - datapie.total_day_applied;
        var total_token = datapie.total_day_applied;
        console.log(datapie);

        window.myPie = new Chart(ctx5, {
            type: "pie",
            data: {
                labels: ["Total Balance", "Total Token"],
                datasets: [
                    {
                        data: [total_balance, total_token],
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
    });

    var mypie2 = mypie2();

    function mypie2() {
        return $.ajax({
            url: "/getpieleave2/",
        });
    }

    mypie2.done(function (datapie2) {
        Chart.defaults.color = "rgba(" + app.color.componentColorRgb + ", .65)";
        Chart.defaults.font.family = app.font.family;
        Chart.defaults.font.weight = 500;
        Chart.defaults.scale.grid.color =
            "rgba(" + app.color.componentColorRgb + ", .15)";
        Chart.defaults.scale.ticks.backdropColor =
            "rgba(" + app.color.componentColorRgb + ", 0)";

        var ctx5 = document.getElementById("myChart2").getContext("2d");

        var total_balance =
            datapie2.current_entitlement - datapie2.total_day_applied;
        var total_token = datapie2.total_day_applied;
        console.log(datapie2);

        window.myPie = new Chart(ctx5, {
            type: "pie",
            data: {
                labels: ["Total Balance", "Total Token"],
                datasets: [
                    {
                        data: [total_balance, total_token],
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
    });

    // $("#datepicker-applied").datepicker({
    //     todayHighlight: true,
    //     autoclose: true,
    //     // // format: "yyyy-mm-dd",
    // });

    $("#datepicker-applied")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
        })
        .datepicker("setDate", new Date());

    $("#datepicker-applied")
        .on("show", function (e) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        })
        .on("click", function (e) {
            $(this).datepicker("hide");
        });

    // $("#datepicker-applied").datepicker("getDate");

    // var dt = new Date();
    // document.getElementById("datepicker-applied").innerHTML = dt;

    var dt = new Date();
    document.getElementById("datepicker-filter").innerHTML = dt;

    // $("#datepicker-leave").datepicker({
    //     todayHighlight: true,
    //     autoclose: true,
    //     format: "dd-mm-yyyy",
    // });
    $("#datepicker-leave").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
        beforeShowDay: function (date) {
            var day = date.getDay();
            return [day != 0 && day != 6];
        },
    });

    $("#datepicker-filter").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#datepicker-start").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#datepicker-end").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
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
            $("#menu6").hide();
            $("#menu7").hide();
            $("#menu8").hide();
            $("#select4").val(1);
            $("#start-date").val("");
            $("#end-date").val("");
            $("#flexRadioDefault1").val("");
            $("#flexRadioDefault2").val("");
        } else if ($(this).val() == "0.5") {
            $("#menu5").show();
            $("#menu6").show();
            $("#menu7").hide();
            $("#menu8").hide();
            $("#select4").val(0.5);
            $("#start-date").val("");
            $("#end-date").val("");
        } else if ($(this).val() == "-") {
            $("#menu5").hide();
            $("#menu6").hide();
            $("#menu7").show();
            $("#menu8").show();
            $("#start-date").val("");
            $("#end-date").val("");
            $("#select4").val("");
            $("#flexRadioDefault1").val("");
            $("#flexRadioDefault2").val("");
        } else {
            $("#menu5").hide();
            $("#menu6").hide();
        }
    });

    $(document).on("change", "#datepicker-start, #datepicker-end", function () {
        var startDate = $("#datepicker-start").val();
        var endDate = $("#datepicker-end").val();
        var totalDays = "";

        if (startDate && endDate) {
            var date1 = new Date(startDate);
            var date2 = new Date(endDate);
            var timeDiff = date2.getTime() - date1.getTime();
            var dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
            totalDays = dayDiff + 1;
        }

        $("#select4").val(totalDays);
    });

    $(document).ready(function () {
        if (
            $("#datepicker-filter").val() ||
            $("#typelist").val() ||
            $("#status_searching").val()
        ) {
            $("#filterleave").show();
        } else {
            $("#filterleave").hide();
        }

        $("#filter").click(function () {
            $("#filterleave").toggle();
        });
    });

    $("#reset").on("click", function () {
        $("#datepicker-filter").val(
            $("#datepicker-filter").data("default-value")
        );
        $("#typelist").val($("#typelist").data("default-value"));
        $("#status_searching").val(
            $("#status_searching").data("default-value")
        );
    });

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                applied_date: "required",
                typeofleave: "required",
                noofday: "required",
                leave_date: "required",
                start_date: "required",
                end_date: "required",
                reason: "required",
                flexRadioDefault: "required",
            },

            messages: {
                applied_date: "Please Insert Applied Date Title",
                typeofleave: "Please Select Type of Leave",
                noofday: "Please Select No of Day(s) Applied",
                reason: "Please Insert Reason",
                leave_date: "Please Insert leave date",
                start_date: "Please Insert Start Date",
                end_date: "Please Insert End Date",
                flexRadioDefault: "Please select morning or evening",
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
        // console.log(myleaveData);

        myleaveData.done(function (data) {
            $("#datepicker-applied1").val(data[0].applied_date);
            $("#typeofleave1").val(data[0].lt_type_id);
            // $("#dayApplied1").val(data[0].day_applied);
            $("#totalapply1").val(data[0].total_day_applied);
            $("#datepicker-leave1").val(data[0].leave_date);
            $("#datepicker-start1").val(data[0].start_date);
            $("#datepicker-end1").val(data[0].end_date);
            $("#reason1").val(data[0].reason);
            $("#reasonreject1").val(data[0].reason);
            // console.log(data[0]);
            if (data[0].day_applied == 1) {
                $("#dayApplied1").val("One Day");
            } else if (data[0].day_applied == 0.5) {
                $("#dayApplied1").val("Half Day");
            } else {
                $("#dayApplied1").val(data[0].day_applied + " Day");
            }

            if (data[0].day_applied === "1") {
                $("#menu01").show();
                $("#menu02").hide();
                $("#menu03").hide();
            } else if (data[0].day_applied === "0.5") {
                $("#menu01").show();
                $("#menu02").show();
                $("#menu03").hide();
            } else {
                $("#menu01").hide();
                $("#menu02").hide();
                $("#menu03").show();
            }

            if (data[0].username1) {
                $("#recommended_by").text(data[0].username1);
            } else {
                $("#recommended_by").text("");
            }

            if (data[0].username2) {
                $("#approved_by").text(data[0].username2);
            } else {
                $("#approved_by").text("");
            }

            if (data[0].leave_session === "1") {
                $("#flexRadioDefaulta").prop("checked", true);
            } else if (data[0].leave_session === "2") {
                $("#flexRadioDefaultb").prop("checked", true);
            } else {
                $("#flexRadioDefaulta").prop("checked", false);
                $("#flexRadioDefaultb").prop("checked", false);
            }

            if (data[0].up_rec_status === "1") {
                $("#status_1").text("Pending");
            } else if (data[0].up_rec_status === "2") {
                $("#status_1").text("Pending");
            } else if (data[0].up_rec_status === "3") {
                $("#status_1").text("Reject");
            } else if (data[0].up_rec_status === "4") {
                $("#status_1").text("Approved");
            }

            if (data[0].up_app_status === "1") {
                $("#status_2").text("Pending");
            } else if (data[0].up_app_status === "2") {
                $("#status_2").text("Pending");
            } else if (data[0].up_app_status === "3") {
                $("#status_2").text("Reject");
            } else if (data[0].up_app_status === "4") {
                $("#status_2").text("Approved");
            }

            if (data[0].up_app_status === "1") {
                $("#status_2").text("Pending");
            } else if (data[0].up_app_status === "2") {
                $("#status_2").text("Pending");
            } else if (data[0].up_app_status === "3") {
                $("#status_2").text("Reject");
            } else if (data[0].up_app_status === "4") {
                $("#status_2").text("Approved");
            }

            if (data[0].file_document) {
                var filename = data[0].file_document.split("/").pop();
                $("#fileDownloadPolicya").html(
                    '<a href="/storage/' +
                        data[0].file_document +
                        '" download="' +
                        filename +
                        '">Download : ' +
                        filename +
                        "</a>"
                );
            } else {
                $("#fileDownloadPolicya").html("No File Upload");
            }
        });
    });

    function myleave(id) {
        return $.ajax({
            url: "/getcreatemyleave/" + id,
        });
    }
    $(document).on("click", "#editButton2", function () {
        var id = $(this).data("id");
        var myleaveData = myleave(id);
        // console.log(myleaveData);

        myleaveData.done(function (data) {
            $("#datafullname2").val(data[0].username);
            $("#datepicker-applied2").val(data[0].applied_date);
            $("#typeofleave2").val(data[0].lt_type_id);
            // $("#dayApplied2").val(data[0].day_applied);
            $("#totalapply2").val(data[0].total_day_applied);
            $("#datepicker-leave2").val(data[0].leave_date);
            $("#datepicker-start2").val(data[0].start_date);
            $("#datepicker-end2").val(data[0].end_date);
            $("#reason2").val(data[0].reason);
            $("#reasonreject2").val(data[0].reason);
            // console.log(data[0]);
            if (data[0].day_applied == 1) {
                $("#dayApplied2").val("One Day");
            } else if (data[0].day_applied == 0.5) {
                $("#dayApplied2").val("Half Day");
            } else {
                $("#dayApplied2").val(data[0].day_applied + " Day");
            }

            if (data[0].day_applied === "1") {
                $("#menu10").show();
                $("#menu20").hide();
                $("#menu30").hide();
            } else if (data[0].day_applied === "0.5") {
                $("#menu10").show();
                $("#menu20").show();
                $("#menu30").hide();
            } else {
                $("#menu10").hide();
                $("#menu20").hide();
                $("#menu30").show();
            }

            if (data[0].username1) {
                $("#recommended_by2").text(data[0].username1);
            } else {
                $("#recommended_by2").text("");
            }

            if (data[0].username2) {
                $("#approved_by2").text(data[0].username2);
            } else {
                $("#approved_by2").text("");
            }

            if (data[0].leave_session === "1") {
                $("#flexRadioDefaulta2").prop("checked", true);
            } else if (data[0].leave_session === "2") {
                $("#flexRadioDefaultb2").prop("checked", true);
            } else {
                $("#flexRadioDefaulta2").prop("checked", false);
                $("#flexRadioDefaultb2").prop("checked", false);
            }

            if (data[0].up_rec_status === "1") {
                $("#status_10").text("Pending");
            } else if (data[0].up_rec_status === "2") {
                $("#status_10").text("Pending");
            } else if (data[0].up_rec_status === "3") {
                $("#status_10").text("Reject");
            } else if (data[0].up_rec_status === "4") {
                $("#status_10").text("Approved");
            }

            if (data[0].up_app_status === "1") {
                $("#status_20").text("Pending");
            } else if (data[0].up_app_status === "2") {
                $("#status_20").text("Pending");
            } else if (data[0].up_app_status === "3") {
                $("#status_20").text("Reject");
            } else if (data[0].up_app_status === "4") {
                $("#status_20").text("Approved");
            }

            if (data[0].up_app_status === "1") {
                $("#status_20").text("Pending");
            } else if (data[0].up_app_status === "2") {
                $("#status_20").text("Pending");
            } else if (data[0].up_app_status === "3") {
                $("#status_20").text("Reject");
            } else if (data[0].up_app_status === "4") {
                $("#status_20").text("Approved");
            }

            if (data[0].file_document) {
                var filename = data[0].file_document.split("/").pop();
                $("#fileDownloadPolicya2").html(
                    '<a href="/storage/' +
                        data[0].file_document +
                        '" download="' +
                        filename +
                        '">Download : ' +
                        filename +
                        "</a>"
                );
            } else {
                $("#fileDownloadPolicya2").html("No File Upload");
            }
        });
    });

    function myleave(id) {
        return $.ajax({
            url: "/getusermyleave/" + id,
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
            // $("#dayapplied").val(data[0].day_applied);
            $("#startdate").val(data[0].start_date);
            $("#enddate").val(data[0].end_date);
            $("#totaldayapplied").val(data[0].total_day_applied);
            $("#reason1").val(data[0].reason);

            if (data[0].day_applied == 1) {
                $("#dayApplied").val("One Day");
            } else if (data[0].day_applied == 0.5) {
                $("#dayApplied").val("Half Day");
            } else {
                $("#dayApplied").val(data[0].day_applied + " Day");
            }

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
