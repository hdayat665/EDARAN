$(document).ready(function () {
    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tablejobgrade").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");
        var vehicleData = getJobGrade(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#jobGradeCode").val(data.jobGradeCode);
            $("#jobGradeName").val(data.jobGradeName);
            $("#idJ").val(data.id);
        });
        $("#editModal").modal("show");
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Job Grade?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteJobGrade/" + id,
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

    function getJobGrade(id) {
        return $.ajax({
            url: "/getJobGradeById/" + id,
        });
    }

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                jobGradeCode: "required",
                jobGradeName: "required",
            },

            messages: {
                jobGradeCode: "Please Insert Job Grade Code",
                jobGradeName: "Please Insert Job Grade Name",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createJobGrade",
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

    $("#updateButton").click(function (e) {
        $("#editForm").validate({
            // Specify validation rules
            rules: {
                jobGradeCode: "required",
                jobGradeName: "required",
            },

            messages: {
                jobGradeCode: "Please Insert Job Grade Code",
                jobGradeName: "Please Insert Job Grade Name",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editForm")
                    );
                    var id = $("#idJ").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateJobGrade/" + id,
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
