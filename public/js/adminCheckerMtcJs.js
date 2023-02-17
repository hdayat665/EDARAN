$(document).ready(function () {
    $("#claimtable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });
    $("#traveltable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });

    $("#rejectButton").click(function (e) {
        var id = $(this).data("id");
        // var id = $("#rejectId").val();
        var status = "reject";
        var stage = $("#adminChecker").val();

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
        var stage = $("#adminChecker").val();

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
            $("#type_of_transport").val(data.type_of_transport);
            $("#location_start").val(data.location_start);
            $("#project").val(data.project);
            $("#address_start").val(data.address_start);
            $("#location_address").val(data.location_address);
            $("#destination_address").val(data.location_address);
            $("#millage").val(data.millage);
            $("#toll").val(data.toll);
            $("#petrol").val(data.petrol);
            $("#parking").val(data.parking);
            $("#file_upload").val(data.file_upload);
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
            $("#claim_for").val(data.claim_for);
            $("#file_upload_Subs").val(data.file_upload);
            $("#date1").val(data.start_date);
            $("#time1").val(data.start_time);
            $("#date2").val(data.end_date);
            $("#time2").val(data.end_time);
            $("#project").val(data.project_id);
            $("#desc").val(data.desc);
            $("#breakfast").val(data.breakfast);
            $("#lunch").val(data.lunch);
            $("#dinner").val(data.dinner);
            $("#total_subs").val(data.total_subs);
            $("#hotel").val(data.hotel);
            $("#lodging").val(data.lodging);
            $("#total_acc").val(data.total_acc);
            $("#total").val(data.total);
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
            $("#created_At").val(data.applied_date);
            $("#claim_category").val(data.claim_category);
            $("#amount").val(data.amount);
            $("#desc").val(data.desc);
            $("#file_upload").val(data.file_upload);
        });
        $("#modal-view").modal("show");
    });

    $("#checkTravel").click(function (e) {
        var id = $("#travelId").val();
        var status = "check";
        var stage = $("#adminChecker").val();

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
        var stage = $("#adminChecker").val();

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
        var stage = $("#adminChecker").val();

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
        var stage = $("#adminChecker").val();

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