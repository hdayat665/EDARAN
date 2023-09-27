$(document).ready(function () {
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tablenews").DataTable({
        responsive: false,
        // scrollX: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tablenews").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $("#tablenews-dashboard").DataTable({
        responsive: false,
        // scrollX: true,
        lengthMenu: [[5], [5]],
        initComplete: function (settings, json) {
            $("#tablenews-dashboard").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");
        var vehicleData = getLibrary(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#title").val(data.title);
            $("#sourceURL").val(data.sourceURL);
            if (data.file) {
                var fileName = data.file.split('/').pop(); // Extract the file name from the file path
                $("#fileDownload").html('<a href="/storage/' + data.file + '" target="_blank">Download ' + fileName + '</a>');
              }
            $("#contents").val(data.content);
            $("#idN").val(data.id);
        });
        $("#editModal").modal("show");
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete knowledge library?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteKnowledgeLib/" + id,
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

    function getLibrary(id) {
        return $.ajax({
            url: "/getKnowledgebyId/" + id,
        });
    }

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                title: "required",
                content: "required",
                file: "required",
            },

            messages: {
                title: "Please Insert Title",
                content: "Please Insert Content",
                file: "Please Upload Attachment",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createknowledgeLib",
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
});

$("#updateButton").click(function (e) {
    $("#editForm").validate({
        // Specify validation rules
        rules: {
            title: "required",
            content: "required",
            file: "required",
        },

        messages: {
            title: "Please Insert Title",
            content: "Please Insert Content",
            file: "Please Upload Attachment",
        },
        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(document.getElementById("editForm"));
                var id = $("#idN").val();

                $.ajax({
                    type: "POST",
                    url: "/updateNews/" + id,
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
