$(document).ready(function () {
    $("#cashAdvanceTable").DataTable({});

    $(document).on("change", "#statusCheck", function () {
        var id = $(this).data("id");
        var role = $(this).data("role");
        var status;

        if ($(this).is(":checked")) {
            status = "Y";
        } else {
            status = "";
        }

        data = {
            role: role,
            status: status,
        };

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateApprovalConfig/" + id,
                data: data,
                dataType: "json",
                encode: true,
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

    $(document).on("change", "#amendCheck", function () {
        var id = $(this).data("id");
        var role = $(this).data("role");
        var status;

        if ($(this).is(":checked")) {
            status = "Y";
        } else {
            status = "";
        }

        data = {
            role: role,
            status: status,
            field: "amend",
        };

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateApprovalConfigDetail/" + id,
                data: data,
                dataType: "json",
                encode: true,
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

    $(document).on("change", "#cancelCheck", function () {
        var id = $(this).data("id");
        var role = $(this).data("role");
        var status;

        if ($(this).is(":checked")) {
            status = "Y";
        } else {
            status = "";
        }

        data = {
            role: role,
            status: status,
            field: "cancel",
        };

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateApprovalConfigDetail/" + id,
                data: data,
                dataType: "json",
                encode: true,
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

    $(document).on("change", "#check2Check", function () {
        var id = $(this).data("id");
        var role = $(this).data("role");
        var status;

        if ($(this).is(":checked")) {
            status = "Y";
        } else {
            status = "";
        }

        data = {
            role: role,
            status: status,
            field: "check2",
        };

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateApprovalConfigDetail/" + id,
                data: data,
                dataType: "json",
                encode: true,
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

    $(document).on("change", "#check3Check", function () {
        var id = $(this).data("id");
        var role = $(this).data("role");
        var status;

        if ($(this).is(":checked")) {
            status = "Y";
        } else {
            status = "";
        }

        data = {
            role: role,
            status: status,
            field: "check3",
        };

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateApprovalConfigDetail/" + id,
                data: data,
                dataType: "json",
                encode: true,
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
