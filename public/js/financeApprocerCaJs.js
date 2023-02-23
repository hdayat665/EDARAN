$(document).ready(function () {
    $("#tableactive").dataTable({
        // "responsive": true,
        bLengthChange: false,
        bFilter: false,
    });

    $("#buckettable").dataTable({
        // "responsive": true,
        bLengthChange: false,
        bFilter: false,
    });

    $("#rejectedtable").dataTable({
        // "responsive": true,
        bLengthChange: false,
        bFilter: false,
    });

    $("#filter").click(function () {
        $("#filteronoff").toggle();
    });

    $(
        "#rejectButton1, #rejectButton2, #rejectButton3, #rejectButton4, #rejectButton5"
    ).on("click", function () {
        id = $(this).data("id");

        $("#rejectId").val(id);
        $("#modalreject").modal("show");
    });

    $(
        "#approveButton, #approveButton1, #approveButton2, #approveButton3, #approveButton4, #approveButton5"
    ).on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        var stage = "f_approver";
        var status = "recommend";

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusCashAdvance/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,
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

    $("#rejectButton").on("click", function () {
        // alert("ss");
        var id = $("#rejectId").val();
        var stage = "f_approver";
        var status = "reject";
        $("#rejectForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("rejectForm")
                    );
                    $.ajax({
                        type: "POST",
                        url:
                            "/updateStatusCashAdvance/" +
                            id +
                            "/" +
                            status +
                            "/" +
                            stage,
                        data: data,
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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });

    // $("#rejectButton").click(function (e) {
    //     var id = $("#rejectId").val();
    //     var stage = "a_approval";
    //     var status = "reject";

    //     $("#hodRejectForm").validate({
    //         // Specify validation rules
    //         rules: {},

    //         messages: {},
    //         submitHandler: function (form) {
    //             requirejs(["sweetAlert2"], function (swal) {
    //                 var data = new FormData(
    //                     document.getElementById("hodRejectForm")
    //                 );

    //                 $.ajax({
    //                     type: "POST",
    //                     url:
    //                         "/updateStatusClaim/" +
    //                         id +
    //                         "/" +
    //                         status +
    //                         "/" +
    //                         stage,
    //                     data: data,
    //                     dataType: "json",
    //                     async: false,
    //                     processData: false,
    //                     contentType: false,
    //                 }).done(function (data) {
    //                     console.log(data);
    //                     swal({
    //                         title: data.title,
    //                         text: data.msg,
    //                         type: data.type,
    //                         confirmButtonColor: "#3085d6",
    //                         confirmButtonText: "OK",
    //                         allowOutsideClick: false,
    //                         allowEscapeKey: false,
    //                     }).then(function () {
    //                         if (data.type == "error") {
    //                         } else {
    //                             location.reload();
    //                         }
    //                     });
    //                 });
    //             });
    //         },
    //     });
    // });

    // $("#amendButton").click(function (e) {
    //     var id = $("#amendId").val();
    //     var stage = "a_approval";
    //     var status = "amend";

    //     $("#hodAmendForm").validate({
    //         // Specify validation rules
    //         rules: {},

    //         messages: {},
    //         submitHandler: function (form) {
    //             requirejs(["sweetAlert2"], function (swal) {
    //                 var data = new FormData(
    //                     document.getElementById("hodAmendForm")
    //                 );

    //                 $.ajax({
    //                     type: "POST",
    //                     url:
    //                         "/updateStatusClaim/" +
    //                         id +
    //                         "/" +
    //                         status +
    //                         "/" +
    //                         stage,
    //                     data: data,
    //                     dataType: "json",
    //                     async: false,
    //                     processData: false,
    //                     contentType: false,
    //                 }).done(function (data) {
    //                     console.log(data);
    //                     swal({
    //                         title: data.title,
    //                         text: data.msg,
    //                         type: data.type,
    //                         confirmButtonColor: "#3085d6",
    //                         confirmButtonText: "OK",
    //                         allowOutsideClick: false,
    //                         allowEscapeKey: false,
    //                     }).then(function () {
    //                         if (data.type == "error") {
    //                         } else {
    //                             location.reload();
    //                         }
    //                     });
    //                 });
    //             });
    //         },
    //     });
    // });

    // personal
    $(document).on("click", "#btn-view", function () {
        var id = $(this).data("id");

        var vehicleData = getPersonalById(id);

        vehicleData.done(function (data) {
            console.log(data);
            $("#created_At").val(data.applied_date);
            $("#claim_category").val(data.claim_category);
            $("#amount").val(data.amount);
            $("#desc").val(data.desc);
            $("#file_upload").val(data.file_upload);
        });
        $("#modal-view").modal("show");
    });

    function getTravelById(id) {
        return $.ajax({
            url: "/getTravelById/" + id,
        });
    }
});
