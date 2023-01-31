$(document).ready(function () {
    $(document).ready(function () {
        $("#tabletype").dataTable({
            responsive: false,
            bLengthChange: false,
            bFilter: true,
        });
    });

    // enable/disable allow request
    document.getElementById("checkallowrequest").onchange = function () {
        document.getElementById("allowrequest").disabled = !this.checked;
    };
    // enable/disable allow request
    document.getElementById("ucheckallowrequest").onchange = function () {
        document.getElementById("uallowrequest").disabled = !this.checked;
    };

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                leave_types_code: "required",
                leave_types: "required",
            },

            messages: {
                leave_type_codes: "Please select leave tyoe code",
                leave_types: "Please Insert leave type",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    $.ajax({
                        type: "POST",
                        url: "/createtypes",
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

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");

        var typesData = geteleavetypes(id);

        typesData.done(function (data) {
            $("#leavetypescode").val(data.leave_types_code);
            $("#leavetypes").val(data.leave_types);
            $("#idtypes").val(data.id);
            $("#uallowrequest").val(data.day);
        });
    });

    function geteleavetypes(id) {
        return $.ajax({
            url: "/getcreateLeavetypes/" + id,
        });
    }

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {
                leavetypescode: "required",
                leavetypes: "required",
            },

            messages: {
                leavetypescode: "Please Insert leave types code",
                leavetypes: "Please Insert leave types",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#idtypes").val();
                    console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updateLeaveleavetypes/" + id,
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
                    url: "/deleteLeavetypes/" + id,
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

    $(".statusCheck").on("change", function () {
        var id = $(this).data("id");
        var status;

        if ($(this).is(":checked")) {
            status = 1;
        } else {
            status = 2;
        }

        console.log(status);
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "get",
                url: "/updateStatusleavetypes/" + id + "/" + status,
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
                }).then(function () {
                    if (data.type == "error") {
                    } else {
                        location.reload();
                    }
                });
            });
        });
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });
});