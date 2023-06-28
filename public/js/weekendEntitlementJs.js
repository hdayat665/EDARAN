$(document).ready(function () {

    $("#saveWeekend").click(function (e) {
        $("#updateWeekend").validate({
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateWeekend")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateweekend",
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
                                location.hash = "default-tab-1";
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#tableweekend").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#tableweekend").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    
});
