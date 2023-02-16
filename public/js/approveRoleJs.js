$(document).ready(function () {
    // $("#claimCategoryTable").DataTable({});

    $("#generalButton").click(function (e) {
        $("#generalForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("generalForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createGeneralApprover",
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
                                // window.location.href = "/setting/eclaimCategoryView";
                            }
                        });
                    });
                });
            },
        });
    });

    $(document).on("change", "#recommenderGeneral", function () {
        roleId = $(this).val();
        $("#approverGeneralShow")
            .find("option")
            .remove()
            .end()
            .append(
                '<option label="Please Choose" selected="selected"> </option>'
            )
            .val("");

        function getUserByJobGrade(roleId) {
            return $.ajax({
                url: "/getUserByJobGrade/" + roleId,
            });
        }

        $("#approverGeneralShow").find("option").end();

        var user = getUserByJobGrade(roleId);

        user.done(function (datas) {
            // console.log(datas);
            for (let i = 0; i < datas.length; i++) {
                const userApprover = datas[i];
                var opt = document.createElement("option");
                document.getElementById("approverGeneralShow").innerHTML +=
                    '<option value="' +
                    userApprover["id"] +
                    '">' +
                    userApprover["user_profile"]["fullName"] +
                    "</option>";
            }
        });
    });

    $(document).on("change", "#roleId", function () {
        roleId = $(this).val();
        $("#checker1")
            .find("option")
            .remove()
            .end()
            .append(
                '<option label="Please Choose" selected="selected"> </option>'
            )
            .val("");

        function getUserByJobGrade(roleId) {
            return $.ajax({
                url: "/getUserByJobGrade/" + roleId,
            });
        }

        $("#checker1").find("option").end();

        var user = getUserByJobGrade(roleId);

        user.done(function (data) {
            // console.log(data.user_profile.id);
            for (let i = 0; i < data.length; i++) {
                const user = data[i];
                var opt = document.createElement("option");
                document.getElementById("checker1").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker2").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker3").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("recommender").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("approver").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
            }
        });
    });

    $(document).on("change", "#roleIdC", function () {
        roleId = $(this).val();
        const inputs = [
            "checker1C",
            "checker2C",
            "checker3C",
            "recommenderC",
            "approverC",
        ];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove()
                .end()
                .append(
                    '<option label="Please Choose" selected="selected"> </option>'
                )
                .val("");

            function getUserByJobGrade(roleId) {
                return $.ajax({
                    url: "/getUserByJobGrade/" + roleId,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getUserByJobGrade(roleId);

        user.done(function (data) {
            // console.log(data.user_profile.id);
            for (let i = 0; i < data.length; i++) {
                const user = data[i];
                for (let i = 0; i < inputs.length; i++) {}
                var opt = document.createElement("option");
                document.getElementById("checker1C").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker2C").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker3C").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("recommenderC").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("approverC").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
            }
        });
    });

    $(document).on("change", "#roleIdF", function () {
        roleId = $(this).val();
        const inputs = [
            "checker1F",
            "checker2F",
            "checker3F",
            "recommenderF",
            "approverF",
        ];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove()
                .end()
                .append(
                    '<option label="Please Choose" selected="selected"> </option>'
                )
                .val("");

            function getUserByJobGrade(roleId) {
                return $.ajax({
                    url: "/getUserByJobGrade/" + roleId,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getUserByJobGrade(roleId);

        user.done(function (data) {
            // console.log(data.user_profile.id);
            for (let i = 0; i < data.length; i++) {
                const user = data[i];
                for (let i = 0; i < inputs.length; i++) {}
                var opt = document.createElement("option");
                document.getElementById("checker1F").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker2F").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker3F").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("recommenderF").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("approverF").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
            }
        });
    });

    $("#claimAdminButton").click(function (e) {
        $("#claimAdminForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("claimAdminForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createDomainList",
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

    $("#claimFinanceButton").click(function (e) {
        $("#claimFinanceForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("claimFinanceForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createDomainList",
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

    $("#cashAdminButton").click(function (e) {
        $("#cashAdminForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("cashAdminForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createDomainList",
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

    $("#updateButton").click(function (e) {
        var id = $("#idClaim").val();
        $("#updateForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateClaimCategory/" + id,
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
                                window.location.href =
                                    "/setting/eclaimCategoryView";
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
                title: "Are you sure to delete Role?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteClaimCategory/" + id,
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
