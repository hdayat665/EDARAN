$(document).ready(function () {
    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tablesop").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tablesop").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#tablepolicy").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tablepolicy").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $(document).on("click", "#addButton1", function () {
        $("#addModal1").modal("show");
    });

    $(document).on("click", "#editButton1", function () {
        var id = $(this).data("id");
        var vehicleData = getPolicy(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#policy").val(data.policy);
            $("#desc").val(data.desc);
            $("#code").val(data.code);
            $("#idP").val(data.id);
            // console.log(data.file);
            if (data.file) {
                var fileName = data.file.split('/').pop(); // Extract the file name from the file path
                $("#fileDownloadPolicy").html('<a href="/storage/' + data.file + '" target="_blank">Download ' + fileName + '</a>');
            }
        });
        $("#editModal1").modal("show");
    });

    $(document).on("click", "#deleteButton1", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Policy?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deletePolicy/" + id,
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

    function getPolicy(id) {
        return $.ajax({
            url: "/getPolicyById/" + id,
        });
    }

    $(document).on("click", "#saveButton1", function () {
        $("#addForm1").validate({
            // Specify validation rules
            rules: {
                code: "required",
                policy: "required",
                desc: "required",
                file: "required",
            },

            messages: {
                code: "Please Insert Policy",
                policy: "Please Insert Document Title",
                desc: "Please Insert Description",
                file: "Please Upload Attachment",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addForm1")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createPolicy",
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

$(document).on("click", "#updateButton1", function () {
    $("#editForm1").validate({
        // Specify validation rules
        rules: {
            code: "required",
            policy: "required",
            desc: "required",
            file: "required",
        },

        messages: {
            code: "Please Insert Policy",
            policy: "Please Insert Document Title",
            desc: "Please Insert Description",
            file: "Please Upload Document",
        },
        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(document.getElementById("editForm1"));
                var id = $("#idP").val();

                $.ajax({
                    type: "POST",
                    url: "/updatePolicy/" + id,
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

//////////////////////////////////SOP//////////////////////////////////////

$(document).on("click", "#addButton2", function () {
    $("#addModal2").modal("show");
});

$(document).on("click", "#editButton2", function () {
    var id = $(this).data("id");
    var vehicleData = getSOP(id);

    vehicleData.then(function (data) {
        console.log(data);
        $("#SOPCode").val(data.SOPCode);
        $("#descr").val(data.desc);
        $("#SOPName").val(data.SOPName);
        $("#idS").val(data.id);
        
        if (data.file) {
            var fileName = data.file.split('/').pop(); // Extract the file name from the file path
            $("#fileDownloadSOP").html('<a href="/storage/' + data.file + '" target="_blank">Download ' + fileName + '</a>');
          }
    });
    $("#editModal2").modal("show");
});

$(document).on("click", "#deleteButton2", function () {
    id = $(this).data("id");
    requirejs(["sweetAlert2"], function (swal) {
        swal({
            title: "Are you sure to delete SOP?",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        }).then(function () {
            $.ajax({
                type: "POST",
                url: "/deleteSOP/" + id,
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

function getSOP(id) {
    return $.ajax({
        url: "/getSOPById/" + id,
    });
}

$("#saveButton2").click(function (e) {
    $("#addForm2").validate({
        // Specify validation rules
        rules: {
            SOPCode: "required",
            SOPName: "required",
            desc: "required",
            file: "required",
        },

        messages: {
            SOPCode: "Please Insert SOP Code",
            SOPName: "Please Insert SOP Name",
            desc: "Please Insert Description",
            file: "Please Upload Attachment",
        },
        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(document.getElementById("addForm2"));
                // var data = $('#tree').jstree("get_selected");

                $.ajax({
                    type: "POST",
                    url: "/createSOP",
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

$(document).on("click", "#updateButton2", function () {
    $("#editForm2").validate({
        // Specify validation rules
        rules: {
            SOPCode: "required",
            SOPName: "required",
            desc: "required",
            file: "required",
        },

        messages: {
            SOPCode: "Please Insert SOP Code",
            SOPName: "Please Insert SOP Name",
            desc: "Please Insert Description",
            file: "Please Upload Attachment",
        },
        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(document.getElementById("editForm2"));
                var id = $("#idS").val();

                $.ajax({
                    type: "POST",
                    url: "/updateSOP/" + id,
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
