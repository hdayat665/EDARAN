$(document).ready(function () {
    $("#applyclaimtable").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        info: false,
    });
    $(document).on("change", "#claimcategory", function () {
        id = $(this).val();
        const inputs = ["contentLabel"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove()
                .end()
                .append(
                    '<option label="Please Choose" selected="selected"> </option>'
                )
                .val("");

            function getClaimCategoryContent(id) {
                return $.ajax({
                    url: "/getClaimCategoryContent/" + id,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getClaimCategoryContent(id);

        user.done(function (data) {
            $("#label").text(data[0].label);
            // console.log(data[0].label);
            for (let i = 0; i < data.length; i++) {
                const user = data[i];
                var opt = document.createElement("option");
                document.getElementById("contentLabel").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["content"] +
                    "</option>";
            }
        });
    });
    $("#udatepicker")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
        })
        .datepicker("setDate", "now");

    function getEclaimGeneralById(id) {
        return $.ajax({
            url: "/getEclaimGeneralById/" + id,
        });
    }

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#idG").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateGeneralClaim/" + id,
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

    $("#submitButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            // var id = $(this).data("id");
            var id = $("#idG").val();
            $.ajax({
                type: "POST",
                url: "/updateStatusGeneralClaims/" + id,
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
                        window.location.href = "/myClaimView";
                    }
                });
            });
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
                    url: "/deleteGNCDetail/" + id,
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
