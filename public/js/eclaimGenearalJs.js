$(document).ready(function () {
    $(document).on("click", "#addModalButton", function () {
        $("#updateModal").modal("show");
    });

    function getEclaimGeneralById(id) {
        return $.ajax({
            url: "/getEclaimGeneralById/" + id,
        });
    }

    $(document).on("click", "#editModalButton", function () {
        alert("ss");
        var id = $(this).data("id");
        var vehicleData = getEclaimGeneralById(id);

        vehicleData.done(function (data) {
            console.log(data);
            $("#area_name").val(data.area_name);
            $("#idE").val(data.id);
        });
        $("#updateModal").modal("show");
    });

    $("#tableSaveArea").DataTable({});

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
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
        $("#editForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editForm")
                    );
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
});
