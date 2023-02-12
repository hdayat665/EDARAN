$(document).ready(function () {
    $("#filteractive").hide();
    $("#activeTable").DataTable({
        bPaginate: false,
        initComplete: function () {
            this.api()
                .columns([2, 3, 4, 5, 6, 7, 8, 9])
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },

        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: [
            {
                extend: "pdf",
                className: "btn-sm",
                orientation: "landscape",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7, 8, 9],
                },
            },
            {
                text: '<i class="fa fa-filter" aria-hidden="true"></i>',
                action: function (e, dt, node, config) {
                    $("#filteractive").toggle();
                },
            },
        ],
    });

    $("#filterrecommend").hide();
    $("#recommendedtable").DataTable({
        bPaginate: false,
        initComplete: function () {
            this.api()
                .columns([2, 3, 4, 5, 6, 7, 8, 9])
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },

        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: [
            {
                extend: "pdf",
                className: "btn-sm",
                orientation: "landscape",
            },
            {
                text: '<i class="fa fa-filter" aria-hidden="true"></i>',
                action: function (e, dt, node, config) {
                    $("#filterrecommend").toggle();
                },
            },
        ],
    });

    $("#filteramends").hide();
    $("#amendtable").DataTable({
        bPaginate: false,
        initComplete: function () {
            this.api()
                .columns([2, 3, 4, 5, 6, 7, 8, 9, 10])
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },

        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: [
            {
                extend: "pdf",
                className: "btn-sm",
                orientation: "landscape",
            },
            {
                text: '<i class="fa fa-filter" aria-hidden="true"></i>',
                action: function (e, dt, node, config) {
                    $("#filteramends").toggle();
                },
            },
        ],
    });

    $("#filterreject").hide();
    $("#rejecttable").DataTable({
        bPaginate: false,
        initComplete: function () {
            this.api()
                .columns([2, 3, 4, 5, 6, 7, 8, 9, 10])
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },

        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: [
            {
                extend: "pdf",
                className: "btn-sm",
                orientation: "landscape",
            },
            {
                text: '<i class="fa fa-filter" aria-hidden="true"></i>',
                action: function (e, dt, node, config) {
                    $("#filterreject").toggle();
                },
            },
        ],
    });

    $(
        "#rejectModalButton, #rejectModalButton1, #rejectModalButton2, #rejectModalButton3"
    ).on("click", function () {
        id = $(this).data("id");

        $("#rejectId").val(id);
        $("#modalreject").modal("show");
    });

    $(
        "#amendModalButton, #amendModalButton1, #amendModalButton2, #amendModalButton3"
    ).on("click", function () {
        id = $(this).data("id");

        $("#amendId").val(id);
        $("#modalamend").modal("show");
    });

    // $("#filter").click(function(){
    // $("#filteronoff").toggle();
    // });

    $("tfoot").each(function () {
        $(this).insertAfter($(this).siblings("thead"));
    });

    $("#approveButton, #approveButton1, #approveButton2").on(
        "click",
        function () {
            // alert("ss");
            var id = $(this).data("id");
            var status = "recommend";

            requirejs(["sweetAlert2"], function (swal) {
                $.ajax({
                    type: "POST",
                    url: "/updateStatusClaim/" + id + "/" + status,
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
        }
    );

    $("#rejectButton").click(function (e) {
        var id = $("#rejectId").val();
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
                        url: "/updateStatusClaim/" + id + "/" + status,
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
        var id = $("#amendId").val();
        var status = "amend";

        $("#amendForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("amendForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateStatusClaim/" + id + "/" + status,
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
});
