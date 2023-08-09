$("document").ready(function () {
    $("#generalclaim").DataTable({
        searching: false,
        aaSorting: [],
        lengthChange: false,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        initComplete: function (settings, json) {
            $("#generalclaim").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#claimtable").DataTable({
        searching: false,
        lengthChange: false,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        dom: '<"top">rt<"bottom"p><"clear">',
        initComplete: function (settings, json) {
            $("#claimtable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#cashadvancetable").DataTable({
        searching: false,
        lengthChange: false,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        dom: '<"top">rt<"bottom"p><"clear">',
        initComplete: function (settings, json) {
            $("#cashadvancetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on(
        "click",
        '[data-bs-target="#exampleModal"]',
        function (event) {
            var button = $(this); // Button that triggered the modal
            var year = button.data("year"); // Extract year value from data-* attributes
            var month = button.data("month"); // Extract month value from data-* attributes
            var general = button.data("general");
            //console.log(year);
            // Update year and month input fields in the modal
            $("#appeal-year").val(year);
            $("#appeal-month").val(month);
            $("#general-id").val(general);
        }
    );

    $(".cancelButton").click(function (e) {
        var id = $(this).data("id");
        
        //console.log(id);
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/cancelGNC/" + id,

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
    $(".buttonCancel").click(function (e) {
        var id = $(this).data("id");
        //console.log(id);
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/cancelMTC/" + id,

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

    $("#saveAppeal").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("addAppealForm"));

            $.ajax({
                type: "POST",
                url: "/appealMtc",
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
    });

    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    });

    $(document).on("click", "#cancelCashButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/cancelCashClaim/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },

                    // processData: false,
                    // contentType: false,
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
});
