$(document).ready(function () {
    $(document).on("click", "#addModalButton", function () {
        $("#addSubsistence").modal("show");
    });

    function getEclaimGeneralById(id) {
        return $.ajax({
            url: "/getEclaimGeneralById/" + id,
        });
    }
    
    $(document).on("click", "#editModalButton", function () {
        var id = $(this).data("id");
        var vehicleData = getEclaimGeneralById(id);

        vehicleData.done(function (data) {
            $("#area_name").val(data.area_name);
            $("#idE").val(data.id);
        });
        $("#editSubsistence").modal("show");
    });

    $("#tableSaveArea").DataTable({});

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));

                    $.ajax({
                        type: "POST",
                        url: "/createSubsistance",
                        data: data,
                        dataType: "json",
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
    });

    $("#editButton").click(function (e) {
        $("#editAreaForm").validate({
            rules: {},
            messages: {},
            submitHandler: function (form) {
                console.log("asddsa");
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("editAreaForm"));
                    var id = $("#idE").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateSubsistance/" + id,
                        data: data,
                        dataType: "json",
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
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Area?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteSubsistance/" + id,
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
