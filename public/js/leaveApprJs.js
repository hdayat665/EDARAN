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



    $(document).ready(function () {
        if (
            $("#datepicker-date").val() ||
            $("#idemployer").val() ||
            $("#type").val()
        ) {
            $("#filterleave").show();
        } else {
            $("#filterleave").hide();
        }

        $("#filter").click(function () {
            $("#filterleave").toggle();
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
        if (
            $("#datepicker-dateH").val() ||
            $("#idemployerH").val() ||
            $("#typeH").val()
        ) {
            $("#filterleaveH").show();
        } else {
            $("#filterleaveH").hide();
        }

        $("#filterH").click(function () {
            $("#filterleaveH").toggle();
        });
    });

    $("#reset").on("click", function () {
        $("#datepicker-date").val($("#datepicker-date").data("default-value"));
        $("#idemployer").val($("#idemployer").data("default-value"));
        $("#type").val($("#type").data("default-value"));
    });

    $("#resetH").on("click", function () {
        $("#datepicker-dateH").val($("#datepicker-dateH").data("default-value"));
        $("#idemployerH").val($("#idemployerH").data("default-value"));
        $("#typeH").val($("#typeH").data("default-value"));
    });

    $("#leaveApprovalSv").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#leaveApprovalSv").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#leaveApprovalSvHistory").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#leaveApprovalSvHistory").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#datepicker-date").datepicker({
        todayHighlight: true,
        autoclose: true,
        orientation: "bottom",
        format: "yyyy-mm-dd",
    });

    $(document).on("click", "#approveButton", function () {
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
                    type: "get",
                    url: "/approvemyleave/" + id,

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
    });

    $(document).on("click", "#editButton2", function () {
        var id = $(this).data("id");
        // console.log(id);
        var myleaveget = myleave(id);
        // console.log(myleaveData2);

        myleaveget.then(function (data) {
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

            if (data[0].day_applied == 1) {
                $("#dayapplied").val("One Day");
            } else if (data[0].day_applied == 0.5) {
                $("#dayapplied").val("Half Day");
            } else {
                $("#dayapplied").val(data[0].day_applied + " Day");
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

            if (data[0].leave_session === "1") {
                $("#leavesession").text("MORNING");
            } else if (data[0].leave_session === "2") {
                $("#leavesession").text("EVENING");
            } else {
                $("#menu01").hide();
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
    $(document).on("click", "#viewbutton", function () {
        var id = $(this).data("id");
        // console.log(id);
        var myleaveget = myleaveview(id);
        // console.log(myleaveData2);

        myleaveget.then(function (data) {
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

            if (data[0].day_applied == 1) {
                $("#viewdayapplied").val("One Day");
            } else if (data[0].day_applied == 0.5) {
                $("#viewdayapplied").val("Half Day");
            } else {
                $("#viewdayapplied").val(data[0].day_applied + " Day");
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

            if (data[0].leave_session === "1") {
                $("#viewleavesession").text("MORNING");
            } else if (data[0].leave_session === "2") {
                $("#viewleavesession").text("EVENING");
            } else {
                $("#viewmenu01").hide();
            }

            if (data[0].username1) {
                $("#viewrecommended_by").text(data[0].username1);
            } else {
                $("#viewrecommended_by").text("");
            }

            if (data[0].up_rec_reason) {
                $("#viewreasonsv").text(data[0].up_rec_reason);
            } else {
                $("#viewreasonsv").text("");
                $("#viewmenu02").hide();
            }

            if (data[0].username2) {
                $("#viewapproved_by").text(data[0].username2);
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

    function myleaveview(id) {
        return $.ajax({
            url: "/getuserRecommenderView/" + id,
        });
    }

    function myleave(id) {
        return $.ajax({
            url: "/getuserRecommender/" + id,
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
                        url: "/updateRecommender/" + id,
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

    $(document).on("click", "#editButton3", function () {
        var id = $(this).data("id");
        // console.log(id);
        var myleavesecond = myleave2(id);
        // console.log(myleaveData2);

        myleavesecond.then(function (data) {
            $("#datafullname2").val(data[0].username);
            $("#applieddate2").val(data[0].applied_date);
            $("#type2").val(data[0].leave_types);
            // $("#dayapplied2").val(data[0].day_applied);
            $("#leavedate2").val(data[0].leave_date);
            $("#startdate2").val(data[0].start_date);
            $("#enddate2").val(data[0].end_date);
            $("#totaldayapplied2").val(data[0].total_day_applied);
            $("#reason1r").val(data[0].reason);
            $("#iddata2").val(data[0].id);

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
                $("#status_2").text("REJECT");
            } else if (data[0].up_rec_status === "4") {
                $("#status_2").text("APPROVED");
            }

            if (data[0].leave_session === "1") {
                $("#leavesession2r").text("MORNING");
            } else if (data[0].leave_session === "2") {
                $("#leavesession2r").text("EVENING");
            } else {
                $("#viewmenu01r").hide();
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
                $("#fileDownloadPolicya2r").html(
                    '<a href="/storage/' +
                    data[0].file_document +
                    '" target="_blank">View: ' +
                    filename +
                    '</a>'
                );
            } else {
                $("#fileDownloadPolicya2r").html("No File Upload");
            }
        });
    });

    function myleave2(id) {
        return $.ajax({
            url: "/getuserRecommender/" + id,
        });
    }

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
                    console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updateRecommenderReject/" + id,
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
