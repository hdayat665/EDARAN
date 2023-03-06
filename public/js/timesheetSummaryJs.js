$(document).ready(function() {

    $('#timesheetapproval')
        .dataTable({
            "responsive": true,
            "bLengthChange": true,
            "bFilter": true,
        });

        $(document).on("click", "#cancelTimesheet", function () {
            id = $(this).data("id");
            requirejs(["sweetAlert2"], function (swal) {
                swal({
                    title: "Are you sure to Cancel Timesheet?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "/deleteTimesheet/" + id,
                        // dataType: "json",
                        data: { _method: "DELETE" },
                        // async: false,
                        // processData: false,
                        // contentType: false,
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

});





