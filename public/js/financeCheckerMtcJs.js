$(document).ready(function () {
    $("#claimtable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        scrollX:true
    });
    $("#traveltable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        scrollX:true
    });

    $("#rejectButton").click(function (e) {
        var id = $(this).data("id");
        // var id = $("#rejectId").val();
        var status = "reject";
        var stage = $("#financeChecker").val();

        $("#supervisorRejectForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("supervisorRejectForm")
                    );

                    $.ajax({
                        type: "POST",
                        url:
                            "/updateStatusClaim/" +
                            id +
                            "/" +
                            status +
                            "/" +
                            stage,
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
                        console.log(data);
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

    $("#amendButton").click(function (e) {
        var id = $(this).data("id");
        var status = "amend";
        var stage = $("#financeChecker").val();

        $("#supervisorAmendForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("supervisorAmendForm")
                    );

                    $.ajax({
                        type: "POST",
                        url:
                            "/updateStatusClaim/" +
                            id +
                            "/" +
                            status +
                            "/" +
                            stage,
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
                        console.log(data);
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

    // travel
    $(document).on("click", "#btn-view-claim", function () {
        var id = $(this).data("id");

        var vehicleData = getTravelById(id);

        vehicleData.done(function (data) {
            console.log(data);
            $("#travelId").val(data.id);
            $("#travel_date").val(data.travel_date);
            $("#start_time").val(data.start_time);
            $("#end_time").val(data.end_time);
            $("#total_hour").val(data.total_hour);
            $("#desc").val(data.desc);
            $("#reason").val(data.reason);
            $("#log").val(data.log_id === 0 ? null : data.log_id);
            $("#type_transport").val(data.type_transport);
            $("#location_start").val(data.location_start);
            $("#project").val(data.project_name);
            $("#address_start").val(data.address_start);
            $("#location_address").val(data.location_end);
            $("#destination_address").val(data.location_address);
            $("#millage").val("RM " + Number(data.millage).toFixed(2));
            $("#toll").val("RM " + data.toll);
            $("#petrol").val("RM " + data.petrol);
            $("#parking").val("RM " + data.parking);
            var fileNames = data.file_upload.split(',');
            var html = '';
            for(var i=0; i<fileNames.length; i++){
                html += "<a href='/storage/TravelFile/" + fileNames[i] + "' target='_blank'>" + fileNames[i] + "</a><br>";
            }
            $("#file_upload").html(html);
        });
        $("#modal-view-claim").modal("show");
    });

    // subs
    $(document).on("click", "#btn-view-subsistence", function () {
        var id = $(this).data("id");

        var vehicleData = getTravelById(id);

        vehicleData.done(function (data) {
            console.log(data);
            $("#subsId").val(data.id);
            $("#claim_for").val(data.claim_for == 2 ? "Without Cash Advance" : "With Cash Advance");
            $("#file_upload_Subs").val(data.file_upload);
            $("#date1").val(data.start_date);
            $("#time1").val(data.start_time);
            $("#date2").val(data.end_date);
            $("#time2").val(data.end_time);
            $("#project1").val(data.project_name);
            $("#desc").val(data.desc);
            $("#breakfast").val(data.breakfast + " days");
            $("#lunch").val(data.lunch + " days");
            $("#dinner").val(data.dinner + " days");
            $("#total_subs").val("RM " + data.total_subs);
            $("#hotel").val(data.hotel ? data.hotel + " days" : "0 days");
            $("#lodging").val(data.lodging ? data.lodging + " days" : "0 days");
            $("#total_acc").val("RM " + data.total_acc);
            $("#total").val("RM " + data.total);
            var fileNames = data.file_upload.split(',');
            var html = '';
            for(var i=0; i<fileNames.length; i++){
                html += "<a href='/storage/SubFile/" + fileNames[i] + "' target='_blank'>" + fileNames[i] + "</a><br>";
            }
            $("#file_upload1").html(html);
        });
        $("#modal-view-subsistence").modal("show");
    });

    // personal
    $(document).on("click", "#btn-view", function () {
        var id = $(this).data("id");

        var vehicleData = getPersonalById(id);

        vehicleData.done(function (data) {
            console.log(data);
            $("#personalId").val(data.id);
            $("#created_At").val(moment(data.applied_date).format('YYYY-MM-DD'));
            $("#claim_category").val(data.claim_category_name);
            $("#label").text(data.claim_category_content.label);
            $("#contents").val(data.claim_category_content.content);
            $("#amount").val("RM " + data.amount);
            $("#claim_desc").val(data.claim_desc);
            var fileNames = data.file_upload.split(',');
            var html = '';
            for(var i=0; i<fileNames.length; i++){
                html += "<a href='/storage/PersonalFile/" + fileNames[i] + "' target='_blank'>" + fileNames[i] + "</a><br>";
            }
            $("#file_upload2").html(html);
        });
        $("#modal-view").modal("show");
    });

    $("#checkTravel").click(function (e) {
        var id = $("#travelId").val();
        var status = "check";
        var stage = $("#financeChecker").val();

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusTravelClaim/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function (data) {
                console.log(data);
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

    $("#checkSubs").click(function (e) {
        var id = $("#subsId").val();
        var status = "check";
        var stage = $("#financeChecker").val();

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusTravelClaim/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function (data) {
                console.log(data);
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

    $("#checkPersonal").click(function (e) {
        var id = $("#personalId").val();
        var status = "check";
        var stage = $("#financeChecker").val();

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusPersonalClaim/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function (data) {
                console.log(data);
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

    function getTravelById(id) {
        return $.ajax({
            url: "/getTravelById/" + id,
        });
    }

    function getPersonalById(id) {
        return $.ajax({
            url: "/getPersonalById/" + id,
        });
    }

    $("#approveButton").on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        var status = "recommend";
        var stage = $("#financeChecker").val();

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateStatusClaim/" + id + "/" + status + "/" + stage,
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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });
});
