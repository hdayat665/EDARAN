$(document).ready(function () {
    $("#activetable").dataTable({
        searching: true,
        lengthChange: true,
        paging: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        buttons: [
            {
                extend: "excel",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "pdf",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "print",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
        ],
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#approvedtable").dataTable({
        searching: true,
        lengthChange: true,
        paging: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        buttons: [
            {
                extend: "excel",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "pdf",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "print",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
        ],
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#amendtable").dataTable({
        searching: true,
        lengthChange: true,
        paging: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        buttons: [
            {
                extend: "excel",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "pdf",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "print",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
        ],
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#rejectedtable").dataTable({
        searching: true,
        lengthChange: true,
        paging: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        buttons: [
            {
                extend: "excel",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "pdf",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "print",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
        ],
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#filter").click(function () {
        $("#filteronoff").toggle();
    });

    $(
        "#rejectModalButton, #rejectModalButton1, #rejectModalButton2, #rejectModalButton3, #rejectModalButton4"
    ).on("click", function () {
        // alert("ss");
        id = $(this).data("id");

        $("#rejectId").val(id);
        $("#modalreject").modal("show");
    });

    $(
        "#amendModalButton, #amendModalButton1, #amendModalButton2, #amendModalButton3, #amendModalButton4"
    ).on("click", function () {
        id = $(this).data("id");

        $("#amendId").val(id);
        $("#modalamend").modal("show");
    });

    $(
        "#approveButton, #approveButton1, #approveButton2, #approveButton3, #approveButton4"
    ).on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        var stage = "f_approval";
        var status = "recommend";

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateStatusClaim/" + id + "/" + status + "/" + stage,

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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });

    $("#rejectButton").click(function (e) {
        var id = $("#rejectId").val();
        var stage = "f_approval";
        var status = "reject";

        $("#hodRejectForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("hodRejectForm")
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

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
        var id = $("#amendId").val();
        var stage = "f_approval";
        var status = "amend";

        $("#hodAmendForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("hodAmendForm")
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

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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

    // personal
    $(document).on("click", "#btn-view", function () {
        var id = $(this).data("id");

        var vehicleData = getPersonalById(id);

        vehicleData.then(function (data) {
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
