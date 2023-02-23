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

    $("#cleareddate").datepicker({
        todayHighlight: true,
        autoclose: true,
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
        var stage = "f1";
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
        var stage = "f1";
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

    $("#generatePv").on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        // var status = "recommend";
        // var stage = $("#checkers").val();

        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/createPvNumberCa/" + id,
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
        });
    });

    $("#checkModalButton").on("click", function () {
        // alert("ss");
        id = $(this).data("id");

        $("#chequeId").val(id);
        $("#chequeModal").modal("show");
        // var status = "recommend";
        // var stage = $("#checkers").val();
    });

    $("#clearModalButton").on("click", function () {
        // alert("ss");
        id = $(this).data("id");

        $("#clearId").val(id);
        $("#modalcleared").modal("show");
        // var status = "recommend";
        // var stage = $("#checkers").val();
    });

    $("#saveClearButton").on("click", function () {
        $("#clearForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                var data = new FormData(document.getElementById("clearForm"));

                requirejs(["sweetAlert2"], function (swal) {
                    swal({
                        title: "Are you sure?",
                        type: "error",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes!",
                        showCancelButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function () {
                        $.ajax({
                            type: "POST",
                            url: "/createClearCa/" + id,
                            async: false,
                            data: data,
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
                });
            },
        });
    });

    $("#saveChequeButton").on("click", function () {
        $("#chequeForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                var data = new FormData(document.getElementById("chequeForm"));

                requirejs(["sweetAlert2"], function (swal) {
                    swal({
                        title: "Are you sure?",
                        type: "error",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes!",
                        showCancelButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function () {
                        $.ajax({
                            type: "POST",
                            url: "/createChequeNumberCa/" + id,
                            async: false,
                            data: data,
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
                });
            },
        });
    });

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
