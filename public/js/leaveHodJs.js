$(document).ready(function () {


    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });


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




        $(".test").hide();

        $(document).on("click", ".dropdown-toggle", function(e) {
            e.stopPropagation(); // mencegah event dari bubbling ke atas

            var dropdownMenu = $(this).closest(".btn-group").find(".test");

            $(".test").not(dropdownMenu).hide();
            dropdownMenu.toggle();
        });

        $(document).on("click", function(e) {
            if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
                $(".test").hide();
            }
        });
    });



    $("#datepicker-date").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#datepicker-dateH").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $(document).ready(function () {
        function updateFilterVisibility() {
            if (
                $("#datepicker-date").val() ||
                $("#idemployer").val() ||
                $("#type").val()
            ) {
                $("#filterleave").show();
            } else {
                $("#filterleave").hide();
            }
        }

        updateFilterVisibility(); // Memanggil fungsi pada masa pemuatan laman

        $("#filter").click(function () {
            $("#filterleave").toggle();
        });

        $("#reset").on("click", function (e) {
            e.preventDefault(); // Menghentikan aksi asal (misalnya, penghantaran borang)

            $("#datepicker-date").val($("#datepicker-date").data("default-value"));
            $("#idemployer").val($("#idemployer").data("default-value"));
            $("#type").val($("#type").data("default-value"));

            $("#filterleave").show(); // Memastikan #filterleave tetap terbuka selepas "reset" ditekan
        });
    });

    $(document).ready(function () {
        function updateFilterVisibility() {
            if (
                $("#datepicker-dateH").val() ||
                $("#idemployerH").val() ||
                $("#typeH").val()
            ) {
                $("#filterleaveH").show();
            } else {
                $("#filterleaveH").hide();
            }
        }

        updateFilterVisibility(); // Memanggil fungsi pada masa pemuatan laman

        $("#filterH").click(function () {
            $("#filterleaveH").toggle();
        });

        $("#resetH").on("click", function (e) {
            e.preventDefault(); // Menghentikan aksi asal (misalnya, penghantaran borang)

            $("#datepicker-dateH").val($("#datepicker-dateH").data("default-value"));
            $("#idemployerH").val($("#idemployerH").data("default-value"));
            $("#typeH").val($("#typeH").data("default-value"));

            $("#filterleaveH").show(); // Memastikan #filterleave tetap terbuka selepas "reset" ditekan
        });
    });


    $("#calendar").datepicker({
        todayHighlight: true,
        autoclose: true,
        orientation: "bottom",
        format: "yyyy-mm-dd",
    });

    $("#leaveApproval").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#leaveApproval").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#leaveApprovalHistory").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#leaveApprovalHistory").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on("click", "#viewbutton", function () {
        var id = $(this).data("id");
        // console.log(id);
        var myleavesecond = myleave2view(id);
        // console.log(myleaveData2);

        myleavesecond.then(function (data) {
            $("#viewdatafullname").val(data[0].fullName);
            $("#viewapplieddate").val(data[0].applied_date);
            $("#viewtype1").val(data[0].leave_types);
            // $("#dayapplied").val(data[0].day_applied);
            $("#viewleavedate").val(data[0].leave_date);
            $("#viewstartdate").val(data[0].start_date);
            $("#viewenddate").val(data[0].end_date);
            $("#viewtotaldayapplied").val(data[0].total_day_applied);
            $("#viewreason1").val(data[0].reason);
            $("#viewiddata").val(data[0].id);
            console.log(data[0]);

            if (data[0].day_applied == 1) {
                $("#viewdayapplied").val("ONE DAY");
            } else if (data[0].day_applied == 0.5) {
                $("#viewdayapplied").val("HALF DAY");
            } else {
                $("#viewdayapplied").val(data[0].day_applied + " DAY");
            }

            if (data[0].up_rec_status === "1") {
                $("#viewstatus_1").text("PENDING");
            } else if (data[0].up_rec_status === "2") {
                $("#viewstatus_1").text("PENDING");
            } else if (data[0].up_rec_status === "3") {
                $("#viewstatus_1").text("REJECTED");
            } else if (data[0].up_rec_status === "4") {
                $("#viewstatus_1").text("APPROVED");
            }

            if (data[0].up_app_status === "1") {
                $("#viewstatus_2").text("PENDING");
                $("#viewstatus_21").text("PENDING");
            } else if (data[0].up_app_status === "2") {
                $("#viewstatus_2").text("PENDING");
                $("#viewstatus_21").text("PENDING");
            } else if (data[0].up_app_status === "3") {
                $("#viewstatus_2").text("REJECTED");
                $("#viewstatus_21").text("REJECTED");
            } else if (data[0].up_app_status === "4") {
                $("#viewstatus_2").text("APPROVED");
                $("#viewstatus_21").text("APPROVED");
            }

            if (data[0].leave_session === "1") {
                $("#viewleavesession").text("MORNING");
            } else if (data[0].leave_session === "2") {
                $("#viewleavesession").text("EVENING");
            } else {
                $("#viewmenu01").hide();
            }

            if (data[0].up_app_reason) {
                $("#reasonhod2").text(data[0].up_app_reason);
                $("#reasonhod21").text(data[0].up_app_reason);
            } else {
                $("#reasonhod2").text("");
                $("#reasonhod21").text("");
                $("#viewmenu02").hide();
                $("#viewmenu021").hide();
            }

            if (data[0].username1) {
                $("#viewrecommended_by").text(data[0].username1);
                $("#hiderec2").hide();
                $("#hiderec1").show();
            } else {
                $("#viewrecommended_by").text("");
                $("#hiderec1").hide();
                $("#hiderec2").show();
            }

            if (data[0].username2) {
                $("#viewapproved_by").text(data[0].username2);
                $("#viewapproved_by1").text(data[0].username2);
            } else {
                $("#viewapproved_by").text("");
            }

            if (data[0].file_document) {
                var filename = data[0].file_document.split("/").pop();
                $("#viewfileDownloadPolicya").html(
                    '<a href="/storage/' +
                    data[0].file_document +
                    '" target="_blank">View: ' +
                    filename +
                    '</a>'
                );
            } else {
                $("#viewfileDownloadPolicya").html("No File Upload");
            }
        });
    });

    function myleave2view(id) {
        return $.ajax({
            url: "/getuserleaveApprhodview/" + id,
        });
    }
    $(document).on("click", "#editButton2", function () {
        var id = $(this).data("id");
        // console.log(id);
        var myleavesecond = myleave2(id);
        // console.log(myleaveData2);

        myleavesecond.then(function (data) {
            $("#datafullname").val(data[0].fullName);
            $("#applieddate").val(data[0].applied_date);
            $("#type1").val(data[0].leave_types);
            // $("#dayapplied").val(data[0].day_applied);
            $("#leavedate").val(data[0].leave_date);
            $("#startdate").val(data[0].start_date);
            $("#enddate").val(data[0].end_date);
            $("#totaldayapplied").val(data[0].total_day_applied);
            $("#reason1").val(data[0].reason);
            $("#iddata").val(data[0].id);
            console.log(data[0]);

            if (data[0].day_applied == 1) {
                $("#dayapplied").val("ONE DAY");
            } else if (data[0].day_applied == 0.5) {
                $("#dayapplied").val("HALF DAY");
            } else {
                $("#dayapplied").val(data[0].day_applied + " DAY");
            }

            if (data[0].up_rec_status === "1") {
                $("#status_1").text("PENDING");
            } else if (data[0].up_rec_status === "2") {
                $("#status_1").text("PENDING");
            } else if (data[0].up_rec_status === "3") {
                $("#status_1").text("REJECTED");
            } else if (data[0].up_rec_status === "4") {
                $("#status_1").text("APPROVED");
            }

            if (data[0].up_app_status === "1") {
                $("#status_2").text("PENDING");
                $("#status_2a").text("PENDING");
            } else if (data[0].up_app_status === "2") {
                $("#status_2").text("PENDING");
                $("#status_2a").text("PENDING");
            } else if (data[0].up_app_status === "3") {
                $("#status_2").text("REJECTED");
                $("#status_2a").text("REJECTED");
            } else if (data[0].up_app_status === "4") {
                $("#status_2").text("APPROVED");
                $("#status_2a").text("APPROVED");
            }

            if (data[0].leave_session === "1") {
                $("#leavesession").text("MORNING");
            } else if (data[0].leave_session === "2") {
                $("#leavesession").text("EVENING");
            } else {
                $("#menu01").hide();
            }

            if (data[0].username1) {
                $("#recommended_by").text(data[0].username1);
                $("#hidesecond1").show();
                $("#hidesecond2").hide();

            } else {
                $("#recommended_by").text("");
                $("#hidesecond1").hide();
                $("#hidesecond2").show();
            }

            if (data[0].username2) {
                $("#approved_by").text(data[0].username2);
                $("#approved_bya").text(data[0].username2);
            } else {
                $("#approved_by").text("");
                $("#approved_bya").text("");
            }

            if (data[0].file_document) {
                var filename = data[0].file_document.split("/").pop();
                $("#viewfileDownloadPolicya").html(
                    '<a href="/storage/' +
                    data[0].file_document +
                    '" target="_blank">View: ' +
                    filename +
                    '</a>'
                );
            } else {
                $("#fileDownloadPolicya").html("No File Upload");
            }
        });
    });

    function myleave2(id) {
        return $.ajax({
            url: "/getuserleaveApprhod/" + id,
        });
    }

    $(document).on("click", "#editButton3", function () {
        var id = $(this).data("id");
        // console.log(id);
        var myleaveget = myleave(id);
        // console.log(myleaveData2);

        myleaveget.then(function (data) {
            $("#datafullname2").val(data[0].username);
            $("#applieddate2").val(data[0].applied_date);
            $("#type2").val(data[0].leave_types);
            // $("#dayapplied2").val(data[0].day_applied);
            $("#leavedate2").val(data[0].leave_date);
            $("#startdate2").val(data[0].start_date);
            $("#enddate2").val(data[0].end_date);
            $("#totaldayapplied2").val(data[0].total_day_applied);
            $("#reason1b").val(data[0].reason);
            $("#iddata2").val(data[0].id);
            console.log(data[0]);

            if (data[0].day_applied == 1) {
                $("#dayapplied2").val("ONE DAY");
            } else if (data[0].day_applied == 0.5) {
                $("#dayapplied2").val("HALF DAY");
            } else {
                $("#dayapplied2").val(data[0].day_applied + " DAY");
            }

            if (data[0].up_rec_status === "1") {
                $("#status_2").text("PENDING");
            } else if (data[0].up_rec_status === "2") {
                $("#status_2").text("PENDING");
            } else if (data[0].up_rec_status === "3") {
                $("#status_2").text("REJECTED");
            } else if (data[0].up_rec_status === "4") {
                $("#status_2").text("APPROVED");
            }

            if (data[0].leave_session === "1") {
                $("#leavesession2").text("MORNING");
            } else if (data[0].leave_session === "2") {
                $("#leavesession2").text("EVENING");
            } else {
                $("#menu10").hide();
                $("#expend").css("width", "100%");
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

            if (data[0].file_document) {
                var filename = data[0].file_document.split("/").pop();
                $("#fileDownloadPolicya2").html(
                    '<a href="/storage/' +
                    data[0].file_document +
                    '" target="_blank">View: ' +
                    filename +
                    '</a>'
                );

            } else {
                $("#fileDownloadPolicya2").html("No File Upload");
            }
        });
    });

    function myleave(id) {
        return $.ajax({
            url: "/getuserleaveApprhod/" + id,
        });
    }

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#iddata").val();
                    // console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updatehod/" + id,
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

    $("#updateButtonreject").click(function (e) {
        $("#updatereject").validate({
            // Specify validation rules
            rules: {
                reasonreject: "required",
            },

            messages: {
                reasonreject: "Please Insert Reason",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updatereject")
                    );
                    var id = $("#iddata2").val();
                    // console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updatehodreject/" + id,
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
