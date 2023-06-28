$(document).ready(function () {
    //   var x = document.getElementById('awaitingapproval');
    //   var y = document.getElementById('approved');
    //   var z = document.getElementById('rejected');
    //   if (x.style.display == "block") {
    //       $(".canceltimesheet").hide();

    //   } else if (y.style.display == "block") {
    //       $(".approvereject").hide();

    //   } else if (z.style.display == "block") {
    //       $(".approvereject").hide();

    //   }

    $("#timesheetapproval").DataTable({
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
            $("#timesheetapproval").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    if (
        $("#employeesearch").val() ||
        $("#monthsearch").val() ||
        $("#designsearch").val() ||
        $("#departmentsearch").val() ||
        $("#statussearch").val()
    ) {
        $("#filterform").show();
    }

    $("#filter").click(function () {
        $("#filterform").toggle();
    });

    $(document).on("click", "#statusButton", function () {
        var id = $(this).data("id");
        var status = $(this).data("status");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function () {
                $.ajax({
                    type: "GET",
                    url: "/updateStatusTimesheet/" + id + "/" + status,
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

    $("#approveAllButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("approveAllForm"));

            $.ajax({
                type: "POST",
                url: "/approveAllTimesheet",
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
                }).then(function () {
                    if (data.type == "error") {
                    } else {
                        location.reload();
                    }
                });
            });
        });
    });

    $("#addamendreasonb").click(function (e) {
        $("#reasonamendform").validate({
            rules: {
                amendreason: "required",
            },

            messages: {
                amendreason: "Please Insert Reason",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("reasonamendform")
                    );
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/updatereason",
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

    $("#reset").on("click", function () {
        $("#employeesearch").val($("#employeesearch").data("default-value"));
        $("#employeesearch").picker("destroy");

        $("#monthsearch").val($("#monthsearch").data("default-value"));
        $("#monthsearch").picker("destroy");

        $("#designsearch").val($("#designsearch").data("default-value"));
        $("#designsearch").picker("destroy");

        $("#departmentsearch").val(
            $("#departmentsearch").data("default-value")
        );
        $("#departmentsearch").picker("destroy");

        $("#statussearch").val($("#statussearch").data("default-value"));
        $("#statussearch").picker("destroy");
    });

    $(document).on("click", "#amendreasonmodal", function () {
        var id = $(this).data("id");
        var vehicleData = getRequesttimesheet(id);

        vehicleData.then(function (data) {
            console.log(data.id);
            console.log(data.employee_name);
            // console.log('')
            $("#employeename").val(data.employee_name);
            $("#idtv").val(data.id);
        });
        $("#reasonmodal").modal("show");
    });

    function getRequesttimesheet(id) {
        return $.ajax({
            url: "/getTimesheetamendById/" + id,
        });
    }

    $('[data-toggle="tooltipamend"]').tooltip();

    $("#employeesearch").picker({ search: true });
    $("#designsearch").picker({ search: true });
    $("#departmentsearch").picker({ search: true });
});
