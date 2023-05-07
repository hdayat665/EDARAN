$(document).ready(function () {
    $("#activetable").DataTable({
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
    $("#checkedtable").DataTable({
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
            $("#checkedtable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#pvtable").DataTable({
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
        columnDefs: [{ orderable: false, targets: [0] }],
    });
    $("#paidtable").DataTable({
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
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#amendtable").DataTable({
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
            $("#amendtable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#rejectedtable").DataTable({
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
            $("#rejectedtable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#paymenttable").DataTable({
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
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#filter").click(function () {
        $("#filteronoff").toggle();
    });

    $(
        "#rejectModalButton, #rejectModalButton1, #rejectModalButton2, #rejectModalButton3, #rejectModalButton4"
    ).on("click", function () {
        // /alert("ss");
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
        "#approveButton1, #approveButton2, #approveButton4, #approveButton5, #approveButton6, #approveButton7"
    ).on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        var status = "recommend";
        var stage = $("#checkers").val();

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
    });

    $("#rejectButton").click(function (e) {
        var id = $("#rejectId").val();
        var stage = $("#checkers").val();
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
        var stage = $("#checkers").val();
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

    $(document).on("click", "#generatePv", function () {
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
                    url: "/createPvNumber/" + id,

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
        });
    });

    $(document).on("click", "#checkModalButton", function () {
        // alert("ss");
        id = $(this).data("id");

        $("#chequeId").val(id);
        $("#chequeModal").modal("show");
        // var status = "recommend";
        // var stage = $("#checkers").val();
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
                            url: "/createChequeNumber/" + id,

                            data: data,
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
                });
            },
        });
    });
});
